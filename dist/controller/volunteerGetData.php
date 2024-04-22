<?php
include('connection.php');

if (isset($_GET['id'])) {
    $opportunityId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT opportunity_name, organizing_organization, description, application_deadline, eligibility_criteria, volunteer_duration, location, notes, application_link FROM volunteer_opportunities WHERE opportunity_id = ?");
    $stmt->bind_param("i", $opportunityId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return opportunity data as JSON
        echo json_encode($row);
    } else {
        echo json_encode(array()); // Return empty JSON if opportunity not found
    }
}

$conn->close();
?>
