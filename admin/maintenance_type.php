<?php
require_once('connection.php');
 
include('header.php');	
include('contain.php');
include('head.php');
?>
     
        
     <div class="col-md-14">
            <div class="card" >
              <div class="card-header card-header-primary">
                <h5 class="card-title"> Maintenance List<a class=" btn btn-primary offset-md-5 " href="addmaint.php">Add Maintenance Type</a></h5>
                
              </div>
              <div class="card-body">
 
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                      <tr>
                        <th>Maintenance Type</th>
                         <th>Cost</th>
                         <th>Description</th>
                       
                        <th>Update</th>
                        
                      </tr>
                    </thead>
                    <tbody>

<?php 

if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
	
		
		$query = "SELECT `maintenance_id`,`type`,`price`,`description` FROM `maintenance_type`";
		$result = mysqli_query($link, $query);

		while(list($maintenance_id,$type,$price,$description)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$type</td><td>$price$</td><td>$description</td>
                      
						
                        <td>
                        <a class=' btn btn-primary btn-sm' href='editmaint.php?maint_idv=$maintenance_id'>Edit</a>
                        </td></tr>";
                        }
			mysqli_close($link);
		 }