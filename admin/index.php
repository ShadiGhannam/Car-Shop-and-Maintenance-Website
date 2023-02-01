<?php


?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Website menu 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/seniorproject/css/website-menu-17/css/style.css">

	</head>
	<body>
	
		
	
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
		  
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <div class=" px-md-4 ">
							<a class="text-white" href="index.php">Car Shop and Maintenance <span>AMG</span></a>
						</div>
						<ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="../AMGshop.php">Car Shop</a>
                <a class="dropdown-item" href="../AMGmaint.php">Car Maintenance</a>
               
              </div>
            </li>
			<?php
			session_start();
			if(!isset($_SESSION['logged_in'])){
			echo '<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			<li class="nav-item"><a href="../SignUp.php" class="nav-link">Register</a></li>';

			}
			?>
	        	<li class="nav-item"><a href="index.php?1" class="nav-link">Contact</a></li>
	        
	          
			  <?php
			
			if(isset($_SESSION['logged_in'])){
			echo '<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
			
			

			}
			?>
	        </ul>
			<?php
			
			if(isset($_SESSION['logged_in'])){
			echo '<div class=" px-md-4">
		<span class="text-white">Welcome ' .$_SESSION['name'].'</span></div>';
			

			}
			?>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

	<footer id="1" class="page-footer mdb-color ftco-navbar-light bg-dark navbar-dark font-small mt-4 wow fadeIn">
   <div class="pt-2">
   <p class="mt-4 text-center">CONTACT US</p>
   </div>
     <hr class="my-4">  
       <div class="pb-4 ml-2">
          
    <?php
    include('connection.php');
    $shop_info="SELECT `owner_id`,`name`,`phone_number`,`address`,`location`,`email`,`email_link`,`loct_link` FROM `about` WHERE 1";
    $res_shop_info=mysqli_query($link,$shop_info);
    $plat_info="SELECT `id`,`name`,`link` FROM `platform` WHERE 1";
    $res_plat_info=mysqli_query($link,$plat_info);
    
  	while(list($owner_id,$name,$p_n,$address,$location,$email,$email_link,$loct_link)=mysqli_fetch_array($res_shop_info)){
    
      echo ' <div class="d-flex justify-content-center"">
      <div class="px-5 p-2"><i class="fa fa-phone mr-4" aria-hidden="true"></i> '.$p_n.'</div>
      <div class="px-5 py-2 justify-content-center"">
      <i class="fa fa-map-marker mr-4" aria-hidden="true"></i>
      <a  href='.$location.'>'.$address.'</a>  </div>
       <div class="px-5 py-2">
      <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
      <a href='.$email_link.'>'.$email.'</a>
      </div>   
        </div>';
	}
	$row=mysqli_fetch_row($res_plat_info);
	$i=0;
	for($i=0;$i<1;$i++){
 
	  echo '<div class="d-flex justify-content-center">
	<div class="px-1 py-2"><a href='.$row[2].'><i class="fa fa-instagram mr-4"></i></a></div>';
	 $row=mysqli_fetch_row($res_plat_info);

	 echo '<div class="px-1 py-2"><a href='.$row[2].'><i class="fa fa-facebook mr-4"></i></a></div>';
	 $row=mysqli_fetch_row($res_plat_info);
	 echo '<div class="px-1 py-2"><a href='.$row[2].'><i class="fa fa-twitter mr-4"></i></a></div>
</div>';
	} 


     
     
       
        
    
   
    
    ?>
   

  


    <!-- Social icons -->
    
    </div> 
 
	

<script src="/seniorproject/css/website-menu-17/js/jquery.min.js"></script>
  <script src="/seniorproject/css/website-menu-17/js/popper.js"></script>
  <script src="/seniorproject/css/website-menu-17/js/bootstrap.min.js"></script>
  <script src="/seniorproject/css/website-menu-17/js/main.js"></script>

	</body>
</html>

