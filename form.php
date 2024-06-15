
<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <title> Form </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="background-image: url('mk3.png'); background-size: cover; background-position: center;">

        <div class="container">
            <form action="#" method="POST">
            <div class="title">
                Sign Up
            </div>

            <div class="form">
                <div class="input_field">
                    <label> First Name</label>
                    <input type="text" class="input" name="fname" required>
                     </div>
                <div class="input_field">
                    <label> Last Name</label>
                    <input type="text" class="input" name="lname" required>
                      </div> 
                <div class="input_field ">
                    <label> Phone Number</label>
                    <input type="number" class="input" name="phone" required>
                      </div>    
                <div class="input_field">
                    <label> Email Address</label>
                    <input type="text" class="input" name="email" required>
                      </div>
                <div class="input_field ">
                    <label> Password</label>
                    <input type="password" class="input" name="password" required>
                      </div>                      
                <div class=" input_field terms" >
                    <lable class="check">
                        <input type="checkbox" required> 
                        <span class="checkmark"></span>
                    </lable>
                    <p> Agree to terms and conditions</p>
                </div>
                <div class="input_field ">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>
        </form>
        </div>    
    </body>
</html>        

<?php 
session_start(); // Start the session

include("connection.php");

function validateEmail($email) {
    // Validate email using PHP filter_var function; validate email
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhone($phone) {
    // Ensure phone number is numeric 10 dig ko
    return preg_match('/^\d{10}$/', $phone);
}

function validateName($name) {
    // Ensure name contains only alphabets
    return preg_match('/^[a-zA-Z]+$/', $name);
}

if(isset($_POST['register'])) { //store, register
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd   = $_POST['password'];

    // Perform validations
    if(!validateEmail($email)) {
        echo "<script>alert('Invalid email address')</script>";
    } elseif(!validatePhone($phone)) {
        echo "<script>alert('Phone number must be 10 digits long')</script>";
    } elseif(!validateName($fname) || !validateName($lname)) {
        echo "<script>alert('First and last name must contain only alphabets')</script>";
    } elseif(strlen($pwd) < 6) { // checks if the length of the password is less than 6 characters. 
        echo "<script>alert('Password must be at least 6 characters long')</script>";
    } else {
        // Check if email already exists in database
        $query_check_email = "SELECT * FROM FORM WHERE email = '$email'";
        $result_check_email = mysqli_query($conn, $query_check_email);
        
        if(mysqli_num_rows($result_check_email) > 0) {
            echo "<script>alert('This email address is already registered')</script>";
        } else {
            // All validations passed and email is not a duplicate, proceed with database insertion
            $query = "INSERT INTO FORM (fname, lname, phone, email, password) VALUES ('$fname', '$lname', '$phone', '$email', '$pwd')";
            $data = mysqli_query($conn, $query);

            if($data) {
                echo "<script>alert('Data Inserted Into Database');
                window.location='login.php';</script>";
// Redirect to homepage after successful registration
?>

                
                <?php
            } else {
                echo "<script>alert('Failed')</script>";
            }
        }
    }
}
?>
