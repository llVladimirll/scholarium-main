<?php
include("connection.php");

$sql = "INSERT INTO admins (admin_name, admin_password) VALUES (?, ?)";


$stmt = $conn->prepare($sql);

$adminName = $_POST['username'];
$adminPassword = $_POST['password'];
$hashedPassword = password_hash($adminPassword, PASSWORD_BCRYPT);



if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}



$stmt->bind_param("ss", $adminName, $hashedPassword);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
