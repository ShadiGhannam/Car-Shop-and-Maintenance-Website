<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
$user_id= $_SESSION['phone_number'];
extract($_GET);
if($item_quantity>=$quantity){
$cart_updt = "UPDATE `cart` SET `item_id`='$item_id',`user_id`='$user_id',`quantity`='$quantity' WHERE `cart_id`='$cart_id'";
$res_cart_updt = mysqli_query($link,$cart_updt);
header("Location:cart.php");
}
else{
    echo "<script>alert('You exceeded the stock quantity'); location.replace('cart.php')</script>";

}
}
else{
    header('Location: admin/login.php');
}
    
    ?>