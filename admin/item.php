<?php
require_once('connection.php');
 
include('header.php');	
include('contain.php');
include('head.php');
?>

     


         <div class="col-md-14">
         
            <div class="card">
            
              <div class="card-header card-header-primary">
              <h5 class="card-title">Item
                  <a class=" btn btn-primary offset-md-9" href="additem.php">Add New Item</a>
              </h5>
              
              </div>
              
              

              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Manufacture</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


<?php 

if(!isset($_SESSION['phone_number'])){
	header('Location: ../index.php');
	}



if (isset($_SESSION['logged_in'])){
	
  if(!isset($_GET['btn_save']) or (isset($_GET['btn_hide']))){
		$query = "SELECT `item_id`,`image`,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,`hidden`  FROM `item` WHERE `hidden`='false' ";
		$result = mysqli_query($link, $query);
	
    

		while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$hidden)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='images/$image' style='width:50px; height:50px;'></td><td>$item_name</td>
                        <td>$item_price$</td>
						<td>$type</td>
						<td>$quantity</td>
						<td>$manufacture</td>
                        <td>
                        <a class=' btn btn-primary btn-sm' href='edititem.php?i_idv=$item_id'>Edit</a>

                        </td></tr>";
                        }
                        echo '</table>';
                       echo '<footer><form action="item.php"><button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary offset-md-9">View Hidden Items</button></form>
                  </footer>';
			mysqli_close($link);
                      }
		 }
     if(isset($_GET['btn_save'])) 
{
     $query = "SELECT `item_id`,`image`,`item_name`, `item_price`,`type`, `quantity`,`manufacture`,`hidden`  FROM `item` order by `hidden` asc";
     $result = mysqli_query($link, $query);
   
     
 
     while(list($item_id,$image,$item_name,$item_price,$type,$quantity,$manufacture,$hidden)=mysqli_fetch_array($result))
                         {
                         echo "<tr><td><img src='images/$image' style='width:50px; height:50px;'></td><td>$item_name</td>
                         <td>$item_price$</td>
             <td>$type</td>
             <td>$quantity</td>
             <td>$manufacture</td>
                         <td>
                         <a class=' btn btn-primary btn-sm' href='edititem.php?i_idv=$item_id'>Edit</a>
 
                         </td></tr>";
                         }
                         echo '</table>';
                         echo '<footer><form action="item.php"><button type="submit" id="btn_save" name="btn_hide" class="btn btn-fill btn-primary offset-md-9">Hide Hidden Items</button></form>
                         </footer>';
                         mysqli_close($link);
                        }

?>

			
		