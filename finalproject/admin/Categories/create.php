<?php
    session_start();

?>
<?php
require_once '../inc/config.php';
require_once '../inc/validate.php';
$errArr = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $depName = $_POST['depName'];
    $depDescription = $_POST['depsDesc'];

    $checkforDublicat = "SELECT * FROM departments WHERE deps_name = '$depName'";
    $checkRes = $connect->query($checkforDublicat);

    if($checkRes->rowCount() > 0){
      $errArr[]="Department name already exists.";
    }else{
      $insertDepartment = "INSERT INTO `departments`( `deps_name`, `Deps_description`) VALUES ('$depName','$depDescription')";
      $inserRes = $connect->query($insertDepartment);
    }

} 


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
                  <strong>Department</strong> Create
                </div>
                <div class="card-body card-block">
                  <?php 
                    if(isset($inserRes)){
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
                        <label for="depName" class="form-control-label"
                          >Department Name</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="text"
                          id="firstN-input"
                          name="depName"
                          placeholder="Enter Your Department Name"
                          class="form-control"
                        /><small class="help-block form-text"
                          >Please enter Department Name</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="depsDesc" class="form-control-label"
                          >Description</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <textarea
                          type="text"
                          id="lastN-input"
                          name="depsDesc"
                          placeholder="Enter Your Department Desc......"
                          class="form-control"
                        ></textarea>
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
