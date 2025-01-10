<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Homepage</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
    
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-slider">
                <div style="background-image: url('./assets/images/heroimg5.jpg');"></div>
                <div style="background-image: url('./assets/images/heroimg2.jpg');"></div>
                <div style="background-image: url('./assets/images/heroimg3.jpg');"></div>
                <div style="background-image: url('./assets/images/heroimg4.jpg');"></div>
                <div style="background-image: url('./assets/images/heroimg1.jpg');"></div>
            </div>
            <div class="quote">
                "Travel is the only thing you buy that makes you richer."
            </div>
            <div class="search-packages">
                <form action="/search-results" method="get" class="search-form">
                    
                    <select name="packageType" required>
                        <option value="">Select Package Type</option>
                        <option value="adventure">Adventure</option>
                        <option value="leisure">Leisure</option>
                        <option value="cultural">Cultural</option>
                    </select>
                        <input type="text" name="destination" placeholder="Enter destination..." class="display_hide" required>
                        <input type="date" name="date" class="display_hide" required>
                        <input type="number" name="duration" class="display_hide" placeholder="Duration (in days)">
                        <input type="text" name="accommodation" class="display_hide" placeholder="Preferred Accommodation">
         
                    <button type="submit">Search Packages</button>
          
                </form>
            </div>


        </section>
        <!-- WhatsApp Contact Button -->
        <div class="whatsapp-button">
            <a href="https://wa.me/+916294851362" target="_blank" class="whatsapp-icon">
                <img src="./assets/images/whatsapp.svg" alt="Contact via WhatsApp">
                <span class="whatsapp-text">WhatsApp Now</span>
            </a>
        </div>
        <!-- Travel Section -->

        
        <!-- Travel Section -->
        <section class="travel-section">
            <div class="left-section">
                <h1>Welcome To Sikkim Tales Tours And Travels</h1>
                <div class="about-container">
                    <p>Founded in the heart of the mountains, our travel agency has been guiding adventurers and explorers across the globe for over a decade. We believe in creating unforgettable experiences that inspire and rejuvenate. Whether it's scaling remote peaks or exploring bustling city streets, we bring your dreams to life. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque aspernatur alias sint quia culpa similique velit natus voluptates. Perspiciatis, corrupti at! Ex ad consequuntur doloremque aut ipsum sequi molestiae neque qui porro nam eligendi, voluptatum facere. Tenetur quisquam est pariatur nihil deleniti praesentium id laboriosam harum, voluptates, eligendi aliquam quibusdam!</p>
                </div>
                <img src="./assets/images/logo.png" alt="Company Logo" class="background-logo">
                <button class="btn left-btn">Learn More</button>
            </div>
            <div class="right-section">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="./assets/images/slide1.jpg" alt="Slide 1">
            <div class="text">
                <h2>Travel</h2>
                <p>"Travel is the only thing you buy that makes you richer." Explore new horizons and enrich your life through travel experiences.</p>
            </div>
        </div>
        <div class="mySlides fade">
            <img src="./assets/images/slide2.jpg" alt="Slide 2">
            <div class="text">
                <h2>Adventure</h2>
                <p>"Adventure awaits, go find it." Embark on thrilling journeys and create unforgettable memories filled with excitement and discovery.</p>
            </div>
        </div>
        <div class="mySlides fade">
            <img src="./assets/images/slide3.jpg" alt="Slide 3">
            <div class="text">
                <h2>Live By a Compass</h2>
                <p>"Live your life by a compass, not a clock." Follow your true north, explore new directions, and let your journey unfold organically.</p>
            </div> 
        </div>
        <div class="mySlides fade">
            <img src="./assets/images/slide4.jpg" alt="Slide 4">
            <div class="text">
                <h2>Wanderlust</h2>
                <p>"Not all those who wander are lost." Embrace your wanderlust spirit, wander freely, and discover hidden treasures along the way.</p>
            </div>
        </div> 
    </div>
    <button class="btn right-btn">Contact Us</button>
