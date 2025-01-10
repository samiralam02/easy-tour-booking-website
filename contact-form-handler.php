<?php
include('includes/config.php'); // Adjust this to your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = isset($_POST["firstName"]) ? htmlspecialchars(trim($_POST["firstName"])) : null;
    $lastName = isset($_POST["lastName"]) ? htmlspecialchars(trim($_POST["lastName"])) : null;
    $email = isset($_POST["email"]) ? htmlspecialchars(trim($_POST["email"])) : null;
    $phone = isset($_POST["phone"]) ? htmlspecialchars(trim($_POST["phone"])) : null;
    $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"])) : null;

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
        exit;
    }

    // Prepare SQL statement for inserting data into the database
    $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $con->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $message);

        // Execute statement
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Thank you for your Feedback!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }

        // Close statement
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $con->error]);
    }

    // Close database connection
    $con->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
