<?php
include_once('../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['enquiry_name'];
    $email = $_POST['enquiry_email'];
    $message = $_POST['enquiry_message'];

    $sql = "INSERT INTO enquiries_details (name, email, message) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: (" . $con->errno . ") " . $con->error);
        echo "error";
        exit;
    }
    $stmt->bind_param("sss", $name, $email, $message);
    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        echo "error";
        exit;
    }

    echo "success";
    $stmt->close();
}

$con->close();
?>
