<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>


<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>LOGIN :: QUICKER BOOKS</title>
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
                <h1> <a href="index.html"><span class=""></span>Quicker Books</a></h1>
            </div>
            <div class="links">
                <ul class="links-unordered-list">
                    <li class="active">
                        <a href="login.php" class="">Login</a>
                    </li>
                    <li class="">
                        <a href="signup.php" class="">Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-w3ls">
            <div class="text-center icon">
				<span class>
                <img src="assets/images/qb.png" alt="Your logo" title="Your logo" style="height:155px;" />
                </span>
            </div>
            <div class="content-bottom">
                <!-- <form action="#" method="post"> -->
                <form class="form" action="login.php" method="post">

                    <!-- display form error messages  -->
                    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                    <div class="field-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                        <span class="fa fa-user" aria-hidden="true"></span>
                        <div class="wthree-field">
                            <input type="text" name="username" id="password" value="<?php echo $username; ?>" class="form-control" placeholder="Username">
                            <?php if (isset($errors['username'])): ?>
                                <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['username'] ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="field-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <div class="wthree-field">
                            <input type="password" name="password" id="password" class="form-control" placeholder = "Password">
                            <?php if (isset($errors['password'])): ?>
                                <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['password'] ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="wthree-field">
                        <button type="submit" name="login_btn" class="btn btn-success">Get Started</button>
                    </div>
                    <ul class="list-login">
                        <li class="switch-agileits">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                                keep Logged in
                            </label>
                        </li>
                        <li>
                            <a href="forgotpassword.php" class="text-right">forgot password?</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                    <ul class="list-login-bottom">
                        <li class="">
                            <a href="signup.php" class="">Create Account</a>
                        </li>
                        <li class="">
                            <a href="#" class="text-right">Need Help?</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>

</body>
<!-- //Body -->


</html>
