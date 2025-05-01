<?php
require_once('classes/page.php');
$cart = new Page('cart', true);
?>

<h3>Please note:</h3>
<p>This cart is for Genesys resellers only. <br />For great retail deals on Genesys guitars please check out <a href="http://genesysmusic.com.au/store" target="_blank">http://genesysmusic.com.au/store</a></p>

<?php
if(empty($session->prod_array)){
	$_SESSION['message'] .= "There is nothing in your cart. ";
}

$session->messageBox();
print_r($session->build_cart_table());
if(!empty($session->prod_array)){?><p class="view"><a class="order" href="checkout.php">Checkout</a><a class="order" href="cart.php?action=empty">Empty Cart</a><p/><?php } echo "\n";
?>
<?php echo $cart->closeBody();?>