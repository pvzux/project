<?php
session_start();
include("connection.php");
error_reporting(0);

$username = $_SESSION['user_name'];
if (empty($username)) {
    header('location: login.php');
    exit; // Stop further execution
}

// Check if the user has already booked tickets
$query = "SELECT COUNT(*) as count FROM TICKETPAGE WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$numTicketsBooked = $row['count'];

if ($numTicketsBooked > 0) {
    echo "Sorry, you cannot book more tickets because you have already booked tickets.";
    exit; // Stop further execution
}

// Message to display after submitting the form
$confirmationMessage = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the number of people and booking details from the form
    $numPeople = $_POST['count'];
    $bookingDate = $_POST['booking_date'];

    // Calculate the total price (assuming price per person is 1000 NRS)
    $totalPrice = $numPeople * 1000;

    // Insert the booking details into the database
    $sql = "INSERT INTO TICKETPAGE (username, num_people, booking_date, total_price) VALUES ('$username', '$numPeople', '$bookingDate', '$totalPrice')";

    if (mysqli_query($conn, $sql)) {
        // Display message after successful insertion
        echo "<script>alert('Data Inserted Into Database')</script>";
        // Redirect to homepage after successful insertion
        echo '<meta http-equiv="refresh" content="0; url=http://localhost:7090/crud/homepage.php" />';
        exit; // Stop further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cable Car Ticketing</title>
    <link rel="stylesheet" href="ticket.css">
</head>
<body>
    <header>
        <h1>Ponyo Cablecar</h1>
        <img src="logoo.png" alt="Cable Car Logo" height="50" width="140">
    </header>
    <nav>
        <a href="homepage.php">Home</a>
        <a href="ticketpage.php">Book</a>
        <a href="viewtickets.php"> View Tickets</a>
        <a href="#section2">About Us</a>
        <a href="logout.php">Log Out</a>
    </nav>

    <main>
        <section class="ticket">
            <h1>Book your tickets</h1>
        </section>
        <section class="grid-container">
            <div class="box">
              <p>Approx duration: 10 minutes</p>
            </div>
            <div class="box">
              <p>Number of gondolas: 10 gondolas</p>
            </div>
            <div class="box">   
              <p>Passengers per gondola: 4 passengers</p>
            </div>
            <div class="box">
              <p>Distance: 2.2km (1.3 miles)</p>
            </div>
        </section>
        
        <br><br><br>
        <section class="containerss">
            <h1>Enter your ticket details</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <br><br>
    <b>Username</b><br><br> <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" readonly><br><br>
    <b>Number of people</b><br><br>
    <select name="count" id="person" required>
        <option>select number of people</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
    </select><br>
    <br>
    <b>Date of your visit</b><br><br>
    <input type="date" name="booking_date" id="booking_date" min="<?php echo date('Y-m-d'); ?>" required>

    <!-- Total Price Section -->
    <div class="total-price">
        <h2>Total Price</h2>
        <p id="totalprice">NRS 0.00</p>
    </div>

    <br><br><br>
    <input type="submit"  value="Submit"> 
    <input type="reset"  value="Reset">
    <br><br>
    <p><?php echo $confirmationMessage; ?></p> <!-- Display confirmation message -->
</form>

        </section>
    </main>
    <footer>
        &copy; 2024 Ponyo Cablecar
    </footer>

    <!-- JavaScript for calculating total price -->
    <script>
        // Function to calculate total price based on the number of people
        function calculateTotalPrice() {
            var numPeople = parseInt(document.getElementById('person').value);
            var totalPrice = numPeople * 1000; // yeta  price per person is 1000 huncha u can change yo 
            document.getElementById('totalprice').textContent = "NRS " + totalPrice.toFixed(2);
        }

        // Event listener for changes in the selected number of people
        document.getElementById('person').addEventListener('change', calculateTotalPrice);
    </script>
</body>
</html>

