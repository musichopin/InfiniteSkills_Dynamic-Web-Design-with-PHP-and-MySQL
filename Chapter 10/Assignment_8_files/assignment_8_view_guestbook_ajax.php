<?php

$myData = $_POST['data'];  //This recieves the data passed from the HTML form

$myTable = "<table border='1'>";

$myTable .= "<tr>";
$myTable .= "<th>Last Name</th>";
$myTable .= "<th>First Name</th>";
$myTable .= "<th>Phone</th>";
$myTable .= "<th>Email</th>";
$myTable .= "<th>City Choice</th>";
$myTable .= "<th>Contact Date</th>";
$myTable .= "<th>Comments</th>";
$myTable .= "</tr>";


//*****************************************************
//Read Guestbook Information From File Into HTML table
//*****************************************************

$display = "";
$line_ctr = 0;

include "assignment_8_Common_Functions.php";

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
	$myTable .= "Error on DB";
	$myTable .= "$error_or_rows";
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

		$style = '';

		if ($line_ctr_remainder == 0)
		{
			$style = "style='background-color: #FFFFCC;'";
		} else {
			$style = "style='background-color: white;'";
		}

		$myTable .= "<tr $style >";
		$myTable .= "<td>".$lastname."</td>";
		$myTable .= "<td>".$firstname."</td>";


		if (empty($phone))
		{
			$phone = 'n/a';
		}

		$myTable .= "<td>".$phone."</td>";


		if (empty($email))
		{
			$email = 'n/a';
		}

		$myTable .= "<td>".$email."</td>";

		$myTable .= "<td>".$city."</td>";
		$myTable .= "<td>".$contact_date."</td>";

		if (empty($comments))
		{
			$comments = '&nbsp;';
		}

		$myTable .= "<td>".$comments."</td>";
		$myTable .= "</tr>\n";  //added newline
	}

	print "</table>";

	print $myTable;

}

?>