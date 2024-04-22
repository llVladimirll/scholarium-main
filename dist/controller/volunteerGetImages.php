<?php
include("connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image from the database based on the ID
    $sql = "SELECT photoName, photo FROM volunteer_opportunities WHERE opportunity_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Content-Type: " . $row['photoName']);
        echo $row['photo'];
    } else {
        echo 'Image not found';
    }
} else {
    echo 'Invalid request';
}

$statement->close();
$conn->close();
