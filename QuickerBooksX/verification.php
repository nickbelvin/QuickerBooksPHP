<?php include('config.php') ?>
<?php
require_once './vendor/autoload.php'; ?>

<?php
if (isset($_GET['token'])) {
    global $conn; $email;
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = $user['username']; 
        $query = "UPDATE users SET verified=1, status = 'Active' WHERE token='$token'";
       
        if (mysqli_query($conn, $query)) {

           
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('quickerbooks123@gmail.com')
                ->setPassword('accounting101');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            $email = $user['email'];

            function sendConfirmationEmail($email)
            {
                global $mailer, $username, $conn;
             
                $sql = "SELECT * FROM users WHERE username=? LIMIT 1";
                $user = getSingleRecord($sql, 's', [$username]);
                $username = $user['username'];
                $fname = $user['fname'];
                $lname = $user['lname'];
                $email = $user['email'];

                $body = '<!DOCTYPE html>
                <html lang="en">
            
                <head>
                  <meta charset="UTF-8">
                  <title>Confirmation Email for Quicker Books</title>
                  <style>
                    .wrapper {
                      padding: 20px;
                      color: #444;
                      font-size: 1.3em;
                    }
                    a {
                      background: #592f80;
                      text-decoration: none;
                      padding: 8px 15px;
                      border-radius: 5px;
                      color: #fff;
                    }
                  </style>
                </head>

                <body>
                  <div class="wrapper">
                  <h4>'.$fname.'  '.$lname.',</h4>
                    <p>Thank you for signing up for Quicker Books Accounting. You have been verified and can now access your account.</p>
                    <p>Your username is '.$username.' </p>
                    <p>You can login with the password you used during registration at</p>
                     <a href="http://quickerbooks.us-east-2.elasticbeanstalk.com/login.php "> this link </a>    
                  </div>
                </body>
            
                </html>';
            
                // Create a message
                $message = (new Swift_Message('Account Confirmation'))
                    ->setFrom('quickerbooks123@gmail.com')
                    ->setTo($email)
                    ->setBody($body, 'text/html');
            
                // Send the message
                $res = $mailer->send($message);
            
                if ($res > 0) {
                    return true;
                } else {
                    return false;
                }
            }
            sendConfirmationEmail($email);
            
           // loginById($user_id); // log user in

			
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}