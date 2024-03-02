<?php
    $cart = $json_decode($_SESSION['cart'])??[];
    $productId = array_column($cart,'id')

    $query = ""
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <script src="script.js"></script>
    <?php include '../inc/header.php' ?>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?>
    </div>
    <div class="container">
        <header class="cart_header">
            <h1 id="categoryTitle">Products</h1>
            <a href="shop.php">Back to Departments</a>
        </header>
        <div id="products"></div>
        <div class="total">
            Total: <span id="total-price">$0</span>
        </div>
        <div class="address-form hidden" id="address-form">
            <h2>Enter Your Address</h2>
            <form id="address-form-element">
                <input type="text" id="address" placeholder="Enter your address" required>
                <button id="submit-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const productsContainer = document.getElementById('products')
        const totalPriceElement = document.getElementById('total-price')
        const addressForm = document.getElementById('address-form')
        const addressFormElement = document.getElementById('address-form-element')

        let cart = JSON.parse(localStorage.getItem('cart')) || []
        let total = calculateTotal(cart)

        // Display products in the cart
        cart.forEach((product, index) => {
            const productDiv = createProductElement(product, index)
            productsContainer.appendChild(productDiv)
        })

        totalPriceElement.textContent = `$${total.toFixed(2)}`

        // Event listener for decrease quantity button
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('decrease')) {
                const index = event.target.dataset.index
                const quantityInput = document.getElementById(`quantity-${index}`)
                let quantity = parseInt(quantityInput.value)
                if (quantity > 1) {
                    quantity--
                    quantityInput.value = quantity
                    cart[index].quantity = quantity
                    localStorage.setItem('cart', JSON.stringify(cart))
                    total = calculateTotal(cart)
                    totalPriceElement.textContent = `$${total.toFixed(2)}`
                } else {
                    // Remove the product from the cart if quantity is 1
                    cart.splice(index, 1)
                    localStorage.setItem('cart', JSON.stringify(cart))
                    event.target.parentElement.remove(); // Remove the product element
                    total = calculateTotal(cart)
                    totalPriceElement.textContent = `$${total.toFixed(2)}`
                }
            }
        })

        // Event listener for increase quantity button
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('increase')) {
                const index = event.target.dataset.index
                const quantityInput = document.getElementById(`quantity-${index}`)
                let quantity = parseInt(quantityInput.value)
                quantity++
                quantityInput.value = quantity
                cart[index].quantity = quantity
                localStorage.setItem('cart', JSON.stringify(cart))
                total = calculateTotal(cart)
                totalPriceElement.textContent = `$${total.toFixed(2)}`
            }
        })

        // Event listener for address form submission
        addressFormElement.addEventListener('submit', function(event) {
            event.preventDefault
            const address = document.getElementById('address').value
            alert(`Thank you for your registration. Your order has been processed. Your address: ${address}`)
            window.location.reload()// Reload the page
        })

        // Function to create a product element
        function createProductElement(product, index) {
            const productDiv = document.createElement('div')
            productDiv.classList.add('product')

            const title = document.createElement('h2')
            title.textContent = product.title
            productDiv.appendChild(title)

            const image = document.createElement('img')
            image.src = product.image
            image.alt = product.title
            productDiv.appendChild(image)

            const price = document.createElement('p')
            price.textContent = `${product.price}`
            productDiv.appendChild(price)

            const decreaseBtn = document.createElement('button')
            decreaseBtn.textContent = '-'
            decreaseBtn.classList.add('quantity-btn', 'decrease')
            decreaseBtn.dataset.index = index
            productDiv.appendChild(decreaseBtn)

            const quantityInput = document.createElement('input')
            quantityInput.type = 'text'
            quantityInput.value = product.quantity || 1 // Initialize quantity if not present
            quantityInput.id = `quantity-${index}` 
            quantityInput.readOnly = true
            productDiv.appendChild(quantityInput)

            const increaseBtn = document.createElement('button')
            increaseBtn.textContent = '+'
            increaseBtn.classList.add('quantity-btn', 'increase')
            increaseBtn.dataset.index = index
            productDiv.appendChild(increaseBtn)

            return productDiv
        }

        // Function to calculate the total price of the products in the cart
        function calculateTotal(cart) {
            return cart.reduce((total, product) => total + (product.price * (product.quantity || 1)), 0)
        }
    })
</script>
    <script src="../script.js"></script>
    
</body>
</html>
