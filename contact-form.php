<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Contact us</title>
<!-- define some style elements-->
<style>
h1
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 16px;
    font-weight : bold;
}
label,a
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px;
}

</style>
<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>
</head>

<body>
	<h1>Contact us</h1>
	<form method="POST" name="contactform">
	<p>
	<label for='name'>Your Name:</label> <br>
	<input type="text" name="name">
	</p>
	<p>
	<label for='email'>Email Address:</label> <br>
	<input type="text" name="email"> <br>
	</p>
	<p>
	<label for='message'>Message:</label> <br>
	<textarea name="message"></textarea>
	</p>
	<input type="submit" value="Submit"><br>
	</form>
<script language="JavaScript">
	// Code for validating the form
	// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
	// for details
	var frmvalidator  = new Validator("contactform");
	frmvalidator.addValidation("name","req","Please provide your name");
	frmvalidator.addValidation("email","req","Please provide your email");
	frmvalidator.addValidation("email","email","Please enter a valid email address");
</script>
<!--
Sample code from:
http://www.html-form-guide.com/contact-form/php-email-contact-form.html
-->
<?php
	$errors = '';
	$myemail = 'emailName@EmailAdress.com';//<-----Put Your email address here.
	if(empty($_POST['name'])  ||
	   empty($_POST['email']) ||
	   empty($_POST['message']))
	{
	    $errors .= "\n Error: all fields are required";
	    //Use "If" if the elseif doesnt work.
	}elseif(!empty($_POST['name'])  &&
	   !empty($_POST['email']) &&
	   !empty($_POST['message']))
	{
	  $name = $_POST['name'];
	  $email_address = $_POST['email'];
	  $message = $_POST['message'];

	  if (!preg_match(
	  "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
	  $email_address))
	  {
	      $errors .= "\n Error: Invalid email address";
	  }
	}


	if( empty($errors))
	{
		$to = $myemail;
		$email_subject = "Contact form submission: $name";
		$email_body = "You have received a new message. ".
		" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message";

		$headers = "From: $myemail\n";
		$headers .= "Reply-To: $email_address";

		mail($to,$email_subject,$email_body,$headers);
	}
?>


</body>
</html>
