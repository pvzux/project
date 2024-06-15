<?php

session_start(); //start

$_SESSION["username"]="Ponyo";//variable declare ani value store garyo
$_SESSION["class"]="BCA";

echo $_SESSION["username"]; //session display
echo $_SESSION["class"]; //session display


session_unset();



?> 
