<?php
include("connection.php");

$sql = "INSERT INTO vocational_technical_training (training_program_name, training_provider_organization, description, duration, location, application_deadline, eligibility_criteria, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$programName = $_POST['programName'];
$provider = $_POST['provider'];
$desc = $_POST['description'];

$duration = $_POST['duration'];
$location = $_POST['location'];
$deadline = date('Y-m-d', strtotime($_POST['appDeadline']));

$eligibiltyCriteria = $_POST['eligibilityCriteria'];
$applicationLink = $_POST['applicationLink']; 

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
    
}


$stmt->bind_param("ssssssssss",$programName, $provider, $desc, $duration, $location, $deadline, $eligibiltyCriteria, $applicationLink, $imgType, $imgData );

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>