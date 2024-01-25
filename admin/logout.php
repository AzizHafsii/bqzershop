<!-- admin/logout.php -->
<?php
// Start a session to manage user sessions (you may customize this based on your needs)
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>
