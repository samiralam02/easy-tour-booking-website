<?php
session_start();
include('includes/config.php'); // Adjust this to your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs
    $name = isset($_POST["customer-name"]) ? htmlspecialchars(trim($_POST["customer-name"])) : null;
    $phone = isset($_POST["phone"]) ? htmlspecialchars(trim($_POST["phone"])) : null;
    $bookingType = isset($_POST["book"]) ? htmlspecialchars($_POST["book"]) : null;
    $pickupDate = isset($_POST["pickup_date"]) ? htmlspecialchars($_POST["pickup_date"]) : null;
    $pickupTime = isset($_POST["pickup_time"]) ? htmlspecialchars($_POST["pickup_time"]) : null;
    $pickupLocation = isset($_POST["pickup_location"]) ? htmlspecialchars($_POST["pickup_location"]) : null;
    $serviceName = isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : null;
    $priceDay = isset($_POST["price_day"]) ? floatval($_POST["price_day"]) : null;
    $priceWeek = isset($_POST["price_week"]) ? floatval($_POST["price_week"]) : null;
    $priceMonth = isset($_POST["price_month"]) ? floatval($_POST["price_month"]) : null;

    // Validate required fields
    if (empty($name) || empty($phone) || empty($bookingType) || empty($pickupDate) || empty($pickupTime) || empty($pickupLocation)) {
        $_SESSION['booking_error'] = "Please fill in all required fields.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Additional validation for phone number format (example)
    if (!preg_match("/^\d{10}$/", $phone)) {
        $_SESSION['booking_error'] = "Invalid phone number format. Please enter a 10-digit number.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Prepare SQL statement for inserting data into database
    $sql = "INSERT INTO service_bookings (Name, Phone, Book_Type, Pickup_Date, Pickup_Time, Pickup_Location, Service_Name, Price_Day, Price_Week, Price_Month) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $con->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssssdd", $name, $phone, $bookingType, $pickupDate, $pickupTime, $pickupLocation, $serviceName, $priceDay, $priceWeek, $priceMonth);

        // Execute statement
        if ($stmt->execute()) {
            $_SESSION['booking_success'] = true;
        } else {
            $_SESSION['booking_error'] = "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $_SESSION['booking_error'] = "Error: " . $con->error;
    }

    // Close database connection
    $con->close();

    // Redirect back to the same page to display popup
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;

} else {
    // Check if a booking message should be displayed
    $bookingSuccess = isset($_SESSION['booking_success']) ? $_SESSION['booking_success'] : false;
    $bookingError = isset($_SESSION['booking_error']) ? $_SESSION['booking_error'] : '';
    // Clear session variables
    unset($_SESSION['booking_success']);
    unset($_SESSION['booking_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .popup h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <!-- Popup for Booking Success -->
    <div id="bookingSuccess" class="popup">
        <h3>Booking Successful</h3>
        <p>Thank you for your booking!</p>
        <button onclick="redirectTo('services.php')">OK</button>
    </div>

    <!-- Popup for Booking Error -->
    <div id="bookingError" class="popup">
        <h3>Booking Error</h3>
        <p id="errorMessage"></p>
        <button onclick="redirectTo('<?php echo $_SERVER['PHP_SELF']; ?>')">OK</button>
    </div>

    <script>
        // JavaScript code to handle popup display and interactions
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($bookingSuccess): ?>
                // Display success popup
                document.getElementById('bookingSuccess').style.display = 'block';
            <?php elseif ($bookingError): ?>
                // Display error popup
                document.getElementById('bookingError').style.display = 'block';
                document.getElementById('errorMessage').textContent = '<?php echo $bookingError; ?>';
            <?php endif; ?>
        });

        // Function to close the popup and redirect
        function redirectTo(url) {
            document.getElementById('bookingSuccess').style.display = 'none';
            document.getElementById('bookingError').style.display = 'none';
            window.location.href = url;
        }
    </script>
</body>
</html>
