<?php
require_once('access.php');
class Product{
	public static function get_specs_by_id($id){
		$result_array = Access::find_all_by_id($id);
		return self::get_product_specs($result_array);
	}
	public static function get_products_by_series($id){
		$sql = Access::appropriate_mysql_selection();
		$sql .= 'AND '. Access::$product_table. '.seriesId = '. $id;
		//return $sql;
		$result_array = Access::find_by_sql($sql);
		return self::product_grid($result_array);
	}
	public static function get_products_by_category($id){
		$sql = Access::appropriate_mysql_selection();
		$sql .= 'AND '. Access::$series_table. '.categoryId = '. $id;
		//return $sql;
		$result_array = Access::find_by_sql($sql);
		return self::product_grid($result_array);
	}
	public static function get_all_products(){
		$sql = Access::appropriate_mysql_selection();
		$result_array = Access::find_by_sql($sql);
		return self::product_grid($result_array);
	}
	public static function product_grid($result_array){
		$count = 0;
		$classes = array(' first', '', ' last');
		foreach ($result_array as $key=>$product){
			?>
					<div class="prod-grid<?php echo $classes[$count++]; $count %= 3 ?>">
						<a href="product.php?model=<?php echo $product->id;?>">
						<?php echo '<img src="images/products/'. strtolower($product->model). '.jpg" alt="' . $product->model . '">';?></a>
						<h2 class="prod-title"><a href="product.php?model=<?php echo $product->id;?>"><?php echo $product->model; ?></a></h2>
						<p class="prod-tree"><a href="index.php?category=<?php echo urlencode($product->categoryId);?>"><?php echo ucfirst($product->categoryName);?></a>&nbsp;&gt;&nbsp;<a href="index.php?series=<?php echo urlencode($product->seriesId);?>"><?php echo strtoupper($product->seriesName);?></a></p>
						<!-- <p class="prod-desc"><?php echo $product->description;?></p> -->
						<p class="hilight"><?php echo '$'.number_format($product->rrp, 2, '.', '');?></p>
						<p class="view"><a href="product.php?model=<?php echo $product->id;?>">View Product</a>
						<a class="order" href="cart.php?action=add&amp;model=<?php echo $product->id;?>">Add to Cart</a></p>
					</div><?php echo "\n";
		}
	}

	public function get_product_specs($result_array){
		global $session;
		foreach ($result_array as $key=>$product){?>
					<h2><?php echo strtoupper($product->model);?></h2>
					<div id="prodInfo">
					<div class="page"><?php 
					foreach ($product as $key=>$value) {
						if($value != NULL ){
							if(($key != "seriesId")&&($key !="id")&&($key != "seriesName")&&($key != "categoryId")&&($key != "categoryName")) {
								if ($key != "rrp") {?>
								
									<strong><?php echo ucfirst($key).": ";?></strong>
									<?php echo ucfirst($value);?><br />
									<?php echo "\n";
								} else {
								?>
								<strong><?php echo strtoupper($key).": $";?></strong>
								<?php echo ucfirst($value);?><br /><?php echo "\n";								 
								
								}
							} 	
						}
					}?>
					
					</div>
					<div id="prodImage">
						<div class="prod-grid border">
							<img src="images/products/<?php echo strtolower($product->model);?>.jpg" alt="">
							
							<p class="view"><?php if(!empty($session->prod_array)){?><a href="cart.php">View Cart</a>
							<?php }?><a href="images/galleries/<?php echo strtolower($product->model); ?>" class="galleryLink">More Images</a>
									<a class="order" href="cart.php?action=add&amp;model=<?php echo $product->id;?>">Add to Cart</a></p>
							<br />
						</div>
					</div>
					</div>
					<div id="gallery">
						<?php 
							$string = strtolower($product->model);
							global $new_string;
							$new_string = ereg_replace("[^A-Za-z0-9]", "", $string); 
							?>
						<script type="text/javascript" src="images/galleries/<?php echo $new_string; ?>/bin/images/large/getalbumpics.php?id=<?php echo $new_string; ?>"></script>
						<script type="text/javascript">
		
						new phpimagealbum({

							albumvar: <?php echo $new_string; ?>, //ID of photo album to display (based on getpics.php?id=xxx)
							dimensions: [8,1],
							sortby: ["file", "asc"], //["file" or "date", "asc" or "desc"]
							autodesc: "", //Auto add a description beneath each picture? (use keyword %i for image position, %d for image date)
							showsourceorder: false, //Show source order of each picture? (helpful during set up stage)
							onphotoclick:function(thumbref, thumbindex, thumbfilename){
								thumbnailviewer.loadimage(thumbref.src, "fit2screen")
							}
						})

						</script>
					</div>
					

			<?php echo "\n";
		}
	}
}
?>