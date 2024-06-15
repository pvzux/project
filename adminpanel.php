<?php
session_start();

// Redirect to login page if admin is not logged in
include("adminconnection.php");

$username = $_SESSION['username'];
if(empty($username)) {
    header('location: adminlogin.php');
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <img src="logoo.png" alt="Cable Car Logo" height="50" width="140">
    </header>
    <nav>
        <a href="display.php">Customer Details</a>
        <a href="displaybooking.php">Booking Details</a>
        <a href="admin_logout.php">Log Out</a>
    </nav>

    <section class="hero">
        <img src="back..jpg" width="1200" height="600" alt="cablecar">
        <div class="centered">
            <h1>Ponyo</h1>
            <p>Book your tickets for an unforgettable experience!</p>
        </div> 
    </section>

    <footer>
        &copy; 2024 Ponyo Cablecar
    </footer>
</body>
</html>
