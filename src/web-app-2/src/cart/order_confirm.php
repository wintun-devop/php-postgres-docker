<?php 
session_start();
require_once(__DIR__ . '../../functions/shopping.php');
if(!isset($_SESSION['e-mail'])){
    header('location: ../users/login.php');
}
else{
    //update cart query to success
    $user_id=$_GET['id'];
    $shopp=new shopping();
    $shopp->order_confirm($user_id);
    header('location:../cart/cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Dashboard</title>
    <link href="../access/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../access/css/main.css" rel="stylesheet" rel="stylesheet">
    <script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<!--
<div class="container">
    <div class="row">
    <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
    </div>
</div>
-->
</body>
</html>