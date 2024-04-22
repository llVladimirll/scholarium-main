<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $competition_id = $_POST['competition_id'];
    $competition_name = $_POST['competitionName'];
    $organizer = $_POST['organizer'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $eligibility_criteria = $_POST['eligibilityCriteria'];
    $prize_details = $_POST['prizeDetails'];
    $application_process = $_POST['applicationProcess'];
    $judging_criteria = $_POST['judgingCriteria'];
    $notes = $_POST['notes'];
    $application_link = $_POST['applicationLink'];


        // Update the competition data in the database excluding photo
        $sql = "UPDATE competitions_and_prizes SET 
                competition_name='$competition_name', 
                organizer='$organizer', 
                description='$description', 
                deadline='$deadline', 
                eligibility_criteria='$eligibility_criteria', 
                prize_details='$prize_details', 
                application_process='$application_process', 
                judging_criteria='$judging_criteria', 
                notes='$notes', 
                application_link='$application_link' 
                WHERE competition_id=$competition_id";
    

    if ($conn->query($sql) === TRUE) {
        // Redirect or display success message
        header("Location: ../pages/competition.php"); // Redirect to competition page or any desired location
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
