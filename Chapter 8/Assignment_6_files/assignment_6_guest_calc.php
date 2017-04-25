<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 6 - GuestBook / Calculator</title>

	<link rel="stylesheet" type="text/css" href="../css/king_6.css" />

</head>

<body>

<div>
	<a href="assignment_6.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="guest">
	<form method="post" action="assignment_6_add_to_guestbook.php">
	<p class="topofdiv">Please sign up on our guest list</p>

	<p>
	First Name:<br />
	<input type="text" name="firstname" size="30" />
	</p>

	<p>
	Last Name:<br />
	<input type="text" name="lastname" size="30" />
	</p>

	<p>
	Contact Information:
	<input type="radio" name="contact" value="Phone" checked="checked" /> Phone
	<input type="radio" name="contact" value="Email" /> Email <br />

	<input type="text" name="phoneormemail" size="50" />
	</p>

	<p>
	City Where You Want to Reside:<br />
	<select name="city" size="1">
		<option value="--">-</option>

	<?php

	include "assignment_6_Common_Functions.php";

	$outputDisplay = '';


	$sql_statement  = "SELECT name ";
	$sql_statement .= "FROM city ";
	$sql_statement .= "ORDER BY name ";

	$sqlResults = selectResults($sql_statement);

	$error_or_rows = $sqlResults[0];

	if (substr($error_or_rows, 0 , 5) == 'ERROR')
	{
		print "<br />Error on DB";
	} else {

		for ($ii = 1; $ii <= $error_or_rows; $ii++)
		{
			$name  = $sqlResults [$ii] ['name'];

			//print "<br>N: $name";

			$outputDisplay .= "<option value='".$name."'>".$ii.":".$name."</option>";
		}
	}

	print $outputDisplay;

	?>

	</select>
	</p>

	<p>
	Comments:<br />
	<textarea name="comments" cols="40" rows="3"></textarea>
	</p>

	<p>
	<input type="submit" value="Submit Information" />
	</p>

	<p>For Admin Use Only: <a href="http://localhost/assignment_6_files/assignment_6_view_guestbook.php" target="_blank">View Guestbook</a></p>

	</form>

</div>

<div id="calculator">
	<p class="topofdiv">Mortgage Calculator</p>

	<form method="post" action="assignment_6_mortgage.php">

	<table>

	<tr>
		<td>Amount Financed</td>
		<td><input type="text" name="amountfinanced" size="11" /></td>
	</tr>

	<tr>
		<td>Interest Rate</td>
		<td><input type="text" name="interestrate" size="11" /></td>
	</tr>

	<!--
	<tr>
		<td>Monthly Payment</td>
		<td><input class="disabled" type="text" name="monthlypayment" size="11" disabled="disabled" /></td>
	</tr>
	-->

	</table>

	<p><input type="submit" value="Calculate Payment" /></p>


	</form>
</div>


</body>
</html>
