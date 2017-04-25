<?php

$myData = $_POST['data'];  //This recieves the data passed from the HTML form

list($firstname, $lastname, $contactchoice, $phoneormemail, $city, $comments) = explode('|', $myData);

include "assignment_8_Common_Functions.php";


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


//***************************************
//Display New Page
//***************************************

$fullname = $firstname.' '.$lastname;

$rtnmsg = "<p class='topofdiv'>Thank You!  A representative will contact you soon</p>";

$rtnmsg .= "<p>Information Submitted for: $fullname </p>";

$rtnmsg .= "<p>Your $contactchoice is $phoneormemail <br />";
$rtnmsg .= "and you are interested in living in $city </p>";

$rtnmsg .= "<p>Our representive will review your comments below:</p>";

$rtnmsg .= "<textarea cols='60' rows='5' disabled='disabled' class='textdisabled'>";
$rtnmsg .= $comments;
$rtnmsg .= "</textarea>";

print $rtnmsg;

?>