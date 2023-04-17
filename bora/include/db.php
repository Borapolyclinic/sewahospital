<?php
// Production
$servername = "sql686.main-hosting.eu";
$username = "217.21.95.205";
$database = "u976956619_sewa";
$password = "S3w@2023";

// Development
// $servername = "localhost";
// $username = "root";
// $database = "sewa_hospital";
// $password = "";

// Validate Connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Error 404: " . $connection->connect_error);
}