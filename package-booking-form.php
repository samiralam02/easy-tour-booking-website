<?php
// Include the database connection file
include './includes/config.php';

// Check if the form is submitted
if(isset($_POST['book_now'])){
    // Get the selected package ID
    $selected_package_id = $_POST['selected_package_id'];
    
    // Fetch details for the selected package from the database
    $sql = "SELECT package_image, package_name, deals, price, days, nights FROM packages WHERE package_id = $selected_package_id";
    $result = mysqli_query($con, $sql);
    
    // Fetch the row for the selected package
    $package = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/phone.css">
    <link rel="stylesheet" href="./assets/css/package-booking-form.css">
</head>
<body>
<?php include './includes/header.php'; ?>

    <div class="custom-form-container">
        <div class="custom-form-header">
            <h2>Booking Form</h2>
            <!-- Add your logo here -->
        </div>
        <form action="package-booking-form-handler.php" method="post" enctype="multipart/form-data">
            <!-- Hidden fields to store package ID and existing image path -->
            <input type="hidden" name="package_id">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($package['package_image']); ?>">

            <!-- Page 1: Personal Information -->
            <div id="page1">
                <!-- Personal Information -->
                <fieldset class="custom-fieldset">
                    <legend class="custom-legend">Personal Information</legend>
                    <div class="custom-form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="custom-form-control" required>
                    </div>
                    <div class="custom-form-group">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" name="email" class="custom-form-control" required>
                    </div>
                    <div class="custom-form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" class="custom-form-control" required>
                    </div>
                    <div class="custom-form-group">
                        <label for="children">Number of Children</label>
                        <input type="number" id="children" name="children" class="custom-form-control">
                    </div>
                    <div class="custom-form-group">
                        <label for="adults">Number of Adults</label>
                        <input type="number" id="adults" name="adults" class="custom-form-control">
                    </div>
                </fieldset>
                <div class="custom-text-center">
                    <button type="button" class="custom-btn" onclick="showPage2()">Next</button>
                </div>
            </div>

            <!-- Page 2: Package Information -->
            <div id="page2" style="display: none;">
                <div class="custom-form-group">
                    <label for="package-image">Package Image</label>
                    <!-- Display the current package image if available -->
                    <img src="<?php echo htmlspecialchars($package['package_image']); ?>" alt="Package Image" style="max-width: 100px; height: auto;">
                    <input type="file" id="package-image" name="package_image" accept="image/*">
                </div>
                <!-- Package Name -->
                <div class="custom-form-group">
                    <label for="package-name">Package Name</label>
                    <input type="text" id="package-name" name="package-name" class="custom-form-control" value="<?php echo htmlspecialchars($package['package_name']); ?>" required>
                </div>
                <!-- Deals -->
                <div class="custom-form-group">
                    <label for="deals">Deals</label>
                    <input type="text" id="deals" name="deals" class="custom-form-control" value="<?php echo htmlspecialchars($package['deals']); ?>">
                </div>
                <!-- Price -->
                <div class="custom-form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="custom-form-control" value="<?php echo htmlspecialchars($package['price']); ?>">
                </div>
                <!-- Durations -->
                <fieldset class="custom-fieldset">
                    <legend class="custom-legend">Durations</legend>
                    <div class="custom-form-group">
                        <label for="days">Days</label>
                        <input type="number" id="days" name="days" class="custom-form-control" value="<?php echo htmlspecialchars($package['days']); ?>">
                    </div>
                    <div class="custom-form-group">
                        <label for="nights">Nights</label>
                        <input type="number" id="nights" name="nights" class="custom-form-control" value="<?php echo htmlspecialchars($package['nights']); ?>">
                    </div>
                </fieldset>
                <!-- Hidden input for selected package ID -->
                <input type="hidden" id="selected_package_id" name="selected_package_id" value="<?php echo $selectedPackageId; ?>">
                <div class="custom-text-center">
                    <button type="button" class="custom-btn" onclick="showPage1()">Back</button>
                    <button type="submit" class="custom-btn book-button" name="book_now">Book Now</button>
                </div>
            </div>
        </form>
    </div>
    <?php include './includes/footer.php'; ?>

    <script src="./assets/js/package-booking-form.js"></script>
</body>
</html>
