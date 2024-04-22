<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fellowship_id = $_POST['fellowship_id'];
    $fellowship_name = $_POST['fellowship_name'];
    $organizing_institution = $_POST['organizing_institution'];
    $description = $_POST['description'];
    $bachelor = isset($_POST['bachelor']) ? 1 : 0;
    $master = isset($_POST['master']) ? 1 : 0;
    $phd = isset($_POST['phd']) ? 1 : 0;
    $application_deadline = $_POST['application_deadline'];
    $duration = $_POST['duration'];
    $benefits = $_POST['benefits'];
    $selection_criteria = $_POST['selection_criteria'];
    $application_process = $_POST['application_process'];
    $eligibility_criteria = $_POST['eligibility_criteria'];
    $note = $_POST['note'];
    $application_link = $_POST['application_link'];

    // Update the fellowship data in the database excluding photo
    $sql = "UPDATE fellowships SET 
            fellowship_name='$fellowship_name', 
            organizing_institution='$organizing_institution', 
            description='$description', 
            bachelor=$bachelor, 
            master=$master, 
            phd=$phd, 
            application_deadline='$application_deadline', 
            duration='$duration', 
            benefits='$benefits', 
            selection_criteria='$selection_criteria', 
            application_process='$application_process', 
            eligibility_criteria='$eligibility_criteria', 
            notes='$note', 
            application_link='$application_link' 
            WHERE fellowship_id=$fellowship_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect or display success message
        header("Location: ../pages/fellowship.php"); // Redirect to fellowship page or any desired location
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
