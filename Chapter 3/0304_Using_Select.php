<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>304 Using Select</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>College Report</h3>

<?php
	$firstname = $_POST['firstname'];
	$position = $_POST['position'];

	print "<p>You are <span class='textblue'> $firstname</span> and ";
	print "your position at the college is: <span class='textblue'> $position </span></p>";
?>

</body>
</html>
