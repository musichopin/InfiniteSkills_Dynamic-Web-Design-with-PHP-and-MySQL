<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Send eMail to Somebody</title>
</head>

<body>
<!-- ***!!!instead of local server, web server needed for sending mail as well as special software like sendmail being needed to install!!!*** -->
<?php

$myFirstName = $_POST['firstname'];
$mySubject = $_POST['subject'];
$myMessage = $_POST['message']; /* *body* */
$TO_email = $_POST['to_email'];

sendEmailToSomebody($myFirstName, $mySubject, $myMessage, $TO_email);

print "<h4>An email has been sent to $myFirstName</h4>";



function sendEmailToSomebody($myFirstName, $mySubject, $myMessage, $TO_email)
{

	$to = $TO_email; /* ***aslında $to'nun hardcoded olarak yazılması gerekirdi*** */

	$subject = $mySubject." name: ".$myFirstName;

	$body .= "Message:\n\n";
	$body .= "$myMessage";

	$from = 'From: "The Instructor" <stevetest@profperry.com>';

	$rtnto = '-steveclass@profperry.com';  //Can Specify a different Return-To email!
	/* **aslında $rtnto'nun hardcoded olarak yazılmaması gerekirdi (?)** */

	mail($to, $subject, $body, $from, $rtnto);
	// **$to, $subject, $message parametreleri gerekli diğerleri optional**
}

?>


</body>
</html>
