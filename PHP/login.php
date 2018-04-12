<?php
session_start();
require_once ('./inc/core.php');
$core = new Core('login');
$core->load();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./css/home.css">
	</head>
	<body>
		<header class="w3-container w3-xlarge w3-padding-24" style="background-color: #0D10D4;">
			<div class="w3-container">
				<a href="login.php"><button class="w3-button w3-large w3-right" style="background-color: #0D10D4; color: #ffffff;">Login</button></a>
				<a href="register.php"><button class="w3-button w3-large w3-right" style="background-color: #0D10D4; color: #ffffff;">Create Account</button></a>
			</div>
		</header>
		<div class="w3-bar w3-card" style="background-color: #8C8EFA; color: #ffffff;">
			<a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
			<a href="movies.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Movies</a>
			<a href="cart.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Cart</a>
			<a href="history.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">History</a>
			<a href="contact.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Contact Us</a>
		</div>
		<div class="w3-row-padding w3-center w3-margin-top">
			<div class="w3-card w3-container" style="min-height: 150px; background-color: #8C8EFA; color: #000000;">
				<h1>Login</h1>
				<form action="" method="post">
				  Username:<br>
				  <input type="text" name="username">
				  <br>
				  Password:<br>
				  <input type="password" name="password">
				  <br><br>
				  <input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</body>
</html>