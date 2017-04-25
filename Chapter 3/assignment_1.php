<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 1</title>
	<link rel="stylesheet" type="text/css" href="css/king_1.css" />
</head>

<body>
<img src="images/KingLogo.jpg" alt="King Real Estate Logo">

<h4>Thank You!  A representative will contact you soon.</h4>


<?php
// Gather Data from Form

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$contactchoice = $_POST['contact'];

$phoneormemail = $_POST['phoneormemail'];

$city = $_POST['city'];

$comments = $_POST['comments'];


//Display New Page

$fullname = $firstname.' '.$lastname;

print "<p>Information Submitted for: $fullname </p>\n";

print "<p>Your $contactchoice is $phoneormemail <br />\n";
print "and you are interested in living in $city </p>\n";

print "<p>Our representive will review your comments below:</p>\n";

print "<textarea cols='60' rows='5' disabled='disabled' ";
print "class='textdisabled'>".$comments."</textarea>\n";


?>



</p>
</body>
</html>
