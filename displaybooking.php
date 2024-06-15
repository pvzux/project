<?php
session_start();

// Redirect to login page if user is not logged in
include("adminconnection.php");

$username = $_SESSION['username'];
if(empty($username)) {
    header('location: adminlogin.php');
    exit; // Stop further execution
}
?>
<html>
<head>
    <title>Display Booking</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header>
        <h1>Admin Panel</h1>
        <img src="logoo.png" alt="Cable Car Logo" height="50" width="140">
    </header>
    <nav>
    <a href="adminpanel.php">Home Page</a>
    <a href="display.php">Customer Details</a>
        <a href="displaybooking.php">Booking Details</a>
        <a href="admin_logout.php"> LogOut</a>
        
    </form>
    </nav>
<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM TICKETPAGE"; // Select data from query
$data = mysqli_query($conn, $query); // Knows if query is working

$total = mysqli_num_rows($data); // Let know no of rows

if ($total != 0) {
    ?>
    <h2 align="center">Displaying All Records</h2>
    <center>
        <table border="1" cellspacing="7" width="75%">
            <tr>
                <th width="5%">Booking ID</th>
                <th width="10%">Username</th>
                <th width="10%">Number of people</th>
                <th width="10%">Booking Date</th>
                <th width="10%">Total Price</th>
                <th width="10%">Operations</th>
            </tr>
            <?php
            while ($result = mysqli_fetch_assoc($data)) // data lai array ko format ma lyucha )//jaba samma $a is less th or = q0 taba samma hello print garne 
            {
                // Calculate total price based on number of people
                $total_price = $result['num_people'] * 1000; // Assuming 1000 Rs per person
                echo "<tr>
                        <td>" . $result['booking_id'] . "</td>
                        <td>" . $result['username'] . "</td>
                        <td>" . $result['num_people'] . "</td>
                        <td>" . $result['booking_date'] . "</td>
                        <td>" . $total_price . "</td> <!-- Display calculated total price -->
                        <td>
                            <a href='update_designbook.php?username=$result[username]'><input type='submit' value='Update' class='Update'></a>
                            <a href='deletebooking.php?username=$result[username]'><input type='submit' value='Delete' class='Delete' onclick ='return checkdelete()'></a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </center>
    <?php
} else {
    echo "No records found";
}
?>
<script>
    function checkdelete() {
        return confirm('Are you sure you want to delete this record ?');
    }
</script>
