<?php 
session_start();
require_once(__DIR__ . '../../functions/shopping.php');
$item_id=$_GET['id'];
$user_id=$_SESSION['id'];
//caling class from shopping
$shopp=new shopping();
$shopp->remove_cart($user_id,$item_id);
header('location:../cart/products.php');
?>