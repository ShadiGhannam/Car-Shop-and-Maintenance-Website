

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8"/>


      <link href="/seniorproject/css/css/bootstrap.min.css" rel = "stylesheet"/>
<script src="/seniorproject/css/js/bootstrap.min.css"></script>
</head>


<body>
<?php
session_start();
?>
	
	
	


<div class=" card-header-primary text-bg-dark">
	<h1 class="offset-sm-0 text-bg-dark">AMG Group<a class="float-right" style="text-decoration: none;" href="logout.php"><span  class="fs-4 text-white"><?= $_SESSION['name']?></span>&nbsp;<img src="/seniorproject/admin/images/logout.jpg" width="20px" height="20px"/></a></h1>
</div>
		

	
</body>	



</html>