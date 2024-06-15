<?php
include("connection.php");
$username = $_GET['username'];

$query = "SELECT * FROM TICKETPAGE WHERE username ='$username'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD operation</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var bookingDate = document.forms["updateForm"]["booking_date"].value;
            var currentDate = new Date().toISOString().split('T')[0];
            if (bookingDate < currentDate) {
                alert("Booking date cannot be in the past");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="container">
    <form name="updateForm" action="#" method="POST" onsubmit="return validateForm()">
        <div class="title">
            UPDATE DETAILS
        </div>
        <center>
            <!-- Display username and use hidden input field to pass it along with form submission -->
            <b>Username: <?php echo $result['username']; ?></b><br><br>
            <input type="hidden" name="username" value="<?php echo $result['username']; ?>">
            <b>Number of people</b><br><br>
            <select name="num_people" id="person" required>
                <option>select number of people</option>
                <?php
                for ($i = 1; $i <= 40; $i++) {
                    echo "<option value='$i'";
                    if ($result['num_people'] == $i) echo " selected";
                    echo ">$i</option>";
                }
                ?>
            </select><br>
            <br>
            <b>Date of your visit</b><br><br>
            <input type="date" name="booking_date" value="<?php echo $result['booking_date']; ?>">
        </center>
        <input type="submit" name="update" value="Update">
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $username = $_POST['username']; // Fetch username from the hidden input field
    $num_people = $_POST['num_people'];
    $booking_date = $_POST['booking_date'];

    // Separate date and time from datetime-local input
    $booking_date = date('Y-m-d', strtotime($booking_date));
    // upadte garnee
    $query = "UPDATE TICKETPAGE SET num_people='$num_people', booking_date='$booking_date' WHERE username='$username'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost:7090/crud/displaybooking.php' />";
        exit; // Stop execution after redirect
    } else {
        echo "Failed to Update: " . mysqli_error($conn);
    }
}
?>
