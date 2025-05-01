<?php
require_once('classes/page.php');


$testimonials = new Page(testimonials, true);	

?>

<div class="page-grid">
	<h3>Customer Testimonials</h3><br />
	<p>Checkout the feedback from our online customers or visit our online store for more information <br /> 
	<a href="http://feedback.ebay.com.au/ws/eBayISAPI.dll?ViewFeedback2&amp;userid=genesys_aus&amp;&amp;sspagename=VIP:feedback&amp;ftab=FeedbackAsSeller" title="Genesys Music Online Transaction record" target="_blank" >Genesys live customer feedback</a><a href="http://feedback.ebay.com.au/ws/eBayISAPI.dll?ViewFeedback2&amp;userid=genesys_aus&amp;&amp;sspagename=VIP:feedback&amp;ftab=FeedbackAsSeller" title="Genesys Music Online Transaction record" target="_blank"></a>&nbsp;&nbsp; || &nbsp;&nbsp;<a href="http://genesysmusic.com.au/store" target="blank" title="Genesys Music Online Retail Store" >Genesys Music Online Retail Store </a></p>
</div>
<div class="page-grid">
      <p>Stoked! Plays and sounds great-good service and delivery. Really nice guitar man!<br />
      &nbsp;&nbsp;- Max, Fairfield NSW</p>

      <p>The guitar is beautifully made more important it sounds awesome.<br />
      &nbsp;&nbsp;- Chris, Adelaide SA</p>
      <p>Package arrived in good time.  Guitar was as advertised and good value for money.<br />
      &nbsp;&nbsp;- Unknown</p>
      <p>Awesome instrument!  Easily worth the full RRP price!<br />
      &nbsp;&nbsp;- Michelle, Miranda NSW</p>
      <p>Very happy with the guitar. Plays nice. Good quality too! Thanks heaps.<br />
      &nbsp;&nbsp;- Kat, Caloundra QLD</p>
      <p>Good advice, Good Service, Very impressed with Guitar and Case Quality, ""Tops"" <br />
      &nbsp;&nbsp;- John, Cairns QLD</p>
      <p>Great communication. Very happy with the guitar case.<br />
      &nbsp;&nbsp;- Slick, QLD</p>
      <p>Great service and excellent delivery. I would recommend to anyone.<br />
      &nbsp;&nbsp;- Vic, QLD</p>
      <p>Beautiful guitar, Customer service wonderful, Quality at a great price, Thankyou<br />
      &nbsp;&nbsp;- Cindy, Newcastle NSW</p>


	<p><strong><a href="contact.php">Have your say here!</a></strong></p>
	
	
</div>

<?php echo $testimonials->closeBody2();?>
