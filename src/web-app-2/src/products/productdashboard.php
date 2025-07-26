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
    <?php 
    require_once(__DIR__ . '../../functions/classes.php');
    $db=new db_class();
    $products=$db->product_output();
    ?>
    <div class="container">
    <div class="row">
        <div class="col md-12">
         <h2><b>Manage Products</b> <a class="btn btn-primary float-right" href="product_register.php">Add Product</a></h2>
         <table class="table table-sm table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Vendor</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
                <?php foreach( $products as $product){
                 ?> 
                <tr>
                 <td><?php echo $product['pid'] ?></td>
                 <td><?php echo $product['p_name'] ?></td>
                 <td><?php echo $product['p_model'] ?></td>
                 <td><?php echo $product['p_vendor'] ?></td>
                 <td><?php echo $product['p_price'] ?></td>
                 <td><?php echo $product['p_discount'] ?></td>
                 <td>
                     <a href="product_update.php?pid=<?php echo $product['pid'] ?>" class="btn btn-warning btn-xs">Update</a>
                     <a href="delete_product.php?pid=<?php echo $product['pid'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')">Delete</a>
                 </td>
             </tr>
             <?php }
             ?>
         </table>
       </div>
    </div>
    </div>
</body>
</html>