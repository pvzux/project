

<?php
session_start(); // Start or resume the session

// Clear all session variables
session_unset();

// Destroy the session data on the server
session_destroy();



// Redirect to the login page or a page informing the user they have logged out
header('Location: login.php');
exit();
?>
