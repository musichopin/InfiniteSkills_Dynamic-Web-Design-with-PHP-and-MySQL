<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>306 Using RadioButtons</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>Using RadioButtons</h3>

<?php
	$firstname = $_POST['firstname'];
	$etype = $_POST['etype'];

	print "<p>You are <span class='textblue'> $firstname</span> and ";
	print "your employment type is: ";
	print "<span class='textblue'> $etype </span></p>";

?>

</body>
</html>


