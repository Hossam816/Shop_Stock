<?php
    session_start();

?>
<?php
if(isset($_GET['id'])){
    $prodIdCode = $_GET['id'];
} else {
    echo "<h1>Error! No product ID provided.</h1>";
    die();
}

require_once '../inc/config.php';

// Delete the product from the database
$query = "DELETE FROM departments WHERE deps_Id = '$prodIdCode'";
$res = $connect->query($query);

if($res){
    header("Location: index.php");
}
?>
