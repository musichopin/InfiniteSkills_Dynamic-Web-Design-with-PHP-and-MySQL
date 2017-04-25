<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 4 - GuestBook / Calculator</title>

	<link rel="stylesheet" type="text/css" href="css/king_4.css" />

</head>

<body>

<div>
	<a href="assignment_4.php" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="guest">
	<form method="post" action="assignment_4_add_to_guestbook.php">
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
		<option value="-">-</option>

	<?php
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

		$filename = $DOCUMENT_ROOT.'/my-site/Chapter 6/data/'.'cities.txt';

		$lines_in_file = count(file($filename));

		//print "<br>lines: ".$lines_in_file;

		$fp = fopen($filename, 'r');   //opens the file for reading

		for ($ii = 1; $ii <= $lines_in_file; $ii++)
		{
			$line = fgets($fp);
			$file_city = trim($line);

			print '<option value="'.$file_city.'">'.$ii.':'.$file_city.'</option>';
		}

		fclose($fp);

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

	<p>For Admin Use Only: <a href="http://localhost/assignment_4_view_guestbook.php" target="_blank">View Guestbook</a></p>

	</form>

</div>

<div id="calculator">
	<p class="topofdiv">Mortgage Calculator</p>

	<form method="post" action="assignment_4_mortgage.php">

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
