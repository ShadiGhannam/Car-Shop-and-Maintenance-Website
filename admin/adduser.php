<?php 
include('header.php');	
	include('contain.php');
    include('head.php');
if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}
	


if (isset($_SESSION['logged_in'])){
    require_once('connection.php');
if(isset($_GET['add_user'])){
    extract($_GET);
    $pass=md5($pass);
    $query = "INSERT INTO user VALUES ($p_n,'$name','$pass','$addr','$type')";
    mysqli_query($link,$query);
    header('location:user.php');
    mysqli_close($link);
}
}

?>


        <div class="container-fluid">
<div class="col-md-10 offset-md-1 text-center">
            <div class="card">
              <div class="card-header card-header-primary">
              <a  href="user.php">
               <i class="fas fa-angle-left pull-left"></i></a>
                <h5 class="title">Add User</h5>
              </div>
              <div class="card-body">
<form action="adduser.php?" >
<div class="col-md-12">
    <div class="form-group">
<labe>Phone Number</label>
<input  type="tel" name="p_n" class="form-control"><br/>
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
<labe>Name</label>
<input  type="tel" name="name"  class="form-control" required pattern="[A-Za-z].{1,}"><br/>
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
<labe>Password</label>
<input  type="text" class="form-control" name="pass"><br/>
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
<labe>Address</label>
<input  type="address" class="form-control" name="addr" ><br/>
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
<label>Type</label>
<select name="type" class="form-select ">
<option value="customer" selected class="text-center">Customer</option>
<option value="employee" class="text-center">Employee</option>
</select>
</div>
</div>
</div>
              <div class="card-footer text-center">
<input  type="submit" name="add_user" class="btn btn-fill btn-primary" value="Confirm" >
</div>
            </div>
          </div>
          
  
         </form>
          
        </div>
</div>

   