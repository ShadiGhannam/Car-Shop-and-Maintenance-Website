<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
$user_id= $_SESSION['phone_number'];
echo $user_id;
extract($_GET);
$cart_delt = "DELETE FROM `cart` WHERE `cart_id`='$cart_id'";
$res_cart_delt = mysqli_query($link,$cart_delt);
if($res_cart_delt){
header("Location: cart.php");
}



}
else{
    header('Location: admin/login.php');
}
    
    ?>