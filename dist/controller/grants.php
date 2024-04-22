<?php
include("connection.php");

$sql = "INSERT INTO financial_grants (grant_name, granting_organization, description, application_deadline, eligibility_criteria, grant_amount, note, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}






$grantName = $_POST['grantName'];
$organizer = $_POST['grantingOrg'];
$desc = $_POST['description'];
$deadline = date('Y-m-d', strtotime($_POST['appDeadline']));

$criteria = $_POST['eligibilityCriteria'];
$amount = $_POST['grantAmount'];
$notes = $_POST['notes'];
$applicationLink = $_POST['applicationLink']; 

if (count($_FILES) > 0){
    if(is_uploaded_file($_FILES['photo']['tmp_name'])){
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
    
}


$stmt->bind_param("ssssssssss", $grantName, $organizer, $desc, $deadline, $criteria, $amount, $notes, $applicationLink, $imgType, $imgData);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();

?>