</div>
</section> 
<section class="popular-packages">
    <h1 class="package_heading">Our Most Popular Packages</h1>
    <div class="packages-slider">
        <button class="scroll-btn left-btnn"><i class="fa fa-chevron-left"></i></button>
        <div class="packages-container">
            <?php
            // Include the database connection file
            include './includes/config.php';
            // Fetch package details from the database
            $sql = "SELECT * FROM packages";
            $result = mysqli_query($con, $sql);

            // Check if there are any packages available
            if (mysqli_num_rows($result) > 0) {
                // Loop through each package
                while ($row = mysqli_fetch_assoc($result)) {
                    $package_image = $row['package_image'];
                    $package_name = $row['package_name'];
                    $days = $row['days'];
                    $nights = $row['nights'];
                    $base_price = $row['price'];
                    $private_vehicle_price = $row['private_vehicle_price'];

                    // Output HTML structure for each package
                    echo '<div class="package">
                            <img src="' . $package_image . '" alt="' . $package_name . '">
                            <div class="package-content">
                                <div class="package-heading">
                                    <h3>' . $package_name . '</h3>
                                </div>
                                <div class="package-description">
                                    <div class="pkg-price">
                                        <p><i class="fa fa-rupee" style="font-size:28px;color:#f47521"></i> ' . ($base_price + $private_vehicle_price) . ' <em>/ Per Package</em></p>
                                    </div>
                                    <div class="pkg-icon">
                                        <div class="icon-wrapper">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span>' . $days . ' Days / ' . $nights . ' Night</span>
                                        </div>
                                        <div class="icon-wrapper Location">
                                            <a href="https://maps.app.goo.gl/wWYnqTAmwgR2XZUJ8" target="_blank">
                                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                <span>Landmark</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button class="button-22" onclick="window.location.href=\'packages.php\'">More Details</button>
                            </div>
                        </div>';
                }
            } else {
                echo '<h3 style="color: red; text-align: center; margin: auto;">No Packages Available</h3>';
            }

            // Close the database connection
            mysqli_close($con);
            ?>
        </div>
        <button class="scroll-btn right-btnn"><i class="fa fa-chevron-right"></i></button>
    </div>
</section>


              
        <!-- Services Section -->
<section class="services-section">
  <h2 class="services-heading">Services Rental</h2>
  <div class="service-row">
    <div class="service-item">
      <div class="service-icon">
        <img src="./assets/images/Service-Icons/cab.png" alt="Service Icon 1">
      </div>
      <div class="service-details">
        <h3>Cab</h3>
        <button class="service-btn" onclick="location.href='services.php#Cab Section'">For More</button>
      </div>
    </div>
    <div class="service-item">
      <div class="service-icon">
        <img src="./assets/images/Service-Icons/motorbike.png" alt="Service Icon 2">
      </div>
      <div class="service-details">
        <h3>Bikes</h3>
        <button class="service-btn" onclick="location.href='services.php#Bike Section'">For More</button>
        </div>
    </div>
    <div class="service-item">
      <div class="service-icon">
        <img src="./assets/images/Service-Icons/bicycle.jpg" alt="Service Icon 3">
      </div>
      <div class="service-details">
        <h3>Bicycle</h3>
        <button class="service-btn" onclick="location.href='services.php#Bicycle Section'">For More</button>
            
    </div>
    </div>
    <div class="service-item">
      <div class="service-icon">
        <img src="./assets/images/Service-Icons/adventure.png" alt="Service Icon 4">
      </div>
      <div class="service-details">
        <h3>Adventure</h3>
        <button class="service-btn" onclick="location.href='services.php#Adventure Activities'">For More</button>
            
    </div>
    </div>
  </div>
</section>


        <!-- Journey Wishes Section -->
<section class="journey-wishes">
    <h2>Wish You a Happy and Wonderful Journey</h2>
</section>

<?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>
</html>
