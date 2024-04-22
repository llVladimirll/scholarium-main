<?php
include('connection.php');

$sql = "SELECT photoName, photo FROM scholarships WHERE scholarship_id=24";
$statement = $conn->prepare($sql);
$statement->bind_param("i", $_GET['image_id']);
$statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
$result = $statement->get_result();

$row = $result->fetch_assoc();
header("Content-type: " . $row["photoName"]);
echo $row["photo"];
