<?php
include("connection.php");

$sql = "INSERT INTO volunteer_opportunities (opportunity_name, organizing_organization, description, application_deadline, eligibility_criteria, volunteer_duration, location, notes, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$opportunityName = $_POST['opportunityName'];
$organizer = $_POST['organizingOrg'];
$desc = $_POST['description'];

$deadline = date('Y-m-d', strtotime($_POST['appDeadline']));
$criteria = $_POST['eligibilityCriteria'];
$duration = $_POST['volunteerDuration'];
$location = $_POST['location'];


$notes = $_POST['notes'];
$applicationLink = $_POST['applicationLink']; 

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
    
}


$stmt->bind_param("sssssssssss", $opportunityName, $organizer, $desc, $deadline, $criteria, $duration, $location, $notes, $applicationLink, $imgType, $imgData);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>