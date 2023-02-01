<?php

include('header.php');	
include('contain.php');

if(!isset($_SESSION['phone_number'])){
header('Location: ../index.php');
}


?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../css/sneat-bootstrap-html-admin-template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../css/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../css/sneat-bootstrap-html-admin-template/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <?php
    if(isset($_SESSION['logged_in'])){
      include("connection.php");
      $order_num_query = "SELECT * from `orders` where 1";
      $result1=mysqli_query($link,$order_num_query);
      $counter = mysqli_num_rows($result1); 

      $maint_order_num_query = "SELECT * from `maintenance_order` where 1";
      $result2=mysqli_query($link,$maint_order_num_query);
      $maint_counter = mysqli_num_rows($result2); 

      $tot_paid_ord = "SELECT * from `orders` where `status`='paid'";
      $result3=mysqli_query($link,$tot_paid_ord);
      $tot_num_paid = mysqli_num_rows($result3); 

      $tot_paid_maint_ord = "SELECT * from `maintenance_order` where `status`='paid'";
      $result4=mysqli_query($link,$tot_paid_maint_ord);
      $tot_maint_num_paid = mysqli_num_rows($result4); 
      $maint_counter = mysqli_num_rows($result2); 

      $payment_order = "SELECT item.item_price,order_details.quantity from `order_details` JOIN `orders` JOIN `item` 
      where orders.order_id=order_details.order_id and `status`='paid' and item.item_id=order_details.item_id";
      $result5=mysqli_query($link,$payment_order);
      $total_paid=0;
      while(list($item_price,$quantity)=mysqli_fetch_array($result5))
                        {
                          $total_paid = $total_paid + ($item_price*$quantity);

                        }


      $payment_maint_order = "SELECT `price` from `maintenance_type` JOIN `maintenance_order`
      where maintenance_type.maintenance_id=maintenance_order.maintenance_id and `status`='paid'";
      $result6=mysqli_query($link,$payment_maint_order);
      $total_maint_paid=0;
      while(list($cost)=mysqli_fetch_array($result6))
                        {
                          $total_maint_paid = $total_maint_paid + ($cost);

                        }

      $item_num = "SELECT * from `item` where `hidden`='false'";
      $result7=mysqli_query($link,$item_num);
      $item_number = mysqli_num_rows($result7); 


      $item_price = "SELECT `item_price`,`quantity` from `item` where `hidden`='false'";
      $result8=mysqli_query($link,$item_price);
      $all_item_cost=0;
      while(list($cost,$quant)=mysqli_fetch_array($result8))
      {
        $all_item_cost = $all_item_cost + ($cost*$quant);

      }
    }
    
    
    
    ?>
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              
                <div class="col-lg-12 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            
                            <span class="fa-solid fa-bag-shopping mr-3"></span>
                            </div><div class="fw-semibold d-block mb-1 text-center"><h3>Orders</h3></div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="order.php">View More</a>
                              
                              </div>
                            </div>
                          </div>
                       <div>
                      <h5 class="card-title mb-2">Number of Orders:<span class="ml-2 card-title mb-2">
                        <?=$counter?></span></h5> 
                        <h5 class="card-title mb-2">Paid Orders:<span class="ml-2 card-title mb-2">
                        <?=$tot_num_paid?></span></h5> 
                        <h5 class="card-title mb-2">Payments:<span class="ml-2 card-title mb-2">
                        <?=$total_paid?>$</span></h5> 
                    
                       </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <span><i class="fa-solid fa-shop mr-3"></i></span>
                            </div><div class="fw-semibold d-block mb-1 text-center"><h3>Maintenance Orders</h3></div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="maintenance_order.php">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          
                          <h5 class="card-title mb-2">Number of Orders:<span class="ml-2 card-title mb-2">
                            <?=$maint_counter?></span></h5> 
                            <h5 class="card-title mb-2">Paid Orders:<span class="ml-2 card-title mb-2">
                        <?=$tot_maint_num_paid?></span></h5>
                        <h5 class="card-title mb-2">Payments:<span class="ml-2 card-title mb-2">
                        <?=$total_maint_paid?>$</span></h5>
                  
                        </div>
                      </div>
                    </div>                
                </div>  </div>
                
                <div class="col-lg-12 col-md-4 order-1">
                  <div class="row">
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <span><i class="fa-solid fa-shop mr-3"></i></span>
                            </div><div class="fw-semibold d-block mb-1 text-center"><h3>Items</h3></div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="item.php">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          
                          <h5 class="card-title mb-2">Number of items:<span class="ml-2 card-title mb-2">
                            <?=$item_number?></span></h5> 
                            <h5 class="card-title mb-2">Total :<span class="ml-2 card-title mb-2">
                        <?=$all_item_cost?></span>$</h5>
                        
                  
                        </div>
                      </div>   </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../css/sneat-bootstrap-html-admin-template/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div><div class="fw-semibold d-block mb-1 text-center"><h3>Total Income</h3></div>
                            <div class="dropdown">
                         
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="d-block mb-1">Payments</span>
                          <h3 class="card-title text-nowrap mb-2"><?=$total_paid+$total_maint_paid?>$</h3>
                        </div>
                      </div>
                    </div>
                 
                        
                   
           
             
                              
         
                       
                      </div>
                    </div>
                  </div>
                </div>
            
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/popper/popper.js"></script>
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.js"></script>
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../css/sneat-bootstrap-html-admin-template/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../css/sneat-bootstrap-html-admin-template/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../css/sneat-bootstrap-html-admin-template/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>






