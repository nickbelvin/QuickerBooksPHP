<?php
include('config.php');
session_start();

if (isset($_POST['forgot_password'])) {

		$conn = mysqli_connect("localhost", "root", "", "blog_samples");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " member_name = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " member_email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from members " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		if(!empty($user)) {
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">

<h3>Forgot Password?</h3>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>	
	<div class="field-group">
		<div><label for="email">Email</label></div>
		<div><input type="text" name="user-email" id="user-email" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	</div>	
</form>

<h4>Please answer the following security questions!!</h4>
      <form id="securityform" onsubmit="return false;">
        <div>Question 1:</div>
        <p><?php echo $q1 = "Security Question 1"; ?></p>
        <input name="ans1" id="ans1" type="text" onfocus="_('status').innerHTML='';" maxlength="100">
        <br/><br/>
        <div>Question 2:</div>
        <p><?php echo $q2 = "Security Question 2"; ?></p>
        <input name="ans2" id="ans2" type="text" onfocus="_('status').innerHTML='';" maxlength="100">
        <br /><br />
        <input name="email" id="email" type="hidden" value="<?php echo $email; ?>" />

        <button id="anssubmitbtn" onclick="forgotpasscon()">Submit</button> 
        <p id="status"></p>
      </form>
    </div>
    <?php include_once("template_pageBottom.php"); ?>
    </body> 
    </html> 
