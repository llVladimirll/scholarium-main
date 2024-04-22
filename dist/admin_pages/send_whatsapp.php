<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include('../controller/connection.php');

    // WhatsApp API function to send a message to a single recipient
    function sendWhatsAppMessage($phoneNumber, $message, $file) {
        // Code to send a WhatsApp message with file attachment to $phoneNumber
        // Use your WhatsApp API or library to send the message here
        // Make sure to handle file attachments as per the WhatsApp API guidelines
        // $phoneNumber is the recipient's phone number
        // $message is the text message
        // $file is the uploaded file
    }

    // Get the message from the form textarea
    $message = $_POST['message'];

    // Get the file details
    $file = $_FILES['file'];

    // Query to retrieve phone numbers from the database
    $sql = "SELECT phone_number FROM users";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Loop through the database results and send WhatsApp messages
        while ($row = $result->fetch_assoc()) {
            $phoneNumber = $row['phone_number'];
            sendWhatsAppMessage($phoneNumber, $message, $file);
        }
    }

    // Close database connection
    $conn->close();
}
?>