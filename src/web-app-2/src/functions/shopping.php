<?php 
class shopping{
    //check cart for on login
    function check_cart($item_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $user_id=$_SESSION['id'];
        $result=pg_query($db_connection,"SELECT * FROM orders WHERE product_id=$item_id AND user_id=$user_id AND order_status='Added to cart'");
        $num_rows=pg_fetch_row($result);
        if($num_rows>=1)return 1;
            return 0;
    }
    //add cart for shopping
    function add_cart($user_id,$product_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $current_time=date('Y-m-d H:i:s');
        $add_to_cart_query="INSERT INTO orders (user_id,product_id,order_status,order_date) VALUES ('$user_id','$product_id','Added to cart','$current_time')";
        $add_to_cart_result=pg_query($db_connection,$add_to_cart_query);
    }
    //remove cart for shopping
    function remove_cart($user_id,$item_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $delete_query=pg_query($db_connection,"DELETE FROM orders WHERE user_id=$user_id AND product_id=$item_id");
    }
    /*
    function order_confirm($user_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $order_confirm=pg_query($db_connection,"UPDATE orders SET order_status='Confirmed' WHERE user_id=$user_id");
    }
    */
    function check_order_confirm($user_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $check_order_status_query=pg_query($db_connection,"SELECT * FROM orders WHERE order_status='Added to cart' AND user_id=$user_id");
        $check_order_status_result=pg_num_rows($check_order_status_query);
        return $check_order_status_result;
    }
    //order confirmation and get update to transaction table
    function order_confirm($user_id){
        require_once'classes.php';
        $db=new db_class();
        $db_connection=$db->conn;
        $current_time=date('Y-m-d H:i:s');
        $check_confirm_status_query=pg_query($db_connection,"SELECT * FROM orders WHERE order_status='Added to cart' AND user_id=$user_id");
        $check_confirm_status_result=pg_fetch_all($check_confirm_status_query);
        $check_confirm_count_result=pg_num_rows($check_confirm_status_query);
        if($check_confirm_count_result>0){
            foreach($check_confirm_status_result as $value){
                $temp_user_id=$value['user_id'];
                $temp_order_id=$value['order_id'];
                $temp_product_id=$value['product_id'];
                //$delete_confirm_from_order=pg_query($db_connection,"DELETE FROM orders WHERE order_status='Confirmed' AND user_id=$user_id");
                $order_confirm=pg_query($db_connection,"UPDATE orders SET order_status='Confirmed' WHERE user_id=$user_id");
                $add_confirm_to_transaction=pg_query($db_connection,"INSERT  INTO transation_detail (user_id, order_id, product_id,transaction_date) VALUES ('$temp_user_id','$temp_order_id','$temp_product_id','$current_time');");
            }
        }

    }
}
?>