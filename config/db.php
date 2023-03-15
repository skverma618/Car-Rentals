<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

// $servername = "localhost";
// $username = "u941391946_car_rental";
// $password = "Car_rental@618";
// $dbname = "u941391946_car_rental";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Database connection not established.");

?>