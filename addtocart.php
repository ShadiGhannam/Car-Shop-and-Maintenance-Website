<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
if(isset($_SESSION['phone_number'])){
   
   $user_id= $_SESSION['phone_number'];
extract($_GET);
$cart_sel="SELECT * FROM `cart` WHERE `item_id`='$i_id' AND `user_id`=$user_id";
$res_cart_sel = mysqli_query($link, $cart_sel);
$row =mysqli_fetch_array($res_cart_sel);

    if($row['item_id']==$i_id){
        echo "<script>alert('This Item Already In your Cart.'); location.replace('viewitem.php?i_idv=".$i_id."')</script>";
    }
    else if($item_quantity<$quant){
        echo "<script>alert('You exceeded the stock quantity'); location.replace('viewitem.php?i_idv=".$i_id."')</script>";
    }
else{


$cart_inst ="INSERT INTO `cart`(`item_id`, `user_id`, `quantity`) VALUES ('$i_id','$user_id','$quant')";
$res_cart = mysqli_query($link, $cart_inst);
header("Location: cart.php");
}
}
    
}
    
else{
    header('Location: admin/login.php');
}
    
    ?>