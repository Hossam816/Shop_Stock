<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <script src="script.js"></script>
    <?php include '../inc/header.php' ?>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div id="header" class="header_container">
        <img src="../images/img1.jpg" alt="Logo">
        <div id="span">Shop Stock</div>
    </div>
    <div class="container mt-5">
        <div id="login" >
        <form onsubmit="validateForm(); return false">
        <label for="Log-in">Log-in</label>
        <label for="username">Username:</label>
        <input type="text" id="username" name="Username" placeholder="Enter Your username here" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="Password" placeholder="Enter your password here" required>
        <a href="returnpassword.html"> Forget Password</a>
        <button type="submit">Log-in</button>
        <label for="text">Don't Have an Account?</label>
        <a href="createanaccount.html">Create Account</a>
        </form>
    </div>
    </div>
    
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    
</body>
</html>