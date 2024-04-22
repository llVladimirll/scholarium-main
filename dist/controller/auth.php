<?php
include 'controller/connection.php';

// mengaktifkan session
session_start();


if ($_SESSION['status'] != "login") {
    header("location:admin_login.html");
}
