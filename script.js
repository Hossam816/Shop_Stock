function validateForm() {
    var username = document.getElementById("username").value
    var password = document.getElementById("password").value
    
    if (username === "radw1234" && password === "Gemel1234") {
        window.location.href = "home.html"
    } else if (username === "" || password === "") {
        alert("Please enter both username and password.")
    } else {
        alert("Incorrect username or password.")
    }
}

function returnToLoginPage() {
    var email = document.getElementById("email").value
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!email || !emailRegex.test(email)) {
        alert("Please enter a valid email address.")
    } else {
        alert("A password reset link has been sent to " + email + ". Please check your email.")
        window.location.href = "login.html"
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll("#header a")
    const currentPageUrl = window.location.href;

    links.forEach(link => {
        if (link.href === currentPageUrl) {
            link.classList.add("active")
        }
    })
})
function displayPhoto(input) {
    var file = input.files[0]
    if (file) {
        var reader = new FileReader()
        reader.onload = function(e) {
            document.getElementById("profile-photo").src = e.target.result
        }
        reader.readAsDataURL(file)
    }
}
function signup() {
var fileInput = document.getElementById("myFile")
var name = document.getElementById("name").value
var surname = document.getElementById("surname").value
var genderMale = document.getElementById("male").checked
var genderFemale = document.getElementById("female").checked
var country = document.getElementById("country").value
var city = document.getElementById("City").value
var email = document.getElementById("mail").value
var username = document.getElementById("user").value
var password = document.getElementById("pass").value
var repeatPassword = document.getElementById("repeat-pass").value
var agreed = document.getElementById("agreed").checked

var nameRegex = /^[a-zA-Z]{4,}$/
var surnameRegex = /^[a-zA-Z]{4,}$/
var countryRegex = /^[a-zA-Z]{4,}$/
var cityRegex = /^[a-zA-Z]{4,}$/
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
var usernameRegex = /^[a-zA-Z][a-zA-Z0-9]*$/
var passwordRegex = /^(?!.*\b(?:name|surname)\b)(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/


var photoError=    document.getElementById("photo-error")
var nameError = document.getElementById("name-error")
var surnameError = document.getElementById("surname-error")
var genederError = document.getElementById("gender-error")
var countryError = document.getElementById("country-error")
var cityError = document.getElementById("city-error")
var emailError = document.getElementById("email-error")
var usernameError = document.getElementById("username-error")
var passwordError = document.getElementById("password-error")
var repeatPasswordError = document.getElementById("repeat-password-error")
var agreedError = document.getElementById("agreed-error")

photoError.textContent =""
nameError.textContent = ""
surnameError.textContent = ""
genederError.textContent =""
countryError.textContent = ""
cityError.textContent = ""
emailError.textContent = ""
usernameError.textContent = ""
passwordError.textContent = ""
repeatPasswordError.textContent = ""
agreedError.textContent = ""

var isValid = true
if (!fileInput.files.length) {
document.getElementById("photo-error").textContent = "Please choose a photo"
isValid = false
}

if (!nameRegex.test(name)) {
nameError.textContent = "Invalid name"
isValid = false
}

if (!surnameRegex.test(surname)) {
surnameError.textContent = "Invalid surname "
isValid = false
}
if (!genderMale && !genderFemale) {
document.getElementById("gender-error").textContent = "Please select a gender"
isValid = false
} 

if (!countryRegex.test(country)) {
countryError.textContent = "Invalid country name "
isValid = false
}

if (!cityRegex.test(city)) {
cityError.textContent = "Invalid city name "
isValid = false
}

if (!emailRegex.test(email)) {
emailError.textContent = "Invalid email address"
isValid = false
}

if (!usernameRegex.test(username)) {
usernameError.textContent = "Invalid username"
isValid = false
}

if (!passwordRegex.test(password)) {
passwordError.textContent = "Invalid password "
isValid = false
}

if (password !== repeatPassword) {
repeatPasswordError.textContent = "Passwords do not match"
isValid = false
}

if (!agreed) {
agreedError.textContent = "You must agree to the Terms and Conditions"
isValid = false
}

if (isValid) {
alert("The Informtion Saved Successfully")
document.getElementById("create_an_account").style.border = "1px solid gray"
window.location.href = "login.html"
}
}









