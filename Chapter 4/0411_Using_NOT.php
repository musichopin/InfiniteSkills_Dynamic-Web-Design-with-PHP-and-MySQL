<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0411 Using NOT</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>Using NOT</h3>

<?php
	$firstname = $_POST['firstname'];
	$city = $_POST['city'];

	print "<p>Hello $firstname</p>";


	if ($city != 'Toronto')
	{
		print "<p>You don't live in the best city!</p>";
	}
	else
	{
		print "<p>Toronto Rocks!</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
