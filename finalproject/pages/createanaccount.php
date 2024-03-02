<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>createanaccount</title>
    <?php include '../inc/header.php' ?>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div id="header" class="header_container">
        <img src="../images/img1.jpg" alt="Logo">
        <div id="span">Shop Stock</div>
    </div>
    <div id="create_an_account" class="create_form">
        <div class="photo">
        <img  id="profile-photo" src="../images/pic1.jpg" width="70" height="70" alt="profile-photo" >
        <input type="file" id="myFile" name="filename" onchange="displayPhoto(this)">
        </div>
        <div id="photo-error" class="error-message"></div>
        <h2>Create a New Account</h2>
        <form action="login.html" method="get">
        <input type="text" id="name" name="Name" placeholder="Please Enter your Name">
        <div id="name-error" class="error-message"></div>
        <input type="text" id="surname" name="Surname" placeholder="Please Enter your Surname">
        <div id="surname-error" class="error-message"></div>
        <div class="gender">
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        <div id="gender-error" class="error-message"></div>
        <input type="text" id="country" name="Country" placeholder="Please Enter your Country">
        <div id="country-error" class="error-message"></div>
        <input type="text" id="City" name="City" placeholder="Please Enter your City">
        <div id="city-error" class="error-message"></div>
        <input type="email" id="mail" name="email" placeholder="Please Enter your e-mail">
        <div id="email-error" class="error-message"></div>
        <input type="text" id="user" name="user" placeholder="Please Enter your username">
        <div id="username-error" class="error-message"></div>
        <input type="password" id="pass" name="pass" placeholder="Please Enter your password">
        <div id="password-error" class="error-message"></div>
        <input type="password" id="repeat-pass" name="repeat-pass" placeholder="Please Enter your password again">
        <div id="repeat-password-error" class="error-message"></div>
        <div class="check">
        <input type="checkbox" name="check" id="agreed"> 
        <label for="agreed">I agree to the Terms and Conditions</label>
        </div>
        <div id="agreed-error" class="error-message"></div>
        <button type="button" onclick="signup()"> Sign Up</button>
        <input type="reset" value="Reset"> 
        </form>
    </div>
    <div id="error-message"></div>
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>

    <script src="script.js"></script>

</body>
</html>
