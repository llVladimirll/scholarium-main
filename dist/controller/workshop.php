<?php
include("connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workshopName = $_POST['workshopName'];
    $provider = $_POST['provider'];
    $desc = $_POST['description'];
    $dateTime = $_POST['dateTime'];
    $duration = $_POST['duration'];
    $location = $_POST['location'];
    $deadline = $_POST['regDeadline'];
    $targetAudience = $_POST['targetAudience'];
    $fees = $_POST['fees'];
    $instructors = $_POST['instructors'];
    $requirements = $_POST['requirements'];
    $notes = $_POST['notes'];
    $applicationLink = $_POST['applicationLink'];

    // Check if the photo was uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $imgData = file_get_contents($_FILES['photo']['tmp_name']);
        $imgType = $_FILES['photo']['type'];
    }

    $sql = "INSERT INTO workshops_and_courses 
            (workshop_course_name, provider_organization, description, date_and_time, duration, location_venue, registration_deadline, target_audience, cost_fees, instructors_facilitators, requirements, notes, application_link, photoName, photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssssss", $workshopName, $provider, $desc, $dateTime, $duration, $location, $deadline, $targetAudience, $fees, $instructors, $requirements, $notes, $applicationLink, $imgType, $imgData);

    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
