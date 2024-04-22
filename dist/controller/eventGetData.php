<?php
include('../controller/connection.php');

$eventId = $_GET['id']; // Assuming you pass the ID through the query parameter

$sql = "SELECT event_id, event_name, organizing_institution_organization, description, date_and_time, location_venue, registration_deadline, registration_fees, application_link, likes FROM events_and_conferences WHERE event_id = $eventId";

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
