<?php include("adminconnection.php"); ?>

<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('mk3.png'); background-size: cover; ">

    <div class="container">
        <form method="POST">
            <div class="title">
                REGISTRATION FORM FOR ADMIN
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" name="username" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" required>
                </div>                      
            </div> 
            <br>
            <div class="input_field">
                <center><input type="submit" value="Register" class="btn" name="register"></center>
            </div>
        </form>
    </div>    
</body>
</html>        

<?php
if(isset($_POST['register']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the username already exists
    $check_query = "SELECT * FROM Admin WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username already exists! Please choose a different one.');</script>";
    } else {
        $query = "INSERT INTO Admin (username, password) VALUES ('$username', '$pwd')";
        $data = mysqli_query($conn, $query);

        if($data)
        {
            echo "<script>alert('Data Inserted Into Database'); 
            window.location='adminlogin.php';</script>";
            exit;
        }
        else 
        {
            echo "<script>alert('Failed to Insert Data');</script>"; 
        }
    }
}  
?>
