<?php
require_once('classes/page.php');


$test = new Page(test, true);	

?>
<div class="page-grid">
			<script language="JavaScript" type="text/javascript">
			function gotourl(url){ 
				window.location= url;
			}
			</script>
			
			
			
			
	All fields required	* <br /><br />
<form name="contactform" onSubmit="return validate_reseller_inquiry(this);" action="forms/formdata.php" method="post">	
		<?php require_once('forms/recapture.php'); ?>
	
	<table border="0" cellpadding="8" cellspacing="8" summary="contact form">
		
		<tr>
			<td><label for="subject">Subject: </label></td>
			<td><select name="subject" id="subject" onchange="gotourl(this.value)">
				<option value="" >Please Select</option>
				<option value="customerfeedback.php" >Customer feedback</option>
				<option selected value="resellerinquiry.php">Reseller inquiry</option>
				<option value="servicerequest.php">Service request</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="firstname">First Name</label>:</td>
			<td><input type="text" name="firstname" id="firstname" size="25" <?php echo $_POST['firstname'];?>/> *
			<span style="display: inline-block;" id="firstname-error" style="color: red;"></span>
			</td>
		</tr>
		<tr>
			<td><label for="lastname">Last Name</label>:</td>
			<td><input type="text" name="lastname" id="lastname" size="25" <?php echo $_POST['lastname'];?>/> *
			<span style="display: inline-block;" id="lastname-error" style="color: red;"></span></td>
		</tr>	
		<tr>
			<td><label for="company">Company</label>:</td>
			<td><input type="text" name="company" id="company" size="25" <?php echo $_POST['company'];?>/> *
			<span style="display: inline-block;" id="company-error" style="color: red;"></td>
		</tr>
		<tr>
			<td><label for="email">Email</label>:</td>
			<td><input type="text" id="email" name="email" size="25" value="<?php echo $_POST['emailaddress'];?>"/> *
			<span style="display: inline-block;" id="email-error" style="color: red;"></td>
		</tr>
		<tr>
			<td><label for="phone">Phone</label>:</td>
			<td><input type="text" id="phone" name="phone" size="25" <?php echo $_POST['phone'];?>/> *
			<span style="display: inline-block;" id="phone-error" style="color: red;"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="comments">Comments</label><br />
			<textarea rows="7" cols="45" name="comments" id="comments" <?php echo $_POST['comments'];?>></textarea> 
			<span style="display: inline-block;" id="comments-error" style="color: red;"></span></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=6Le4cwkAAAAAAA-Jm4KSIzZ4_bXjFwS-F_pSJKxF"></script>
			<noscript>
			<iframe src="http://api.recaptcha.net/noscript?k=6Le4cwkAAAAAAA-Jm4KSIzZ4_bXjFwS-F_pSJKxF" 
			height="300" width="500" frameborder="0" title="CAPTCHA test"></iframe>
			<br />
			<label for="captcha">Copy and paste the code provided in above box here:</label><br />
			<textarea name="recaptcha_challenge_field" id="captcha" rows="3" cols="40"></textarea>
			<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />
			</noscript></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<input type="submit" value="submit_form" /><br />
			</td>
		</tr>
	</table>
	</form>
</div>