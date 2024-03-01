<?php
if(isset($_GET['id'])){
    $prodIdCode = $_GET['id'];
} else {
    echo "<h1>Error! No product ID provided.</h1>";
    die();
}

require_once '../inc/config.php';

// Select image and category of the product
$selectUserData = "SELECT image, categ_id FROM products WHERE prod_Id = $prodIdCode";
$selectRes = $connect->query($selectUserData);
$selectObjects = $selectRes->fetch(PDO::FETCH_ASSOC);


$imgName = $selectObjects['image'];
$category = $selectObjects['categ_id'];

// Delete the product from the database
$query = "DELETE FROM products WHERE prod_Id = '$prodIdCode'";
$res = $connect->query($query);

if($res){
    // Determine the directory based on the category
    $directory = '';
    switch ($category) {
        case "1111":
            $directory = "../images/Products/men/";
            break;
        case "1112":
            $directory = "../images/Products/Women/";
            break;
        case "1113":
            $directory = "../images/Products/electronics/";
            break;
        case "1114":
            $directory = "../images/Products/jewellry/";
            break;
        default:
            $directory = "../images/Products/bags/";
            break;
    }
    
    // Delete the image file from the appropriate directory
    if(file_exists($imgName)) {
        unlink($imgName);
    } else {
        echo "<h1>Error! Image file not found.</h1>";
    }
    
    header("Location: index.php");
}
?>
