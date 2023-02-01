
    <?php
	include('header.php');	
	include('contain.php');
	include('head.php');
if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
$maint_id=$_GET['maint_idv'];

$result=mysqli_query($link,"select * from maintenance_type where maintenance_id='$maint_id'");

list($maint_idv,$i_tv,$i_d,$i_p)=mysqli_fetch_array($result);

if(isset($_GET['btn_save'])) 
{
    
extract($_GET);
$query = "UPDATE `maintenance_type` SET `type`='$type',`description`='$description',`price`='$price' WHERE  `maintenance_id`='$maint_id'";

mysqli_query($link,$query);

echo "<script>alert('Data successfully added.'); location.replace('maintenance_type.php')</script>";


mysqli_close($link);
}
}



?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="maintenance_type.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="title text-center">Edit Maintenane Type</h5>
              </div>
              <form action="editmaint.php" name="form"  enctype="multipart/form-data">
              <div class="card-body">
              <input type="hidden" name="maint_id" id="maint_id" value="<?php echo $maint_idv;?>" />
                  
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Type</label>
                       <input type='text' name='type' id='type' class="form-control" value="<?php echo $i_tv; ?>"/>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Cost</label>
                       <input type='text' name='price' class="form-control" id='price' value="<?php echo $i_p; ?>"/>
                      </div>
                    </div>
                  
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Description</label></br>
                        <textarea name='description' ><?php echo $i_d; ?></textarea></br> 
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
   