
<?php include("connection.php");

$user_id=  $_GET['user_id'];

$query="SELECT * FROM FORM where user_id ='$user_id'"; //id leu ani execute
$data= mysqli_query($conn, $query); //knows if querry is working
$result= mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <title> CRUD operation</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <form action="#" method="POST">
            <div class="title">
                UPDATE DETAILS 
            </div>

            <div class="form">
                <div class="input_field">
                    <label> First Name</label>
                    <input type="text" value="<?php echo $result['fname'];?>" class="input" name="fname" required>
                     </div>
                <div class="input_field">
                    <label> Last Name</label>
                    <input type="text" value="<?php echo $result['lname'];?>" class="input" name="lname" required>
                      </div> 
                <div class="input_field ">
                    <label> Phone Number</label>
                    <input type="number" value="<?php echo $result['phone'];?>" class="input" name="phone" required>
                      </div>    
                <div class="input_field">
                    <label> Email Address</label>
                    <input type="text" value="<?php echo $result['email'];?>" class="input" name="email" required>
                      </div>
                <div class="input_field ">
                    <label> Password</label>
                    <input type="password" value="<?php echo $result['password'];?>" class="input" name="password" required>
                      </div>                      
                <div class=" input_field terms" >
                    <lable class="check">
                        <input type="checkbox"> 
                        <span class="checkmark"></span>
                    </lable>
                    <p> Agree to terms and conditions</p>
                </div>
                <div class="input_field ">
                    <input type="submit" value="Update" class="btn" name="update" required>
                </div>
            </div>
        </form>
        </div>    
    </body>
</html>        

<?php
    if($_POST['update'])
    {
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $phone =$_POST['phone'];
        $email =$_POST['email'];
        $pwd   =$_POST['password'];

        $query= "UPDATE FORM set fname='$fname',lname='$lname',phone='$phone',email='$email',password='$pwd' WHERE user_id='$user_id'";
        $data = mysqli_query($conn, $query);
if($data) {
    echo "<script>alert('Record Updated')</script>";
    echo "<meta http-equiv='refresh' content='0; url=http://localhost:7090/crud/display.php' />";
    exit; // Stop execution after redirect
} else {
    echo "Failed to Update: " . mysqli_error($conn);
}

        $data= mysqli_query($conn, $query);
        if($data)
        {
            echo "<script>alert('Record Updated ')</script>";
            ?>
            
            <meta http-equiv="refresh" content="0; url =http://localhost:7090/crud/display.php " />
            <?php
        }
        else 
        {
            echo "Failed to Update"; 
        }
    }  
   
     
?>    
