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

    <title> Edit Cars</title>
    <?php
    include("../includes/header_files2.php");
    ?>
    <style>
    .cars_table {
        width: 96%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .cars_table .cols {
        background-color: #9ea0ff;
        color: white;
        padding: 10px;
    }

    .thead {
        background: #336699;
        font-size: 28px;
        color: white;
    }

    .cars_table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .cars_table tr:hover {
        background-color: #d1dee3;
    }

    .cars_table td {
        padding: 10px;
    }

    .not_booked {
        background-color: #e99b9b;
        font-size: 17px;
        color: white;
        font-weight: 500;
    }

    .booked {
        color: white;
        font-size: 17px;
        background: #01d28e;
        font-weight: 500;
    }

    .booked p {
        color: #336699;
        background: aliceblue;
        margin-bottom: 3px;
        font-weight: 100;
    }

    .model {
        top: 15vh;
        z-index: 100000000;
    }

    .edit_img {
        max-width: 120px;
    }
    </style>
</head>

<body class="dashboard">
    <script>
    function edit_car_modal() {
        document.getElementById('edit_car_modal').style.display = "block";
    }

    function remove_model() {
        document.getElementById('edit_car_dialog').style.display = "none";
        document.getElementById('edit_car_modal').style.display = "none";
    }
    </script>
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
    <?php
    $agency_name = $_SESSION['name'];
    $sql = "SELECT * FROM cars WHERE agency='". $agency_name ."' ";
    $result = mysqli_query($connection, $sql);
    $cars_count = mysqli_num_rows($result);
    ?>

    <table class="cars_table">
        <tr>
            <th class="thead" colspan="6"> Your Listed Cars</th>
        </tr>
        <tr>
            <th class="cols">S.NO</th>
            <th class="cols">Car Model</th>
            <th class="cols">Car Number</th>
            <th class="cols">Seating Capacity</th>
            <th class="cols">Rent</th>
            <th class="cols">Picture</th>
            <th class="cols"></th>
        </tr>
        <?php
        $cars_array = array();
            if ($cars_count > 0){
                $sno = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $cars_array[$row["id"]] = array(
                        "model" => $row["model"], 
                        "number" => $row["number"], 
                        "capacity" => $row["capacity"],
                        "rent" => $row["rent"],
                        "picture" => $row["picture"]
                    );
                    
                    $agency_name  = $_SESSION["name"];
                    echo "
                    <tr>
                    <td>$sno</td>
                    <td> ".$row["model"]."</td>
                    <td> ".$row["number"]." </td>
                    <td> ".$row["capacity"]." </td>
                    <td> ".$row["rent"]." </td>
                    <td> <img class='edit_img' src= '../images/".$row["picture"]."' >   </td>";
                    echo "<td class='booked'> 
                    <div class='book'>
                    
                    <form method=\"post\"  action= '' >                     
                    <input style = 'display:none;'  type=\"number\" name=\"car_id\" value='".$row["id"]."' >
                    <input class=\"book-button\" type=\"submit\" name=\"edit_button\" id=\"edit_button\" value=\" Edit \" > 
                    </form>

                    </div>
                    </td></tr>";
                    
                    $sno++;
                }
            }
            ?>
    </table>



    <?php
        if(isset($_POST["edit_button"])){
            $car_id        = $_POST["car_id"];
             $model = $cars_array[$car_id]["model"];
             $number = $cars_array[$car_id]["number"];
             $capacity = $cars_array[$car_id]["capacity"];
             $rent = $cars_array[$car_id]["rent"];
             $picture = $cars_array[$car_id]["picture"];
            
            echo "
            <div onclick='remove_model()' class='backdrop' id='edit_car_modal'></div>
                <div onclick='edit_car_modal()' id='edit_car_dialog' class='model'>
                <div class='vertical-center'>
                <div class='inner-block'>
                
                <form action='' method='post' enctype='multipart/form-data'>
                    <h3>
                        Add New Car
                    </h3>
                    <div class='form-group'>
                        <label>
                            Vehicle Model
                        </label>
                        <input type='text' value = '".$model."' class='form-control' placeholder='' name='vehicle_model' id='vehicle_model'
                            required />
    
                    </div>
                   
                    <div class='form-group'>
                        <label>Vehicle Number</label>
                        <input type='text' value = '".$number."' class='form-control' name='vehicle_number' id='vehicle_number' required />
    
                    </div>
                    <div class='form-group'>
                        <label> Seating Capacity </label>
                        <input type='number' value = '".$capacity."' class='form-control' name='capacity' id='capacity' required />
    
                    </div>
                    <div class='form-group'>
                        <label>Rent Per Day (in Rs.) </label>
                        <input type='number' value = '".$rent."' class='form-control' name='rent' id='rent' required />
                        <input style = 'display:none;' type='number' value = '".$car_id."' class='form-control' name='car_id' id='car_id' required />
                    </div>
                    <div class='form-group'>
                        <label>Upload new image of car (if you want) </label>
                        <input type='file' class='form-control' name='file' id='file' />
    
                    </div>
                    
                    <button type='submit' name='submit' id='submit' class='btn btn-outline-primary btn-lg btn-block'>
                    Update
                    </button>
                    </form>
                    <br>
                    </div>  
                    </div>
                    </div>
                    ";
                }
    ?>




    <?php
                if(isset($_POST["submit"])){
                    $agency_name        = $_SESSION["name"];
                    $vehicle_model      = $_POST["vehicle_model"];
                    $vehicle_number     = $_POST["vehicle_number"];
                    $capacity           = $_POST["capacity"];
                    $rent               = $_POST["rent"];
                    $car_id             = $_POST["car_id"];
                    $statusMsg = '';

                    
                    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

                        // File upload path
                    $targetDir = "../images/";
                    $fileName = basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                     
                    
                        // Allow certain file formats
                        $allowTypes = array('jpg','png','jpeg','gif');
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                $sql = "UPDATE cars SET number = $vehicle_number, capacity = $capacity, rent = $rent, picture = $fileName WHERE id = $car_id ";
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
                            }else{
                                $statusMsg = "Sorry, there was an error uploading your file.";
                            }
                        }else{
                            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                        }
                    }else if(isset($_POST["submit"])){
                        $sql = "UPDATE cars SET model = '{$vehicle_model}', number = '{$vehicle_number}', capacity = $capacity, rent = $rent WHERE id = $car_id ";
                        $sqlQuery = mysqli_query($connection, $sql);
                        if(!$sqlQuery){
                            die("Car could not be added, some error occured" . mysqli_error($connection));
                        }else{
                            echo "<div onclick='remove_model()' id='car_addition_modal' class='backdrop'>
                            <div class='model'>
                            Details Updated successfully
                                <a href='edit-car-details.php'> Okay </a>
                            </div>
                        </div>";
                        }
                    }

                    // Display status message
                    echo $statusMsg;
                    
                }

                ?>

</body>

</html>