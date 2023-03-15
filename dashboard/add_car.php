<?php
include('../config/db.php');
if(isset($_SESSION['user_role'])){
    $logged_user = $_SESSION['user_role'];
    if($logged_user == "customer"){
        header("Location: index.php");
    }
}else{
    header("Location: ../car-listings.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title> Add New Car </title>
    <?php
    include("../includes/header_files2.php");
    ?>
</head>

<body class="dashboard">
    <?php
    include("../includes/navbarr.php");
    ?>
    <section class="admin-top-section">

    </section>
    <div class="navlinks">
        <a href='index.php'>Home</a>
        <a href='view_cars.php'>View Cars</a>
        <a href='edit-car-details.php'>Edit Car Details</a>
    </div>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">

                <form action='' method='post' enctype="multipart/form-data">
                    <h3>
                        Add New Car
                    </h3>
                    <div class='form-group'>
                        <label>
                            Vehicle Model
                        </label>
                        <input type='text' class='form-control' name='vehicle_model' id='vehicle_model' required />

                    </div>
                    <!--  -->
                    <div class='form-group'>
                        <label>Vehicle Number</label>
                        <input type='text' class='form-control' name='vehicle_number' id='vehicle_number' required />

                    </div>
                    <div class='form-group'>
                        <label> Seating Capacity </label>
                        <input type='number' class='form-control' name='capacity' id='capacity' required />

                    </div>
                    <div class='form-group'>
                        <label>Rent Per Day (in Rs.) </label>
                        <input type='number' class='form-control' name='rent' id='rent' required />

                    </div>
                    <div class='form-group'>
                        <label>Upload image of the car </label>
                        <input type='file' class='form-control' name='file' id='file' required />

                    </div>
                    <input style="display: none;" type='text' value='<?php echo $user_type ?> ' name='user_role'
                        required>
                    <button type='submit' name='submit' id='submit' class='btn btn-outline-primary btn-lg btn-block'>
                        Add Car
                    </button>
                </form>

                <?php
                if(isset($_POST["submit"])){
                    $agency_name      = $_SESSION["name"];
                    $vehicle_model      = $_POST["vehicle_model"];
                    $vehicle_number     = $_POST["vehicle_number"];
                    $capacity           = $_POST["capacity"];
                    $rent               = $_POST["rent"];
                    $booked             = 0;

                    $statusMsg = '';

                    // File upload path
                    $targetDir = "../images/";
                    $fileName = basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    $uploaddetails = false;
                    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
                        // Allow certain file formats
                        $allowTypes = array('jpg','png','jpeg','gif');
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                $uploaddetails = true;
                            }else{
                                $statusMsg = "Sorry, there was an error uploading your file.";
                            }
                        }else{
                            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                        }
                    }else{
                        $statusMsg = 'Please select a file to upload.';
                    }

                    // Display status message
                    echo $statusMsg;

                    if($uploaddetails){

                        $sql = "INSERT INTO cars (agency,model, number, capacity, rent,picture,booked) VALUES ('{$agency_name}','{$vehicle_model}', '{$vehicle_number}', '{$capacity}', '{$rent}','{$fileName}', '{$booked}')";
                        $sqlQuery = mysqli_query($connection, $sql);
                    
                    
                        if(!$sqlQuery){
                            die("Car could not be added, some error occured" . mysqli_error($connection));
                        }else{
                            echo "<div onclick='remove_model()' id='car_addition_modal' class='backdrop'>
                            <div class='model'>
                            car added successfully
                                <a href='add_car.php'> Okay </a>
                            </div>
                        </div>";
                        }
                    
                    }
                    
                }
?>

            </div>
        </div>
    </div>




    <!-- JAVASCRIPT -->
    <script src="js/close-modal.js"></script>

</body>

</html>