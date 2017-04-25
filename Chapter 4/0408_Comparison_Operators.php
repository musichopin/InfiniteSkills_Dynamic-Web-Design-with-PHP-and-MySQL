<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0408 Comparison Operators</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Comparison Operators</h3>

<?php
	$firstname = $_POST['firstname'];
	$birthyear = $_POST['birthyear'];

	if ($firstname == 'Steve')
	{
		print "<p>You are the Instructor</p>";
	}
	else
	{
		if ($firstname > "M")
		{
			print "<p>You are $firstname, which comes after L in the alphabet</p>";
		} else {
			print "<p>You are $firstname, which comes before M in the alphabet</p>";
		}
	}

	if ($birthyear < 1960)
	{
		print "<p>You were born before 1960</p>";
	} elseif ($birthyear == 1960 ){
		print "<p>You were born in 1960</p>";
	} else {
		print "<p>You were born after 1960</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
