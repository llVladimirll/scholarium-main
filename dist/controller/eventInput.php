<?php
include("connection.php");

$sql = "INSERT INTO events_and_conferences (event_name, organizing_institution_organization, description, date_and_time, location_venue, registration_deadline, registration_fees, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$eventName = $_POST['eventName'];
$organization = $_POST['organizingInstitution'];
$desc = $_POST['description'];


$dateTime = date('Y-m-d', strtotime($_POST['dateTime']));

$location = $_POST['location'];

$regDl = date('Y-m-d', strtotime($_POST['regDeadline']));
$regFees = $_POST['regFees'];

$applicationLink = $_POST['applicationLink'];

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
    
}


$stmt->bind_param("ssssssssss", $eventName, $organization, $desc, $dateTime, $location, $regDl, $regFees, $applicationLink,  $imgType, $imgData);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>