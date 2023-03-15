<?php
include("config/db.php");
$logged_user = "out";
if(isset($_SESSION['user_role'])){
    $logged_user = $_SESSION['user_role'];
     
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <?php
    include("includes/header_files1.php");
    ?>
    <style>
    .bglight {
        background-color: #dee2e7;
    }

    .car-image img {
        width: 100%;
    }
    
    @media (max-width: 768px) {
   
    }
    </style>
</head>

<body>
    <?php
    include("includes/navbar.php");
    ?>

    <main>
        <section class="top-section">
            <h1>Listed Cars</h1>
        </section>

        <section class='ftco-section bglight'>
            <div class='cars-section'>

                <?php
        
        $sql = "SELECT * FROM cars WHERE booked = 0 ";
        $result = mysqli_query($connection, $sql);
        $cars_count = mysqli_num_rows($result);
    
        if ($cars_count > 0){
            
            while($row = mysqli_fetch_assoc($result)){
                $box = 
                "<div class='car-box'>
                <div class='car-image'>
                <img src='images/".$row["picture"]."'>
                ";
                $box .= $row["model"];
                $box .= "
                </div>
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
                <div class='book'>
                    <button id= '".$row["id"]."' class='book-button' value = '".$logged_user."' onclick = 'show_modal(". $row["id"].")'> Rent Car</button>
                </div>
                </div>
                ";
                echo $box;
            }
        }
        
        ?>

            </div>
        </section>

        <div class='backdrop' id="customer_logged_in" style="display: none;">
            <div class='model'>
                <form action='' method='post' style=''>
                    <div class="model-form">
                        <div class='form-group'>
                            <label>
                                Date of Booking
                            </label>
                            <input type='date' class='form-control' name='from_date' id='date' required />
                        </div>
                        <!--  -->
                        <div class='form-group'>
                            <label>Number of Days</label>
                            <input type='text' class='form-control' name='days' id='days' required />
                        </div>
                    </div>


                    <input style="display: none;" type='text' name='car_id' id="input_car_id" value='' name='car_id'>

                    <button type='submit' name='submit' id='submit' class='btn btn-outline-primary btn-lg btn-block'>
                        Rent Car
                    </button>
                </form>
                <br>

                <button onclick="remove_model()" class='btn btn-outline-primary btn-lg btn-block'>
                    Later
                </button>
            </div>
        </div>
        <div onclick="remove_model()" id="customer_logged_out" class='backdrop' style="display: none;">
            <div class='model'>
                To rent a car, you need to first log in.
                <a href='authentication/index.php'> Okay </a>
            </div>
        </div>
        <div onclick="remove_model()" id="agency_logged_in" class='backdrop' style="display: none;">
            <div class='model'>
                Car agencies can not rent car.
                <a href='car-listings.php'> Okay </a>
            </div>
        </div>
    </main>

    <?php
    if(isset($_POST["submit"])){
        $car_id             = $_POST["car_id"];
        $customer_name      = $_SESSION["email"];
        $from_date          = $_POST["from_date"];
        $days               = $_POST["days"];
        
        $sql = "INSERT INTO booked_cars (car_id,customer_name, from_date, days) VALUES ('{$car_id}','{$customer_name}', '{$from_date}', '{$days}')";
        $sqlQuery = mysqli_query($connection, $sql);
        $sql2 = "UPDATE cars SET booked = 1 WHERE id = $car_id";
        $sqlQuery2 = mysqli_query($connection, $sql2);
        
        if(!$sqlQuery){
            die("Car could not be added, some error occured" . mysqli_error($connection));
        }else{
            echo "<div onclick='remove_model()' id='car_addition_modal' class='backdrop' style='display: block;'>
            <div class='model'>
            Car Rented Successfully
                <a href='redirect_page.php'> Okay </a>
            </div>
        </div>";
        }
    }

    ?>
    <?php include("includes/footer.php"); ?>
    <!-- JAVASCRIPT -->
    <script src="js/open-modal.js"></script>
    <script src="js/close-modal.js"></script>
</body>

</html>