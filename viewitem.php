<?php
session_start();
include('admin/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

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
</head>

<?php
		extract($_GET);
		$item_sel = "SELECT `item_id`,`image`,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,`hidden`  FROM `item` WHERE `item_id`='$i_idv'";
		$res_item = mysqli_query($link, $item_sel);
        
		while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$hidden)=mysqli_fetch_array($res_item))
                        {
                         ?>
                         
                         <body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container">
  
    <!-- Brand -->
    
    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link waves-effect" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Maintenance Pages</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="AMGmaint.php">Car Maintenance</a>
                <a class="dropdown-item" href="maintenance_order.php">Maintenance Order</a>
               
              </div>
            </li>
           <li class="nav-item">
          <a href="orders.php" class="nav-link waves-effect">
            <span class="clearfix d-none d-sm-inline-block">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="#1"
            >About</a>
        </li>
      
     
    
        
      </ul>
  
      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a href="cart.php" class="nav-link waves-effect">
          <?php
          if(isset($_SESSION['logged_in'])){
            $user_id= $_SESSION['phone_number'];
            $cart_sel="SELECT * FROM `cart` WHERE `user_id`=$user_id;";
            $res_cart=mysqli_query($link,$cart_sel);
            $row = mysqli_num_rows($res_cart);
            echo '
            <span class="badge red z-depth-1 mr-1"> '.$row.' </span>
          ';}?>
            <i class="fas fa-shopping-cart"></i>
            <span class="clearfix d-none d-sm-inline-block"> Cart </span>
          </a>
        </li>
        
     
        
    <?php

        if(isset($_SESSION['logged_in'])){
        echo '
          <li class="nav-item ml-2">
            <a href="admin/logout.php" class="nav-link border border-light rounded waves-effect"
              >
              <i class="fa fa-sign-out mr-2 aria-hidden="true""></i>Logout
            </a>
          </li>';
        }
        if(!isset($_SESSION['logged_in'])){
           echo '<li class="nav-item ml-3">
          <a href="SignUp.php" class="nav-link border border-light rounded waves-effect"><i class="fa fa-sign-out mr-2 aria-hidden="true"></i>Register</a>
        </li>';
       echo '   <li class="nav-item ml-3">
            <a href="admin/login.php" class="nav-link border border-light rounded waves-effect"
              >
              <i class="fa fa-sign-out mr-2 aria-hidden="true""></i>Login
            </a>
          </li>';
        }
    ?>
      </ul>
  
    </div>
  
  </div>
  </nav>
  <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4 ">
<div class="ml-5">
          <img  src="/seniorproject/admin/images/<?=$image?>"  width="300px" height="250px" alt="ddff">
          
        </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            
            <p class="lead font-weight-bold">Name:<span class="lead ml-4"><?=$item_name?></span>
            <p class="lead font-weight-bold">Price:<span class="lead ml-4"><?=$item_price?>$</span>
         

            <p class="lead font-weight-bold">Manufacture: <span class="lead ml-4"><?=$manufacture?></span></p>

            <p class="lead font-weight-bold">Type: <span class=" lead ml-4"><?=$type?></span></p>
            <p class="lead font-weight-bold">Quantity: <span class=" lead ml-4"><?=$quantity?></span></p>
	
    
            <form action="addtocart.php?" class="d-flex justify-content-left">
              <!-- Default input -->
              <input type="hidden" name="item_quantity" value="<?=$quantity?>"/>
              <input type="hidden" name="i_id" value="<?=$item_id?>"/>
              <input type="number" name="quant" value="1" aria-label="Search" class="form-control" style="width: 100px">
              <button class="btn btn-primary btn-md my-0 p " type="submit">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">


  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer id="1" class="page-footer text-center mdb-color font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-2">
    <p class="mt-4 text-center">CONTACT US</p>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
    <?php
    
    $shop_info="SELECT `owner_id`,`name`,`phone_number`,`address`,`email`,`email_link`,`loct_link` FROM `about` WHERE 1";
    $res_shop_info=mysqli_query($link,$shop_info);
    $plat_info="SELECT `id`,`name`,`link` FROM `platform` WHERE 1";
    $res_plat_info=mysqli_query($link,$plat_info);
    
  	while(list($owner_id,$name,$p_n,$address,$email,$email_link,$loct_link)=mysqli_fetch_array($res_shop_info)){
    
      echo ' <div class="d-flex justify-content-center"">
      <div class="px-5 p-2"><i class="fa fa-phone mr-4" aria-hidden="true"></i> '.$p_n.'</div>
      <div class="px-5 py-2 justify-content-center"">
      <i class="fa fa-map-marker-alt mr-4" aria-hidden="true"></i>
      <a target="_blank" href='.$address.'>'.$address.'</a>  </div>
       <div class="px-5 py-2">
      <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
      <a target="_blank" href='.$email_link.'>'.$email.'</a>
      </div>   
        </div>';
      }
      $row=mysqli_fetch_row($res_plat_info);
      $i=0;
      for($i=0;$i<1;$i++){
   
        echo '<div class="d-flex justify-content-center">
      <div class="px-1 py-2"><a target="_blank" href='.$row[2].'><i class="fa-brands fa-instagram mr-4"></i></a></div>';
       $row=mysqli_fetch_row($res_plat_info);

       echo '<div class="px-1 py-2"><a target="_blank" href='.$row[2].'><i class="fab fa-facebook-f  mr-4"></i></a></div>';
       $row=mysqli_fetch_row($res_plat_info);
       echo '<div class="px-1 py-2"><a target="_blank" href='.$row[2].'><i class="fa-brands fa-twitter"></i></a></div>

 </div>';
      }
     

     
     
       
        
    
   
    
    ?>
   

  


    <!-- Social icons -->
    
    </div> 
    </div>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/seniorproject/css/Ecommerce-Template-Bootstrap-master/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/seniorproject/css/Ecommerce-Template-Bootstrap-master/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/seniorproject/css/Ecommerce-Template-Bootstrap-master/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/seniorproject/css/Ecommerce-Template-Bootstrap-master/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
<?php
                        }
                        
			mysqli_close($link);
		 
       
    ?>
