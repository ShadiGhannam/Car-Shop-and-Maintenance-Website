<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
if(isset($_SESSION['phone_number'])){
   
   $user_id= $_SESSION['phone_number'];
extract($_GET);
$cart_item_user ="SELECT item.item_id,`item_name`,`item_price`,`image`,item.quantity,cart.quantity FROM `cart` JOIN `item` JOIN `user` WHERE cart.user_id='$user_id' and cart.user_id=user.phone_number and item.item_id=cart.item_id";

$res_join = mysqli_query($link, $cart_item_user);
if(mysqli_num_rows($res_join)>=1){ 
    $date =date("Y-m-d");
    $order_inst ="INSERT INTO `orders`(`user_id`, `date`, `status`) VALUES ('$user_id','$date','requested')";
    $res_order = mysqli_query($link,$order_inst);
    $order_id = mysqli_insert_id($link);
    
    echo date("Y-m-d");

    
while(list($item_id,$item_name,$item_price,$image,$item_quantity,$cart_quantity)=mysqli_fetch_array($res_join))
{
    if($cart_quantity<=$item_quantity){
    $totalprice = $totalprice + ($item_price * $quantity);
    $order_details_inst = "INSERT INTO `order_details`(`order_id`, `item_id`, `user_id`, `quantity`) 
    VALUES ('$order_id','$item_id','$user_id','$cart_quantity')";
    $res_order_details = mysqli_query($link,$order_details_inst);
    $totalquantity = $item_quantity - $cart_quantity;
    $upd_item = "UPDATE item SET quantity='$totalquantity' WHERE item_id='$item_id'";
    $res_item = mysqli_query($link,$upd_item);
    $delete_cart = "DELETE FROM cart WHERE user_id='$user_id' AND item_id='$item_id'";
    $res_cart = mysqli_query($link,$delete_cart);
    }else{
        "<script>alert('Some Items have exceeded our stock quantity'); location.replace('maintenance_type.php')</script>";
  
    } 
}
header("Location: orders.php");  
}

else{
 
    header("Location: index.php");  
}
 


}
    
}
    
else{
    header('Location: admin/login.php');
}
    
    ?>