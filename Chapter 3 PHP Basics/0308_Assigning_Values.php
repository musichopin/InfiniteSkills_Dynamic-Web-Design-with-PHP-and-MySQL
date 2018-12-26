<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>303 HTML Forms</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Success!</h3>

<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];

	$fullname = "$firstname $lastname";

	$factor = 5;

	$ageplus = $age + $factor;

	$current_year = date('Y');

	$birth_year = $current_year - $ageplus;

	print "<p>Your name is $fullname ";
	print "and you say your age is $age ";
	print "but I bet you are really $ageplus ";
	print "and were born in $birth_year</p>";
?>

</body>
</html>
