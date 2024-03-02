<?php
    require '../admin/inc/config.php';
    $depsQuery = "SELECT `deps_id`, `deps_name`, `Deps_description` FROM `departments`";
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
<body>
    <div id="header" class="header_container">
        <?php include '../inc/navBar.php'?>
    </div>
    <div class="shop_container container">
        <header style="display: flex; justify-content: space-between;">
            <h1>Departments</h1>
            <input type="text" id="searchBox" placeholder="Search...">
        </header>
        <div id="categories" class="deps_content">
            <?php foreach($departments as $depart): ?>
                <div class="depart_box">
                    <p><?php echo $depart['deps_name']?></p>
                    <a href="showProd.php?id=<?php echo $depart['deps_id'] ?>">Go To -></a>
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
//         document.addEventListener("DOMContentLoaded", function() {
//     const categoriesElement = document.getElementById("categories")
//     const searchBox = document.getElementById("searchBox")

//     fetch('https://fakestoreapi.com/products/categories')
//         .then(response => response.json())
//         .then(categories => {
//             categories.forEach(category => {
//                 const categoryDiv = document.createElement("div")
//                 categoryDiv.classList.add("category")

//                 const categoryName = document.createElement("h2")
//                 categoryName.textContent = category
//                 categoryDiv.appendChild(categoryName)

//                 const showAllLink = document.createElement("a")
//                 showAllLink.textContent = "Show All"
//                 showAllLink.href = `product.html?category=${category}`
//                 categoryDiv.appendChild(showAllLink)

//                 categoriesElement.appendChild(categoryDiv)
//             })
//         })
//         .catch(error => console.error('Error fetching categories:', error))

//     searchBox.addEventListener("input", function() {
//         const searchTerm = searchBox.value.toLowerCase()
//         const categoryDivs = categoriesElement.querySelectorAll(".category")

//         categoryDivs.forEach(categoryDiv => {
//             const categoryName = categoryDiv.querySelector("h2").textContent.toLowerCase()
//             if (categoryName.includes(searchTerm)) {
//                 categoryDiv.style.display = "block"
//             } else {
//                 categoryDiv.style.display = "none"
//             }
//         })
//     })
// })

    </script>
    <script src="script.js"></script>
    <?php include "../inc/script.php" ?>
</body>
</html>