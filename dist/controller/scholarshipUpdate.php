<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    $requiredFields = ['scholarship_id', 'scholarship_name', 'sponsoring_organization', 'country', 'type', 'description', 'application_deadline', 'majors', 'required_documents', 'benefits', 'notes', 'application_link'];

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            die("Error: Required field '$field' is missing or empty.");
        }
    }

    $stmt = $conn->prepare("UPDATE scholarships SET scholarship_name = ?, sponsoring_organization = ?, country = ?, type = ?, description = ?, degree_bachelor = ?, degree_master = ?, degree_phd = ?, application_deadline = ?, majors = ?, required_documents = ?, benefits = ?, notes = ?, application_link = ? WHERE scholarship_id = ?");

    $scholarship_id = $_POST['scholarship_id'];
    $scholarship_name = $_POST['scholarship_name'];
    $sponsoring_organization = $_POST['sponsoring_organization'];
    $country = $_POST['country'];
    $type   = $_POST['type'];
    $description = $_POST['description'];
    $bachelorChecked = isset($_POST['bachelor']) ? 1 : 0;
    $masterChecked = isset($_POST['master']) ? 1 : 0;
    $phdChecked = isset($_POST['phd']) ? 1 : 0;;

    $deadline = date('Y-m-d', strtotime($_POST['application_deadline']));

    $major = $_POST['majors'];
    $requiredDocs = $_POST['required_documents'];
    $benefit = $_POST['benefits'];
    $note = $_POST['notes'];
    $applicationLink = $_POST['application_link'];

    $stmt->bind_param("sssssiiissssssi", $scholarship_name, $sponsoring_organization, $country, $type, $description, $bachelorChecked, $masterChecked, $phdChecked, $deadline, $major, $requiredDocs, $benefit, $note, $applicationLink, $scholarship_id);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../pages/scholarship.php"); // Redirect to fellowship page or any desired location
        exit();

    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
