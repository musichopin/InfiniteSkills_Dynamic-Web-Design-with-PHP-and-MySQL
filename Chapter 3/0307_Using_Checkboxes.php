<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>307 Using Checkboxes</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>Using Checkboxes</h3>

<?php
	$firstname = $_POST['firstname'];
	if ($firstname==""){echo "Please enter a first name"; exit;}

	if (isset($_POST['BA']))
	{
		$BA = $_POST['BA'];
	} else {
		$BA = "";
	}

	if (isset($_POST['MA']))
	{
		$MA = $_POST['MA'];
	} else {
		$MA = "";
	}

	if (isset($_POST['Phd']))
	{
		$Phd = $_POST['Phd'];
	} else {
		$Phd = "";
	}


	print "<p>You are <span class='textblue'> $firstname</span> and ";
	print "your the degrees you've earned are: </p>";

	print "<p><span class='textblue'> $BA  </span></p>";
	print "<p><span class='textblue'> $MA  </span></p>";
	print "<p><span class='textblue'> $Phd  </span></p>";


?>

</body>
</html>


