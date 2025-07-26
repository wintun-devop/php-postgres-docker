<?php 
session_start();
require_once(__DIR__ . '../../functions/shopping.php');
require_once(__DIR__ . '../../functions/classes.php');
$shopp=new shopping;
$db=new db_class;
$db_connection=$db->conn;
$user_id=$_SESSION['id'];
$user_products_query=pg_query($db_connection,"SELECT a.pid,a.p_name,a.p_price,b.order_status,b.order_date from orders b inner join products a on a.pid=b.product_id where b.user_id=$user_id");
$no_of_user_products=pg_num_rows($user_products_query);
$sum=0;
if($no_of_user_products==0){
    //echo "Add items to cart first.";
?>
    <script>
    window.alert("No items in the cart!!");
    </script>
<?php
}else{
    while($row=pg_fetch_assoc($user_products_query)){
        $sum=$sum+$row['p_price']; 
   }
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
<div class="container">
    <div class="row">
    <h2><a class="btn btn-primary float-right" href="products.php">Back to Products</a></h2>
        <div class="col md-12">
            <table class="table table-sm table-dark table-hover">
            <thead>
                <tr>
                    <th>Item Number</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $user_products_query=pg_query($db_connection,"SELECT a.pid,a.p_name,a.p_price,b.order_status,b.order_date from orders b inner join products a on a.pid=b.product_id where b.user_id=$user_id");
                    $counter=1;
                    while($row=pg_fetch_assoc($user_products_query)){
                    ?>
                    <tr>
                        <th><?php echo $counter ?></th>
                        <th><?php echo $row['p_name']?></th>
                        <th><?php echo $row['p_price']?></th>
                        <th><?php echo $row['order_status']?></th>
                    </tr>
                    <?php $counter=$counter+1;}?>
                </tr>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th>Ks <?php echo $sum;?>/-</th>
                    <?php $order_confirm_result=$shopp->check_order_confirm($user_id);
                    if($order_confirm_result > 0){
                    ?>
                    <th><a href="order_confirm.php?id=<?php echo $user_id?>" class="btn btn-primary">Confirm Order</a></th>
                    <?php
                    }
                    else{
                    ?>
                    <th><a href="products.php" class="btn btn-primary">Go Porduct</a></th>
                    <?php
                    }
                    ?>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>