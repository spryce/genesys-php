<?php
require_once('classes/page.php');


$contact = new Page(contact, true);	

?>
<div class="page-grid">
	<a href="http://genesysmusic.com.au/store" title="Genesys Music online store" target="blank" title="Genesys Music Online Retail Store">
	<strong>Genesys Music online sales</strong></a><br />
	For hot online deals direct to the public check out our store at 
	<a href="http://genesysmusic.com.au/store" title="Genesys Music online store" target="blank" title="Genesys Music Online Retail Store">genesysmusic.com.au/store </a>
</div>
<div class="page-grid">
	<a href="testimonials.php" title="Genesys Music Customer Testimonials">
	<strong>Customer Testimonials</strong></a><br />
	To hear from other satisfied Genesys customers check out  
	<a href="testimonials.php" title="Genesys Music Customer Testimonials">Genesys Music Customer Testimonials</a>
</div>
<div class="page-grid">	
	<a href="contactform.php" title="Contact Genesys Music">
	<strong>Contact Genesys Music</strong></a><br />
	For all customer feedback, service and new reseller enquiries please contact us <a href="contactform.php" title="Contact Genesys Music">via our online contact form</a>
</div>

<?php echo $contact->closeBody2();?>
