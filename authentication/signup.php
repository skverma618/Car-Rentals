<?php
include('./controllers/register.php');
$user_type = "customer";
if(isset($_GET['user_type'])){
    if($_GET["user_type"] == "agency"){
         $user_type = "agency";
    }
 }

?>
<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title> New User Registeration </title>
    <?php
    include("../includes/header_files2.php");
    ?>
</head>

<body>
    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">
    </section>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">

                <form action='' method='post' id='customer_form' style=''>
                    <h3>
                        <?php
                        if($user_type == "agency"){
                            echo "New Car Agency";
                        }else{
                            echo "New User Registeration";
                        }
                        ?>
                    </h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email_exist; ?>
                    <?php echo $email_verify_err; ?>
                    <?php echo $email_verify_success; ?>

                    <div class='form-group'>
                        <label>
                            <?php
                            if($user_type == "agency"){
                                echo "Agency Name";
                            }else{
                                echo "User Name";
                            }
                            ?>
                        </label>
                        <input type='text' class='form-control' name='firstname' id='firstName' />
                        <?php echo $fNameEmptyErr ?>
                        <?php echo $f_NameErr ?>
                    </div>
                    <!--  -->
                    <div class='form-group'>
                        <label>Email</label>
                        <input type='email' class='form-control' name='email' id='email' />
                        <?php echo $_emailErr ?>
                        <?php echo $emailEmptyErr ?>
                    </div>
                    <div class='form-group'>
                        <label>Contact Number </label>
                        <input type='text' class='form-control' name='mobilenumber' id='mobilenumber' />
                        <?php echo $_mobileErr ?>
                        <?php echo $mobileEmptyErr ?>
                    </div>
                    <div class='form-group'>
                        <label>Password</label>
                        <input type='password' class='form-control' name='password' id='password' />
                        <?php echo $_passwordErr ?>
                        <?php echo $passwordEmptyErr ?>
                    </div>
                    <input style="display: none;" type='text' value='<?php echo $user_type ?>' name='user_role'>
                    <button type='submit' name='submit' id='submit'
                        class='btn btn-outline-primary btn-lg btn-block'>Sign up
                    </button>
                </form>



            </div>
        </div>
    </div>
</body>

</html>