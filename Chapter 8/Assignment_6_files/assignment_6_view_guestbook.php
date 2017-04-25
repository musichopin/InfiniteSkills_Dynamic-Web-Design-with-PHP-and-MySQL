<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 6 - Guestbook</title>
	<link rel="stylesheet" type="text/css" href="../css/king_6.css" />
</head>

<body>

<div>
	<a href="assignment_6.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div>

<h2>View GuestBook</h2>

<table border='1'>
<tr>
	<th>Last Name</th>
	<th>First Name</th>
	<th>Phone</th>
	<th>Email</th>
	<th>City Choice</th>
	<th>Contact Date</th>
	<th>Comments</th>
</tr>

<?php

//*****************************************************
//Read Guestbook Information From File Into HTML table
//*****************************************************

$display = "";
$line_ctr = 0;

include "assignment_6_Common_Functions.php";

$outputDisplay = '';


$statement  = "SELECT ";
$statement .= "lastname, firstname, ";
$statement .= "phone, email, ";
$statement .= "city, contact_date, ";
$statement .= "comments ";
$statement .= "FROM guestbook ";
$statement .= "ORDER BY lastname, firstname ";

$sqlResults = selectResults($statement);

$error_or_rows = $sqlResults[0];

if (substr($error_or_rows, 0 , 5) == 'ERROR')
{
	print "<br />Error on DB";
	print $error_or_rows;
} else {

	for ($ii = 1; $ii <= $error_or_rows; $ii++)
	{
		$lastname  		= $sqlResults [$ii] ['lastname'];
		$firstname  	= $sqlResults [$ii] ['firstname'];
		$phone  		= $sqlResults [$ii] ['phone'];
		$email  		= $sqlResults [$ii] ['email'];
		$city  			= $sqlResults [$ii] ['city'];
		$contact_date  	= $sqlResults [$ii] ['contact_date'];
		$comments  		= $sqlResults [$ii] ['comments'];


		$line_ctr++;

		$line_ctr_remainder = $line_ctr % 2;

		if ($line_ctr_remainder == 0)
		{
			$style = "style='background-color: #FFFFCC;'";
		} else {
			$style = "style='background-color: white;'";
		}

		$display .= "<tr $style>";
		$display .= "<td>".$lastname."</td>";
		$display .= "<td>".$firstname."</td>";


		if (empty($phone))
		{
			$phone = 'n/a';
		}

		$display .= "<td>".$phone."</td>";


		if (empty($email))
		{
			$email = 'n/a';
		}

		$display .= "<td>".$email."</td>";

		$display .= "<td>".$city."</td>";
		$display .= "<td>".$contact_date."</td>";

		if (empty($comments))
		{
			$comments = '&nbsp;';
		}

		$display .= "<td>".$comments."</td>";
		$display .= "</tr>\n";  //added newline
	}

	print $display;

}



?>

</table>

</div>
</body>
</html>