<?php
require_once('classes/page.php'); 
if (!$session->is_logged_in()){
	Page::redirect_to("register.php");
}
echo $session->checkout();
?>