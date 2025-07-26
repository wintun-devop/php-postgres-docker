<?php 
require_once(__DIR__ . '../../functions/classes.php');
if (isset($_POST['product_input'])) {
    $db=new db_class();
    $product_name = $_POST['p_name'];
    $product_model = $_POST['p_model'];
    $product_vendor = $_POST['p_vendor'];
    $product_price = $_POST['p_price'];
    $product_discount = $_POST['p_discount'];
    //check price and discount
    if (($product_price > $product_discount ) and ($product_discount >= 0)) {
        //check input product model is already exit
        $db_connnection=$db->conn;
        $model_exit=pg_query($db_connnection,"SELECT * from products where p_model='$product_model';");
        if (pg_fetch_row($model_exit) > 0){
            echo $product_name . "(" . $product_model . ") is already in the system.";
        }
        else{
            $db->product_input($product_name,$product_vendor,$product_model,$product_price,$product_discount);
            header("location: productdashboard.php");
        }
    }
    else{
        echo "Error something!";
    }
}
?>