<?php
if(isset($_GET['prodId'])){
    $prodIdCode = $_GET['prodId'];
}else{
    echo "<h1>Error! No product ID provided.</h1>";
    die();
}
    require '../admin/inc/config.php';
    $depsQuery = "SELECT p.*, d.deps_name
                    FROM products p
                    INNER JOIN departments d ON p.department_id = d.deps_id
                    WHERE p.prod_id = $prodIdCode";
    $depsRes = $connect->query($depsQuery);
    $departments = $depsRes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php include '../inc/header.php'?>
</head>
<style>
    .Cart-button{
        width: 150px;
        height:  42px;
        border:none;
        border-radius: 10px;
        background-color: #818181;
        color: white;
        cursor: pointer;
    }
</style>
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?>
    </div>
    <div class="shop_container container">
        <header style="display: flex; justify-content: space-between;">
                <h1><?php echo $departments[0]['title'] ?></h1>
            <input type="text" id="searchBox" placeholder="Search...">
        </header>
        <div id="categories" class="deps_content">
            <?php foreach($departments as $depart): ?>
                <div class="depart_box" style="display:flex; flex-direction:column; align-items:center; gap:1rem">
                    <p><?php echo $depart['title']?></p>
                    <img src="<?php echo $depart['image'] ?>" alt="">
                    <button class="Cart-button" onclick="addToCart(<?php echo $depart['prod_id']?>)">Add To Cart</button>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="greatings container-fluid">
        <span>The Best Collection Are Waiting For You</span> 
    </div>
    
    
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    <script>
        function addToCart(product) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let existingProductIndex = cart.findIndex(item => item.prod_id === product.prod_id);
            if (existingProductIndex !== -1) {
                cart[existingProductIndex].quantity++;
            } else {
                product.quantity = 1;
                cart.push(product);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Product added to cart.'); // You can replace this with a more user-friendly notification
        }
    </script>
    <script src="script.js"></script>
    <?php include "../inc/script.php" ?>
</body>
</html>