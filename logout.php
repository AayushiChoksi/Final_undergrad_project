<?php
include("./includes/logs.php");
// Initialize the session
session_start();

// Unset all of the session variables
$message = "User " . $_SESSION['email'] . " successfully logout ";
log_message($message, 'LOGOUT');
// Destroy the session.
$_SESSION = array();
session_destroy();
// Redirect to login page
header("location: index.php");
exit;