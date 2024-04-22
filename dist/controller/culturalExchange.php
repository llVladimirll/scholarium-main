<?php
include("connection.php");

$sql = "INSERT INTO cultural_exchange_residency_programs (program_name, organizing_institution_organization, description, application_deadline, eligibility_criteria, program_duration, location, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$programName = $_POST['programName'];
$organizer = $_POST['organizingInstitution'];
$desc = $_POST['description'];


$deadline = date('Y-m-d', strtotime($_POST['appDeadline']));

$eligibilty = $_POST['eligibilityCriteria'];
$duration = $_POST['programDuration'];
$location = $_POST['location'];
$notes = $_POST['notes'];
$applicationLink = $_POST['applicationLink']; 

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
    
}


$stmt->bind_param("ssssssssss", $programName, $organizer, $desc, $deadline, $eligibilty, $duration, $location, $applicationLink, $imgType, $imgData );

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>