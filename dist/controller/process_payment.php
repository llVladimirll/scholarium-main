<?php

include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userId = $_POST['userId'];
    $totalPayment = $_POST['total'];
    $timestamp = date('Y-m-d H:i:s'); // Current timestamp
    $stmt = $conn->prepare("INSERT INTO payments (user_id, total_payment, payment_date) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $userId, $totalPayment, $timestamp);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['payment_success'] = true; // Set a session variable to indicate payment success
    } else {
        session_start();
        $_SESSION['payment_success'] = false; // Set a session variable to indicate payment failure
        $_SESSION['payment_error'] = $conn->error; // Store the payment error message
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
    header('location: ../users_pages/payment.php');
    exit();
} else {
    // Handle if the form wasn't submitted properly
    echo "Form submission error";
}
?>