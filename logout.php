<?php
ob_start();
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.html");
exit();
ob_end_flush();
?>
