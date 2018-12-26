<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0607 Using Includes</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Using Includes</h3>

<?php
	include "0607_Common_Functions.php";  //pulls in PHP functions from another file

	$in_firstname = $_POST['firstname'];
	$in_hourslept = $_POST['hourslept'];
	$in_birthyear = $_POST['birthyear'];

	$rtnmsg = doValidation($in_firstname, $in_hourslept, $in_birthyear);

	if ($rtnmsg == '') // no error
	{
		displayPage($in_firstname, $in_hourslept, $in_birthyear);
	}
	else
	{
		print $rtnmsg;
		print "<br>Go BACK and try again!";
	}

?>

</body>
</html>
