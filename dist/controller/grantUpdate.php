<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $grant_id = $_POST['grant_id'];
    $grant_name = $_POST['grantName'];
    $granting_organization = $_POST['grantingOrg'];
    $description = $_POST['description'];
    $application_deadline = $_POST['appDeadline'];
    $eligibility_criteria = $_POST['eligibilityCriteria'];
    $grant_amount = $_POST['grantAmount'];
    $note = $_POST['notes'];
    $application_link = $_POST['applicationLink'];

    // Update the grant data in the database
    $sql = "UPDATE financial_grants SET 
            grant_name='$grant_name', 
            granting_organization='$granting_organization', 
            description='$description', 
            application_deadline='$application_deadline', 
            eligibility_criteria='$eligibility_criteria', 
            grant_amount='$grant_amount', 
            note='$note', 
            application_link='$application_link' 
            WHERE grant_id=$grant_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect or display success message
        header("Location: ../pages/grant.php"); // Redirect to grant page or any desired location
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    // If the request method is not POST, handle the error or redirect as needed
    echo "Invalid request!";
}
?>
