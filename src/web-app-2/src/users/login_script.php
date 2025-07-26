<?php 
require_once(__DIR__ . '../../functions/classes.php');
$db=new db_class();
$db_connnection=$db->conn;
session_start();
if (isset($_POST['login_data'])){
    $login_email=$_POST['login-mail'];
    $login_password=$_POST['login-password'];
    //checking email
    $email_result=pg_query($db_connnection,"SELECT * from users where email='$login_email';");
    if (pg_fetch_row($email_result) > 0) {
        //checking email and password
        $email_password_query=pg_query($db_connnection,"SELECT * FROM users WHERE email='$login_email' AND pass='$login_password';");
        if (pg_fetch_row($email_password_query) > 0){
            $results=$db->login_authentication($login_email,$login_password);
            $_SESSION['e-mail']=$results['email'];
            $_SESSION['id']=$results['id'];  //user id
            header('location:../cart/products.php');
            /*
            //session output test
            echo $_SESSION['login-mail'];
            echo $_SESSION['id']=$results['id'];
            */ 
        }
        else{
            echo "Password is in correct";
            header('location: login.php');
        }
    }
    //email not registered or incorrect
    else{
        echo"Email has not been registered!";
        header('location: login.php');   
    }

}
?>