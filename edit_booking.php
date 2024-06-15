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
            <title>Edit Booking</title>
            <style> 
                body {
                    background: rgb(160, 119, 161);
                }

                table {
                    background: white;
                }

                .Update, .Delete {
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
            <h2 align="center"><mark>Edit Your Booked Records</mark></h2>
            <center>
                <table border="1" cellspacing="7" width="75%">
                    <tr>
                        <th width="5%">Booking ID</th>
                        <th width="10%">Username</th>
                        <th width="10%">Number of people</th>
                        <th width="10%">Booking Date</th>
                        <th width="20%">Booking Time</th>
                        <th width="10%">Total Price</th>
                        <th width="20%">Operations</th>
                    </tr>
                    <?php
                    while ($result = mysqli_fetch_assoc($data)) {
                        // Calculate total price based on number of people
                        $total_price = $result['num_people'] * 1000; // Assuming 1000 Rs per person
                        echo "<tr>
                                <td>" . $result['booking_id'] . "</td>
                                <td>" . $result['username'] . "</td>
                                <td>" . $result['num_people'] . "</td>
                                <td>" . $result['booking_date'] . "</td>
                                <td>" . $result['booking_time'] . "</td>
                                <td>" . $total_price . "</td> <!-- Display calculated total price -->
                                <td>
                                    <form action='update_designbook1.php' method='POST'>
                                        <input type='hidden' name='booking_id' value='" . $result['booking_id'] . "'>
                                        <input type='submit' value='Edit' class='Update'>
                                    </form>
                                    <form action='deletebooking.php' method='POST' onsubmit='return checkdelete();'>
                                        <input type='hidden' name='booking_id' value='" . $result['booking_id'] . "'>
                                        <input type='submit' value='Delete' class='Delete'>
                                    </form>
                                </td>
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
        </body>
        </html>
        <?php
    } else {
        echo "No records found for your account.";
    }
} else {
    echo "Please log in to view your booked records.";
}
?>
