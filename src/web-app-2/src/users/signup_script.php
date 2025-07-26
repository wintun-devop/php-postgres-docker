<?php 
require_once(__DIR__ . '../../functions/classes.php');
session_start();
if (isset($_POST['input_data'])) {
    $db=new db_class();
    $name = $_POST['name'];
    $email= $_POST['e-mail'];
    $password= $_POST['Password'];
    $confirm_password= $_POST['ConfirmPassword'];
    //(1-password matching check)
    if($password === $confirm_password){
        //(2-email checking in already exist)
        $db_connnection=$db->conn;
        $email_exist=pg_query($db_connnection,"SELECT * from users where email='$email';");
        if (pg_fetch_row($email_exist) > 0){
            echo $email . " is already registered.";
            header('location:signup.php');
        }
        else{
        //(3-input customer if e-mail is valided and redirect to success page.)
            $db->user_register($name,$email,$password); //calling class function for register customer
            echo "User has been registered successfully!.";
            //calling user query function for session variables
            $user_quer_for_session=$db->query_user_by_email($email);
            $_SESSION['id']=$user_quer_for_session['id'];
            $_SESSION['e-mail']=$user_quer_for_session['email'];
            /*
            //Testing session variable output
            echo $_SESSION['id'];
            echo $_SESSION['e-mail'];
            */
            header('location:../cart/products.php');
        }
    }   
}
?>