<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php $roles = getAllRoles(); ?>

<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>CREATE NEW ACCOUNT :: QUICKER BOOKS</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Quicker Books Register">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="Templates/Login/css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="Templates/Login/css/font-awesome.min.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- Google fonts -->
 
    
      
  
       </head>
<!-- //Head -->
<!-- Body -->

<body>


    <section class="main">
        <div class="layer">

            <div class="bottom-grid">
                <div class="logo">
                    <h1> <a href="#"><span class=""></span>Quicker Books</a></h1>
                </div>
                <div class="links">
                    <ul class="links-unordered-list">
                        <li class="">
                            <a href="login.php" class="">Login</a>
                        </li>
                        <li class="active">
                            <a href="signup.php" class="">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content-w3ls">
                <div class="text-center icon">
                    <span class=icon>
                        <img src="assets/images/qb.png" alt="Your logo" title="Your logo" style="height:155px;" />
                    </span>
                </div>
                <div class="content-bottom">
			<!-- <form action="#" method="post"> -->
				<form class="form" action="signup.php" method="post" enctype="multipart/form-data">
                <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
						<div class="field-group">
						<span class="fa fa-f" aria-hidden="true"></span>
						<div class="wthree-field">
                            <input name="fname" class="form-control" id="text1" type="text" placeholder="First Name" required
                            value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-l" aria-hidden="true"></span>
						<div class="wthree-field">
                            <input name="lname" class="form-control" id="text2" type="text" placeholder="Last Name" required
                            value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
						</div>
					</div>

					<div class="field-group">
						<span class="fa fa-calendar" aria-hidden="true"></span>
						<div class="wthree-field">
                            <input name="dob" type="text" placeholder="Date of Birth"  onfocus="(this.type='date')"
                            value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>">
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-phone" aria-hidden="true"></span>
						<div class="wthree-field">
                            <input name="phone" id="text4" class="form-control" type="tel" placeholder="Phone Numer" required
                            value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>">
						</div>
					</div>
                        <div class="field-group" <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <div class="wthree-field">
                            <input name="email" id="text4" class="form-control" type="text" placeholder="Email Address" required
                            value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                            <?php if (isset($errors['email'])): ?>
                            <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['email'] ?></div>
            <?php endif; ?>	   
                        </div>
                        </div>
                        <div class="field-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input name="password" class="form-control" id="myInput" type="Password" placeholder="Password" required>
                                <?php if (isset($errors['password'])): ?>
              <div class="error"><i class="fa fa-times-circle"></i><?php echo $errors['password'] ?></div>
            <?php endif; ?>	
                            </div>
                        </div>
                       
                       
                        <div class="field-group" <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                            <span class="fa fa-check" aria-hidden="true"></span>
                            <div class="wthree-field">
							<input name="passwordConf" class="form-control" id="text5" type="Password" placeholder="Confirm Password" required>
                            <?php if (isset($errors['passwordConf'])): ?>
                            <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['passwordConf'] ?></div>
            <?php endif; ?>	
                        </div>
                        </div>                     

                        <div class="">           
              <select required class="select-css" name="role_id">
                <option value="" class=""> Select User Role</option>
                <?php foreach ($roles as $role): ?>
                  <?php if ($role['id'] === $role_id): ?>
                    <option value="<?php echo $role['id'] ?>" selected><?php echo $role['name'] ?></option>
                  <?php else: ?>
                    <option value="<?php echo $role['id'] ?>"><?php echo $role['name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
        <div class="form-group" style="text-align: center;">
					<!--	<label>Select Profile Image</label> -->
							<img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
							<!-- hidden file input to trigger with JQuery  -->
							<input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
						</div>
						<div class="hide">
							<input name="username" id="text4" class="form-control" type="text" value="username">
                        </div>
                        <div class="wthree-field">
                            <button type="submit" name="signup_btn" class="btn">Register</button>
                        </div>
                </div>
            </div>         
        </div>
    </section>

</body>

<script src="Templates/Dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<script src="Templates/Dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>
<!-- //Body -->
</html>
