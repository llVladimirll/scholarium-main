<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $event_id = $_POST['event_id'];
    $event_name = $_POST['eventName'];
    $organizing_institution_organization = $_POST['organizingInstitution'];
    $description = $_POST['description'];
    $date_and_time = $_POST['dateTime'];
    $location_venue = $_POST['location'];
    $registration_deadline = $_POST['regDeadline'];
    $registration_fees = $_POST['regFees'];
    $application_link = $_POST['applicationLink'];

    // Update the event/conference data in the database
    $sql = "UPDATE events_and_conferences SET 
            event_name='$event_name', 
            organizing_institution_organization='$organizing_institution_organization', 
            description='$description', 
            date_and_time='$date_and_time', 
            location_venue='$location_venue', 
            registration_deadline='$registration_deadline', 
            registration_fees='$registration_fees', 
            application_link='$application_link' 
            WHERE event_id=$event_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect or display success message
        header("Location: ../pages/events.php"); // Redirect to events page or any desired location
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
