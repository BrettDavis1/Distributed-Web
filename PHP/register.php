<?php

function my_autoloader($class) {
    include 'inc/' . $class . '.php';
}

spl_autoload_register('my_autoloader');

$db = new Connect();

if(isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = $db->secure($username);
    $email = stripslashes($_REQUEST['email']);
    $email = $db->secure($email);
    $password = stripslashes($_REQUEST['password']);
    $password = $db->secure($password);
    $password = password_hash($password, PASSWORD_ARGON2I);
    $address = stripslashes($_REQUEST['address']);
    $address = $db->secure($address);
    $city = stripslashes($_REQUEST['city']);
    $city = $db->secure($city);
    $state = stripslashes($_REQUEST['state']);
    $state = $db->secure($state);
    $zipcode = stripslashes($_REQUEST['zipcode']);
    $zipcode = $db->secure($zipcode);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = $db->secure($phone);

    $query = "INSERT INTO user (username, password, EmailAddress, Address, PhoneNumber) VALUES ('$username', '".md5($password)."', '$email', '$address', '$phone') ";

    $result = $db->query($query);

    if($result) {
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    } else {echo 'da fuck?';}

} else {

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
				<h1>Enter your information to sign up!</h1>
				<form action = "" method = "post">
				  Username:<br>
				  <input type="text" name="username"><br>
				  Password:<br>
				  <input type="password" name="password"><br>
				  Email:<br>
				  <input type="email" name="email"><br>
				  Street Address:<br>
				  <input type="text" name="address"><br>
				  City:<br>
				  <input type="text" name="city"><br>
				  State:<br>
				  <input type="text" name="state"><br>
				  ZIP Code:<br>
				  <input type="number" name="zipcode"><br>
				  Phone Number<br>
				  <input type="tel" name="phone"><br>
				  <br><input type="submit" value="Submit">
				</form>
			</div>
		</div>
    <?php } ?>
	</body>
</html>