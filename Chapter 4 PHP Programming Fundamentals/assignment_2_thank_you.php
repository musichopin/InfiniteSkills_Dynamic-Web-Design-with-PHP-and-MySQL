<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 2 - Thank You</title>
	<link rel="stylesheet" type="text/css" href="css/king_2.css" />
</head>

<body>

<div>
	<a href="assignment_2.html" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="guest">

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

print "<p class='topofdiv'>Thank You!  A representative will contact you soon</p>";

print "<p>Information Submitted for: $fullname </p>";

print "<p>Your $contactchoice is $phoneormemail <br />";
print "and you are interested in living in $city </p>";

print "<p>Our representive will review your comments below:</p>";

print "<textarea cols='60' rows='5' disabled='disabled' class='textdisabled'>";
print $comments;
print "</textarea>";

?>

</div>
</body>
</html>