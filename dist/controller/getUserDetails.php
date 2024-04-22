<?php
// Include your database connection code or require necessary files
include('../controller/connection.php');

// Check if the user ID is provided in the request
if (isset($_GET['userId'])) {
    // Sanitize and retrieve the user ID
    $userId = $_GET['userId'];
    
    // Prepare and execute a query to fetch user details based on the provided user ID
    $sql = "SELECT * FROM users WHERE user_id = $userId"; // Example query, adjust as per your database schema
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch user details
        $userDetails = $result->fetch_assoc();

        // Start generating HTML content representing the user details with inline styles
        echo '<div style="width: 400px; max-width: 90%; padding: 20px; background-color: #fff;';
        echo 'border: 2px solid #ccc; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);';
        echo 'position: relative; margin: 50px auto;">';

        echo '<h2 style="font-size: 1.5em; margin-bottom: 15px;">User Details</h2>';
        
        // Output user details with inline styles
        echo '<p><strong>User ID:</strong> ' . $userDetails['user_id'] . '</p>';
        echo '<p><strong>First Name:</strong> ' . $userDetails['first_name'] . '</p>';
        echo '<p><strong>Last Name:</strong> ' . $userDetails['last_name'] . '</p>';
        echo '<p><strong>Email:</strong> ' . $userDetails['email'] . '</p>';
        echo '<p><strong>Phone Number:</strong> ' . $userDetails['phone_number'] . '</p>';
        echo '<p><strong>Degree:</strong> ' . $userDetails['degree'] . '</p>';
        echo '<p><strong>Country:</strong> ' . $userDetails['country'] . '</p>';
        // Add more user details as needed
        
        // Close the generated HTML content for the pop-up window
        echo '</div>';
    } else {
        // Handle case when no user details are found
        echo 'User details not found.';
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle case when no user ID is provided in the request
    echo 'No user ID provided.';
}
?>
