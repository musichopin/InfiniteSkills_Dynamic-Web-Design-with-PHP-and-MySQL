<?php

$myData = $_POST['data'];  //This recieves the data passed

//*****************************************************
//Read Guestbook Information From File Into HTML table
//*****************************************************

include "../Chapter 8/0811_common_functions.php";

$statement  = "SELECT ";
$statement .= "userid, password ";
$statement .= "FROM validusers ";
$statement .= "ORDER BY userid ";

$sqlResults = selectResults($statement);

$error_or_rows = $sqlResults[0];

if (substr($error_or_rows, 0 , 5) == 'ERROR')
{

	$myWarning = "Error on DB:<br />";
	$myWarning .= "$error_or_rows";
	print $myWarning;
} else { // if no error

	$myTable = "<table border='1'>";
	$myTable .= "<tr>";
	$myTable .= "<th>UserID</th>";
	$myTable .= "<th>Password</th>";
	$myTable .= "</tr>";

	for ($ii = 1; $ii <= $error_or_rows; $ii++)
	{
		$userid  	= $sqlResults [$ii] ['userid'];
		$password  	= $sqlResults [$ii] ['password'];

		$myTable .= "<tr>";
		$myTable .= "<td>".$userid."</td>";
		$myTable .= "<td>".$password."</td>";
		$myTable .= "</tr>\n";
	}

	$myTable .= "</table>";

	print $myTable;

}

?>