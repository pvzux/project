<?php
session_start();
?>
<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="loginstyle.css">
        <title>Ponyo Login</title>
    </head>
    <body>
        <div class="center">
            <h1>Login</h1>
        <form action="#" method="POST"autocomplete="off" >                
            
            <div class="form">
                 <input type="text" name="username" class="textfield" placeholder="Username">
                 <input type="password" name="password" class="textfield" placeholder="Password">



                 <input type="submit" name="Login" value="Login" class="btn">

                 <div class="signup">New Member? <a href="form.php" class="link">Signup Here</a></div>
            </div>
        </div>
</form>

    </body>    
</html>

<?php
    include("connection.php");

    if(isset($_POST['Login']))
    {
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        $query = "SELECT * FROM form WHERE email='$username' && password='$pwd'";
         
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
        //echo $total;

        if($total == 1)
        {
            $_SESSION['user_name'] = $username;
            header('location:homepage.php');
            
        }
        else
        {
            echo "Login Failed";
        }
    }
?>