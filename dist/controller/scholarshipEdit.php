<?php
include("connection.php");

if (isset($_GET['id'])) {
    $scholarshipId = $_GET['id'];

    // Fetch scholarship details based on $scholarshipId from the database
    // Perform query to get scholarship details for editing

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated values from the form
        $updatedName = $_POST['scholarship_name'];
        $updatedOrganization = $_POST['sponsoring_organization'];
        $updatedCountry = $_POST['country'];
        $updatedType = $_POST['type'];
        $updatedDesc = $_POST['description'];
        $updatedBachelor = isset($_POST['bachelor']) ? 1 : 0;
        $updatedMaster = isset($_POST['master']) ? 1 : 0;
        $updatedPhD = isset($_POST['phd']) ? 1 : 0;
        $updatedDeadline = date('Y-m-d', strtotime($_POST['application_deadline']));
        $updatedMajors = $_POST['majors'];
        $updatedDocs = $_POST['required_documents'];
        $updatedBenefits = $_POST['benefits'];
        $updatedNotes = $_POST['note'];
        $updatedLikes = $_POST['likes'];
        $updatedLink = $_POST['application_link'];

        // Update the scholarship details in the database
        $sql = "UPDATE scholarships SET scholarship_name = ?, sponsoring_organization = ?, country = ?, type = ?, description = ?, degree_bachelor = ?, degree_master = ?, degree_phd = ?, application_deadline = ?, majors = ?, required_documents = ?, benefits = ?, notes = ?, likes = ?, application_link = ? WHERE scholarship_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssiisssssisi", $updatedName, $updatedOrganization, $updatedCountry, $updatedType, $updatedDesc, $updatedBachelor, $updatedMaster, $updatedPhD, $updatedDeadline, $updatedMajors, $updatedDocs, $updatedBenefits, $updatedNotes, $updatedLikes, $updatedLink, $scholarshipId);

        if ($stmt->execute()) {
            // Successful update
            echo '<script>window.opener.location.reload(); window.close();</script>';
        } else {
            // Handle update error
            echo "Error updating scholarship: " . $conn->error;
        }
    }

    if (isset($_GET['id'])) {
        $scholarshipId = $_GET['id'];
        echo '<form action="" method="POST">';
        echo 'Scholarship Name: <input type="text" name="scholarship_name" value="' . $fetchedScholarship['scholarship_name'] . '"><br>';
        echo 'Sponsoring Organization: <input type="text" name="sponsoring_organization" value="' . $fetchedScholarship['sponsoring_organization'] . '"><br>';
        echo 'Country: <input type="text" name="country" value="' . $fetchedScholarship['country'] . '"><br>';
        echo 'Type: <input type="text" name="type" value="' . $fetchedScholarship['type'] . '"><br>';
        echo 'Description: <textarea name="description">' . $fetchedScholarship['description'] . '</textarea><br>';
        echo 'Bachelor Degree: <input type="checkbox" name="bachelor" ' . ($fetchedScholarship['degree_bachelor'] ? 'checked' : '') . '><br>';
        echo 'Master Degree: <input type="checkbox" name="master" ' . ($fetchedScholarship['degree_master'] ? 'checked' : '') . '><br>';
        echo 'PhD Degree: <input type="checkbox" name="phd" ' . ($fetchedScholarship['degree_phd'] ? 'checked' : '') . '><br>';
        echo 'Application Deadline: <input type="date" name="application_deadline" value="' . $fetchedScholarship['application_deadline'] . '"><br>';
        echo 'Majors: <input type="text" name="majors" value="' . $fetchedScholarship['majors'] . '"><br>';
        echo 'Required Documents: <input type="text" name="required_documents" value="' . $fetchedScholarship['required_documents'] . '"><br>';
        echo 'Benefits: <input type="text" name="benefits" value="' . $fetchedScholarship['benefits'] . '"><br>';
        echo 'Notes: <input type="text" name="note" value="' . $fetchedScholarship['notes'] . '"><br>';
        echo 'Likes: <input type="number" name="likes" value="' . $fetchedScholarship['likes'] . '"><br>';
        echo 'Application Link: <input type="text" name="application_link" value="' . $fetchedScholarship['application_link'] . '"><br>';
        echo '<input type="submit" value="Update">';
        echo '</form>';
    }
}
