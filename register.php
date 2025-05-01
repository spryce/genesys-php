<?php
require_once('classes/page.php'); 
require_once('classes/user.php'); 
$message = NULL;
function loginNow(){
	global $message;
	global $session;
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	// Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
	if ($found_user){
		$session->login($found_user);		
		Page::redirect_to("checkout.php");
	} else{
		// username/password combo was not found in the database
		$message = "Username/password combination incorrect.";
	}
}
if(isset($_POST['login'])){
	loginNow();
}elseif(isset($_POST['signup'])){
	$username = trim($_POST['username']);
	$found_user = User::userExists($username);
	if($found_user == true){
		$message = "The username {$_POST['username']} is already in use.";
	}else{
		User::createUser($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['emailaddress']);
		loginNow();
	}
}

$register = new Page('register', true);?>
<p>Please log into your authorised Genesys reseller account to complete this order.</p>
<p>If you are not an authorised Genesys reseller, you can apply for registration <a href="contact.php">here.</a></p>
<br /><?php "\n";
if (!empty($message)){ 
	echo "<p class=\"message-box\">{$message}</p>";
}?>
<form style="width:340px; float: left;" onSubmit="return validate_form_user(this);" action="register.php" method="post">
<h2>Login</h2>
	<p style="margin: 0px;">Username: </p>
	<input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
	<span style="display: inline-block;" id="username-error" style="color: red;"></span>
	<p style="margin: 0px;">Password: </p>
	<input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
	<span style="display: inline-block;" id="password-error" style="color: red;"></span>
	<input style="display: block;" type="submit" name="login" value="Login" />
</form>

<!--
<form style="width:340px; float: right;" onSubmit="return validate_form(this);" action="register.php" method="post">
<h2>Register</h2>
	<p style="margin: 0px;">First Name: </p>
	<input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'];?>" />
	<span style="display: inline-block;" id="firstname-error" style="color: red;"></span>
	<p style="margin: 0px;">Last Name: </p>
	<input type="text" id="lastname" name="lastname" value="<?php echo $_POST['lastname'];?>" />
	<span style="display: inline-block;" id="lastname-error" style="color: red;"></span>
	<p style="margin: 0px;">Desired Username: </p>
	<input type="text" id="username" name="username" />
	<span style="display: inline-block;" id="username-error2" style="color: red;"></span>
	<p style="margin: 0px;">Set Password: </p>
	<input type="password" id="password" name="password" />
	<span style="display: inline-block;" id="password-error2" style="color: red;"></span>
	<p style="margin: 0px;">Email Address: </p>
	<input type="text" id="emailaddress" name="emailaddress" value="<?php echo $_POST['emailaddress'];?>" />
	<span style="display: inline-block;" id="emailaddress-error" style="color: red;"></span>
	<input style="display: block;" type="submit" name="signup" value="Register" />
	*************** -->
</form>
<?php echo $register->closeBody();?>