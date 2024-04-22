<?php
include('../controller/connection.php');

$competitionId = $_GET['id']; // Assuming you pass the ID through the query parameter

$sql = "SELECT competition_id, competition_name, organizer, description, deadline, eligibility_criteria, prize_details, application_process, judging_criteria, notes, likes, application_link FROM competitions_and_prizes WHERE competition_id = $competitionId";

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
