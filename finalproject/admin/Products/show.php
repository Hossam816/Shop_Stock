<?php
if(isset($_GET['id'])){
    $prodIdCode = $_GET['id'];
}else{
    echo "<h1>Error! No product ID provided.</h1>";
    die();
}

    require_once '../inc/config.php';
    $query = "SELECT p.prod_id, p.title, p.description, p.image, p.categ_id, p.department_id, d.deps_name, c.cat_name
            FROM products p
            LEFT JOIN departments d ON p.department_id = d.deps_id
            LEFT JOIN category c ON p.categ_id = c.cat_id
            WHERE p.prod_id = $prodIdCode;";

    $res = $connect->query($query);
    $products = $res->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../inc/head.php' ?>
</head>
<style>
    table{
        margin-bottom: 0 !important;
    }
    th{
        width: 25% !important;
        background-color: #E75555 !important;
        color:#fff;
        font-weight: bold !important;
    }

</style>

<body>
    <aside id="left-panel" class="left-panel">
        <?php include "../inc/aside.php" ?>
    </aside>

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <?php include '../inc/nav.php'?>
        </header>
        <div class="breadcrumbs mb-15">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                        <h1>Dashboard</h1>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">create</li>
                        </ol>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="width: 97%">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Product Id</th>
                                    <td><?php echo $products['prod_id']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Product Title</th>
                                    <td><?php echo $products['title']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td><?php echo $products['description']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Department Name</th>
                                    <td><?php echo $products['deps_name']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Image</th>
                                    <td><img src="../images/products/<?php echo $products['image'] ?>"width="200"height="200" alt=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td><?php echo $products['cat_name']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="clearfix"></div>

        <footer class="site-footer">
                <?php include '../inc/footer.php' ?>
        </footer>
    </div>

    <?php include '../inc/script.php' ?>

</body>
</html>