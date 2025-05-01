<?php
require_once('session.php');
require_once('access.php');
class Page {
	private $name;
	private $hasProd_grid;
	public $current_category;
	public $current_series;
	public $current_model;
	public $action;
	
	function __construct($name, $hasProd_grid = false){
		$this->setName($name);
		$this->hasProd_grid = $hasProd_grid;
		$this->setCurrent();
		if($this->getName() == 'cart' && !empty($_GET)){
			$this->processGetVars();
		}
		echo $this->getHead();
		echo $this->openBody();
	}
	// perform query to retrieve model name by id
	// public function return_model_name($model_id = $this->current_model){
		// Access::find_by_id($model_id);
		// echo $model_id;
	// }
	
	
	
	private function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setCurrent(){
		if(isset($_GET['category'])){
			$this->current_category = (int)$_GET['category'];
		}elseif (isset($_GET['series'])){
			$this->current_series = (int)$_GET['series'];
		}elseif (isset($_GET['model'])){
			$this->current_model = (int)$_GET['model'];
		}
		if (isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
	}
	public static function redirect_to($location = NULL){
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	public function processGetVars(){
		global $session;
		$forbidden = array();
		foreach($_GET as $var=>$value){
			if($var == 'action' || $var == 'model' || $var == 'series' || $var == 'category'){
			}else{
				$forbidden[] = $var;
			}
		}
		while(isset($forbidden)){
			if(!empty($forbidden)){
				if(count($forbidden) == 1){
						$_SESSION['message'] = $forbidden[0]. " is not a supported keyword. ";
						break;
				}else{
					$_SESSION['message'] = "The following keywords are not supported by this page: \n";
					$_SESSION['message'] .= "<ul>\n";
					foreach($forbidden as $var=>$value){
						$_SESSION['message'] .= "\t<li>{$value}</li>\n";
					}
					$_SESSION['message'] .= "</ul>\n";
					break;
				}
			}
			if(isset($this->current_model)){
				if(isset($this->action)){
					if($this->action == 'add'){
						$session->add($this->current_model);
						$_SESSION['message'] = "model id ". $this->current_model. " was added to your shopping cart. ";
						break;
					}elseif($this->action == 'remove'){
						$session->remove($this->current_model);
						$_SESSION['message'] = "remove model id ".$this->current_model." from cart. ";
						break;
					}else{
						$_SESSION['message'] = $this->action." is not yet a supported action or is incorrect. ";
						break;
					}
				} else {
					$_SESSION['message'] = "a model number was retrieved but no action specified. ";
					break;
				}
			}elseif(isset($this->current_series)){
				if(isset($this->action)){
					if($this->action == 'add'){
						$_SESSION['message'] = "you cannot add an entire series in this way. Nothing has been added to the cart. ";
						break;
					}elseif($this->action == 'remove'){
						$_SESSION['message'] = "you cannot remove an entire series in this way. Nothing has been removed from the cart. ";
						break;
					}else{
						$_SESSION['message'] = $this->action." is not yet a supported action or is incorrect. Regardless, you cannot add, remove or edit products on a series level. enter a model id. ";
						break;
					}
				} else {
					$_SESSION['message'] = "you cannot add, remove or edit products by series. enter a model id. ";
					break;
				}
			}elseif(isset($this->current_category)){
				if(isset($this->action)){
					if($this->action == 'add'){
						$_SESSION['message'] = "you cannot add an entire category in this way. Nothing has been added to the cart. ";
						break;
					}elseif($this->action == 'remove'){
						$_SESSION['message'] = "you cannot remove an entire category in this way. Nothing has been removed from the cart. ";
						break;
					}else{
						$_SESSION['message'] = $this->action." is not yet a supported action or is incorrect. Regardless, you cannot add, remove or edit products on a category level. enter a model id. ";
						break;
					}
				} else {
					$_SESSION['message'] = "you cannot add, remove or edit products by category. enter a model id. ";
					break;
				}
			}elseif(isset($this->action)){
				if($this->action == 'add'){
					$_SESSION['message'] = "No model number was retrieved. Nothing has been added to the cart. ";
					break;
				}elseif($this->action == 'remove'){
					$_SESSION['message'] = "No model number was retrieved. Nothing has been removed from the cart. ";
					break;
				}elseif($this->action == 'empty'){
					if(isset($_SESSION['cart'])){
						$session->emptyCart();
						$_SESSION['message'] = "Your cart has been emptied. ";
						break;
					}
				}else{
					$_SESSION['message'] = $this->action." is not yet a supported action or is incorrect. Regardless, a model id has not been retrieved. ";
					break;
				}
			}else{
				$_SESSION['message'] = "just viewing the cart. ";
				break;
			}
		}
		self::redirect_to('cart.php');
	}
	
	
	
	private function getHead(){?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="stylesheets/reset.css" type="text/css">
<link rel="stylesheet" href="stylesheets/style.css" type="text/css"><?php echo "\n";
if($this->hasProd_grid){?>
<link rel="stylesheet" href="stylesheets/prod-grid.css" type="text/css"><?php echo "\n";
}
?>



<script type="text/javascript">

//Optional, manual description for particular pictures inside album
//Syntax: albumid.desc[index]="Picture description here"
//eg: myvacation.desc[2]="This is description for the 3rd picture in the album"
//eg: myvacation.desc[6]="This is description for the 7th picture in the album"

</script>

<script type="text/javascript" src="javascript/ddphpalbum.js">

/***********************************************
* PHP Photo Album script v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<link rel="stylesheet" type="text/css" href="stylesheets/ddphpalbum.css" />
<?php 
if($this->getName() == 'register' || 'contactform'){?>
<script type="text/javascript" src="javascript/validate.js"></script><?php echo "\n";
}
if($this->getName() == 'about'|| 'contact'){?>
<script type="text/javascript" src="crawler.js"></script><?php echo "\n";
}?>
<title>Genesys Music- <?php echo ucfirst($this->getName());?></title>
</head><?php echo "\n";
	}// end getHead()
	
	private function openBody(){
	global $session;?>
<body class="<?php echo $this->getName(); if($this->hasProd_grid){ echo ' prod-grid';}?>">
	<div id="container">
		<div id="wrapper">
			<div id="logo">
			<img class="logo-img" src="images/genesys_logo2.gif" alt="Genesys">
			</div><!--end logo-->
			<?php echo "\n";
			echo self::nav('nav');?>
			<div id="main-content">
				<div class="sidebar"><?php
					self::nav('sub');?>
					
					
				<!-- Inserted a new nav********************************************************** -->
				<div class="sidebar">
				<ul class="sub">
				<li><h3><a href="login.php">Dealer Login</a></h3></li>
				</ul>
				</div>
				</div><!-- sidebar -->
				

				<div class="main-body"><?php echo "\n";
	}// end openBody()
	
	public static function nav($class){?>
			<ul class="<?php echo $class;?>"><?php echo "\n";?>
				<li><h3><a href="index.php">All Products</a></h3></li><?php echo "\n";
			$category_set = Access::get_all_categories();
			while ($category = mysql_fetch_array($category_set)){?>
				<li><h3><a href="index.php?category=<?php echo urlencode($category["categoryId"]);?>"><?php echo ucfirst($category["categoryName"]); 
				if($category["categoryId"] != 4){echo ' Guitars';}?></a></h3><?php echo "\n";
					$series_set = Access::get_series_for_categories($category["categoryId"]);
					if($class != 'sub'){?>
						<ul class="subnav"><?php echo "\n";
						while ($series = mysql_fetch_array($series_set)){?>
							<li><a href="index.php?series=<?php echo urlencode($series["seriesId"]);?>"><?php echo strtoupper($series["seriesName"]);?> Series</a></li><?php echo "\n";
						}?>
						</ul><?php echo "\n";
					}?>
				</li><?php echo "\n";
			}
			
			if($class != 'sub'){?>
				<li style="float: right;"><h3><a href="login.php">Dealer Login</a></h3></li><?php echo "\n";
				?>
				<?php echo "\n";
			}?>
				<li><h3><a href="about.php">About Genesys</a></h3></li>
				<li><h3><a href="contact.php">Contact</a></h3></li>
			</ul><!-- end nav --><?php echo "\n";
	}// end nav()
	
	public function closeBody(){?>
				</div><!-- main-body -->
			</div><!-- main-content -->

			<div class="footer">
				<p>Copyright &copy; Genesys Music <?php echo date("Y", time());?>  |&nbsp;&nbsp;&nbsp;| The Genesys logo is a registered trademark &reg; </p>
				<a href="includes/privStatFinal5202.html" >Privacy Policy Statement</a>
			</div><!-- footer -->
		</div><!-- wrapper -->
	</div><!-- container -->
</body>
</html><?php 
	}// end closeBody()
	
		public function closeBody2(){?>
				</div><!-- main-body -->
			</div><!-- main-content -->
			<div class="crawler">
			
				<div class="marquee" id="mycrawler2">
				<img src="images/134-0001.jpg" /> <img src="images/134-0002.jpg" /> <img src="images/134-0003.jpg" /> 
				<img src="images/134-0004.jpg" /> <img src="images/134-0005.jpg" /> <img src="images/134-0006.jpg" /> 
				<img src="images/134-0007.jpg" /> <img src="images/134-0008.jpg" /> <img src="images/134-0009.jpg" /> 
				<img src="images/134-0010.jpg" /> <img src="images/134-0011.jpg" /> <img src="images/134-0012.jpg" /> 
				<img src="images/134-0013.jpg" /> <img src="images/134-0014.jpg" /> 
				</div>

				<script type="text/javascript">
					marqueeInit({
						uniqueid: 'mycrawler2',
						style: {
							'padding': '2px',
							'width': 'inherit',
							'height': '100px'
						},
						inc: 4, //speed - pixel increment for each iteration of this marquee's movement
						mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
						moveatleast: 1,
						neutral: 150,
						savedirection: true
					});
				</script>
			</div>
			<div class="footer">
				<p>Copyright &copy; Genesys Music <?php echo date("Y", time());?>  |&nbsp;&nbsp;&nbsp;| The Genesys logo is a registered trademark &reg; </p>
				<a href="includes/privStatFinal5202.html" >Privacy Policy Statement</a>
			</div><!-- footer -->
		</div><!-- wrapper -->
	</div><!-- container -->
</body>
</html><?php 
	}// end closeBody2()
}
?>