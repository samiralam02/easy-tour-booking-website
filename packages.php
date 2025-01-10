<?php
// Include the database connection file
include 'includes/config.php';

// Fetch package details from the database
$sql = "SELECT * FROM packages";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="packages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
    <title>Homepage</title>
    <style>
        .book-button {
            background-color: green;
            margin-left:180px;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .book-button:hover {
            background-color: #ff4500;
        }
    </style>
    <script>
        function updatePrice(element, basePrice, vehiclePrice) {
            const total = basePrice + vehiclePrice;
            const priceElement = element.closest('.tour-card').querySelector('.price');
            priceElement.textContent = '₹ ' + total;
        }

        function toggleDropdown(element) {
            element.classList.toggle('active');
            const content = element.querySelector('.dropdown-content');
            if (element.classList.contains('active')) {
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                content.style.maxHeight = null;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const priceSections = document.querySelectorAll('.price-section');
            priceSections.forEach(function(section) {
                const basePrice = parseInt(section.dataset.basePrice, 10);
                const privateVehiclePrice = parseInt(section.dataset.privateVehiclePrice, 10);
                const initialPrice = basePrice + privateVehiclePrice;
                section.querySelector('.price').textContent = '₹ ' + initialPrice;
            });
        });
    </script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section class="packages">
        <?php
        // Check if there are any packages available
        if (mysqli_num_rows($result) > 0) {
            // Loop through each package
            while ($row = mysqli_fetch_assoc($result)) {
                $package_image = $row['package_image'];
                $package_name = $row['package_name'];
                $days = $row['days'];
                $nights = $row['nights'];
                $deals = $row['deals'];
                $base_price = $row['price'];
                $private_vehicle_price = $row['private_vehicle_price'];
                $sharing_vehicle_price = $row['sharing_vehicle_price'];
                $luxurious_vehicle_price = $row['luxurious_vehicle_price'];
                $day1_itinerary = $row['day1_itinerary'];
                $day2_itinerary = $row['day2_itinerary'];
                $day3_itinerary = $row['day3_itinerary'];
                $day4_itinerary = $row['day4_itinerary'];
                $day5_itinerary = $row['day5_itinerary'];
                $day6_itinerary = $row['day6_itinerary'];
                $day7_itinerary = $row['day7_itinerary'];
                $day8_itinerary = $row['day8_itinerary'];
                $day9_itinerary = $row['day9_itinerary'];
                $day10_itinerary = $row['day10_itinerary'];
                // Output HTML structure for each package
                echo '<div class="tour-card">
                        <div class="image-section">
                            <img src="./admin/' . $package_image . '" alt="' . $package_name . '">
                            <div class="overlay">' . $package_name . '</div>
                        </div>
                        <div class="details-section">
                            <h2>' . $package_name . '</h2>
                            <p class="duration"><i class="fa fa-clock-o"></i> ' . $nights . ' Nights | ' . $days . ' Days</p>
                            <div class="options">
                                <div class="option-icons">
                                    <div class="icon">
                                        <img src="assets/images/taxi-icon.png" alt="Private-Vehicle">
                                        <button class="icon-btnn" onclick="updatePrice(this, ' . $base_price . ', ' . $private_vehicle_price . ')">Private-Vehicle</button>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/private.png" alt="Sharing-Vehicle">
                                        <button class="icon-btnn" onclick="updatePrice(this, ' . $base_price . ', ' . $sharing_vehicle_price . ')">Sharing-Vehicle</button>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/luxurious.png" alt="Luxurious-Vehicle">
                                        <button class="icon-btnn" onclick="updatePrice(this, ' . $base_price . ', ' . $luxurious_vehicle_price . ')">Luxurious-Vehicle</button>
                                    </div>
                                </div>
                            <form action="package-booking-form.php" method="post">
                                <input type="hidden" name="selected_package_id" value="' . $row['package_id'] . '">
                                <button type="submit" class="book-button" name="book_now">Book Now</button>
                            </form>


                            </div>
                            <p class="package-include"><i class="fa fa-briefcase"></i> Package Includes</p>
                            <div class="options">
                                <div class="option-icons">
                                    <div class="icon">
                                        <img src="assets/images/taxi-icon.png" alt="Cab">
                                        <span>Cab</span>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/hotel-icon.png" alt="Hotels">
                                        <span>Hotels</span>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/sightseeing-icon.png" alt="Sightseeing">
                                        <span>Sightseeing</span>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/meals-icon.png" alt="Meals">
                                        <span>Meals</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="price-section" data-base-price="' . $base_price . '" data-private-vehicle-price="' . $private_vehicle_price . '">
                            <div class="winter-deals-ribbon">' . $deals . '</div>
                            <p class="price">₹ ' . ($base_price + $private_vehicle_price) . '</p>
                          

                            <button class="call-button"><i class="fa fa-phone"></i> Want us to call you?</button>
                        </div>
                        <div class="book-button-container">
                        </div>
                    </div>';
                echo '<div class="dropdown-section" onclick="toggleDropdown(this)">
                        <p class="dropdown-title">Itinerary and Inclusions <span class="btnn"><i class="fa-solid fa-plus fa-beat fa-m" style="color: #ffffff;"></i>View Details</span></p>
                        <div class="dropdown-content" id="' . $package_name . '_id">';
                if (!empty($day1_itinerary)) {
                    echo '<p><span class="day-label">Day 1:</span> ' . $day1_itinerary . '</p>';
                }
                if (!empty($day2_itinerary)) {
                    echo '<p><span class="day-label">Day 2:</span> ' . $day2_itinerary . '</p>';
                }
                if (!empty($day3_itinerary)) {
                    echo '<p><span class="day-label">Day 3:</span> ' . $day3_itinerary . '</p>';
                }
                if (!empty($day4_itinerary)) {
                    echo '<p><span class="day-label">Day 4:</span> ' . $day4_itinerary . '</p>';
                }
                if (!empty($day5_itinerary)) {
                    echo '<p><span class="day-label">Day 5:</span> ' . $day5_itinerary . '</p>';
                }
                if (!empty($day6_itinerary)) {
                    echo '<p><span class="day-label">Day 6:</span> ' . $day6_itinerary . '</p>';
                }
                if (!empty($day7_itinerary)) {
                    echo '<p><span class="day-label">Day 7:</span> ' . $day7_itinerary . '</p>';
                }
                if (!empty($day8_itinerary)) {
                    echo '<p><span class="day-label">Day 8:</span> ' . $day8_itinerary . '</p>';
                }
                if (!empty($day9_itinerary)) {
                    echo '<p><span class="day-label">Day 9:</span> ' . $day9_itinerary . '</p>';
                }
                if (!empty($day10_itinerary)) {
                    echo '<p><span class="day-label">Day 10:</span> ' . $day10_itinerary . '</p>';
                }

                echo '<h3>Inclusions:</h3>
                        <p>Guidelines</p>
                        <!-- Add more inclusions details here -->';

                echo '</div>
                    </div>';
            }
        } else {
            echo '<h3 style="color: red; text-align: center; margin-top: 20px;">No Packages Available</h3>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
