<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 3 - Add to Guestbook</title>
	<link rel="stylesheet" type="text/css" href="css/king_2.css" />
</head>

<body>

<div>
	<a href="assignment_3.php" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="guest">

<?php
//***************************************
// Gather Data from Form
//***************************************

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$contactchoice = $_POST['contact'];

$phoneormemail = $_POST['phoneormemail'];

$city = $_POST['city'];

$comments = $_POST['comments'];


//***************************************
//Add Guestbook Information to File
//***************************************

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$filename = $DOCUMENT_ROOT.'/my-site/Chapter 5/data/'.'guestbook.txt';

$fp = fopen($filename, 'a');   //opens the file for appending

$contact_date = date('Y-m-d');

$output_line = $lastname.'|'.$firstname.'|'.$contactchoice.'|'.$phoneormemail.'|'.$city.'|'.$contact_date.'|'.$comments.'|'."\n";

fwrite($fp, $output_line);

fclose($fp );   


//***************************************
//Display New Page
//***************************************

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