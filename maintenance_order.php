
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AMG Maintenance</title>
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

<body>

<?php 
include('admin/connection.php');
session_start();

	
	?>

  <div class="content" >
        <div class="container-fluid">
        
        
         <div class="col-md-12 mt-3">
            <div class="card" >
              <div class="card-header card-header-primary">
			  <a  href="index.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="card-title text-center"> Maintenance Order List</h5>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                    <div class="card-header card-header-primary">
      <h5 class="card-title"> Requested Orders</h5>  
                      <tr>
                        <th>Costumer Name</th>
                        <th>Phone Number</th>
                        <th>Date</th>
                        <th>Status</th>
					 
						<th>Order Details</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 

if(!isset($_SESSION['phone_number'])){
header('Location: admin/login.php');
}



if (isset($_SESSION['logged_in'])){

  $user_id= $_SESSION['phone_number'];
$query = "SELECT `main_order_id`,`name`,`user_id`,`date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where `user_id`=`phone_number` and `user_id`='$user_id' and `status`='requested'";
$result = mysqli_query($link, $query);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td>";
			echo "<td>$status</td>";

	
				
				echo "<td><a class=' btn btn-primary btn-sm' href='main_order.php?maint_idv=$main_order_id'>Maintenance Details</a>
				</td>
				</tr>";
				}
				echo '<table class="table table-striped " id="prod">
				<thead class=""> </br>
		</br>
		<div class="card-header card-header-primary">
		<h5 class="card-title"> Approved Orders</h5>   <tr>
					<th>Costumer Name</th>
					<th>Phone Number</th>
					<th>Date</th>
				
					<th>Status</th>
				
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';
        $user_id= $_SESSION['phone_number'];
			$query2 = "SELECT `main_order_id`,`name`,`user_id`,`date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where `user_id`=`phone_number` and `user_id`='$user_id' and `status`='approved'";
$result2 = mysqli_query($link, $query2);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result2))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td><td>$status</td>";

	
				
				echo "<td><a class=' btn btn-primary btn-sm' href='main_order.php?maint_idv=$main_order_id'>Maintenance Details</a>
				</td></tr>";
				}
        echo '<table class="table table-striped " id="prod">
				<thead class=""> </br>
		</br>
		<div class="card-header card-header-primary">
		<h5 class="card-title"> Finished Orders</h5>   <tr>
					<th>Costumer Name</th>
					<th>Phone Number</th>
					<th>Date</th>
				
					<th>Status</th>
				
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';
        $user_id= $_SESSION['phone_number'];
			$query2 = "SELECT `main_order_id`,`name`,`user_id`,`date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where `user_id`=`phone_number` and `user_id`='$user_id' and `status`='finished'";
$result2 = mysqli_query($link, $query2);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result2))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td><td>$status</td>";

	
				
				echo "<td><a class=' btn btn-primary btn-sm' href='main_order.php?maint_idv=$main_order_id'>Maintenance Details</a>
				</td></tr>";
				}
				echo '<table class="table table-striped " id="prod">
				<thead class="">
				</br>
				</br>
				<div class="card-header card-header-primary">
				<h5 class="card-title"> Paid Orders</h5>  
				  <tr>
					<th>Costumer Name</th>
					<th>Phone Number</th>
					<th>Date</th>
			
					<th>Status</th>
			
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';
        $user_id= $_SESSION['phone_number'];
				$query3 = "SELECT `main_order_id`,`name`,`user_id`,`date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where `user_id`=`phone_number` and `user_id`='$user_id' and `status`='paid'";
				$result3 = mysqli_query($link, $query3);
				
				while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result3))
								{
								echo "<tr><td>$name</td><td>$user_id</td>";
								echo "<td>$date</td><td>$status</td>";
				
						
					
								
								echo "<td><a class=' btn btn-primary btn-sm' href='main_order.php?maint_idv=$main_order_id'>Maintenance Details</a>
								</td></tr>";
								}
			
	mysqli_close($link);

 }