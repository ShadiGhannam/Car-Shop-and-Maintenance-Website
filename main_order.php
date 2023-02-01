
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


<?php 
session_start();
if(!isset($_SESSION['phone_number'])){
	header('Location: index.php');
	}
	?>

	<div class="content" >
	<div class="container-fluid">
	
	
	 <div class="col-md-12 mt-3">
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
					<th>Description</th>
				
				  </tr>
				</thead>
				<tbody>

<?php
if (isset($_SESSION['logged_in'])){
        extract($_GET);
		include('admin/connection.php');//now I have a variable called $tname
		$query = "SELECT `type`,`price`,maintenance_order.description from `maintenance_order` JOIN `maintenance_type` WHERE main_order_id=$maint_idv and maintenance_type.maintenance_id=maintenance_order.maintenance_id";
		//$query = "SELECT * FROM `order_details` NATURAL JOIN `orders` NATURAL JOIN `item` WHERE order_details.order_id = '$o_idv'";
		$result = mysqli_query($link, $query);
		while(list($type,$price,$desc)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$type</td>";
                        echo "<td>$price$</td>";
                        echo "<td>$desc</td>";
              echo "</tr>";
          
                        }
			mysqli_close($link);
		 }
	
	



?>