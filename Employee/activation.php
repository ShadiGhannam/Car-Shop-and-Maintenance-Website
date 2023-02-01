<?php
session_start();
if(!isset($_SESSION['phone_number'])){
	header('Location: item.php');
	}
if (isset($_SESSION['logged_in'])){
    require_once('../admin/connection.php');
    
$order_id=$_GET['i_idv'];
$status=$_GET['st'];
$query = "SELECT `status` FROM `orders` WHERE order_id=$order_id";
$result = mysqli_query($link, $query);
	
while(list($status)=mysqli_fetch_array($result))
                {
if($status=='requested'){
    $q = "UPDATE `orders` SET `status`='approved' WHERE order_id=$order_id";
    $result=mysqli_query($link,$q);
    header("Location:order.php");
}
if($status=='approved'){
    $q = "UPDATE `orders` SET `status`='paid' WHERE order_id=$order_id";
    $result=mysqli_query($link,$q);
    header("Location:order.php");
}


}
}
?>