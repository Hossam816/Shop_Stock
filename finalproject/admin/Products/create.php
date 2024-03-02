<?php
    session_start();

?>
<?php

require_once '../inc/config.php';
require_once '../inc/validate.php';

    //show all prod department
    $sqlProds = "SELECT p.*, d.deps_name 
        FROM products p 
        INNER JOIN departments d ON p.department_id = d.deps_id";
    //show all departments
    $sqlDeps = "SELECT DISTINCT d.deps_id, d.deps_name 
            FROM departments d";
    $queryDep = $connect->query($sqlDeps);
    // Prepare the statement to prevent SQL injection

    //show all category
    $sqlCat = "SELECT DISTINCT c.cat_id, c.cat_name 
            FROM category c";
    $queryCat = $connect->query($sqlCat);

    $stmt = $connect->query($sqlProds);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errArr = []; // Store all errors
    $prodId = $_POST['prodId'];
    $prodTitle = $_POST['prodTitle'];
    $prodDescription = $_POST['prodDesc'];
    $prodDepartments = $_POST['prodDeps'];
    $prodCat = $_POST['prodcat'];
    $prodPrice = $_POST['prodPrice'];
    $image_name = $_FILES["image"]["name"];
    $temp = $_FILES['image']['tmp_name'];
    
    // Split the image name to get the extension
    $image_parts = explode('.', $image_name);
    $ext = end($image_parts); // Get the last element of the array
    $ext = strtolower($ext);
    if(in_array($ext, ['jpg', 'png', 'jpeg'])){
        // Define the directory based on the selected category
        $directory = '';
        switch ($prodCat) {
            case "1111":
                $directory = "../images/Products/men/";
                break;
            case "1112":
                $directory = "../images/Products/Women/";
                break;
            case "1113":
                $directory = "../images/Products/electronic/";
                break;
            case "1114":
                $directory = "../images/Products/jewellry/";
                break;
            default:
                $directory = "../images/Products/bags/";
                break;
        }
        // Move the uploaded file to the appropriate directory
    } else {
      $errArr['image'] = "Invalid Image Format. Please upload";
    }

    $image_path = $directory . $image_name;

    //duplicateId($prodId);

    if(empty($errArr)){
      move_uploaded_file($temp, $directory . $image_name);
      $inserProduct= "INSERT INTO `products`(`prod_id`, `title`, `description`,`department_id`,`image`,`categ_id`, `price`) VALUES ($prodId,'$prodTitle','$prodDescription',$prodDepartments,'$image_path' ,$prodCat,$prodPrice);";
      $insertRes = $connect->query($inserProduct);
    }
}

    // Fetch the user's details

    $productDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $prodDepartments = $queryDep->fetchAll(PDO::FETCH_ASSOC);
    $categories = $queryCat->fetchAll(PDO::FETCH_ASSOC);

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
                      Record Inserted Successfully
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
                        <label for="prodId" class="form-control-label"
                          >Product ID</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="number"
                          id="text-input"
                          name="prodId"
                          placeholder="ID Here"
                          class="form-control"
                        /><small class="form-text text-muted"
                          >Enter Product ID</small
                        >
                      </div>
                    </div>
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
                          placeholder="Enter Your Product Name"
                          class="form-control"
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
                          placeholder="Enter Your Product Name"
                          class="form-control"
                        ></textarea>
                        <small class="help-block form-text"
                          >Please enter your last name</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="image" class="form-control-label"
                          >Product Image</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="file"
                          id="file-input"
                          name="image"
                          class="form-control-file"
                        />
                      </div>
                    </div>
                    
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodDeps" class="form-control-label"
                          >Departments</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="prodDeps" id="select" class="form-control">
                          <option value="0">Please Select  Department</option>
                          <?php foreach ($prodDepartments as $depart) : ?>
                            <option value="<?php echo $depart['deps_id']?>"><?php echo $depart['deps_name']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="prodcat" class="form-control-label"
                          >Category</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="prodcat" id="select" class="form-control">
                          <option value="0">Please Select Category</option>
                          <?php foreach ($categories as $prodCategory) : ?>
                            <option value="<?php echo $prodCategory['cat_id']?>"><?php echo $prodCategory['cat_name']?></option>
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
