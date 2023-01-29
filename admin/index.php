<?php
session_start();
if (isset($_SESSION["user_contact"])) {
    header("location:dashboard.php");
}
$title = "Admin Login | Sewa Hospital & Research Centre";
include('includes/header.php') ?>
<?php include('login/login-screen.php') ?>
<?php include('includes/footer.php') ?>