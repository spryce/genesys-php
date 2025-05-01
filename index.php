<?php
require_once('classes/page.php'); 
require_once('classes/product.php');

$products = new Page('products', true);
$session->messageBox();
if(isset($products->current_category)){
	echo Product::get_products_by_category($products->current_category);
} elseif(isset($products->current_series)){
	echo Product::get_products_by_series($products->current_series);
} else{
	echo Product::get_all_products();
}
?>
<?php echo $products->closeBody();?>