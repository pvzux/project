<?php
session_start();
include("connection.php");
error_reporting(0);

if(isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];

    $query = "SELECT * FROM TICKETPAGE WHERE username = '$username'";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

    if ($total != 0) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Display Booking</title>
            <link rel="stylesheet" href="styles55.css">
        </head>
        <body>
     <header>
        <h1>Ponyo Cablecar</h1>
        <img src="logoo.png" alt="Cable Car Logo" height="50" width="140">
    </header>
    <nav>
        <a href="homepage.php">Home</a>
        <a href="ticketpage.php">Book</a>
        <a href="viewtickets.php">View Tickets</a>
        <a href="logout.php"> Log Out</a>
        
    </nav>
            <h2 align="center">Displaying Your Booked Records</h2>
            <center>
                <table border="1" cellspacing="7" width="75%">
                    <tr>
                        <th width="5%">Booking ID</th>
                        <th width="10%">Username</th>
                        <th width="10%">Number of people</th>
                        <th width="10%">Booking Date</th>
                        <th width="10%">Total Price</th>
                    </tr>
                    <?php
                    while ($result = mysqli_fetch_assoc($data)) {
                        // Calculate total price based on number of people
                        $total_price = $result['num_people'] * 1000; // Assuming 1000 Rs per person
                        echo "<tr>
                                <td>" . $result['booking_id'] . "</td>
                                <td>" . $result['username'] . "</td> <!-- Display username as text -->
                                <td>" . $result['num_people'] . "</td>
                                <td>" . $result['booking_date'] . "</td>
                                <td>" . $total_price . "</td> <!-- Display calculated total price -->
                                
                            </tr>";
                    }
                    ?>
                </table>
            </center>
            <script>
                function checkdelete() {
                    return confirm('Are you sure you want to delete this record?');
                }
            </script>
        <?php
    } else {
        echo "No records found for your account.";
    }
} else {
    echo "Please log in to view your booked records.";
}
?>
</body>
</html>
