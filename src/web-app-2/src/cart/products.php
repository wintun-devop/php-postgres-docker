<?php 
session_start();
require_once(__DIR__ . '../../functions/classes.php');
require_once(__DIR__ . '../../functions/shopping.php');
$shopp=new shopping();
$db=new db_class();
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
<?php require 'header.php';?>
<div class="container">
    <div class="row">
    <?php
    $product_query=$db->product_output();
foreach ($product_query as $value) {
    ?>
        <div class="col-md-3 mt-3">
                <div class="card">
                        <img src="../media/images/products/<?php echo $value['img_location'] ?>" alt="" class="card-img-top" height="200" alt="">
                        <div class="card-body">
                            <?php
                            if ($value['p_discount'] > 0) {
                                ?>
                            <h4 style="text-shadow:1px 1px 2px #000; color:#f00; transform:rotate(-20deg); position:absolute; top:10%; left:20%">Discount:<?php echo $value['p_discount'] ?></h4>
                            <?php
                            }
                            ?>
                            <h6 class="text-center"><?php echo $value['p_name'] ?></h6>
                            <p class="text-center">Price:<?php echo $value['p_price']?><p>
                        </div>
                        <div class="card-foorter">
                            <!--sessionはあるかどうか調べることです。-->
                            <?php if(!isset($_SESSION['e-mail'])){?>
                                <a href="../users/login.php" class="btn btn-block btn-primary">Buy Now</a>
                            <?php }
                            else{
                                $cart_id=$shopp->check_cart($value['pid']);
                                if ($cart_id){
                            ?>
                                    <a href="cart_remove.php?id=<?php echo $value['pid'] ?>" class="btn btn-block btn-warning" disable>Remove cart</a>
                            <?php
                                }
                                else{
                            ?>
                                    <a href="cart_add.php?id=<?php echo $value['pid'] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                            <?php
                                } 
                            }
                            ?>
                                
                        </div>
                </div>
        </div>
    <?php
        }
     ?>
    </div>
</div>
</body>
</html>