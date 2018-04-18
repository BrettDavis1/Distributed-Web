<?php
session_start();
require_once ('./inc/core.php');
require_once ('./inc/users.php');
$users = new Users();
$core = new Core('home');
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
			<a href="movies.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Movies</a>
			<a href="cart.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Cart</a>
			<a href="history.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">History</a>
			<a href="contact.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Contact Us</a>
		</div>
		<div class="w3-row-padding w3-center w3-margin-top">
			<div class="w3-card w3-container" style="min-height: 150px; background-color: #8C8EFA; color: #000000;">
				<h1>List of Movies</h1>
				<?php
                $query = $users->getMovies();
                if($query->num_rows > 0){
                while($movies = $query->fetch_assoc()){
				?>
                <div class="item col-lg-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4 class="list-group-item-heading"><?php echo $movies["title"]; ?></h4>
                            <p class="list-group-item-text"><?php echo $movies["description"]; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead"><?php echo '$'.$movies["price"].' USD'; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $movies["id"]; ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ ?>
                <p>Product(s) not found.....</p>
                <?php } ?>
            </div>
        </div>
			</div>
		</div>
	</body>
</html>