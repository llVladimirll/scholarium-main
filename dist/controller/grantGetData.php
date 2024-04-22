<?php
include('../controller/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $grantId = $_GET['id'];

    $sql = "SELECT grant_id, grant_name, granting_organization, description, application_deadline, eligibility_criteria, grant_amount, note, application_link FROM financial_grants WHERE grant_id = $grantId";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(array('message' => 'Grant not found'));
    }

    $conn->close();
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array('message' => 'Invalid request'));
}
?>
