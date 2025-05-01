<?php
require_once('classes/page.php'); 
$page = new Page('dealer login', true);
if (!$session->is_logged_in()){
	Page::redirect_to("register.php");
}
?>