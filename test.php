<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- Ensure Bootstrap is included -->
    <style>
        .thank-you-message {
            display: none;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #28a745;
            color: #28a745;
            background-color: #d4edda;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="thankYouMessage" class="thank-you-message"></div>
    
    <form class="border border-primary rounded p-4" id="contactForm">
        <h3><a class="navbar-brand fw-bold">LEAVE A MESSAGE</a></h3><br>
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
        <button type="submit" class="btn btn-dark">Send Message</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#contactForm").on("submit", function(event) {
            event.preventDefault();
            
            $.ajax({
                url: "contact-form-handler.php",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        $("#thankYouMessage").text(response.message).show();
                        $("#contactForm")[0].reset();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("An error occurred while processing your request. Please try again.");
                }
            });
        });
    });
</script>

</body>
</html>
