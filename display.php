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
    <title>Display Signup</title>
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
    <a href="admin_logout.php">Log Out</a>
</nav>

<?php
include("connection.php");

$query = "SELECT * FROM FORM"; // Select data from query
$data = mysqli_query($conn, $query); // Execute query

$total = mysqli_num_rows($data); // Get number of rows

if($total != 0) {
    ?>
    <h2 align="center">Displaying All Records</h2>
    <center>
        <table border="1" cellspacing="7" width="75%">
            <tr>
                <th width="5%">User ID</th>
                <th width="10%">First Name</th>
                <th width="10%">Last Name</th>
                <th width="10%">Phone</th>
                <th width="10%">Email</th>
                <th width="10%">Operations</th>
            </tr>
            <?php
            while($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                        <td>".$result['user_id']."</td>
                        <td>".$result['fname']."</td>
                        <td>".$result['lname']."</td>
                        <td>".$result['phone']."</td>
                        <td>".$result['email']."</td>
                        <td>
                            <a href='update_design.php?user_id=$result[user_id]'>
                                <input type='button' value='Update' class='Update'>
                            </a>
                            <a href='delete.php?user_id=$result[user_id]' onclick='return checkdelete()'>
                                <input type='button' value='Delete' class='Delete'>
                            </a>
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
        return confirm('Are you sure you want to delete this record?');
    }
</script>
</body>
</html>
