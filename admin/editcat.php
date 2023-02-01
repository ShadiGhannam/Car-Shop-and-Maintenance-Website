
    <?php
	include('header.php');	
	include('contain.php');
  include('head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
$cat_id=$_GET['i_idv'];

$result=mysqli_query($link,"select category_id,image,name, description from category where category_id='$cat_id'");

list($i_idv,$i_imv,$i_inv,$i_d)=mysqli_fetch_array($result);

if(isset($_GET['btn_save'])) 
{
    
extract($_GET);
if($image){
$query = "update category set name='$cat_name', description='$description',image='$image' where category_id='$cat_id'";

mysqli_query($link,$query);

echo "<script>alert('Data successfully added.'); location.replace('category.php')</script>";
}else{
  $query = "update category set name='$cat_name', description='$description' where category_id='$cat_id'";

  mysqli_query($link,$query);
  
  echo "<script>alert('Data successfully added.'); location.replace('category.php')</script>";
}
}
mysqli_close($link);
}



?>
		




      <div class="content">
        <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="category.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="card-title text-center">Edit Category</h5>
              </div>
              <form action="editcat.php" name="form"  enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="cat_id" id="cat_id" required pattern="[A-Za-z].{1,}" value="<?php echo $cat_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Category name</label>
                        <input type="text" id="cat_name" name="cat_name"  class="form-control" required pattern=".{1,}" value="<?php echo $i_inv; ?>" >
                      </div>
                    </div>
                    
                  

                    <div class="col-md-12 ">
                    <div class="form-group">
                        <labe>Image</label>
                        <input type="file" name="image" class="form-control-file" id="image" value="<?php echo $i_imv;?>"/>
                   
                      </div>
                      </div>
                      <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Description</label></br>
                        <textarea name='description' ><?php echo $i_d; ?></textarea></br> 
                      </div>
                    </div>
                
                
                    <div class=" text-center card-footer ">
                  
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
          
</div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
   