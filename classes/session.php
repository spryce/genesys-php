<?php
require_once('access.php'); 
class Session{
	private $logged_in = false;
	public $user_id;
	public $prod_array = array();
	public $total_rrp;
	function __construct(){
		session_start();
		if(isset($_SESSION['cart'])){
			$this->prod_array = $_SESSION['cart'];
		}
		$this->check_login();
	}
	public function is_logged_in() {
		return $this->logged_in;
	}
	public function login($user) {
		// database should find user based on username/password
		if($user){
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
		}
	}
	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}
	private function check_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		}else{
			unset($this->user_id);
			$this->logged_in = false;
		}
	}
	public function view(){
		return $this->prod_array;
	}
	public function add($value){
		$this->prod_array[] = $value;
		$_SESSION['cart'] = $this->prod_array;
	}
	public function remove($value){
		foreach($this->prod_array as $key=>$id){
			if($id == $value){
				unset($this->prod_array[$key]);
				break;
			}
		}
		$_SESSION['cart'] = $this->prod_array;
	}
	public function emptyCart(){
		session_destroy();
		session_start();
	}
	public function build_cart_table(){?>
					<table border="1" cellpadding="4px" width="100%">
						<tr><td>Preview</td><td>Product</td><td>Category</td><td>Series</td><td align="right">RRP</td><td align="center">Remove</td></tr><?php echo "\n";
		foreach($this->view() as $key=>$id){
			$result_array = Access::find_by_id($id);
			foreach ($result_array as $key=>$product){?>
						<tr>
							<td><a href="product.php?model=<?php echo strtolower($product->id);?>"><?php echo '<img src="images/products/'. strtolower($product->model). '.jpg" width="40px" >';?></td>
							<td><?php echo $product->model; ?></td>
							<td><?php echo ucfirst($product->categoryName);?></td>
							<td><?php echo strtoupper($product->seriesName);?></td>
							<td align="right"><?php echo '$'.number_format($product->rrp, 2, '.', '');?></td>
							<td align="center"><a class="remove" href="cart.php?action=remove&model=<?php echo $product->id; ?>"><img src="images/remove.jpg" alt="remove"></a></td>
						</tr><?php echo "\n";
				$total_rrp += $product->rrp;
			}
		}?>
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total: </strong></td><td align="right"><strong><?php echo '$'.number_format($total_rrp, 2, '.', '');?></strong></td><td>&nbsp;</td></tr>
					</table><?php echo "\n";
	}
	public function messageBox(){
		if(isset($_SESSION['message'])){?>
			<p class="message-box"><?php echo $_SESSION['message'];?></p><?php echo "\n";
			unset($_SESSION['message']);
		}
	}
	public function checkout(){
		global $database;
		$sql = "INSERT INTO orders (userId) ";
		$sql .= "VALUES (" . $this->user_id . ") ";
		$result = $database->query($sql);
		$orderId = mysql_insert_id();
		$sql = "INSERT INTO orderline (orderId, productId) VALUES ";
		foreach ($this->view() as $key => $id){
			$sql .= "(" . $orderId .", " . $id . "), ";
		}
		$result = $database->query(substr($sql, 0, -2));
		if($result){
			$this->emptyCart();
			$_SESSION['message'] = "Your order has been processed. ";
			$this->logout();
			$_SESSION['message'] .= "You have been Logged out. Thankyou for choosing Genesys \m/";
		}else{
			$_SESSION['message'] = "Your order was not processed. Please checkout again.";
		}
		Page::redirect_to('index.php');
	}
}
$session = new Session();
?>