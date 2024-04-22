<?php
include('connection.php');

$sql = "INSERT INTO users (first_name, last_name, email, phone_number, password_hash, degree, country) values (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$phoneNumber = $_POST['phoneNumber'];
$degree = $_POST['degree'];
$country = $_POST['country'];

$stmt->bind_param("sssisss", $firstName, $lastName, $email, $phoneNumber, $hashedPassword, $degree, $country);

if ($stmt->execute()) {
    header("Location: ../users_pages/login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();


?>