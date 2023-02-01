<?php
session_start();
if(!isset($_SESSION['phone_number'])){
	header('Location: item.php');
	}
if (isset($_SESSION['logged_in'])){
    require_once('../admin/connection.php');
    
$main_id=$_GET['i_idv'];
$status=$_GET['st'];
$query = "SELECT `status` FROM `maintenance_order` WHERE main_order_id=$main_id";
$result = mysqli_query($link, $query);
	
while(list($status)=mysqli_fetch_array($result))
                {
if($status=='requested'){
    $q = "UPDATE `maintenance_order` SET `status`='approved' WHERE main_order_id=$main_id";
    $result=mysqli_query($link,$q);
    header("Location:maintenance_order.php");
}
if($status=='approved'){
    $q = "UPDATE `maintenance_order` SET `status`='finished' WHERE main_order_id=$main_id";
    $result=mysqli_query($link,$q);
    header("Location:maintenance_order.php");
}
if($status=='finished'){
    $q = "UPDATE `maintenance_order` SET `status`='paid' WHERE main_order_id=$main_id";
    $result=mysqli_query($link,$q);
    header("Location:maintenance_order.php");
}

}
}
?>