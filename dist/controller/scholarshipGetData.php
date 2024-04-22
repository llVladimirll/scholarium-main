<?php
include('connection.php');

if (isset($_GET['id'])) {
    $scholarshipId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT scholarship_name, sponsoring_organization, country, type, description, degree_bachelor, degree_master, degree_phd, application_deadline, majors, required_documents, benefits, notes, likes, application_link FROM scholarships WHERE scholarship_id = ?");
    $stmt->bind_param("i", $scholarshipId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return scholarship data as JSON
        echo json_encode($row);
    } else {
        echo json_encode(array()); // Return empty JSON if scholarship not found
    }
}

$conn->close();
