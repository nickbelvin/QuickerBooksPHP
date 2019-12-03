<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<?php
require_once './vendor/autoload.php'; ?>

<?php
// variable declaration
$username = "";
$email  = "";
$fname ="";
$lname ="";
$phone ="";
$dob ="";
$role_id = NULL;
$errors  = [];

function getAllRoles(){
    global $conn;
    $sql = "SELECT id, name FROM roles";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $roles = $result->fetch_all(MYSQLI_ASSOC);
    return $roles;
}

// SIGN UP USER
if (isset($_POST['signup_btn'])) {
    global $conn, $errors, $username, $role_id, $email, $fname, $lname, $phone, $dob, $created_at;
    // validate form values
    $errors = validateUser($_POST, ['signup_btn']);

    // receive all input values from the form. No need to escape... bind_param takes care of escaping
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $profile_picture = uploadProfilePicture();
    $token = bin2hex(random_bytes(50));

    $cName = substr($fname, 0,1) . $lname .date("my");
    $uName = strtolower($cName);
    $username = $uName;

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt the password before saving in the database
    $created_at = date('Y-m-d H:i:s');
    $dt =  strtotime($created_at);
    $password_expiry = date('Y-m-d H:i:s', strtotime('+3 month', $dt));

    // if no errors, proceed with signup
    if (count($errors) === 0) {
        if (isset($_POST['role_id'])) {
            $role_id = $_POST['role_id'];
        }

        // insert user into database
        $query = "INSERT INTO users SET role_id=?, token=?, username=?, fname=?, lname=?, email=?, phone=?, password=?, profile_picture=?, dob=?, password_expiry=?, created_at=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('isssssssssss', $role_id, $token, $username, $fname, $lname, $email, $phone, $password, $profile_picture, $dob, $password_expiry, $created_at);
        $result = $stmt->execute();
        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();
            //loginById($user_id); // log user in



            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('quickerbooks123@gmail.com')
                ->setPassword('accounting101');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            function sendVerificationEmail($userEmail, $token)
            {
                global $conn, $mailer, $fname, $lname, $username, $dob;

                $body = '<!DOCTYPE html>
			<html lang="en">

			<head>
			<meta charset="UTF-8">
			<title>Test mail</title>
			<style>
				.wrapper {
				padding: 20px;
				color: #444;
				font-size: 1.3em;
				}
				a {
				background: #592f80;
				text-decoration: none;
				color: #fff;
				}
			</style>
			</head>
			

			<body>
			<div class="wrapper">
			<h4>Hello Admin, </h4>
			<p>A user with following credentials has signed up for Quicker Books: </p>
				<p>Name: '.$fname.'  '.$lname.'  </p>
				<p>Username: '.$username.' </p>
				<p>Date of Birth:  '.$dob.'  </p>
				<p>Please click on the button below to verify the account.</p>
				<a href="http://localhost/qb/verification.php?token=' . $token . '">Verify user account</a>
				</div>
			</body>
			</html>';

                // Create a message
                $message = (new Swift_Message('Verify New User Account'))
                    ->setFrom('quickerbooks123@gmail.com')
                    ->setTo($userEmail)
                    ->setBody($body, 'text/html');

                // Send the message
                $result = $mailer->send($message);

                if ($result > 0) {
                    return true;
                } else {
                    return false;
                }
            }

            // TO DO: send verification email to admin
            $admin_email ='quickerbooks123@gmail.com';
            sendVerificationEmail($admin_email, $token);
            header('location: welcome.php');

        } else {
            //$_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}


// USER LOGIN
if (isset($_POST['login_btn'])) {
    // validate form values
    $errors = validateUser($_POST, ['login_btn']);
    $username = $_POST['username'];
    $password = $_POST['password']; // don't escape passwords.
    $lockout_minutes = 24;
    $login_fail_max = 3;
    $login_fail_count = 0;
    $timestamp = date("Y-m-d H:i:s");

    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $user = getSingleRecord($sql, 'ss', [$username, $email]);

        if (!empty($user)) { // if user was found
            //$username_exists = true;
            $userid = $user['id'];
            $verified = $user['verified'];

            if (($verified == 1)) {
                if ($user['locked'] == 1) {
                    $lock_start_time = $user['lock_start_time'];
                    if ($lock_start_time != NULL) {
                        $dif = (strtotime($timestamp) - strtotime($lock_start_time));
                        if ($dif > $lockout_minutes * 60) {
                            $login_fail_count = 0;
                            $sql = "UPDATE users
						SET locked = 0, login_fail_count = 0, lock_start_time = NULL
						WHERE id = $userid";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                        }
                    }

                }

                if ($user['locked'] == 0) {

                    if (empty($user['last_login'])) {
                        header('location: ' . BASE_URL . 'questions.php');
                        exit(0);
                    }
                    else if (!empty($user['last_login'])) {
                        $logintime = date('Y-m-d H:i:s');
                        $sql = "UPDATE users
					SET last_login = '$logintime'
					WHERE id = $userid";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    }

                    $dt = date("Y-m-d H:i:s");
                    $dif = (strtotime($dt) - strtotime($user['password_expiry']));
                    if ($dif > 1) {
                        $sql = "UPDATE users
						SET locked = 1, status = 'Inactive', lock_start_time = '$dt'
						WHERE id = $userid";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $_SESSION['success_msg'] = "Your account has been locked. Please reset your password or contact your administrator" ;
                    }

                    else {

                        $login_fail_count = $user['login_fail_count'];
                        $status = $user['status'];
                        $sql = "UPDATE users SET login_fail_count = 0 WHERE id = $userid";
                        //$stmt = $conn->prepare($sql);
                        //$stmt->execute();
                        if ((password_verify($password, $user['password'])) && ($status == 'Active')){ // if password matches
                            // log user in
                            loginById($user['id']);
                        } else { // if password does not match
                            // Not Successful. Increment failed login count
                            $will_be_locked = ($login_fail_count == $login_fail_max - 1);
                            $timestamp = date('Y-m-d H:i:s');
                            if ($will_be_locked) {
                                $sql = "UPDATE users
						SET status = 'Inactive', login_fail_count = login_fail_count + 1, locked = 1, lock_start_time = '$timestamp'
						WHERE id = $userid";
                            } else {
                                $attempts_remaining = ($login_fail_max - ($login_fail_count + 1));
                                if ($attempts_remaining < 1) {
                                    $_SESSION['error_msg'] = "Your account has been locked. Please reset your password or contact your administrator" ;
                                } if ($attempts_remaining > 0) {
                                    $_SESSION['error_msg'] = "Incorrect username or password";
                                    if ($attempts_remaining <= 2) {
                                        $_SESSION['error_msg'] = "Attempts remaining: " . ($login_fail_max - ($login_fail_count + 1)) . "";

                                    }
                                }

                                $sql = "UPDATE users
						SET login_fail_count = login_fail_count + 1
						WHERE id = $userid";
                            }

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                        }
                    }
                } else {
                    // Account is locked. Increment failed login count
                    $sql = "UPDATE users SET login_fail_count = login_fail_count + 1 WHERE username = '$username'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $_SESSION['error_msg'] = nl2br("Account is locked. Reset password or contact your administrator for access");
                }

                //$_SESSION['error_msg'] = "Wrong credentials";
            } else { //email not verified
                $_SESSION['error_msg'] = "Your account has not been verified by an administrator. Access not granted";
            }

        }
        else { // if no user found
            $_SESSION['error_msg'] = "Incorrect username or password";
        }
    }
}
