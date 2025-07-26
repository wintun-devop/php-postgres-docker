<?php 
require_once(__DIR__ . '../../functions/classes.php');
$db=new db_class();
if (isset($_POST['product_update'])) {
    $pid= $_POST['pid'];
    $product_name = $_POST['p_name'];
    $product_model = $_POST['p_model'];
    $product_vendor = $_POST['p_vendor'];
    $product_price = $_POST['p_price'];
    $product_discount = $_POST['p_discount'];
    //check price and discount
    if (($product_price > $product_discount ) and ($product_discount >= 0)) {
            $db->update_product($pid,$product_name,$product_model,$product_vendor,$product_price,$product_discount);
            header("location: productdashboard.php");
    }
    else{
        echo "Product Price and discount values are missing.";
    }
}
?>