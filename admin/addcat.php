<?php 

include('header.php');	
include('contain.php');
include('head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}
	


if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
if(isset($_GET['add_cat'])){
    extract($_GET);
    $query = "INSERT INTO category VALUES (null,'$cat_name','$description','$img')";
    mysqli_query($link,$query);
    header('Location: category.php');
    mysqli_close($link);
}
}

?>



        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="category.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="title text-center">Add Category</h5>
              </div>
              <div class="card-body">
           
<form action="addcat.php?">
<div class="col-md-12">
    <div class="form-group">
<labe>Category Name</label>
<input  type="text" name="cat_name" required pattern="[A-Za-z].{1,}" class="form-control">
</div>
</div>

<div class="col-md-12 ">
    <div class="form-group">
<labe>Image</label>
<input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
</div>
</div>
<div class="col-md-12 ">
    <div class="form-group">
<labe>Description</label></br>
<textarea name="description" required pattern=".{1,}" ></textarea>
</div>
</div>

           
                
</div>

 <div class=" text-center card-footer ">
<input  type="submit" name="add_cat" class="btn btn-fill btn-primary" value="Confirm" >
</div>
            </div>
          </div>
          
  
         </form>
          
        </div>
   
		
	
