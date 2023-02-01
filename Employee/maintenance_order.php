
<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php 
require_once('../admin/connection.php');
include('../admin/header.php');	
	include('contain.php');
	include('../admin/head.php');
	?>
  <div class="content" >
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card" >
              <div class="card-header card-header-primary">
                <h5 class="card-title"> Maintenance Order List</h5>
                
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
                        <th></th>
                        <th>Status</th>   <th></th>
                        <th></th>
					    <th>Action</th>
						<th>Order Details</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 

if(!isset($_SESSION['phone_number'])){
header('Location: ../index.php');
}



if (isset($_SESSION['logged_in'])){


$query = "SELECT `main_order_id`,`name`,`user_id`, `date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where maintenance_order.user_id=user.phone_number and `status`='requested'";
$result = mysqli_query($link, $query);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td>";
				echo "<td class='text-success'>requested</td><td class='text-danger'>approved</td><td class='text-danger'>finished</td><td class='text-danger'>paid</td>";

					echo "<td><a class='btn btn-primary btn-sm' href='mainactivation.php?i_idv=$main_order_id&st=$status'>Approve Order</a></td>";
	
				
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
					<th></th>
					<th>Status</th>
					<th></th>
					<th></th>
					<th>Action</th>
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';
			$query2 = "SELECT `main_order_id`,`name`,`user_id`, `date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where maintenance_order.user_id=user.phone_number and `status`='approved'";
$result2 = mysqli_query($link, $query2);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result2))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td>";
				echo "<td class='text-success'>requested</td><td class='text-success'>approved</td><td class='text-danger'>finished</td><td class='text-danger'>paid</td>";

					echo "<td><a class=' btn btn-primary btn-sm' href='mainactivation.php?i_idv=$main_order_id&st=$status'>Finish</a></td>";
	
				
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
					<th></th>
					<th>Status</th>
					<th></th>	<th></th>
					<th>Action</th>
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';
			$query4 = "SELECT `main_order_id`,`name`,`user_id`, `date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where maintenance_order.user_id=user.phone_number and `status`='finished'";
$result4 = mysqli_query($link, $query4);

while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result4))
				{
				echo "<tr><td>$name</td><td>$user_id</td>";
				echo "<td>$date</td>";
				echo "<td class='text-success'>requested</td><td class='text-success'>approved</td><td class='text-success'>finished</td><td class='text-danger'>paid</td>";

					echo "<td><a class=' btn btn-primary btn-sm' href='mainactivation.php?i_idv=$main_order_id&st=$status'>Pay</a></td>";
	
				
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
					<th></th>
					<th>Status</th>
					<th></th>	<th></th>
					<th></th>
					<th>Order Details</th>
				  </tr>
				</thead>
				<tbody>';

				$query3 = "SELECT `main_order_id`,`name`,`user_id`, `date`,`status` FROM `maintenance_order` NATURAL JOIN `user` where maintenance_order.user_id=user.phone_number and `status`='paid'";
				$result3 = mysqli_query($link, $query3);
				
				while(list($main_order_id,$name,$user_id,$date,$status)=mysqli_fetch_array($result3))
								{
								echo "<tr><td>$name</td><td>$user_id</td>";
								echo "<td>$date</td>";
								echo "<td class='text-success'>requested</td><td class='text-success'>approved</td><td class='text-success'>finished</td><td class='text-success'>paid</td>";
				
									echo "<td></td>";
					
								
								echo "<td><a class=' btn btn-primary btn-sm' href='main_order.php?maint_idv=$main_order_id'>Maintenance Details</a>
								</td></tr>";
								}
			
	mysqli_close($link);

 }