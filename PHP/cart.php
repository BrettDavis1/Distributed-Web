<?php
include './inc/cart.php';
$cart = new Cart();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./css/home.css">
        <script>
            function updateCartItem(obj,id){
                $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                    if(data == 'ok'){
                        location.reload();
                    }else{
                        alert('Cart update failed, please try again.');
                    }
                });
            }
        </script>
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
				<h1>Cart</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($cart->total_items() > 0){
                        //get cart items from session
                        $cartItems = $cart->contents();
                        foreach($cartItems as $item){
                            ?>
                            <tr>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo '$'.$item["price"].' USD'; ?></td>
                                <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                                <td>
                                    <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        <?php } }else{ ?>
                    <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                        <td colspan="2"></td>
                        <?php if($cart->total_items() > 0){ ?>
                            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
                            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
                        <?php } ?>
                    </tr>
                    </tfoot>
                </table>
			</div>
		</div>
	</body>
</html>