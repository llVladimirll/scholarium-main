<?php
include('../controller/connection.php');

$fellowshipId = $_GET['id']; // Assuming you pass the ID through the query parameter

$sql = "SELECT fellowship_id, fellowship_name, organizing_institution, description, bachelor, master, phd, application_deadline, eligibility_criteria, duration, benefits, application_process, selection_criteria, notes, likes, application_link FROM fellowships WHERE fellowship_id = $fellowshipId";

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
