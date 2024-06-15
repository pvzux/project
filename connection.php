<?php
error_reporting(0); 
$servername="localhost";//variable name $
$username= "root";
$password= "";
$dbname= "responsiveform";

$conn= mysqli_connect($servername, $username, $password, $dbname);//conection stablish

if($conn)
{
    //echo"Connection ok";
}
else
{
    echo"Connection failed".mysqli_connect_error();
}

