<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the field name and new value from the form
    $fieldName = $_POST['field'];
    $newValue = $_POST['value'];

    // Perform validation if needed

    // Example: Update user information in a database
    $userId = 1; // Replace with the actual user ID from your system

    // Connect to your database (MySQL example)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update user information in the database
    $sql = "UPDATE users SET $fieldName = '$newValue' WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo json_encode(["success" => true]);
    } else {
        // Update failed
        echo json_encode(["success" => false, "error" => "Error updating record: " . $conn->error]);
    }

    $conn->close();
}
?>