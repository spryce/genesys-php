<?php
require_once('classes/page.php');


$contact = new Page(contactform, true);	

?>
<div class="page-grid">
			<script language="JavaScript" type="text/javascript">
			function gotourl(url){ 
				window.location= url;
			}
			function selectsubject(){
				alert("Please select a subject!");
			}
			</script>
	Fields marked with an * are required:<br /><br />			
	<form name="contactform" onSubmit="return validate_form_user(this);" action="forms/formdata.php" method="post">
	<table border="0" cellpadding="8" cellspacing="8" summary="contact form">
		<tr>
			<td><label for="subject">Subject: </label></td>

			<td><select name="subject" id="subject" onchange="gotourl(this.value)">
				<option value="" >Please Select</option>
				<option value="customerfeedback.php" >Customer feedback</option>
				<option value="resellerinquiry.php">Reseller inquiry</option>
				<option value="servicerequest.php">Service request</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="firstname" >First Name</label>:</td>
			<td><input onfocus="selectsubject();" type="text" name="firstname" id="firstname" size="20" /></td>
		</tr>
		<tr>
			<td><label for="lastname">Last Name</label>:</td>
			<td><input onfocus="selectsubject();" type="text" name="lastname" id="lastname" size="20" /></td>
		</tr>	
		<tr>
			<td><label for="company">Company</label>:</td>
			<td><input onfocus="selectsubject();" type="text" name="company" id="company" size="25" /></td>
		</tr>
		<tr>
			<td><label for="email">Email</label>:</td>
			<td><input onfocus="selectsubject();" type="text" id="email" name="email" size="25" /></td>
		</tr>
		<tr>
			<td><label for="phone">Phone</label>:</td>
			<td><input onfocus="selectsubject();" type="text" id="phone" name="phone" size="25" /></td>
		</tr>
		<tr>
			<td colspan="2"><label for="comments">Comments</label><br />
			<textarea onfocus="selectsubject();" rows="7" cols="45" name="comments" id="comments"></textarea></td>
		</tr>

		<tr>
			<td align="center" colspan="2">
			<input type="submit" value="submit_form" /><br />
			</td>
		</tr>
	</table>
	</form>
</div>