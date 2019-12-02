<?php
require_once '../../vendor/autoload.php'; ?>

<?php
// variable declaration
$body = "";
$to  = "";
$subject ="";
$username ="";
$email ="";
$from ="";

 //$body = $_POST['body'];
 //$subject = $_POST['subject'];
 //$from = $_SESSION['user']['email'];
 //$username = $_SESSION['user']['username'];
 //$email = $_POST['to'];

 //$email = $_POST['to'];

// SEND EMAIL
if (isset($_POST['send_email'])) {
  global $conn, $to, $subject, $body, $username, $email;

  $body = $_POST['body'];
  $subject = $_POST['subject'];
  $to= $_POST['to'];
  //$from = $_SESSION['user']['email'];
	$email = $_SESSION['user']['email'];

		// Create the Transport
		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
			->setUsername('quickerbooks123@gmail.com')
			->setPassword('accounting101');

		// Create the Mailer using your created Transport
		$mailer = new Swift_Mailer($transport);

		function sendNewEmail($email)
		{
			global $conn, $mailer, $to, $subject, $body, $username, $from, $email;
			
			
			// Create a message
			$message = (new Swift_Message($subject))
				->setFrom(['quickerbooks123@gmail.com' => $_SESSION['user']['username']])
				->setTo($to)
				->setBody($body);

			// Send the message
			$result = $mailer->send($message);

			if ($result > 0) {
				return true;
			} else {
				return false;
			}
		}
		
		//send email to user
    sendNewEmail($to);	
    header("location: " . BASE_URL . "layout.php");

				} else {
					//$_SESSION['error_msg'] = " Could not send email";
				}
     
    



