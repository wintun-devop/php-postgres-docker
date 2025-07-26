<?php 
require_once'config.php';
class db_class extends db_connect{
    public function __construct(){
        $this->connect();
    }
     /* Add user function*/
     public function user_register($name,$email,$password){
        $db_conn=$this->conn;
        $result=pg_query($db_conn,"INSERT  INTO users (name, email, pass) VALUES ('$name','$email','$password');"); 
    }
    public function query_user_by_email($user_email){
        $db_conn=$this->conn;
        $result=pg_query($db_conn,"SELECT * FROM users WHERE email='$user_email';");
        $row=pg_fetch_assoc($result);
        return $row;
    }
    public function login_authentication($user_email,$user_password) {
        $db_conn=$this->conn;
        $result=pg_query($db_conn,"SELECT id,email FROM users WHERE email='$user_email' AND pass='$user_password';");
        $row=pg_fetch_assoc($result);
        return $row;
    }
    /* Add product function*/
    public function product_input($productname,$vandor,$model,$price,$discount){
        $db_conn=$this->conn;
        $current_time=date('Y-m-d H:i:s');
        $result=pg_query($db_conn,"INSERT INTO products (p_name,p_vendor,p_model,p_price,p_discount,p_last_update) VALUES ('$productname','$vandor','$model','$price','$discount','$current_time');");
    }
    /* Display product function */
    public function product_output(){
        $db_conn=$this->conn;
        $result=pg_query($db_conn,"SELECT * FROM products ORDER BY pid");
        $result_row=pg_fetch_all($result);
        return $result_row;
    }
    /*update product function*/
    public function update_product($product_id,$name,$model,$vendor,$price,$discount){
        $db_conn=$this->conn;
        $current_time=date('Y-m-d H:i:s');
        $result=pg_query($db_conn,"UPDATE products SET p_name='$name',p_model='$model',p_vendor='$vendor',p_price='$price',p_discount='$discount',p_last_update='$current_time'  WHERE pid=$product_id;");    
    }
    /*Delete product function*/
    public function delete_product($product_id){
        $db_conn=$this->conn;
        $result=pg_query($db_conn,"DELETE FROM products WHERE pid=$product_id");
    }
}
?>