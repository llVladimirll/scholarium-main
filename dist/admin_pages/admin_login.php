<?php
error_reporting(E_ALL); // Enable error reporting
echo $login_query;

session_start();
//sss
include('../controller/connection.php');
// I am here
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $login_query = "SELECT * FROM admins WHERE admin_name = '$username'";
    $result = mysqli_query($conn, $login_query);
    if (!$result) {
        // die("Query failed: " . mysqli_error($conn));
    }

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            var_dump($row);
            if (password_verify($password, $row['admin_password'])) {
                $_SESSION["admin_name"] = $username;
                $_SESSION["status"] = "login";
                header("Location: ./index.php");
                exit; // Ensure no further code is executed after redirection
            } else {
                echo "Login failed";
            }
        } else {
            echo "User not found";
        }
    } else {
        // Provide specific error information
        echo "Query failed: " . mysqli_error($conn);
    }
} else {
    echo "Username or password not set.";
}

// Close the database connection after usage
mysqli_close($connection);
