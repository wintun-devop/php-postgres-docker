<?php 
session_start();
require_once(__DIR__ . '../../functions/classes.php');
if(!isset($_SESSION['e-mail'])){
    header('location:../users/login.php');
}
$old_password= $_POST['oldPassword'];
$new_password= $_POST['newPassword'];
$email=$_SESSION['e-mail'];
$db=new db_class();
$db_connection=$db->conn;
//echo $email;
//check the old password first
$old_password_query=pg_query($db_connection,"SELECT pass FROM users WHERE email='$email'");
$row=pg_fetch_assoc($old_password_query);
if ($row['pass']==$old_password) {
    $update_password_query=pg_query($db_connection, "UPDATE users SET pass='$new_password' WHERE email='$email';");
    header('location:../cart/products.php');
}   
else{
    echo"Password is Wrong and Try Again!";
    header('location: change_pass.php');   
}
?>