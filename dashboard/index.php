<?php include('../config/db.php'); 
$logged_user = "";
if(isset($_SESSION['user_role'])){
    $logged_user = $_SESSION['user_role'];
}else{
    header("Location: ../car-listings.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <title> Agency Dashboard</title>
    <?php
    include("../includes/header_files2.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body class="dashboard">
    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">

    </section>

    <div class="main_container">
        <div>
            <div class="container mt-5 card_container">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: fit-content">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Profile</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Name : <?php echo $_SESSION['name']; ?>
                                <br>
                                <p class="card-text">Email address: <?php echo $_SESSION['email']; ?></p>
                                <p class="card-text">Mobile number: <?php echo $_SESSION['mobilenumber']; ?></p>
                                <p class="card-text">User Type: <?php echo $_SESSION['user_role']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if($logged_user == "customer"){
                            echo "<div class='container mt-5 card_container'>
                            <div class='d-flex justify-content-center'>
                                <div class='card' style='width: fit-content'>
                                    <div class='card-body'>
                                    <a class='admin_btn' href='rented-cars.php'> Your Rented Cars</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }else if($logged_user == "agency"){
                    echo "<div class='container mt-5 card_container'>
                            <div class='d-flex justify-content-center'>
                                <div class='card' style='width: fit-content'>
                                    <div class='card-body'>
                                        <a class='admin_btn' href='view_cars.php'>View Cars Status</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
                        
            ?>

        </div>
        <?php
                if($logged_user == "agency"){
                            echo "<div>
                            <div class='container mt-5 card_container'>
                                <div class='d-flex justify-content-center'>
                                    <div class='card' style='width: fit-content'>
                                        <div class='card-body'>
                                            <a class='admin_btn' href='add_car.php'>Add New Car</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='container mt-5 card_container'>
                                <div class='d-flex justify-content-center'>
                                    <div class='card' style='width: fit-content'>
                                        <div class='card-body'>
                                            <a class='admin_btn' href='edit-car-details.php'>Edit Car Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            ";
                }                        
            ?>
        <div>

        </div>
    </div>
</body>

</html>