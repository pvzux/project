<?php
session_start();
include("connection.php");

$username = $_SESSION['username'];

// Validate session
if(empty($username) || !isValidUser($conn, $username)) {
    header('location: login.php');
    exit; // Stop further execution
}

// Assuming price per person is 1000 NRS
$basePricePerPerson = 1000;

// Retrieve the number of people and booking details from the form
$numPeople = intval($_POST['count']); // Ensure $numPeople is an integer
$bookingDate = $_POST['booking_date'];

// Validate booking date
$currentDate = date("Y-m-d");
if ($bookingDate < $currentDate) {
    echo "Error: Please select a date in the future.";
    exit;
}

// Calculate the total price
$totalPrice = $numPeople * $basePricePerPerson;

// Prepare SQL statement using a prepared statement
$stmt = $conn->prepare("INSERT INTO TICKETPAGE (username, num_people, booking_date, total_price) VALUES (?, ?, ?, ?)");

// Bind parameters to the prepared statement
$stmt->bind_param("siss", $username, $numPeople, $bookingDate, $totalPrice);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Booking added successfully!";
} else {
    // Log or display a more user-friendly error message
    echo "Error: Unable to add booking.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Function to validate user existence
function isValidUser($conn, $username) {
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
?>