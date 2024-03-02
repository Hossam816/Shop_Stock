<?php
    session_start();

?>
<?php
require_once '../inc/config.php';

// SQL query to count the number of products for each department
$numOfProdSql = "SELECT d.deps_id, d.deps_name, COUNT(p.prod_id) AS num_products
        FROM departments d
        LEFT JOIN products p ON d.deps_id = p.department_id
        GROUP BY d.deps_id";

$depStmt = $connect->query($numOfProdSql);

$depResult = $depStmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as

// Show all product departments with category names
$sqlDeps = "SELECT D.*
            FROM departments D";

// Prepare the statement to prevent SQL injection
$stmt = $connect->query($sqlDeps);

// Fetch the product details
$productCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include '../inc/head.php'?>

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
      <?php include "../inc/aside.php" ?>
    </aside>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <?php include '../inc/nav.php'?>
        </header><!-- /header -->
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
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Basic table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Departments</strong>
                                <a href="create.php" class="btn btn-outline-primary btn-md">Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Department Id</th>
                                            <th scope="col">Department Name</th>
                                            <th scop="col">Num.Products</th>
                                            <th scop="col">Active</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($productCategories as $product):?>
                                    <tr>
                                        <td><?php echo $product["deps_id"]?></td>
                                        <td><?php echo $product["deps_name"]?></td>
                                        <?php 
                                        // Find the matching department in $depResult and display the number of products
                                        $num_products = 0;
                                        foreach($depResult as $res) {
                                            if ($res['deps_id'] == $product['deps_id']) {
                                                $num_products = $res['num_products'];
                                                break; // Exit the loop once the department is found
                                            }
                                        }
                                        ?>
                                        <td><?php echo $num_products; ?></td>
                                        <td style="height:100%; width:100%; display:flex;flex-direction:row;flex-wrap:wrap; justify-content:space-between;gap: 5px">
                                            <a href="edit.php?id=<?php echo $product['deps_id']?>" class="btn btn-secondary">Edit</a>
                                            <a href="delete.php?id=<?php echo $product['deps_id']?>" class="btn btn-danger confirm-del">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<footer class="site-footer">
    <?php include '../inc/footer.php' ?>
</footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
    <?php include '../inc/script.php' ?>

    
 <script src="../assets/js/lib/data-table/datatables.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/jszip.min.js"></script>
<script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="../assets/js/init/datatables-init.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
  <script>
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });

    $(document).on('click', '.confirm-del', function(e) {
        var confDele = confirm("Are you Sure to delete this data?");
        if (!confDele) {
            e.preventDefault(); // Prevent the default action of the button (e.g., following the link)
        }
    });
  </script>
</body>
</html>
