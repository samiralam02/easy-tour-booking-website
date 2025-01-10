<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoBikes Rental</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link rel="stylesheet" href="services.css">
</head>
<body>
<?php include('includes/header.php'); ?>

<!-- Cab Section -->
<div class="header" id="Cab Section">
    <h1>Cab Rental</h1>
</div>
<div class="container">
    <div class="category-container">
        <?php
        include('includes/config.php');
        $sql = "SELECT * FROM vehicle_services WHERE Category = 'Cab'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class="category-item">
                    <img src="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                    <p class="category-name"><?php echo htmlspecialchars($row['Name']); ?> / <?php echo htmlspecialchars($row['Seater']); ?> Seater</p>
                    <div class="price-container">
                        <h2 class="price"><?php echo '₹' . htmlspecialchars($row['Price_Day']); ?> /day</h2>
                        <form action="service-booking-form.php" method="POST">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>">
                            <input type="hidden" name="image_url" value="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>">
                            <input type="hidden" name="price_day" value="<?php echo htmlspecialchars($row['Price_Day']); ?>">
                            <input type="hidden" name="price_week" value="<?php echo htmlspecialchars($row['Price_Week']); ?>">
                            <input type="hidden" name="price_month" value="<?php echo htmlspecialchars($row['Price_Month']); ?>">
                            <button type="submit" class="book-now">Book Now</button>
                        </form>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No cab details available.";
        }
        ?>
    </div>
</div>

<!-- Bike Section -->
<div class="header" id="Bike Section">
    <h1>MotoBikes Rental</h1>
</div>
<div class="container">
    <div class="category-container">
        <?php
        $sql = "SELECT * FROM vehicle_services WHERE Category = 'Motorbike'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class="category-item">
                    <img src="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                    <p class="category-name"><?php echo htmlspecialchars($row['Name']); ?></p>
                    <div class="price-container">
                        <h2 class="price"><?php echo '₹' . htmlspecialchars($row['Price_Day']); ?> /day</h2>
                        <form action="service-booking-form.php" method="POST">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>">
                            <input type="hidden" name="image_url" value="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>">
                            <input type="hidden" name="price_day" value="<?php echo htmlspecialchars($row['Price_Day']); ?>">
                            <input type="hidden" name="price_week" value="<?php echo htmlspecialchars($row['Price_Week']); ?>">
                            <input type="hidden" name="price_month" value="<?php echo htmlspecialchars($row['Price_Month']); ?>">
                            <button type="submit" class="book-now">Book Now</button>
                        </form>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No bike details available.";
        }
        ?>
    </div>
</div>

<!-- Bicycle Section -->
<div class="header" id="Bicycle Section">
    <h1>Bicycle Rental</h1>
</div>
<div class="container">
    <div class="category-container">
        <?php
        $sql = "SELECT * FROM vehicle_services WHERE Category = 'Bicycle'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class="category-item">
                    <img src="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                    <p class="category-name"><?php echo htmlspecialchars($row['Name']); ?></p>
                    <div class="price-container">
                        <h2 class="price"><?php echo '₹' . htmlspecialchars($row['Price_Day']); ?> /day</h2>
                        <form action="service-booking-form.php" method="POST">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>">
                            <input type="hidden" name="image_url" value="<?php echo './admin/' . htmlspecialchars($row['Image_URL']); ?>">
                            <input type="hidden" name="price_day" value="<?php echo htmlspecialchars($row['Price_Day']); ?>">
                            <input type="hidden" name="price_week" value="<?php echo htmlspecialchars($row['Price_Week']); ?>">
                            <input type="hidden" name="price_month" value="<?php echo htmlspecialchars($row['Price_Month']); ?>">
                            <button type="submit" class="book-now">Book Now</button>
                        </form>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No bicycle details available.";
        }
        ?>
    </div>
</div>

<!-- Adventure Activities Section -->
<div class="header" id="Adventure Activities">
    <h1>Adventure Activities</h1>
</div>
<div class="container">
    <div class="category-container">
    <?php
        $sql = "SELECT * FROM adventure_activities";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class="category-item">
                    <img src="<?php echo './admin/' . htmlspecialchars($row['adventureImage']); ?>" alt="<?php echo htmlspecialchars($row['adventureName']); ?>">
                    <p class="category-name"><?php echo htmlspecialchars($row['adventureName']); ?></p>
                    <div class="price-container">
                        <h2 class="price"><?php echo '₹' . htmlspecialchars($row['price']); ?> /day</h2>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No adventure details available.";
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
