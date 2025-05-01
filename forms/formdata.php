<?php
require_once('../classes/access.php');
require_once('../classes/user.php'); 
require_once('recaptchalib.php');
$mailto = 'feedback@genesysmusic.com.au' ;
$contactform = check_input($_POST['customerfeedback']);
$subject = check_input($_POST['subject']);
$firstname = check_input($_POST['firstname']);
$lastname = check_input($_POST['lastname']);
$company = check_input($_POST['company']);
$email = filter_var(check_input($_POST['email']));
$phone = check_input($_POST['phone']);
$comments = check_input($_POST['comments']);
$http_referrer = getenv( "HTTP_REFERER" );
$my_recaptcha_private_key = '6Le4cwkAAAAAAFzWDqLix6xyXWMHcXSn9msdfH9_' ;
?>
<?php
//	ReCaptcha stuff***********
  $privatekey = "6Le4cwkAAAAAAFzWDqLix6xyXWMHcXSn9msdfH9_";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
  if (!$resp->is_valid) {
//    What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
  //echo "Recapture entered correctly!";
		postdata($firstname, $lastname, $company, $email, $phone, $comments);	
		
  } header('Location: ../thankyou.php');
 ?>
 <?php




// mail($mailto, $subject, $comment);
header('Location: thankyou.php');
// required_fields();
// test();

//	User::postdata($firstname, $lastname, $company, $email, $phone, $comments);

function select_table($subject){
	switch ($subject){
		case "customerfeedback.php":
			return "feedback";
			break;
		case "resellerinquiry.php":
			return "reseller";
			break;
		case "servicerequest.php":
			return "service";
			break;
		default:
			echo "no such table exists";
			break;
	}
}
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        die($problem);
    }
    return $data;
}

	function return_null_if_empty($value) {
		if ($value == ''){
		$value = "NULL";
		}
		return $value;
	}

	function postData($firstname, $lastname, $company, $email, $phone, $comments){
		global $database;
		global $subject;
		//echo "Subject: " . $subject;
		$sql = "INSERT INTO ".select_table($subject)." (";
		$sql .= "firstname, ";
		$sql .= "lastname, ";
		$sql .= "company, ";
		$sql .= "email, ";
		$sql .= "phone, ";
		$sql .= "comments";
		$sql .= ") ";
		$sql .= "VALUES (";
		$sql .= "'{$firstname}', ";
		$sql .= "'{$lastname}', ";
		$sql .= "'{$company}', ";		
		$sql .= "'{$email}', ";	
		$sql .= return_null_if_empty($phone).", ";			
		$sql .= "'{$comments}'";		
		$sql .= ") ";
		$result = $database->query($sql);
		//echo $sql;
		return $result;
	}

//	Each type of feedback has different 'required fields'. This function checks those fields based on 
// 	which subject is selected.
// function required_fields() {
	// echo "fuck"."<br />";
	// $sub = $_POST['submit_form'];
	// global $subject;
	// if (isset($subject)){
	// echo "testSubjectSet<br />";
		// switch ($subject){
			// case "customerfeedback.php":
				// validate_customer_feedback();
				// break;
			// case "resellerinquiry.php":
				// validate_reseller_inquiry();
				// break;
			// case "servicerequest.php":
				// validate_service_request();
				// break;
			// default:
				// echo "Please select a subject";
				// break;
		// }
	// }
// }

// function validate_customer_feedback(){
	// check_input($firstname, "Please enter your first name");
// }
// function validate_reseller_inquiry(){

// }
// function validate_service_request(){

// }




// function test() {
// global $mailto;
// global $subject, $firstname, $lastname;
// echo "this is function test"."<br />";
// echo "this is function test"."<br />";
// echo $mailto;
// echo $subject."<br />";
// echo $firstname."<br />";
// echo $lastname."<br />";
// echo $company."<br />";
// echo $email."<br />";
// echo $phone."<br />";
// echo $comment."<br />";
// echo "";
// echo "";
// }


?>
