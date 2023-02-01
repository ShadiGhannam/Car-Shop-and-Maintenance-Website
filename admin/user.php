<?php
require_once('connection.php');
 
include('header.php');	
include('contain.php');
include('head.php');
?>

        
        
<div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">  
              <h5 class="card-title">User List<a class=" btn btn-primary offset-md-9 " href="adduser.php">Add Users</a></h5>
                
              </div>
              <div class="card-body">
             
      
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                      <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

<?php 

if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
	
		
		$query = "SELECT `name`,`phone_number`,`address`,`type` FROM `user` WHERE `type`!='Manager'";
		$result = mysqli_query($link, $query);

		while(list($name,$phone_number,$address,$type)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$name</td><td>$phone_number</td>
                        <td>$address</td>
						<td>$type</td>
                        <td>
                        <a class=' btn btn-primary btn-sm' href='edituser.php?i_idv=$phone_number'>Edit</a>
                        </td></tr>";
                        }
			mysqli_close($link);
		 }