<?php 
include('../admin/header.php');	
	include('contain.php');
	include('../admin/head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}
	?>

	<div class="content" >
	<div class="container-fluid">
	
	
	 <div class="col-md-14">
		<div class="card" >
		  <div class="card-header card-header-primary">
		  <a  href="maintenance_order.php">
               <i class="fas fa-angle-left pull-left"></i></a>
			<h5 class="card-title text-center"> Order Details</h5>
			
		  </div>
		  <div class="card-body">
			<div class="table-responsive ps">
			  <table class="table table-striped " id="prod">
				<thead class="">
				  <tr>
					<th>Type</th>
					<th>Cost</th>
					
				
				  </tr>
				</thead>
				<tbody>

<?php
if (isset($_SESSION['logged_in'])){
        extract($_GET);
		require_once('../admin/connection.php');//now I have a variable called $tname
		$query = "SELECT `type`,`price` from `maintenance_order` JOIN `maintenance_type` WHERE maintenance_type.maintenance_id=maintenance_order.maintenance_id and main_order_id=$maint_idv";
		//$query = "SELECT * FROM `order_details` NATURAL JOIN `orders` NATURAL JOIN `item` WHERE order_details.order_id = '$o_idv'";
		$result = mysqli_query($link, $query);
		while(list($type,$price)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$type</td>";
                        echo "<td>$price$</td>";
						
              echo "</tr>";
          
                        }
			mysqli_close($link);
		 }
	
	



?>