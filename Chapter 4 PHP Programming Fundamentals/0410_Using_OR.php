<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0410 Using OR</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Using OR</h3>

<?php
	$firstname = $_POST['firstname'];
	$hourslept = $_POST['hourslept'];
	$birthyear = $_POST['birthyear'];

	$current_year = date('Y');

	$age = $current_year - $birthyear;

	$years_slept = ($hourslept/24) * $age;

	print "<p>Your name is $firstname and you have ";
	print "spent $years_slept years of your life sleeping</p>";


	if ($age > 50 || $years_slept > 15)
	{
		print "<p>You <em>may</em> want to start planning for Retirement and, <em>perhaps</em>, you sleep too much!</p>";
	}
	else
	{
		print "<p>Time is definitely on your side you could get some more sleep!</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
