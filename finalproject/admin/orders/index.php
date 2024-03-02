<?php
    session_start();
?>
<?php
require_once '../inc/config.php';
$orderQuery = "SELECT o.order_id, o.order_date, o.total_amount, o.total_price,o.buyer_id, u.user_name FROM orders o INNER JOIN users u ON o.buyer_id = u.id;
";

    $ordersResult = $connect->query($orderQuery);
    $orders = $ordersResult->fetchAll(PDO::FETCH_ASSOC);

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
                                <strong class="card-title">All Products</strong>
                                <a href="create.php" class="btn btn-outline-primary btn-md">Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($orders as $order):?>
                                        <tr>
                                            <td><?php echo $order["order_id"]?></td>
                                            <td><?php echo $order["user_name"]?></td>
                                            <td><?php echo $order["total_amount"]?></td>
                                            <td><?php echo $order["total_price"]?></td>
                                            <td><?php echo $order["order_date"]?></td>                                            
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
