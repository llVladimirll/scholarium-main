<?php
include ("connection.php");

$sql = "INSERT INTO fellowships (
    fellowship_name, 
    organizing_institution, 
    description, 
    bachelor, 
    master, 
    phd, 
    application_deadline, 
    eligibility_criteria, 
    duration, 
    benefits, 
    application_process, 
    selection_criteria, 
    notes, 
    application_link, 
    photoName, 
    photo
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$fellowhsipName = $_POST['fellowship_name'];
$organizer = $_POST['organizing_institution'];
$desc = $_POST['description'];

$bachelorChecked = isset($_POST['bachelor']) ? 1 : 0;
$masterChecked = isset($_POST['master']) ? 1 : 0;
$phdChecked = isset($_POST['phd']) ? 1 : 0;

$deadline = date('Y-m-d', strtotime($_POST['application_deadline']));
$eligibilityCriteria = $_POST['eligibility_criteria'];

$duration = $_POST['duration'];
$benefit = $_POST['benefits'];

$applicationProcces = $_POST['application_process'];
$selectionCriteria = $_POST['selection_criteria'];
$notes = isset($_POST['note']) ? $_POST['note'] : '';

$applicationLink = $_POST['application_link'];




if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
}
$stmt->bind_param("ssssssssssssssss", $fellowhsipName, $organizer, $desc, $bachelorChecked, $masterChecked, $phdChecked, $deadline, $eligibilityCriteria, $duration, $benefit, $applicationProcces, $selectionCriteria, $notes, $applicationLink, $imgType, $imgData);


echo $_POST['eligibility_criteria'];
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$stmt->close();
$conn->close();
?>