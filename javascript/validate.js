//FUNCTION TO VALIDATE EMAIL ADDRESS
function validate_email(field){
	with (field){
		if (value!="" && value!=null){
			apos=value.indexOf("@");
			dotpos=value.lastIndexOf(".");
			if (apos<1||dotpos-apos<2){
				return false;
			}
		}else{
			return false;
		}
	}
}
//FUNCTION TO VALIDATE REQUIRED
function validate_required(field){
	with (field) {
		if (value==null||value==""){
			return false;
		}
	}
}

//	can either return false or an error. 
function validate_phone(field) {
    var error = "";
    var stripped = field.value.replace(/[\(\)\.\-\ ]/g, '');    

   if (field.value == "") {
        //error = "You didn't enter a phone number.\n";
        //field.style.background = 'Yellow';
		return false;
    } else if (isNaN(parseInt(stripped))) {
        //error = "The phone number contains illegal characters.\n";
        //field.style.background = 'Yellow';
		return false;
    } else if (!(stripped.length == 10)) {
        //error = "The phone number is the wrong length. Make sure you included an area code.\n";
        //field.style.background = 'Yellow';
		return false;
    }
    //return error;
	return true;
}

// FUNCTION TO EXECUTE ALL OTHER VALIDATION FUNCTIONS AND OUTPUT ERROR MESSAGES
// function validate_custfeedbk(thisform){
	// document.getElementById('subject-error').innerHTML= "";
	// document.getElementById('firstname-error').innerHTML= "";
	// document.getElementById('lastname-error').innerHTML= "";
	// document.getElementById('company-error').innerHTML= "";
	// document.getElementById('email-error').innerHTML= "";
	// document.getElementById('phone-error').innerHTML= "";
	// document.getElementById('comments-error').innerHTML= "";
	
	// with (thisform){
		// var rval=true;
		// if (validate_required(firstname)==false){
			// alert("Work dammit!");
			// document.getElementById('firstname-error').innerHTML= "firstname is required";
			// rval=false;
		// }
		// if (validate_required(lastname)==false){
			// document.getElementById('lastname-error').innerHTML= "lastname is required";
			// rval=false;
		// }		
		// if (validate_email(emailaddress)==false){
			// document.getElementById('emailaddress-error').innerHTML= "e-mail address is invalid";
			// rval=false;
		// }

		// return rval;
	// }
// }
function validate_custfeedbk(thisform){

	document.getElementById('firstname-error').innerHTML= "";
	document.getElementById('comments-error').innerHTML= "";


	with (thisform){
		var rval=true;

		if (validate_required(firstname)==false){
			document.getElementById('firstname-error').innerHTML= "firstname is required";
			rval=false;
		}
		if (validate_required(comments)==false){
			document.getElementById('comments-error').innerHTML= "comments are required";
			rval=false;
		}


		return rval;
	}
}
function validate_reseller_inquiry(thisform){

	document.getElementById('firstname-error').innerHTML= "";
	document.getElementById('lastname-error').innerHTML= "";
	document.getElementById('company-error').innerHTML= "";
	document.getElementById('email-error').innerHTML= "";
	document.getElementById('phone-error').innerHTML= "";
	document.getElementById('comments-error').innerHTML= "";
	
	

	with (thisform){
		var rval=true;

		if (validate_required(firstname)==false){
			document.getElementById('firstname-error').innerHTML= "First name is required";
			rval=false;
		}
		if (validate_required(lastname)==false){
			document.getElementById('lastname-error').innerHTML= "Last name is required";
			rval=false;
		}
		if (validate_required(company)==false){
			document.getElementById('company-error').innerHTML= "Company name is required";
			rval=false;
		}
		if (validate_email(email)==false){
			document.getElementById('email-error').innerHTML= "e-mail address is invalid";
			rval=false;
		}		
		if (validate_phone(phone)==false){
			document.getElementById('phone-error').innerHTML= "Please include area code. <br /> Spaces and characters not allowed.";
			rval=false;
		}		
		if (validate_required(comments)==false){
			document.getElementById('comments-error').innerHTML= "comments are required";
			rval=false;
		}		
		return rval;	
	}
}
function validate_service_request(thisform){

	document.getElementById('firstname-error').innerHTML= "";
	document.getElementById('lastname-error').innerHTML= "";
	document.getElementById('email-error').innerHTML= "";
	document.getElementById('phone-error').innerHTML= "";
	document.getElementById('comments-error').innerHTML= "";
	
	

	with (thisform){
		var rval=true;

		if (validate_required(firstname)==false){
			document.getElementById('firstname-error').innerHTML= "First name is required";
			rval=false;
		}
		if (validate_required(lastname)==false){
			document.getElementById('lastname-error').innerHTML= "Last name is required";
			rval=false;
		}
		if (validate_email(email)==false){
			document.getElementById('email-error').innerHTML= "e-mail address is invalid";
			rval=false;
		}		
		if (validate_phone(phone)==false){
			document.getElementById('phone-error').innerHTML= "Please include area code. <br /> Spaces and characters not allowed.";
			rval=false;
		}		
		if (validate_required(comments)==false){
			document.getElementById('comments-error').innerHTML= "comments are required";
			rval=false;
		}		
		return rval;	
	}
}
function validate_form(thisform){
	document.getElementById('emailaddress-error').innerHTML= "";
	document.getElementById('firstname-error').innerHTML= "";
	document.getElementById('lastname-error').innerHTML= "";
	document.getElementById('username-error2').innerHTML= "";
	document.getElementById('password-error2').innerHTML= "";
	with (thisform){
		var rval=true;
		if (validate_email(emailaddress)==false){
			document.getElementById('emailaddress-error').innerHTML= "e-mail address is invalid";
			rval=false;
		}
		if (validate_required(firstname)==false){
			document.getElementById('firstname-error').innerHTML= "firstname is required";
			rval=false;
		}
		if (validate_required(lastname)==false){
			document.getElementById('lastname-error').innerHTML= "lastname is required";
			rval=false;
		}
		if (validate_required(username)==false){
			document.getElementById('username-error2').innerHTML= "username is required";
			rval=false;
		}
		if (validate_required(password)==false){
			document.getElementById('password-error2').innerHTML= "password is required";
			rval=false;
		}
		return rval;
	}
}

// FUNCTION TO EXECUTE ALL OTHER VALIDATION FUNCTIONS AND OUTPUT ERROR MESSAGES
function validate_form_user(thisform){
	document.getElementById('username-error').innerHTML= "";
	document.getElementById('password-error').innerHTML= "";
	with (thisform){
		var rval=true;
		if (validate_required(username)==false){
			document.getElementById('username-error').innerHTML= "username is required";
			rval=false;
		}
		if (validate_required(password)==false){
			document.getElementById('password-error').innerHTML= "password is required";
			rval=false;
		}
		return rval;
	}
}