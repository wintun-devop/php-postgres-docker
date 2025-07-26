<?php
require_once(__DIR__ . '../../functions/classes.php');
$db=new db_class();
if(isset($_GET['pid'])){
  $pid=$_GET['pid'];
  //calling delete function from class
  $db->delete_product($pid);
  header("location: productdashboard.php");
}
?>