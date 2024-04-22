<?php
// Start the session
session_start();

// Check if the logout link was clicked
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to a login page or elsewhere after logout
    header("Location: ../users_pages/index.php");
    exit;
}
?>