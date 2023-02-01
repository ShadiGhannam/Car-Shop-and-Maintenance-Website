<?php 

include('header.php');	
include('contain.php');
include('head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}
	


if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
if(isset($_GET['add_maint'])){
    extract($_GET);
    $query = "INSERT INTO maintenance_type VALUES (null,'$type','$description','$price')";
    mysqli_query($link,$query);
    header('location:maintenance_type.php');
    mysqli_close($link);
}
}

?>



        <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="maintenance_type.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="title text-center">Add Maintenance Type</h5>
              </div>
              <div class="card-body">
           
<form action="addmaint.php?">
<div class="col-md-12">
    <div class="form-group">
<labe>Maintenance Type</label>
<input  type="text" name="type" required pattern="[A-Za-z].{1,}" class="form-control">
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
<labe>Cost</label>
<input  type="text" name="price" required pattern="[0-9]{}" class="form-control">
</div>
</div>
<div class="col-md-12 ">
    <div class="form-group">
<labe>Description</label></br>
<textarea name="description" required pattern=".{1,}" ></textarea>
</div>
</div>
<div class=" text-center card-footer ">
<input  type="submit" name="add_maint" class="btn btn-fill btn-primary" value="Confirm" >
</div>
