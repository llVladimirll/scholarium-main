<?php
include('./connection.php');
session_start();

// Check if a user is logged in and get their ID (This should come from your authentication system)
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'like') {
        $scholarship_id = $_GET['id'];

        // Check if the user has already liked this scholarship
        $check_query = "SELECT * FROM likes WHERE user_id = ? AND scholarship_id = ?";
        $check_statement = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($check_statement, 'ii', $user_id, $scholarship_id);
        mysqli_stmt_execute($check_statement);
        mysqli_stmt_store_result($check_statement);

        if (mysqli_stmt_num_rows($check_statement) === 0) {
            // User hasn't liked this scholarship yet, proceed to add a like
            $insert_query = "INSERT INTO likes (user_id, scholarship_id) VALUES (?, ?)";
            $insert_statement = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($insert_statement, 'ii', $user_id, $scholarship_id);
            $insert_result = mysqli_stmt_execute($insert_statement);

            if ($insert_result) {
                // Update the likes count for the scholarship
                $update_query = "UPDATE scholarships SET likes = likes + 1 WHERE scholarship_id = ?";
                $update_statement = mysqli_prepare($conn, $update_query);
                mysqli_stmt_bind_param($update_statement, 'i', $scholarship_id);
                $update_result = mysqli_stmt_execute($update_statement);

                if ($update_result) {
                    // Liked successfully, you can redirect the user back to the scholarship page or handle as needed
                    header("Location: ../users_pages/clickPage.php?id=$scholarship_id");
                    exit();
                } else {
                    // Handle if the update fails
                    echo "like the scholarship.";
                }
            } else {
                // Handle if the insert fails
                echo "Failed to like the scholarship." . mysqli_error($conn);

            }
        } else {
            // User has already liked this scholarship
            $delete_query = "DELETE FROM likes WHERE user_id = ? AND scholarship_id = ?";
            $delete_statement = mysqli_prepare($conn, $delete_query);
            mysqli_stmt_bind_param($delete_statement, 'ii', $user_id, $scholarship_id);
            $delete_result = mysqli_stmt_execute($delete_statement);

            if ($delete_result) {
                // Update the likes count for the scholarship
                $update_query = "UPDATE scholarships SET likes = likes - 1 WHERE scholarship_id = ?";
                $update_statement = mysqli_prepare($conn, $update_query);
                mysqli_stmt_bind_param($update_statement, 'i', $scholarship_id);
                $update_result = mysqli_stmt_execute($update_statement);

                if ($update_result) {
                    // Liked successfully, you can redirect the user back to the scholarship page or handle as needed
                    header("Location: ../users_pages/clickPage.php?id=$scholarship_id");
                    exit();
                } else {
                    // Handle if the update fails
                    echo "like the scholarship.";
                }
            } else {
                // Handle if the delete fails
                echo "Failed to unlike the scholarship.";
            }
        }
    } else {
        // Handle invalid request or missing parameters
        echo "Invalid request.";
    }
} else {
    // Handle if the user is not logged in
    echo "Please log in to like scholarships.";
}