<!DOCTYPE html>
<html lang="en">

<head>

    <title> User Type</title>
    <?php
    include("../includes/header_files2.php");
    ?>
    <style>
    .box_type_form {
        display: flex;
        color: white;
        font-size: 24px;

    }

    .box_type_form .customer {
        background: #0d6efd;
    }

    .box_type_form .agency {
        background: #01d28e;
    }

    .box_type_form label {
        padding: 48px 36px;
        cursor: pointer;
    }

    .box_type_form .div1 {
        padding: 60px;
        width: 50%;
        text-align: right;
    }

    .box_type_form .div2 {
        padding: 60px;
        width: 50%;
        text-align: left;
    }

    .register_as {
        text-align: center;
        background: aliceblue;
        padding: 20px;
        color: black;
    }
    </style>
</head>

<body>

    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">

    </section>
    <h2 class="register_as"> Register AS</h2>
    <form class="box_type_form" method="get" action="signup.php">
        <div class="div1">
            <input style="display: none;" type="radio" onclick="javascript:user_type_func();" id="customer"
                name="user_type" value="customer">
            <label class="boxes customer" for="customer"> Customer </label><br>
        </div>
        <div class="div2">
            <input style="display: none;" type="radio" onclick="javascript:user_type_func();" id="agency"
                name="user_type" value="agency">
            <label class="boxes agency" for="agency"> Car Agency </label><br>
        </div>
        <input style="display: none;" type="submit" name="submit" id="user_type_submit">
    </form>
    <script>
    function user_type_func() {
        document.getElementById("user_type_submit").click();
    }
    </script>
</body>

</html>