<?php
include('../controller/connection.php');

$workshopId = $_GET['id']; // Assuming you pass the ID through the query parameter

$sql = "SELECT workshop_course_id, workshop_course_name, provider_organization, description, date_and_time, duration, location_venue, registration_deadline, target_audience, cost_fees, instructors_facilitators, requirements, notes, likes, application_link FROM workshops_and_courses WHERE workshop_course_id = $workshopId";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Convert data to JSON format
    echo json_encode($row);
} else {
    echo json_encode(["error" => "No data found"]);
}

$conn->close();
?>
