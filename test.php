<?php
session_start(); //start

echo $_SESSION["username"];
echo $_SESSION["class"]; //session display


session_unset(); 
?>