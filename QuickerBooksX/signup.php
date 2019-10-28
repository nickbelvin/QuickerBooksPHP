<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>

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
          
						
						<div class="field-group">
						<span class="fa fa-f" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="fname" class="form-control" id="text1" type="text" value="" placeholder="First Name" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-l" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="lname" class="form-control" id="text2" type="text" value="" placeholder="Last Name" required>
						</div>
					</div>

					<div class="field-group">
						<span class="fa fa-calender" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="dob" id="text3" class="form-control" type="text" value="" placeholder="Date of Birth (YY-MM-DD)" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-phone" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="phone" id="text4" class="form-control" type="text" value="" placeholder="Phone Numer" required>
						</div>
					</div>
                        <div class="field-group">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <div class="wthree-field">
							<input name="email" id="text4" class="form-control" type="text" value="" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="field-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input name="password" class="form-control" id="myInput" type="Password" placeholder="Password">
                            </div>
                        </div>
                        <div class="field-group">
                            <span class="fa fa-check" aria-hidden="true"></span>
                            <div class="wthree-field">
							<input name="passwordConf" class="form-control" id="text5" type="text" value="" placeholder="Confirm Password" required>
                            </div>
                        </div>
                       	<!-- <div class="form-class">
						<div class="wthree-field">
						<label>Select User Role</label>
                            @Html.Label("User Role", new { @class = "col-md-2 control-label" })
                            <div class="col-md-10">
                                @*@Html.DropDownList("Name") *@
                                @Html.DropDownList("UserRoles", (SelectList)ViewBag.Name, " ")
							</div>
							</div>
						</div> -->
						
						<div class="form-class" style="text-align: center;">
					<!--	<label>Select Profile Image</label> -->

							<img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
							<!-- hidden file input to trigger with JQuery  -->
							<input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
						</div>

						<div class="hide">
							<input name="username" id="text4" class="form-control" type="text" value="" placeholder="" >
                        </div>
						

                        <div class="wthree-field">
                            <button type="submit" name="signup_btn" class="btn">Register</button>
                        </div>

                    
                </div>
                        </div>
                   
        </div>
    </section>

</body>
<!-- //Body -->
</html>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>