<?php
require '../admin/inc/config.php';

$prodQuery = "SELECT * FROM `products` limit 3";
$res = $connect->query($prodQuery);
$prodcuts = $res->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php include '../inc/header.php' ?>
</head>
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?> 
    </div>
    <div id="describe" class="describe display-flex container-fluid">
        <div class="descrip_content">
            <h1> THE SIMPLER YOU ARE, THE MORE RARE YOU ARE.</h1>
            <p>
                25% Off On All Products
            </p>
            <div class="main_button-container">
            <button>Shop Now</button>
            <button>Find More</button>
        </div>
        </div>
        
    </div>
    <div class="top_selling container-fluid">
        <h1 class="mt-5 text-center">Our Top Selling</h1>
        <div class="prod_container container-fluid">
            <?php foreach($prodcuts as $prod): ?>
                <div class="box">
                    <img src="<?php echo $prod['image']?>" alt="">
                    <h3><?php echo $prod["title"] ?></h3>
                    <span>Price: $<?php echo $prod["price"] ?></span>
                    <p><?php echo $prod[ "description"] ?></p>
                    <a href="#" class="show_link">Show Product</a>
                </div>
            <?php endforeach ?>
        </div>

    </div>
    <div id="footer">
        <p>&copy; 2024 Shop Stock. All rights reserved.</p>
    </div>
    <script src="../script.js"></script>
    <?php include '../inc/script.php'; ?>
    
</body>
    </html>