<?php
include('./connection.php');

// Check if the new first name is set in the POST request
if (isset($_POST['newFirstName'])) {
    $newFirstName = $_POST['newFirstName'];
    $userId = $_GET['id'];

    // Sanitize the input to prevent SQL injection
    $newFirstName = $_POST['newFirstName'];

    // Perform the database update

    $query = "UPDATE users SET first_name = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $newFirstName, $userId);

    if ($stmt->execute()) {
        // Update successful
        header('location: ../users_pages/profile.php');
    } else {
        // Update failed
        echo "Error updating first name: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle if the new first name is not set in the POST request
    echo "New first name not provided.";
}


?>