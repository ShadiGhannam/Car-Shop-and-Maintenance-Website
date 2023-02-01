
    <?php
	include('header.php');	
	include('contain.php');
  include('head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
$user_id=$_GET['i_idv'];

$result=mysqli_query($link,"select phone_number,name,password, type, address from user where phone_number='$user_id'");

list($i_idv,$i_inv,$i_ipv,$i_tv,$i_av)=mysqli_fetch_array($result);

if(isset($_GET['btn_save'])) 
{
    
extract($_GET);
$password=md5($password);
$query = "update user set phone_number='$phone_number', name='$name', password='$password', address='$address',type='$type'  where phone_number='$user_id'";

mysqli_query($link,$query);

echo "<script>alert('Data successfully added.'); location.replace('user.php')</script>";


mysqli_close($link);
}}



?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="user.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="title text-center">Edit Users</h5>
              </div>
              <form action="edituser.php" name="form"  enctype="multipart/form-data">
              <div class="card-body">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $i_idv;?>" />
                  
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number"  class="form-control" value="<?php echo $i_idv; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>User Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $i_inv; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Password </label>
                        <input type="text" id="password" name="password" class="form-control" value="<?php echo $i_ipv; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text"  id="address" name="address" class="form-control" value="<?php echo $i_av; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Type</label>
                          <?php
                      if($i_tv=='customer'){
                        echo '<select name="type" class="form-select">';
                        echo '<option value="customer">Customer</option>';
                        echo '<option value="employee">Employee</option>';
                        echo '</select>';
                      }else{
                        echo '<select name="type" class="form-select">';
                        echo '<option value="employee" >Employee</option>';
                        echo '<option value="customer" >Customer</option>';
                        echo '</select>';
                      }
                                    
                  
                    ?>
                      </div>
                    </div>
                  
                  
                  
                
              </div>
              <div class="card-footer text-center">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
   