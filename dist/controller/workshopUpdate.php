<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $workshop_course_id = $_POST['workshop_course_id'];
    $workshop_course_name = $_POST['workshopName'];
    $provider_organization = $_POST['provider'];
    $description = $_POST['description'];
    $date_and_time = $_POST['dateTime'];
    $duration = $_POST['duration'];
    $location_venue = $_POST['location'];
    $registration_deadline = $_POST['regDeadline'];
    $target_audience = $_POST['targetAudience'];
    $cost_fees = $_POST['fees'];
    $instructors_facilitators = $_POST['instructors'];
    $requirements = $_POST['requirements'];
    $notes = $_POST['notes'];
    $application_link = $_POST['applicationLink'];

    // Update the workshop/course data in the database
    $sql = "UPDATE workshops_and_courses SET 
            workshop_course_name='$workshop_course_name', 
            provider_organization='$provider_organization', 
            description='$description', 
            date_and_time='$date_and_time', 
            duration='$duration', 
            location_venue='$location_venue', 
            registration_deadline='$registration_deadline', 
            target_audience='$target_audience', 
            cost_fees='$cost_fees', 
            instructors_facilitators='$instructors_facilitators', 
            requirements='$requirements', 
            notes='$notes', 
            application_link='$application_link' 
            WHERE workshop_course_id=$workshop_course_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect or display success message
        header("Location: ../pages/workshop.php"); // Redirect to workshop page or any desired location
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
