<?php
session_start();
echo '<!DOCTYPE html>
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
</head>';
include('admin/connection.php');

       

echo '<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
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
      </li></ul>


    <ul class="navbar-nav nav-flex-icons">
      <li class="nav-item">
        <a href="cart.php" class="nav-link waves-effect">';
        if(isset($_SESSION['logged_in'])){
          $user_id= $_SESSION['phone_number'];
          $cart_sel="SELECT * FROM `cart` WHERE `user_id`=$user_id;";
          $res_cart=mysqli_query($link,$cart_sel);
          $row = mysqli_num_rows($res_cart);
          echo '
          <span class="badge red z-depth-1 mr-1"> '.$row.' </span>
        ';} echo '
          <i class="fas fa-shopping-cart"></i>
          <span class="clearfix d-none d-sm-inline-block"> Cart </span>
        </a>
      </li>';
    

    if(isset($_SESSION['logged_in'])){
    echo '
      <li class="nav-item ml-5">
        <a href="admin/logout.php" class="nav-link border border-light rounded waves-effect"
          >
          <i class="fa fa-sign-out mr-2 aria-hidden="true"></i>Logout
        </a>
      </li>';
    }
    if(!isset($_SESSION['logged_in'])){
      echo '<li class="nav-item ml-3">
        <a href="SignUp.php" class="nav-link border border-light rounded waves-effect"><i class="fa fa-sign-out mr-2 aria-hidden="true"></i>Register</a>
      </li>

      <li class="nav-item ml-3">
        <a href="admin/login.php" class="nav-link border border-light rounded waves-effect"
          >
          <i class="fa fa-sign-out mr-2 aria-hidden="true""></i>Login
        </a>
        </li> ';
    }

      echo '
    </ul>

  </div>

</div>
</nav>
<!-- Navbar -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
  <li data-target="#carousel-example-1z" data-slide-to="1"></li>
  <li data-target="#carousel-example-1z" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">
    <div class="view" style="background-image: url('.'admin/images/wl.jpg'.'); background-repeat: no-repeat; background-size: cover;">

      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
          <h1 class="mb-4">
            <strong>WE ARE QUALIFIED AND PROFESSIONAL</strong>
          </h1>

          <p>
            <strong>WE HAVE EVERYTHING YOUR CAR NEEDS</strong>
          </p>

          <p class="mb-4 d-none d-md-block">
          <strong>PURCHASE YOUR CAR PARTS, BODY AND ACCESSORIES AND MAKE YOUR CAR LAST LONGER </strong>
        </p>

          
        </div>
        <!-- Content -->

      </div>
      <!-- Mask & flexbox options-->

    </div>
  </div>
  <!--/First slide-->

  <!--Second slide-->
  <div class="carousel-item">
    <div class="view" style="background-image: url('.'admin/images/l.jpg'.'); background-repeat: no-repeat; background-size: cover ">

      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
          <h1 class="mb-4">
            <strong>WE ARE QUALIFIED AND PROFESSIONAL</strong>
          </h1>

          <p>
            <strong>WE HAVE EVERYTHING YOUR CAR NEEDS</strong>
          </p>

          <p class="mb-4 d-none d-md-block">
            <strong>PURCHASE YOUR CAR PARTS, BODY AND ACCESSORIES AND MAKE YOUR CAR LAST LONGER </strong>
          </p>

         
        </div>
        <!-- Content -->

      </div>
      <!-- Mask & flexbox options-->

    </div>
  </div>
  <!--/Second slide-->

  <!--Third slide-->
  <div class="carousel-item">
  <div class="view" style="background-image: url('.'admin/images/s.jpg'.'); background-repeat: no-repeat; background-size: cover; ">


      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
        <h1 class="mb-4">
          <strong>WE ARE QUALIFIED AND PROFESSIONAL</strong>
        </h1>

        <p>
          <strong>WE HAVE EVERYTHING YOUR CAR NEEDS</strong>
        </p>

        <p class="mb-4 d-none d-md-block">
        <strong>PURCHASE YOUR CAR PARTS, BODY AND ACCESSORIES AND MAKE YOUR CAR LAST LONGER </strong>
      </p>

          
        </div>
        <!-- Content -->

      </div>
      <!-- Mask & flexbox options-->

    </div>
  </div>
  <!--/Third slide-->

</div>
<!--/.Slides-->

<!--Controls-->
<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
<!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->
<main>
<div class="container">

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark mdb-color mt-3 mb-5">

    <!-- Navbar brand -->
    <span class="navbar-brand ">Categories:</span>


      <!-- Collapse button -->
    

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse my-auto " id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav m-auto">
        <li class="nav-link">
        <form action="index.php"><button type="submit" id="btn_all" name="btn_all" class="nav-link btn shadow-none">All Items</button></form>

            </a>
          </li>
          <li class="nav-link">
          <form action="index.php"><button type="submit" id="btn_parts" name="btn_parts" class="nav-link btn shadow-none">Car Parts</button></form>
          </li>
          <li class="nav-link">
          <form action="index.php"><button type="submit" id="btn_body" name="btn_body" class="nav-link btn shadow-none">Car Body</button></form>
          </li>
          <li class="nav-link">
          <form action="index.php"><button type="submit" id="btn_access" name="btn_access" class="nav-link btn shadow-none">Accessories</button></form>
          </li>

        </ul>
        <!-- Links -->

        
      </div>
      <!-- Collapsible content -->

    </nav>
    
    <!--/.Navbar-->
                       
    <!--Section: Products v.3-->
   <div class="row wow fadeIn">';


      if(!isset($_GET['btn_all']) and !isset($_GET['btn_parts']) and  !isset($_GET['btn_body']) and  !isset($_GET['btn_access'])){
      $query = "SELECT `item_id`,`image`,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,`hidden`  FROM `item` WHERE `hidden`='false' and `quantity`>0";
      $result = mysqli_query($link, $query);
         
                 
   
      while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$hidden)=mysqli_fetch_array($result))
                          {
                         echo '     <!--Grid row-->
                         
                   
                           <!--Grid column-->
                           <div class="col-lg-3 col-md-6 mb-4">
                   
                             <!--Card-->
                             <div class="card">
                   
                               <!--Card image-->
                               <div class="view overlay">
                               <a href="viewitem.php?i_idv='.$item_id.'"> <img height="250px" width="250px" src="/seniorproject/admin/images/'.$image.'" class="card-img-top"/></a>
                                
                               </div> <div class="card-body text-center">
                              <!--Category & Title-->
                              <a href="viewitem.php?i_idv='.$item_id.'" class="grey-text">
                                <h5>'.$manufacture.'</h5>
                              </a>
                              <h5>
                                <strong>
                                  <a href="viewitem.php?i_idv='.$item_id.'" class="dark-grey-text">'.$item_name.'
                                   
                                  </a>
                                </strong>
                              </h5>
                
                              <h4 class="font-weight-bold blue-text">
                                <strong>'.$item_price.'$</strong>
                              </h4>
                
                            </div>
                            <!--Card content-->
                
                          </div>
                          <!--Card-->
                
                        </div> ';
                          }
                        }
      else if(isset($_GET['btn_all'])){
      $query = "SELECT `item_id`,`image`,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,`hidden`  FROM `item` WHERE `hidden`='false' and `quantity`>0";
      $result = mysqli_query($link, $query);
         
                 
   
      while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$hidden)=mysqli_fetch_array($result))
                          {
                         echo '     <!--Grid row-->
                         
                   
                           <!--Grid column-->
                           <div class="col-lg-3 col-md-6 mb-4">
                   
                             <!--Card-->
                             <div class="card">
                   
                               <!--Card image-->
                               <div class="view overlay">
                               <a href="viewitem.php?i_idv='.$item_id.'"> <img height="250px" width="250px" src="/seniorproject/admin/images/'.$image.'" class="card-img-top"/></a>
                                
                               </div> <div class="card-body text-center">
                              <!--Category & Title-->
                              <a href="viewitem.php?i_idv='.$item_id.'" class="grey-text">
                                <h5>'.$manufacture.'</h5>
                              </a>
                              <h5>
                                <strong>
                                  <a href="viewitem.php?i_idv='.$item_id.'" class="dark-grey-text">'.$item_name.'
                                  
                                  </a>
                                </strong>
                              </h5>
                
                              <h4 class="font-weight-bold blue-text">
                                <strong>'.$item_price.'$</strong>
                              </h4>
                
                            </div>
                            <!--Card content-->
                
                          </div>
                          <!--Card-->
                
                        </div> ';
                          }
                        }
	else if(isset($_GET['btn_parts'])){
                            $query2 = "SELECT `item_id`,item.image,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,item.category_id,category.category_id,`name`,`hidden` FROM `item` join `category` WHERE `hidden`='false' and `quantity`>0 and `name`='Car Parts' and item.category_id=category.category_id";
                            $result2 = mysqli_query($link, $query2);
                           
                                   
                     
                            while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$category_id,$name,$hidden)=mysqli_fetch_array($result2))
                                            {
                          
                            echo '     <!--Grid row-->
                       
                 
                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">
                    
                              <!--Card-->
                              <div class="card">
                    
                              <div class="view overlay">
                              <a href="viewitem.php?i_idv='.$item_id.'"> <img height="250px" width="250px" src="/seniorproject/admin/images/'.$image.'" class="card-img-top"/></a>
                               
                              </div> <div class="card-body text-center">
                             <!--Category & Title-->
                             <a href="viewitem.php?i_idv='.$item_id.'" class="grey-text">
                               <h5>'.$manufacture.'</h5>
                             </a>
                             <h5>
                               <strong>
                                 <a href="viewitem.php?i_idv='.$item_id.'" class="dark-grey-text">'.$item_name.'
                                  
                                 </a>
                               </strong>
                             </h5>
                 
                               <h4 class="font-weight-bold blue-text">
                                 <strong>'.$item_price.'$</strong>
                               </h4>
                 
                             </div>
                             <!--Card content-->
                 
                           </div>
                           <!--Card-->
                 
                         </div> '; 
                        }       
                       
                    }else if(isset($_GET['btn_access'])){
                      $query3 = "SELECT `item_id`,item.image,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,item.category_id,category.category_id,`name`,`hidden` FROM `item` join `category` WHERE `hidden`='false' and `quantity`>0 and `name`='Car Accessories' and item.category_id=category.category_id";
                      $result3 = mysqli_query($link, $query3);
                     
                             
               
                      while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$category_id,$cat_id,$name,$hidden)=mysqli_fetch_array($result3))
                                      {
                    
                      echo '     <!--Grid row-->
                 
           
                      <!--Grid column-->
                      <div class="col-lg-3 col-md-6 mb-4">
              
                        <!--Card-->
                        <div class="card">
              
                          <!--Card image-->
                          <div class="view overlay">
                              <a href="viewitem.php?i_idv='.$item_id.'"> <img height="250px" width="250px" src="/seniorproject/admin/images/'.$image.'" class="card-img-top"/></a>
                               
                              </div> <div class="card-body text-center">
                             <!--Category & Title-->
                             <a href="viewitem.php?i_idv='.$item_id.'" class="grey-text">
                               <h5>'.$manufacture.'</h5>
                             </a>
                             <h5>
                               <strong>
                                 <a href="viewitem.php?i_idv='.$item_id.'" class="dark-grey-text">'.$item_name.'
                                
                                 </a>
                               </strong>
                             </h5>
           
                         <h4 class="font-weight-bold blue-text">
                           <strong>'.$item_price.'$</strong>
                         </h4>
           
                       </div>
                       <!--Card content-->
           
                     </div>
                     <!--Card-->
           
                   </div> '; 
                  }       
                 
              }
              else if(isset($_GET['btn_body'])){
                $query = "SELECT `item_id`,item.image,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,item.category_id,category.category_id,`name`,`hidden` FROM `item` join `category` WHERE `hidden`='false' and `quantity`>0 and `name`='Car Body' and item.category_id=category.category_id";
                $result = mysqli_query($link, $query);
               
                       
         
                while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$category_id,$cat_id,$name,$hidden)=mysqli_fetch_array($result))
                                {
              
                echo '     <!--Grid row-->
           
     
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">
        
                  <!--Card-->
                  <div class="card">
        
                    <!--Card image-->
                    <div class="view overlay">
                              <a href="viewitem.php?i_idv='.$item_id.'"> <img height="250px" width="250px" src="/seniorproject/admin/images/'.$image.'" class="card-img-top"/></a>
                               
                              </div> <div class="card-body text-center">
                             <!--Category & Title-->
                             <a href="viewitem.php?i_idv='.$item_id.'" class="grey-text">
                               <h5>'.$manufacture.'</h5>
                             </a>
                             <h5>
                               <strong>
                                 <a href="viewitem.php?i_idv='.$item_id.'" class="dark-grey-text">'.$item_name.'
                                 
                                 </a>
                               </strong>
                             </h5>
     
                   <h4 class="font-weight-bold blue-text">
                     <strong>'.$item_price.'$</strong>
                   </h4>
     
                 </div>
                 <!--Card content-->
     
               </div>
               <!--Card-->
     
             </div> '; 

              }
            }
                        
                       echo'</div>  <section class="text-center mb-4">
                        </div>
                       
                  
                      </section>
                      </nav>
                    </div>
                  </main>';
	

    ?> 
   
   <footer id="1" class="page-footer mdb-color  font-small mt-4 wow fadeIn">
   <div class="pt-2">
   <p class="mt-4 text-center">CONTACT US</p>
   </div>
     <hr class="my-4">  
       <div class="pb-4 ml-2">
          
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
      <a  target="_blank" href='.$loct_link.'>'.$address.'</a>  </div>
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
    <!-- Social icons -->

    <!--Copyright-->
    
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

   
    

