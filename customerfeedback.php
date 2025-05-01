<?php
require_once('classes/page.php');

$contact = new Page(customer_feedback, true);	

function option_select(){
	global $subject;
	switch ($subject){
		case "customerfeedback.php":
			return "selected";
			break;
		case "resellerinquiry.php":
			return "selected";
			break;
		case "servicerequest.php":
			return "selected";
			break;
		default:
			return "";
			break;
	}
}

?>
<div class="page-grid">


	<script language="JavaScript" type="text/javascript">
	function gotourl(url){ 
		window.location= url;
	}
	</script>
	Fields marked with an * are required:<br /><br />
	<form name="customerfeedback" onSubmit="return validate_custfeedbk(this);" action="forms/formdata.php" method="post">	
	<?php require_once('forms/recapture.php'); ?>
	<table border="0" cellpadding="8" cellspacing="8" summary="contact form">
		
		<tr>
			<td><label for="subject">Subject: </label></td>
			<td><select name="subject" id="subject" onchange="gotourl(this.value)">
				<option value="" >Please Select</option>
				<option selected value="customerfeedback.php" >Customer feedback</option>
				<option value="resellerinquiry.php">Reseller inquiry</option>
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
			<td><input type="text" name="lastname" id="lastname" size="25" <?php echo $_POST['lastname'];?>/>
			<span style="display: inline-block;" id="lastname-error" style="color: red;"></span></td>
		</tr>	
		<tr>
			<td><label for="company">Company</label>:</td>
			<td><input type="text" name="company" id="company" size="25" <?php echo $_POST['company'];?>/>
			<span style="display: inline-block;" id="company-error" style="color: red;"></td>
		</tr>
		<tr>
			<td><label for="email">Email</label>:</td>
			<td><input type="text" id="email" name="email" size="25" value="<?php echo $_POST['emailaddress'];?>"/>
			<span style="display: inline-block;" id="email-error" style="color: red;"></td>
		</tr>
		<tr>
			<td><label for="phone">Phone</label>:</td>
			<td><input type="text" id="phone" name="phone" size="25" <?php echo $_POST['phone'];?>/>
			<span style="display: inline-block;" id="phone-error" style="color: red;"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="comments">Comments</label><br />
			<textarea rows="7" cols="45" name="comments" id="comments" <?php echo $_POST['comments'];?>></textarea>
			<span style="display: inline-block;" id="comments-error" style="color: red;"></span></td>
		</tr>
				<!-- ******new Captcha********* -->
		<tr><td align="center" colspan="2">
			<?php 
			require_once('forms/recaptchalib.php');
			$publickey = "6Le4cwkAAAAAAA-Jm4KSIzZ4_bXjFwS-F_pSJKxF";
			echo recaptcha_get_html($publickey);
			?>
		</td></tr>
				<!--******** end new Captcha********-->
				
				
		<!--  RECAPTCHA
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
		-->
		<tr>
			<td align="center" colspan="2">
			<input type="submit" value="submit_form" /><br />
			</td>
		</tr>
	</table>
	</form>
	<!---
<form style="width:340px; float: right;" onSubmit="return validate_custfeedbk(this);" action="formdata.php" method="post">
<h2>Register</h2>
	<p style="margin: 0px;">First Name: </p>
	<input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'];?>" />
	<span style="display: inline-block;" id="firstname-error" style="color: red;"></span>
	<p style="margin: 0px;">Last Name: </p>
	<input type="text" id="lastname" name="lastname" value="<?php echo $_POST['lastname'];?>" />
	<span style="display: inline-block;" id="lastname-error" style="color: red;"></span>

	<p style="margin: 0px;">Email Address: </p>
	<input type="text" id="emailaddress" name="emailaddress" value="<?php echo $_POST['emailaddress'];?>" />
	<span style="display: inline-block;" id="emailaddress-error" style="color: red;"></span>
	
	<input style="display: block;" type="submit" name="signup" value="Register" />
	*************** -->
</form> 
	
	
	<!--***********
	
	<form name="contactform" onSubmit="return validate_custfeedbk(this);" action="customerfeedback.php" method="post">	
	
	
	<table border="0" cellpadding="8" cellspacing="8" summary="contact form">

		<tr>
			<td><label for="firstname">First Name</label>:</td>
			<td><input type="text" name="username" id="username" size="20" value=""/>
			<span style="display: inline-block;" id="username-error" style="color: red;"></span>
			</td>
		</tr>
		<tr>
			<td><label for="lastname">Last Name</label>:</td>
			<td><input type="text" name="lastname" id="lastname" size="20" /></td>
		</tr>	
		<tr>
			<td><label for="company">Company</label>:</td>
			<td><input type="text" name="company" id="company" size="25" /></td>
		</tr>
		<tr>
			<td><label for="email">Email</label>:</td>
			<td><input type="text" id="email" name="email" size="25" /></td>
		</tr>
		<tr>
			<td><label for="phone">Phone</label>:</td>
			<td><input type="text" id="phone" name="phone" size="25" /></td>
		</tr>
		<tr>
			<td colspan="2"><label for="comments">Comments</label><br />
			<textarea rows="7" cols="45" name="comments" id="comments"></textarea></td>
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
		*************** -->
</div>