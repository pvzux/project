<?php

session_start(); //start

$_SESSION["admin_username"]="lol";//variable declare ani value store garyo
$_SESSION["class"]="BCA";

echo $_SESSION["username"]; //session display
echo$_SESSION["class"];

session_unset();


?> 
