<?php

session_start();

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['admin_name'])) {
    header("Location: index.php");
    exit();
}

// Display a welcome message
echo "Welcome, " . $_SESSION['admin_name'] . "!";
