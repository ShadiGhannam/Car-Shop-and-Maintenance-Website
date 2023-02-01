<?php
require_once('connection.php');
 
include('header.php');	
include('contain.php');
include('head.php');
?>

     
        
        
         <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="card-title">Category<a class=" btn btn-primary offset-md-7" href="addcat.php">Add New Category</a></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                      <tr>
                        <th>Image</th>
                        <th>Category name</th>
                        <th>Description</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>


<?php 

if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
	
		
		$query = "SELECT `category_id`,`image`,`name`, `description` FROM `category` WHERE 1";
		$result = mysqli_query($link, $query);
	
		while(list($category_id,$image,$name,$description)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='images/$image' style='width:50px; height:50px;'></td><td>$name</td>
                        <td>$description</td>
					
                        <td>
                        <a class=' btn btn-primary btn-sm' href='editcat.php?i_idv=$category_id'>Edit</a>

                        </td></tr>";
                        }
			mysqli_close($link);
		 }
	


?>

			
		