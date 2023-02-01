

<?php

	require_once('connection.php');
	extract($_GET);
	session_start();
	//fixing SQL Injection issues
	// cleanup input first:
	$phone = stripslashes($phone);
	$phone = mysqli_real_escape_string($link, $phone);

	// select based on username only
	$query = "SELECT * FROM user WHERE phone_number='$phone';";
	$result = mysqli_query($link, $query);

	if(!$result) {
		header("location: ../index.php");
	} else if (mysqli_num_rows($result) != 1){ // check that the user is unique
		header("location: ../index.php");
	} else{
		$row = mysqli_fetch_assoc($result);
		if (md5($password) == $row['password'] && $row['type']=='Manager') {
		
			$_SESSION['logged_in'] = true;
			$_SESSION['phone_number'] = $phone;
			$_SESSION['name']= $row['name'];
			header("location: dashboard.php");
		}elseif (md5($password) == $row['password'] && $row['type']=='customer') {
			$_SESSION['logged_in'] = true;
			$_SESSION['phone_number'] = $phone;
			$_SESSION['name']= $row['name'];
			header("location: ../index.php");
		}
		elseif (md5($password) == $row['password'] && $row['type']=='employee') {
			$_SESSION['logged_in'] = true;
			$_SESSION['phone_number'] = $phone;
			$_SESSION['name']= $row['name'];
			header("location: /seniorproject/Employee/order.php");
		}
		else {
			echo "<script>alert('User does not exist'); location.replace('login.php')</script>";
		
		}
		mysqli_close($con);
	}
	
	
	
	?>
	