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

	
if(!isset($_SESSION['phone_number'])){
	header('Location: index.php');
	}
	?>

	<div class="content" >
	<div class="container-fluid">
	
	
	 <div class="col-md-12 mt-3">
		<div class="card" >
		  <div class="card-header card-header-primary">
		  <a  href="orders.php">
               <i class="fas fa-angle-left pull-left"></i></a>
			<h5 class="card-title text-center"> Order Details</h5>
			
		  </div>
		  <div class="card-body">
			<div class="table-responsive ps">
			  <table class="table table-striped " id="prod">
				<thead class="">
				  <tr>
					<th>Item Name</th>
					<th>Unit Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
					
				
				  </tr>
				</thead>
				<tbody>

<?php
if (isset($_SESSION['logged_in'])){
        extract($_GET);
		require_once('admin/connection.php');//now I have a variable called $tname
		$query = "SELECT `item_name`,`item_price`,order_details.quantity from (`item` JOIN `order_details`) natural JOIN orders WHERE order_details.order_id=$o_idv AND item.item_id=order_details.item_id";
		//$query = "SELECT * FROM `order_details` NATURAL JOIN `orders` NATURAL JOIN `item` WHERE order_details.order_id = '$o_idv'";
		$result = mysqli_query($link, $query);
		$total_price=0;
		while(list($item_name,$item_price,$quantity)=mysqli_fetch_array($result))
                        {
							$total__unit_price=($item_price*$quantity);
							$total_price=($item_price*$quantity)+$total_price;
                        echo "<tr><td>$item_name</td>";
                        echo "<td>$item_price$</td>";
					
              echo "<td>$quantity</td>";
			  echo "<td>$total__unit_price$</td></tr>";
			  
          
                        }
				
						echo "<tr>
						<th>Total</th>
						<td></td>
						<td></td>
						<th>$total_price$</th>
						</tr>";
						echo "</table>";
						

			mysqli_close($link);
		 }
	
	



?>