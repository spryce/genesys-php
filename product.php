<?php
require_once('classes/page.php'); 
require_once('classes/product.php'); 

$product = new Page('product', true);
if(isset($product->current_model)){
	echo Product::get_specs_by_id($product->current_model);
} else{
	echo "Could not find {$product->current_model}";
}
?>
<?php echo $product->closeBody();?>