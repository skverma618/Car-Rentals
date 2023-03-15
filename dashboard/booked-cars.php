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

    <title> Agencie's Cars</title>
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
            <th class="cols">Status</th>
        </tr>
        <?php
            if ($cars_count > 0){
                $sno = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                    <td>$sno</td>
                    <td> ".$row["model"]."</td>
                    <td> ".$row["number"]." </td>
                    <td> ".$row["capacity"]." </td>
                    <td> ".$row["rent"]." </td>";
                    
                     
                     
                    if($row["booked"]){
                        $car_id = $row["id"];
                        $sql2 = "SELECT * FROM booked_cars WHERE car_id= $car_id";
                        $result2 = mysqli_query($connection, $sql2);
                        $days = 0;
                        $from = "__";
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $days = $row2["days"];
                            $from = $row2["from_date"];
                        }
                        
                        echo "<td class='booked'> 
                        BOOKED
                        <p> For $days days 
                        <br>
                        From $from </p>
                        </td></tr>";
                    }else{
                        echo "<td class='not_booked'> 
                         NOT BOOKED 
                        </td></tr>";
                    }
                    $sno++;
                }
            }
            ?>
    </table>

</body>

</html>