<?php
include('config.php');

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
<br>
<body style ="background-color:#2B1F50;">
<h3><center>Forgot Password</center></h3>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message">
	<?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>	
	<div class="field-group">
		<center>
			<h5>Enter your email below to find your password</h5>
		<div><input type="text" name="user-email" id="user-email" class="input-field"></div>
		</center>
	</div>
	<div class="field-group">
		<br>
		<center>
		<div><input type="submit" name="forgot-password" style="color:#888;" 
    value="Submit" class= "form-submit-button" onfocus="inputFocus(this)" onblur="inputBlur(this)" /></div>
		</center>
	</div>	
		</body>
</form>
<style> 
body{
	color: white;
	font-family: "Gill Sans";
}
</style>
