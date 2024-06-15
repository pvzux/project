<?php
session_start();

include("adminconnection.php");

if(isset($_POST['Login']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize user input
    $pwd = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize user input

    $query = "SELECT * FROM Admin WHERE username='$username' AND password='$pwd'"; // Adjust column names if needed
    
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

    if($total == 1)
    {
        $_SESSION['username'] = $username;
        header('location: adminpanel.php');
        exit;
    }
    else
    {
        echo "Login Failed";
    }
}
?>
<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="center">
        <h1> Admin Login</h1>
        <form action="#" method="POST" autocomplete="off">                
            
            <div class="form">
                <input type="text" name="username" class="textfield" placeholder="Username">
                <input type="password" name="password" class="textfield" placeholder="Password">

                <input type="submit" name="Login" value="Login" class="btn">
            </div>
        </form>
    </div>
</body>    
</html>
