<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8"/>
<title>Car Shop &#8226;&nbsp; Login page </title>
<link rel="stylesheet" type="text/css" href="/seniorproject/css/style.css"/>
</head>

<body>
<?php
session_start();
session_destroy();
?>

<div class="container">
	<div class="header">
		<h1>Login</h1>
		<img src="/seniorproject/admin/images/logo.jpeg"/>
		
	</div>
	<div class="main">
		<form action="/seniorproject/admin/logincheck.php">
			<span>
				
				<img src="/seniorproject/admin/images/phone.png" class="user">
				<input id="id1" type="tel" name="phone" placeholder="Phone Number" required pattern="^[0-9]{8}$">
			</span><br>
			<span>
				<img src="/seniorproject/admin/images/pas.png" class="pass">
				<input id="id2" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" name="password" placeholder="Password">
			</span><br><br>
			 
	<button name="submit" >Login</button><br>
	<p class="two">
			Don't have an account? <a href="/seniorproject/SignUp.php">Sign Up</a>
	</p>
		</form>
	</div>
</div>
		
	
	
</body>	



</html>