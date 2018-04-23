<?php
session_start();
function my_autoloader($class) {
    include 'inc/' . $class . '.php';
}

spl_autoload_register('my_autoloader');

$db = new Connect();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="css/home.css">
	</head>
	<body>
		<header class="w3-container w3-xlarge w3-padding-24" style="background-color: #0D10D4;">
			<div class="w3-container">
				<a href="logout.php"><button class="w3-button w3-large w3-right" style="background-color: #0D10D4; color: #ffffff;">Logout</button></a>
				<h1 style="font-size:200em;" class="w3-large w3-center">Rent A Movie</h1>
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
				<h1 style="text-align: center;" class="w3-margin-top"><b><?php if(isset($_SESSION['id'])) {
				    $query = "SELECT * FROM user WHERE id = '".$_SESSION['id']. "'"; $result = $db->query($query);
				    $user = mysqli_fetch_assoc($result); echo $user['username'];',';}?> Welcome to Rent A Movie</b>
					<h4 style="text-align: center;" class="w3-margin-top"></h4>
				</h1>
			</div>
		</div>
		<div style="padding-bottom: 16.5px;"></div>
			<div class="w3-card w3-container" style="min-height: 280px; background-color: #8C8EFA; color: #000000;">
				<h1 style="text-align: center;" class="w3-margin-top"><b>Popular Movies</b>
					<h4 style="text-align: center;" class="w3-margin-top">Sign in to see more Movies</h4>
					<h4 style="text-align: center;" class="w3-margin-top">List of movies</h4>
					<?php
                    $id = $_SESSION['id'];
                    $mid = $db->query("SELECT mid FROM history WHERE uid = '$id'");
                    while($row = $mid->fetch_row()) {
                        $rows[]=$row;
                    }

                    foreach ($m as $rows)
                        print_r($m);
                     for($i = 0; $i < count(rows); $i++) {
                        $movies[$i] = $db->query("SELECT title FROM movies WHERE id = '$rows[$i]'");
                        print_r($movies[$i]);
                    }
					?>
				</h1>
			</div>
		</div>
		<div style="padding-bottom: 16.5px;"></div>
		<footer class="w3-container w3-center w3-padding-16 w3-margin-top" style="background-color: #8C8EFA; color: #ffffff;">
			<p>COPYRIGHT INFO</p>
		</footer>
	</body>
</html>

