


<?php
include("admin/connection.php");
include("admin/head.php");
if(isset($_GET['btn_reg'])){
$p_n = $_GET['p_n'];
$name = $_GET['name'];
$address = $_GET['addr'];
$pass = $_GET['pass'];
$re_pass = $_GET['re_pass'];
if($pass==$re_pass){
$hashpass= md5($pass);
$ins_query = "INSERT INTO `user`(`phone_number`, `name`, `password`, `address`, `type`) VALUES ('$p_n','$name','$hashpass','$address','customer')";
$res_ins = mysqli_query($link,$ins_query);
header("location: admin/login.php");
}else{
  echo "<script>alert('the password does not match.'); location.replace('SignUp.php')</script>";
}
}
?>
<body style="background-color: #8fc4b7;">
<section class="" >
  <div class="container">
  <div class="row d-flex justify-content-center align-items-center"> 
    <form action="SignUp.php" class="px-md-2 d-flex justify-content-center"> 
     
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
           
<div class="card-body p-4 ">
            <h3 class="text-center mb-3 pb-2 pb-md-0 mb-md-43 px-md-2">Registration Info</h3>
              <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1q">Name</label>
                      <input type="text" name="name" id="form3Example1q" required pattern="[A-Za-z].{1,}" class="form-control" />
              </div>

              

                  <div class="form-outline mb-3">
                    <label for="exampleDatepicker1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="p_n"  required pattern="^[0-9]{8}$" id="exampleDatepicker1" />
                  </div>
                  
                  <div class="form-outline mb-3">
                    <label for="exampleDatepicker1" class="form-label">Address</label>
                    <input type="text" name="addr" class="form-control" required pattern="[A-Za-z].{1,}" id="exampleDatepicker1" />
                  </div>

                  <div class="form-outline mb-3  ">
                        <label class="form-label" for="form3Example1w">Password</label>
                        <input type="password" name="pass" id="form3Example1w" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" />
                   </div>
              
                
                  <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example1w">Retype Password</label>
                        <input type="password" name="re_pass" id="form3Example1w" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" />
                   </div>
                   <div class="text-center card-footer ">
              <button type="submit" name="btn_reg" class="btn btn-success btn-lg mb-1">Submit</button>
              </div> </div>    </div>
        </div>
           

 </form>
</div>   </div>
         
     
</section>
</body>