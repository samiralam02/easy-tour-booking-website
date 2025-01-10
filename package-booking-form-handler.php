<?php
// Include the database connection file
include './includes/config.php';

// Check if the form is submitted
if (isset($_POST['book_now'])) {
    // Validate and sanitize inputs
    $package_id = intval($_POST['package_id']) ?? 0;
    $package_name = mysqli_real_escape_string($con, $_POST['package-name']);
    $deals = mysqli_real_escape_string($con, $_POST['deals']);
    $price = floatval($_POST['price']);
    $days = intval($_POST['days']);
    $nights = intval($_POST['nights']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $children = intval($_POST['children']) ?? 0;
    $adults = intval($_POST['adults']) ?? 1;

    // Insert booking details into the database
    $sql = "INSERT INTO bookings (package_id, package_name, deals, price, days, nights, name, email, phone, children, adults, booking_date) 
            VALUES ('$package_id', '$package_name', '$deals', '$price', '$days', '$nights', '$name', '$email', '$phone', '$children', '$adults', CURRENT_TIMESTAMP)";

    if (mysqli_query($con, $sql)) {
        echo "<div id='popup' class='popup'>
                <div class='popup-content'>
                    <h2>Booking Successful</h2>
                    <p>Thank you for your booking!</p>
                    <button class='close-btn' onclick='redirect()'>OK</button>
               </div>
            </div>
            <script>
                document.getElementById('popup').style.display = 'flex';
                function redirect() {
                    window.location.href = 'packages.php';
                }
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Form submission failed. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .popup {
            display: none;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .close-btn {
            background-color: rgb(29, 172, 233);
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }

        .close-btn:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>
</body>
</html>
