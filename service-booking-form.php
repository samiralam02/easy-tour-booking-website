<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="packages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="services1.css">
    <style>
        body {
            font-family: 'El Messiri', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .search-container {
            background-color: #00a0e3;
            padding: 20px;
            border-radius: 5px;
            color: #fff;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
            margin: 10px;
            flex: 1;
        }

        .search-container h2 {
            margin-top: 0;
            background-color: #ff6600;
            padding: 10px;
            border-radius: 5px;
        }

        .search-container label {
            display: block;
            margin: 10px 0 5px;
        }

        .search-container input,
        .search-container button {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        .search-container input[type="date"],
        .search-container input[type="time"] {
            width: calc(50% - 5px);
        }

        .search-container button {
            width: 100%;
            background-color: #ff6600;
            color: #fff;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #e65c00;
        }

        .car-info {
            background-color: #fff;
            padding: 23px;
            border-radius: 5px;
            text-align: center;
            width: 100%;
            max-width: 600px;
            height:557px;
            margin: 10px;
            flex: 1;
        }

        .car-info img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .car-info h2 {
            font-size: 2rem;
            margin: 20px 0 10px;
        }

        .price {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .price div {
            background-color: #ff6600;
            color: #fff;
            padding: 8px;
            border-radius: 5px;
            width: 30%;
            text-align: center;
        }

        .book {
            background-color: #ff6600;
            color: #fff;
            padding: 0px 22px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .book label {
            margin-left: 5px;
        }

        #booking-type {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .search-container,
            .car-info {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <section class="packages">
        <div class="container">
            <div class="search-container">
                <h2>Book Your Ride</h2>
                <form action="service-booking-processing.php" method="POST">
                    <!-- Hidden input fields to preserve data -->
                    <input type="hidden" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <input type="hidden" name="price_day" value="<?php echo isset($_POST['price_day']) ? htmlspecialchars($_POST['price_day']) : ''; ?>">
                    <input type="hidden" name="price_week" value="<?php echo isset($_POST['price_week']) ? htmlspecialchars($_POST['price_week']) : ''; ?>">
                    <input type="hidden" name="price_month" value="<?php echo isset($_POST['price_month']) ? htmlspecialchars($_POST['price_month']) : ''; ?>">
                    <div class="form-group">
                        <input type="text" id="customer-name" name="customer-name" required placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" required placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group" id="booking-type">
                        <label>Book at:</label>
                        <div class="book">
                            <input type="radio" id="daily" name="book" value="daily" checked>
                            <label for="daily">Daily</label>
                        </div>
                        <div class="book">
                            <input type="radio" id="weekly" name="book" value="weekly">
                            <label for="weekly">Weekly</label>
                        </div>
                        <div class="book">
                            <input type="radio" id="monthly" name="book" value="monthly">
                            <label for="monthly">Monthly</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup">Pick Up Date</label>
                        <input type="date" id="pickup" name="pickup_date" required>
                    </div>
                    <div class="form-group">
                        <label for="pickup-time">Pick Up Time</label>
                        <input type="time" id="pickup-time" name="pickup_time" required>
                    </div>
                    <div class="form-group">
                        <label for="pickup-location">Pick Up Location</label>
                        <input type="text" id="pickup-location" name="pickup_location" required placeholder="Enter Pick Up Location">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="car-info">
                <!-- Displaying service details -->
                <?php if (isset($_POST['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($_POST['image_url']); ?>" alt="Service Image">
                <?php endif; ?>
                <?php if (isset($_POST['name'])): ?>
                    <h2><?php echo htmlspecialchars($_POST['name']); ?></h2>
                <?php endif; ?>
                <div class="price">
                    <?php if (isset($_POST['price_day'])): ?>
                        <div>₹<?php echo htmlspecialchars($_POST['price_day']); ?> /day</div>
                    <?php endif; ?>
                    <?php if (isset($_POST['price_week'])): ?>
                        <div>₹<?php echo htmlspecialchars($_POST['price_week']); ?> /week</div>
                    <?php endif; ?>
                    <?php if (isset($_POST['price_month'])): ?>
                        <div>₹<?php echo htmlspecialchars($_POST['price_month']); ?> /month</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
</body>

</html>
