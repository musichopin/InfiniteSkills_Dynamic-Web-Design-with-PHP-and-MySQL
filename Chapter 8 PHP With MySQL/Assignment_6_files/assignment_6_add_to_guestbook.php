<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 6 - Add to Guestbook</title>
	<link rel="stylesheet" type="text/css" href="../css/king_6.css" />
</head>

<body>

<div>
	<a href="assignment_6.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
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
// Validate Entries
//***************************************

include "assignment_6_Common_Functions.php";

$rtnmsg = doValidation($firstname, $lastname, $phoneormemail, $city);

if ($rtnmsg == '')
{
	//skip
}
else
{
	print $rtnmsg;
	print "<br /><br />Go BACK and try again!";
	print "</body></html>";
	exit;
}


//***************************************
//Add Guestbook Information to File
//***************************************

$contact_date = date('Y-m-d');

//INSERT INTO test.guestbook (guest_id, lastname, firstname, phone, email, city, contact_date, comments) VALUES (NULL, 'Perry', 'Steve', '777-555-1234', NULL, 'Chicago', '2012-04-12', 'Home in a quiet neighborhood');

$statement  = "INSERT INTO guestbook ";
$statement .= "(lastname, firstname, ";
$statement .= "phone, email, ";
$statement .= "city, contact_date, ";
$statement .= "comments) ";
$statement .= "VALUES (";

$statement .= "'".$lastname."', '".$firstname."', ";

if ($contactchoice == 'Phone')
{
	$statement .= "'".$phoneormemail."', NULL, ";
} else {
	$statement .= "NULL, '".$phoneormemail."', ";
}

$statement .= "'".$city."', '".$contact_date."', ";

$statement .= "'".$comments."') ";

$rtn = iduResults($statement);

print "<br />$rtn";




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