<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Homepage</title>
    <style>
        body {
            font-family: 'El Messiri', sans-serif;
            background-color: #f8f9fa;
        }
        main {
            margin-top: 100px;
        }
        .thank-you-message {
            display: none;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #28a745;
            color: #28a745;
            background-color: #d4edda;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-submit {
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }
        .btn-submit:hover {
            background-color: #555;
            color:#fff;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Main Content Block -->
    <main>
        <div class="container py-5">
            <div class="row g-5">
                <!-- Contact Information Block -->
                <div class="col-xl-6">
                    <div class="row row-cols-md-2 g-4">
                        <div class="aos-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="aos-item__inner">
                                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                                    <div class="d-flex justify-content-start">
                                        <span class="h5"><i class="fa-solid fa-envelope"></i> Email</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span>sikkimtalestoursandtravel@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aos-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="aos-item__inner">
                                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                                    <div class="d-flex justify-content-start">
                                        <span class="h5"><i class="fa-solid fa-phone"></i> Phone</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span>+8250690057 - +6294458010 - +8250837625</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aos-item mt-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="aos-item__inner">
                            <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                                <div class="d-flex justify-content-start">
                                    <span class="h5"> <i class="fa-solid fa-location-dot"></i> Office location</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span>LINGDING RAI GOAN, NEAR SDF BHAWAN ROAD, GANGTOK DISTRICT, SIKKIM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aos-item" data-aos="fade-up" data-aos-delay="800">
                        <div class="mt-4 w-100 aos-item__inner">
                            <iframe class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3544.515368447934!2d88.60985667515848!3d27.328351942105837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e6a5150c74c8df%3A0x4574bdf2093674fa!2sM.%20G.%20Market!5e0!3m2!1sen!2sin!4v1713530351848!5m2!1sen!2sin"><a href="https://www.maps.ie/distance-area-calculator.html">measure acres/hectares on map</a></iframe>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Block -->
                <div class="col-xl-6">
                    <div id="thankYouMessage" class="thank-you-message"></div>
                    <div class="form-container">
                        <h3 class="form-title">LEAVE A MESSAGE</h3>
                        <form id="contactForm">
                            <div class="row g-4">
                                <div class="col-6 mb-3">
                                    <label for="firstName" class="form-label text-primary">FIRST NAME</label>
                                    <input type="text" class="form-control border-primary text-primary" id="firstName" name="firstName" placeholder="Enter your first name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="lastName" class="form-label text-primary">LAST NAME</label>
                                    <input type="text" class="form-control border-primary text-primary" id="lastName" name="lastName" placeholder="Enter your last name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-primary">Email</label>
                                <input type="email" class="form-control border-primary text-primary" id="email" name="email" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label text-primary">Phone</label>
                                <input type="tel" class="form-control border-primary text-primary" id="phone" name="phone" placeholder="+1234567890">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label text-primary">Message</label>
                                <textarea class="form-control border-primary text-primary" id="message" name="message" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            fetch('contact-form-handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById("thankYouMessage").innerHTML = data.message;
                    document.getElementById("thankYouMessage").style.display = "block";
                    document.getElementById("contactForm").reset();
                } else {
                    document.getElementById("thankYouMessage").innerHTML = data.message;
                    document.getElementById("thankYouMessage").style.display = "block";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
