<?php
include("connection.php");

$sql = "INSERT INTO scholarships (scholarship_name, sponsoring_organization, country, type, description, degree_bachelor, degree_master, degree_phd, application_deadline, majors, required_documents, benefits, notes, likes, application_link, photoName, photo) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$scholarhipName = $_POST['scholarship_name'];
$scholarshipOrganization = $_POST['sponsoring_organization'];
$country = $_POST['country'];
$types = $_POST['type'];
$scholarhipDesc = $_POST['description'];

$bachelorChecked = isset($_POST['bachelor']) ? 1 : 0;
$masterChecked = isset($_POST['master']) ? 1 : 0;
$phdChecked = isset($_POST['phd']) ? 1 : 0;
;

$deadline = date('Y-m-d', strtotime($_POST['application_deadline']));

$major = $_POST['majors'];
$requiredDocs = $_POST['required_documents'];
$benefit = $_POST['benefits'];
$note = $_POST['note'];
$applicationLink = $_POST['application_link'];
$likes = 0;

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }
}


$stmt->bind_param("sssssiiisssssssss", $scholarhipName, $scholarshipOrganization, $country, $types, $scholarhipDesc, $bachelorChecked, $masterChecked, $phdChecked, $deadline, $major, $requiredDocs, $benefit, $note, $likes, $applicationLink, $imgType, $imgData);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();