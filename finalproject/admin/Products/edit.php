<?php
  if(isset($_GET['id'])){
    $prodIdCode = $_GET['id'];
} else {
    echo "<h1>Error! No product ID provided.</h1>";
    die();
}

  require_once "../inc/config.php";

  $editSql = "SELECT p.prod_id, p.title, p.description, p.categ_id, p.department_id, p.price, p.stock
            FROM products p
            WHERE p.prod_id = $prodIdCode;";
  $allProdDepartments = "SELECT DISTINCT d.deps_id, d.deps_name 
            FROM departments d";
  $allProdCategories = "SELECT DISTINCT c.cat_id, c.cat_name 
            FROM category c";

  $depsRes = $connect->query( $allProdDepartments );
  $catRes = $connect->query( $allProdCategories );
  $res = $connect->query( $editSql );
  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodTitle = $_POST['prodTitle'];
    $prodDescription = $_POST['prodDesc'];
    $prodDepartments = $_POST['prodDeps'];
    $prodCat = $_POST['prodcat'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $inserProduct= "UPDATE `products` SET `title`='$prodTitle',`description`='$prodDescription',`department_id`='$prodDepartments',`categ_id`='$prodCat',`price`='$prodPrice',`stock`='$prodStock' WHERE prod_id = $prodIdCode";
    $insertRes = $connect->query($inserProduct);
}

  $departments = $depsRes->fetchAll(PDO::FETCH_ASSOC);
  $categories = $catRes->fetchAll(PDO::FETCH_ASSOC);
  $products = $res->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <?php include '../inc/head.php' ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  </head>
  <body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
      <?php include "../inc/aside.php" ?>
    </aside>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <?php include '../inc/nav.php'?>
      </header>
      <!-- /header -->
      <!-- Header-->

      <div class="breadcrumbs">
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
                    <li class="active">Basic</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="animated fadeIn">
          <div class="container-fluid width-100">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Products</strong> Elements
                </div>
                <div class="card-body card-block">

                <?php 
                    if(isset($insertRes)){
                  ?>
                    <div class="alert alert-success">
                      Record Updated Successfully
                    </div>
                  <?php }; ?>
                  <?php 
                    if(isset($errArr) && !empty($errArr)) {
                  ?>
                    <div class="alert alert-danger">
                      <?php foreach($errArr as $err){ ?>
                        <li><?php echo $err?></li>
                      <?php };?>
                    </div>
                  <?php }; ?>

                  <form
                    action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
                    method="post"
                    enctype="multipart/form-data"
                    class="form-horizontal"
                  >
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodTitle" class="form-control-label"
                          >Product Name</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="text"
                          id="firstN-input"
                          name="prodTitle"
                          placeholder="Enter Your First Name"
                          class="form-control"
                          value="<?php echo $products['title'] ?>"
                        /><small class="help-block form-text"
                          >Please enter Product Name</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodDesc" class="form-control-label"
                          >Description</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <textarea
                          type="text"
                          id="lastN-input"
                          name="prodDesc"
                          placeholder="Enter Your Last Name"
                          class="form-control"
                        ><?php echo $products['description'] ?></textarea>
                        <small class="help-block form-text"
                          >Please enter Product Description</small
                        >
                      </div>
                    </div>
                    
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="deps" class="form-control-label"
                          >Departments</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="prodDeps" id="select" class="form-control">
                            <?php foreach ($departments as $depart) : ?>
                                <?php if ($depart['deps_id'] == $products['department_id']) : ?>
                                    <option value="<?php echo $depart['deps_id'] ?>" selected><?php echo $depart['deps_name'] ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $depart['deps_id'] ?>"><?php echo $depart['deps_name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodCat" class="form-control-label"
                          >Category</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="prodcat" id="select" class="form-control">
                            <?php foreach ($categories as $prodCategory) : ?>
                                <?php if ($prodCategory['cat_id'] == $products['categ_id']) : ?>
                                    <option value="<?php echo $prodCategory['cat_id'] ?>" selected><?php echo $prodCategory['cat_name'] ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $prodCategory['cat_id'] ?>"><?php echo $prodCategory['cat_name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodPrice" class="form-control-label"
                          >Price</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="number"
                          id="lastN-input"
                          name="prodPrice"
                          placeholder="Enter Your Product Name"
                          class="form-control"
                          value="<?php echo $products['price'];?>"
                        />
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodStock" class="form-control-label"
                          >Stock</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="number"
                          id="lastN-input"
                          name="prodStock"
                          placeholder="Enter Your Product Name"
                          class="form-control"
                          value="<?php echo $products['stock'];?>"
                        />
                      </div>
                    </div>

                    <hr>
                    <div class="row form-group">
                      <button type="submit" class="btn btn-success btn-sm">
                        Submit
                      </button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- .animated -->
      </div>
      <!-- .content -->

      <div class="clearfix"></div>

      <footer class="site-footer">
            <?php include '../inc/footer.php' ?>
      </footer>
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <?php include '../inc/script.php' ?>
  </body>
</html>
