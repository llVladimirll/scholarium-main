<?php
include("connection.php");

$sql = "INSERT INTO competitions_and_prizes (competition_name, organizer, description, deadline, eligibility_criteria, prize_details, application_process, judging_criteria, notes, application_link, photoName, photo ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$competitionName = $_POST['competitionName'];
$organizer = $_POST['organizer'];
$desc = $_POST['description'];
$deadline = date('Y-m-d', strtotime($_POST['deadline']));
$eligibility = $_POST['eligibilityCriteria']; // Corrected variable name
$prizeDetail = $_POST['prizeDetails'];
$applicationProcess = $_POST['applicationProcess']; // Corrected variable name
$judgingCriteria = $_POST['judgingCriteria'];
$notes = $_POST['notes'];
$applicationLink = $_POST['applicationLink'];

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
}

// Update the bind_param function with corrected variable names
$stmt->bind_param("ssssssssssss", $competitionName, $organizer, $desc, $deadline, $eligibility, $prizeDetail, $applicationProcess, $judgingCriteria, $notes, $applicationLink, $imgType, $imgData);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>