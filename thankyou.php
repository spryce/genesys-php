<?php 
	require_once('classes/page.php');
	
	$thankyou = new Page(thankyou, true);	
?>	
	<div class="page-grid">
	<h3>Thanks!</h3><br />

	<p>Your message has been sent. <br /><br />
	
	<a href="index.php">Return to the home page</a>

	</div>
<?php	
	echo $thankyou->closeBody();
	
	
?>