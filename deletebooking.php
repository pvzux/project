<?php
include("connection.php");

$username = $_GET['username']; // Assuming you have the booking_id passed through GET parameter

$query = "DELETE FROM TICKETPAGE WHERE username = '$username'";
$data = mysqli_query($conn, $query);

if ($data) {
    echo "<script>alert('Record Deleted')</script>";
    echo '<meta http-equiv="refresh" content="0; url=http://localhost:7090/crud/displaybooking.php" />';
} else {
    echo "<script>alert('Failed to Delete: " . mysqli_error($conn) . "')</script>";
}
?>
