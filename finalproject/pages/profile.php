<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <?php include '../inc/header.php' ?>

</head>
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?>
    </div>
    <div id="profile" class="profile_content container">
        <h1>Account</h1>
        <button id="toggle-info">Show Personal Info</button>
        <div id="personal-info" style="display: none;">
            <p>Name: </p>
            <p>Email: </p>
            <p>Phone: </p>
        </div>
        <div id="settings">
            <h1>Settings</h1>
            <h2>Languages</h2>
            <select id="language-select">
                <option value="arabic">Arabic</option>
                <option value="english">English</option>
            </select>
            <div id="logout" class="logout">Logout</div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var toggleInfo = document.getElementById("toggle-info")
    var personalInfo = document.getElementById("personal-info")
    var languageSelect = document.getElementById("language-select")
    var logoutDiv = document.getElementById("logout")

    toggleInfo.addEventListener("click", function() {
        if (personalInfo.style.display === "none") {
            personalInfo.style.display = "block"
            toggleInfo.innerText = "Hide Personal Info"
        } else {
            personalInfo.style.display = "none"
            toggleInfo.innerText = "Show Personal Info"
        }
    })

    languageSelect.addEventListener("change", function() {
        var selectedLanguage = languageSelect.value
        console.log("Selected language: " + selectedLanguage)
    })

    logoutDiv.addEventListener("click", function() {
        window.location.href = "login.html"
    })
})
    </script>
    
    
    </div>
    
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    
    <script src="../script.js"></script>

</body>
</html>