<?php
include('../config/db.php');
if(isset($_SESSION['user_role'])){
    $logged_user = $_SESSION['user_role'];
    if($logged_user == "agency"){
        header("Location: index.php");
    }
}else{
    header("Location: ../car-listings.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> Agencie's Cars</title>
    <?php
    include("../includes/header_files2.php");
    ?>
    <style>
    .bglight {
        background-color: #dee2e7;
    }
    </style>
</head>

<body class="dashboard">
    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">

    </section>
    <div class="navlinks">
        <a href='index.php'>Home</a>

    </div>
    <section class='ftco-section bglight'>
        <div class='cars-section'>
            <?php
        $user_email = $_SESSION["email"];
        $sql = "SELECT * FROM booked_cars WHERE customer_name = '$user_email' ";
        $result = mysqli_query($connection, $sql);
        $cars_ids = mysqli_num_rows($result);

        if ($cars_ids > 0){
            
            while($row1 = mysqli_fetch_assoc($result)){

                $sql2 = "SELECT * FROM cars WHERE id = $row1[car_id] ";
                $result2 = mysqli_query($connection, $sql2);
                $cars_count = mysqli_num_rows($result2);
                if ($cars_count > 0){
            
                    while($row = mysqli_fetch_assoc($result2)){
                        $box = 
                        "<div class='car-box'>
                        <div class='car-name'>";
                        $box .= $row["model"];
                        $box .= "
                        </div>
                        <div class='car-details'>
                            <div class='left'><p> <span>Car Number</span>  ";
                        $box .= $row["number"];
                        $box .= "</p>
                        <p> <span>Seating Capacity</span>  ";
                        $box .= $row["capacity"];
                        $box .= "</p>
                        </div>
                        <div class='right'>
                            <p class='price'>Rs";
                        $box .= $row["rent"];
                        $box .= "</p>
                            <p>per day</p>
                        </div>
                        </div>
                        <div class = 'booking_details'>
                        Booked for ";
                        $box .= $row1["days"];
                        $box .= " days from ";
                        $box .= $row1["from_date"]; 
                        $box .= "
                        </div>
                        </div>";
                        echo $box;
                    }
                }
                
            }
        }else{
            echo "<h1>You have no car rented</h1>";
        }
        
        ?>
        </div>
    </section>

</body>

</html>