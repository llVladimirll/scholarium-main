<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $opportunity_id = $_POST['opportunity_id'];
    $opportunityName = $_POST['opportunityName'];
    $organizingOrg = $_POST['organizingOrg'];
    $description = $_POST['description'];
    $appDeadline = $_POST['appDeadline'];
    $eligibilityCriteria = $_POST['eligibilityCriteria'];
    $volunteerDuration = $_POST['volunteerDuration'];
    $location = $_POST['location'];
    $notes = $_POST['notes'];
    $applicationLink = $_POST['applicationLink'];

    // Update the volunteer data without handling the photo
    $sql = "UPDATE volunteer_opportunities SET 
            opportunity_name = '$opportunityName', 
            organizing_organization = '$organizingOrg', 
            description = '$description', 
            application_deadline = '$appDeadline', 
            eligibility_criteria = '$eligibilityCriteria', 
            volunteer_duration = '$volunteerDuration', 
            location = '$location', 
            notes = '$notes', 
            application_link = '$applicationLink' 
            WHERE opportunity_id = $opportunity_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or perform any other necessary action upon successful update
        header("Location: ../pages/volunteer.php");
        exit();
    } else {
        // Handle errors if the SQL query fails
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
