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




<?php
session_start();
include('admin/connection.php');
if(isset($_SESSION['logged_in'])){
if(isset($_SESSION['phone_number'])){
  ?>
 

 <div class="content" >
	<div class="container-fluid">
	
	
	 <div class="col-md-12 mt-3">
		<div class="card" >
		  <div class="card-header card-header-primary">
		  <a  href="index.php">
               <i class="fas fa-angle-left pull-left"></i></a>
			<h5 class="card-title text-center">Orders</h5>
                </div>
              
             
             
             
  
             <div class="card-body">
               <div class="table-responsive ps">
                 <table class="table table-striped " id="prod">
                   <thead >
                     <tr >
                     <th>Name</th>
                       <th>Phone Number</th>
                       <th>Date</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>

<?php

	  $user_id= $_SESSION['phone_number'];
extract($_GET);
		
		$join_query = "SELECT `order_id`,`name`,`user_id`, `date`,`status` FROM `orders` NATURAL JOIN `user` WHERE `user_id`='$user_id' and `phone_number`='$user_id' ORDER BY `status`='requested'  DESC";
		$res_join = mysqli_query($link, $join_query);
		while(list($order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($res_join))
                        {
                        echo "<tr><td>$name</td>
                        <td>$user_id</td>";
                        echo "<td>$date</td>";
                        echo "<td>$status</td>";
   
            echo " <td>
                        <a class=' btn btn-primary btn-sm' href='order_details.php?o_idv=$order_id'>View Order Details</a>
                        </td></tr>";
                        }
}
}
else{
  header("Location:admin/login.php");
}
    
    ?></div>
    </div>