<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0405 ELSE Clause</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>The ELSE Clause</h3>

<?php
	$firstname = $_POST['firstname'];
	$birthyear = $_POST['birthyear'];

	$current_year = date('Y');

	$age = $current_year - $birthyear;

	print "<p>Your name is $firstname and you are $age years old</p>";

	if ($age > 50)
	{
		print "<p>Better start planning for Retirement!</p>";
		print "<p>Yes, I mean it</p>";
	}
	else
	{
		print "<p>Time is on your side! Really.</p>";
		print "<p>Yes, I mean it to you too</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
