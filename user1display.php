<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include connection file
include("connection.php");

// Retrieve logged-in user's username from session
$loggedInUsername = $_SESSION['username'];

// Error reporting set to show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch records for the logged-in user
$query = "SELECT * FROM FORM WHERE username = '$loggedInUsername'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Signup</title>
    <style>
        body {
            background: rgb(160, 119, 161);
        }
        table {
            background: white;
        }
        .Update,
        .Delete {
            background: lightgreen;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }
        .Delete {
            background: darkred;
        }
    </style>
</head>
<body>
    <h2 align="center"><mark>Displaying Your Records</mark></h2>
    <center>
        <table border="1" cellspacing="7" width="75%">
            <tr>
                <th width="5%">Username</th>
                <th width="10%">First Name</th>
                <th width="10%">Last Name</th>
                <th width="10%">Phone</th>
                <th width="20%">Email</th>
                <th width="20%">Operations</th>
            </tr>
            <?php
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                            <td>".$result['username']."</td>
                            <td>".$result['fname']."</td>
                            <td>".$result['lname']."</td>
                            <td>".$result['phone']."</td>
                            <td>".$result['email']."</td>
                            <td>
                                <a href='update_design.php?username=".$result['username']."'>
                                    <input type='submit' value='Update' class='Update'>
                                </a>
                                <a href='delete.php?username=".$result['username']."' onclick='return checkdelete()'>
                                    <input type='submit' value='Delete' class='Delete'>
                                </a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </table>
    </center>
    <script>
        function checkdelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>
