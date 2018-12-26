<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0409 Using AND</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>0409 Using AND</h3>

<?php
	$firstname = $_POST['firstname'];
	$hourslept = $_POST['hourslept'];
	$birthyear = $_POST['birthyear'];

	$current_year = date('Y');

	$age = $current_year - $birthyear;

	$years_slept = ($hourslept/24) * $age;

	print "<p>Your name is $firstname and you have ";
	print "spent $years_slept years of your life sleeping</p>";


	if ($age > 50 && $years_slept > 15)
	{
		print "<p>Better start planning for Retirement and you sleep too much!</p>";
	}
	else
	{
		print "<p>Time <em>might</em> be on your side and, <em>perhaps</em>, you sleep too much!</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
