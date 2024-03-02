<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-us Page</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php include '../inc/header.php' ?>
</head>
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?>
    </div>
    
    <div id="form" class="contact_main container">
        <form id="contact-form" class="contact-content">
            <div class="row">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your Name">
            </div>
            <div class="row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="row">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone">
            </div>
            <div class="row">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('contact-form')
        form.addEventListener("submit", function (event) {
        event.preventDefault()
        var name = document.getElementById('name').value
        var email = document.getElementById('email').value
        var phone = document.getElementById('phone').value
        var message = document.getElementById('message').value
        var phonePattern = /^(01)\d{9}$/
        if (name && email && phone && message && phonePattern.test(phone)) {
            alert("Thank you for your message. Our customer service will contact you within 24 hours.")
            form.reset()
        } else {
            alert("Please fill in all required fields correctly.")
        }
    })
})
    </script>
    <script src="../script.js"></script>

    
    
</body>
</html>