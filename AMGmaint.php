<?php
session_start();
if(isset($_SESSION['logged_in'])){
if(isset($_SESSION['phone_number'])){
   ?>
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

<body class=" bg-dark">
  <script>
               function getValue(val){
                split = val.split("/");
                  console.log(split[0]);
                  document.getElementById('price').value=split[0]+'$';
                }

            </script>
<section>
  <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-xl-block">
              <img src="admin/images/car_maint.jpg"
                alt="Sample photo" class="img-fluid" 
                style="border-top-left-radius: .25rem;background-size:contain; border-bottom-left-radius: .25rem; " />
            </div>
              
            <div class="col-xl-6">
              <form action="AMGmaint.php">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Car Maintenance Request form</h3>

                 <div class="form-outline mb-4"> 
                  
                <label class="form-label" for="form3Example8">Maintenance Type</label>
                <select class="select" id="select1" name="main_type" onchange="getValue(this.value)"> 
                <option>Select Maintenance</option>
<?php
include("admin/connection.php");
$query= "SELECT `maintenance_id`, `type`, `description`, `price` FROM `maintenance_type` WHERE 1";
$result=mysqli_query($link,$query);
while(list($maintenance_id,$type,$description,$price)=mysqli_fetch_array($result))
{
  
                    echo '<option  value="'.$price.'/'.$maintenance_id.'">'.$type.'</option>';}
                    echo $main_id[1];


if(isset($_GET['btn_ins'])){
  extract($_GET);
  $date =date("Y-m-d");
  $user_id= $_SESSION['phone_number'];
 $split=explode('/',$_GET['main_type']);
$main_id = $split[1];
$ins_query = "INSERT INTO `maintenance_order`( `maintenance_id`, `user_id`, `status`, `date`,`description`) 
VALUES ('$main_id','$user_id','requested','$date','$description')";
$res_ins=mysqli_query($link,$ins_query);
if($res_ins){
header("location: maintenance_order.php");
}else{

  header("location: AMGmaint.php");
 
}
}
        ?>    
 </select>
            
                </div>
                

                <div class="form-outline mb-4">
                   <label class="form-label " for="form3Example9">Cost</label>
                   <input type="text" id="price" class="form-control form-control-lg output" readonly="true"  />
                 
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example90">Description</label> </br>
                  <textarea name="description"></textarea>
                 
                </div>

               

               

                <div class="d-flex justify-content-end pt-3">
                 
                  <input type="submit" name="btn_ins" value="Submit form" class="btn btn-light btn-lg">
                </div>


              </div></form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
     <?php
    }
}
    
else{
    header('Location: admin/login.php');
}
    
    ?>