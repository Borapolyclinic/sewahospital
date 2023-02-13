<?php
// Production
// $servername = "localhost";
// $username = "u976956619_sewa";
// $database = "u976956619_sewa";
// $password = "S3w@2023";

// Development
$servername = "localhost";
$username = "root";
$database = "sewa_hospital";
$password = "";

// Validate Connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Error 404: " . $connection->connect_error);
}