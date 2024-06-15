<?php
include("connection.php");

$user_id=  $_GET['user_id'];//updatr ko id 

$query= "DELETE FROM FORM WHERE user_id= '$user_id' ";//jasko mathi click garyo tesko id  
$data= mysqli_query($conn, $query);//conn= connection, query mathi ko

if($data)
{
    echo "<script>alert('Record Deleted ')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url =http://localhost:7090/crud/display.php " />
    <?php
}
else//print
{
    echo "<script>alert('Failed to Delete')</script>";
}
?>
