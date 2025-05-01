<?php
require_once('database.php');
$database = new Database();
class Access{
	public static $product_table = 'product';
	public static $series_table = 'series';
	public static $category_table = 'category';
	public static $users_table = 'users';
	
	//	Product details are returned ie) id, model, description, rrp, series name and id, 
	//	returns  **SELECT product.id, product.model, product.description, product.rrp, series.seriesId, series.seriesName, 
	//	categoy.categoryId, category.categoryName FROM product, series, category WHERE product.seriesId = series.seriesId AND 
	//	series.categoryId = category.categoryId;
	public static function appropriate_mysql_selection(){
		return 'SELECT '. self::$product_table. '.id, '. self::$product_table. '.model, '. 
		self::$product_table. '.description, '. self::$product_table. '.rrp, '. 
		self::$series_table. '.seriesId, '. self::$series_table. '.seriesName, '.
		self::$category_table. '.categoryId, '. self::$category_table. '.categoryName '.
		'FROM '. self::$product_table. ', '. self::$series_table. ', '. self::$category_table. ' '. 
		'WHERE '. self::$product_table. '.seriesId = '. self::$series_table. '.seriesId '. 
		'AND '. self::$series_table. '.categoryId = '. self::$category_table. '.categoryId ';
	}
	//	All specs returned when given category and series id's.
	//	returns **SELECT product.*, series.seriesId, series.seriesName, category.categoyId, category.categoryName FROM 
	//	product, series, category WHERE product.seriesId = series.seriesId AND series.seriesId = category.categoryId 
	public static function specs_mysql_selection(){
		return 'SELECT '. self::$product_table. '.*, '. 
		self::$series_table. '.seriesId, '. self::$series_table. '.seriesName, '.
		self::$category_table. '.categoryId, '. self::$category_table. '.categoryName '.
		'FROM '. self::$product_table. ', '. self::$series_table. ', '. self::$category_table. ' '. 
		'WHERE '. self::$product_table. '.seriesId = '. self::$series_table. '.seriesId '. 
		'AND '. self::$series_table. '.categoryId = '. self::$category_table. '.categoryId ';
	}
	
	
	public static function find_all_by_id($id){
		$sql = self::specs_mysql_selection();
		$sql .= 'AND '. self::$product_table. '.id = '. $id;
		//return $sql;
		return $result_array = self::find_by_sql($sql);
	}
	public static function find_by_id($id){
		$sql = self::appropriate_mysql_selection();
		$sql .= 'AND '. self::$product_table. '.id = '. $id;
		//return $sql;
		return $result_array = self::find_by_sql($sql);
	}
	public static function find_by_sql($sql){
		global $database;
		$result = $database->query($sql);
		$class = get_class();
		$array = array();
		while ($row = mysql_fetch_object($result, $class)){
			$array[] = $row;
		}
		return $array;
	}
	public static function get_all_categories(){
		global $database;
		$sql = 	"SELECT categoryId, categoryName 
				FROM category";
		$result = $database->query($sql);
		return $result;
	}
	public static function get_series_for_categories($category_id){
		global $database;
		$sql = 	"SELECT seriesId, seriesName 
				FROM series 
				WHERE categoryId = {$category_id}";
		$result = $database->query($sql);
		return $result;
	}
	public static function affect_by_sql($sql){
		global $database;
		$result = $database->query($sql);
		$class = get_called_class();
		$array = array();
		while ($row = mysql_affected_rows($result)){
			$array[] = $row;
		}
		return $array;
	}
}
?>