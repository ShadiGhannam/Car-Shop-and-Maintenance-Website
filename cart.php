<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AMG Shop</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/seniorproject/css/fontawesome-free-6.2.1-web/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/seniorproject/css/Ecommerce-Template-Bootstrap-master/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/seniorproject/css/Ecommerce-Template-Bootstrap-master/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/seniorproject/css/Ecommerce-Template-Bootstrap-master/css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>

         
<div class="content">
        <div class="container-fluid">
        <div class="col-md-12 mt-3 ">
            <div class="card ">
              <div class="card-header card-header-primary ">
              <a  href="index.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="card-title text-center">Cart Information</h5>
              </div>
           
           

           <div class="card-body">
             <div class="table-responsive ps">
               <table class="table table-striped " id="prod">
                 <thead class="">
                   <tr>
                   <th>Item Image</th>
                     <th>Item Name</th>
                     <th>Item Price</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                     <th>Update</th>
                     <th>Remove</th>
                   </tr>
                 </thead>
                 <tbody>



<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
if(isset($_SESSION['phone_number'])){
   
$user_id= $_SESSION['phone_number'];
$join_query ="SELECT `cart_id`,`image`,cart.item_id,item.quantity,`item_name`,`item_price`,cart.quantity FROM `cart` JOIN `item` JOIN `user` WHERE cart.user_id='$user_id' and cart.user_id=user.phone_number and item.item_id=cart.item_id";
$res_join = mysqli_query($link, $join_query);
$total_price=0;
while(list($cart_id,$image,$item_id,$item_quantity,$item_name,$item_price,$quantity)=mysqli_fetch_array($res_join))
{
  $price=$item_price*$quantity;
$total_price =$total_price + ($item_price*$quantity);
echo "<tr>
<td><img src='admin/images/$image' style='width:50px; height:50px;'></td>
<td>$item_name</td>
<td>$item_price$</td><form action='updatecart.php' class='d-flex justify-content-left'>
<input type='hidden' name='cart_id' value='$cart_id'/>
<input type='hidden' name='item_id' value='$item_id'/>
<input type='hidden' name='item_quantity' value='$item_quantity'/>
<td><input type='number' name='quantity' value='$quantity'/></td>
<td>$price$</td>
<td>
<button type='submit' id='btn_all' name='btn_all' class='btn btn-primary btn-md my-0 p'>Update Quantity</button></form>
      </td>
<td>
  <a class=' btn btn-primary btn-sm' href='removecart.php?cart_id=$cart_id'>Remove From Cart</a>
      </td>
</tr>";
}
echo '<tr><th>Total</th><th></th><th></th><th></th><th>'.$total_price.'$</th></tr>';
echo '</table>' ;
 echo '<footer><a href="ordernow.php" class="btn btn-primary btn-sm">Place Order</a>
</footer>';
    }
}
    
else{
    header('Location: admin/login.php');
}
    
    ?>