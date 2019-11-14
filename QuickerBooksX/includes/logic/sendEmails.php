<?php
require_once './vendor/autoload.php'; ?>

<?php
$username = $user['username'];
$query = "SELECT * FROM users WHERE username ='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$fname = $row['fname'];
$lname = $row['lname'];
$dob = $row['dob'];
?>

<?php
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('quickerbooks123@gmail.com')
    ->setPassword('accounting101');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    
    global $mailer;
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
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>
   

    <body>
      <div class="wrapper">
      <h4>Hello Admin, </h4>
      <p>A user with following credentials has signed up for Quicker Books: </p>
        <p>User: <?php echo $fname; ?> " " <?php echo $lname; ?></p>
        <p>Username: <?php echo $username; ?></p>
        <p>Date of Birth: <?php echo $dob; ?> </p>
        <p>Please click on the link below to verify the account:.</p>
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

function sendConfirmationEmail($userEmail)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Confirmation Email for Quickr Books</title>
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
        <p>Thank you for signing up for Quicker Books Accounting. You have been verified and can now access your account.</p>
        <p>Login at <a href="http://localhost/qb/login.php "> with the password you used during registration</a></p>
        <p>Your username is <?php echo $username ?></p>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Account Confirmation'))
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
