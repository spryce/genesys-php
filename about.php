<?php
require_once('classes/page.php');
$about = new Page(about, true);	
?>
<div class="page-grid">
	<h3>About Genesys Music</h3><br />

	<p>Our mission is to provide high quality alternatives to over marketed products at an unbeatable price.</p>

	Genesys guitars are manufactured on the same production line as some of the worlds biggest known brands today. 
	We choose only the best exotic timbers and take maximum pride in our quality control procedures. 
	We are also proud to incorporate such names as Wilkinson and Seymour Duncan in a product that we know will give you the return you are looking for in a guitar.

	Genesys Music are a 100% Australian owned company and have a combined experience of over 40 years in the Australian market. <br /><br />
	Our experience and presence both here and offshore concretes our ability to ensure that only the finest quality instrument be available from your local dealer. 
	 
	<a href="testimonials.php">Click here for feedback from other satisfied Genesys Music customers.</a><br />
</div>

<?php echo $about->closeBody2();?>
