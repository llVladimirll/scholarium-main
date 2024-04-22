<?php
// Include your database connection file
include ('connection.php');


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!empty($email) && !empty($password)) {

        $sql = "SELECT * FROM users WHERE email = ?";


        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("s", $email);

            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                // Fetch the user row
                $user = $result->fetch_assoc();

                echo "Hashed Password from DB: " . $user['password_hash'] . "<br>";
                echo "Hashed Entered Password: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";
                // Verify password
                if (password_verify($password, $user['password_hash'])) {
                    // Password is correct, log in the user
                    // Start a session or perform necessary actions
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user['user_id'];

                    $_SESSION['email'] = $user['email'];


                    header("Location: ../users_pages/index.php");
                    exit();
                } else {

                    echo "Invalid password";
                }
            } else {

                echo "No user found with that email";
            }

            // Close statement
            $stmt->close();
        }
    } else {
        // Handle empty fields
        echo "Email and password are required";
    }

    echo "User ID in session: " . $_SESSION['user_id'];

    // Close connection
    $conn->close();
}
?>