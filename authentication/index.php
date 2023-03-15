<?php
if(isset($_SESSION["name"])){
    header("Location: car-listings.php");
}
?>
<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title> Login Page</title>
    <?php
    include("../includes/header_files2.php");
    ?>
</head>

<body>
    <!-- Header -->
    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">
    </section>
    <!-- Login script -->
    <?php include('./controllers/login.php'); ?>
    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Login</h3>
                    <?php echo $accountNotExistErr; ?>
                    <?php echo $emailPwdErr; ?>
                    <?php echo $verificationRequiredErr; ?>
                    <?php echo $email_empty_err; ?>
                    <?php echo $pass_empty_err; ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_signin" id="email_signin" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password_signin" id="password_signin" />
                    </div>
                    <button type="submit" name="login" id="sign_in"
                        class="btn btn-outline-primary btn-lg btn-block">Sign in</button>
                </form>
                <a href="user_type.php">New Registeration </a>
            </div>
        </div>
    </div>
</body>

</html>