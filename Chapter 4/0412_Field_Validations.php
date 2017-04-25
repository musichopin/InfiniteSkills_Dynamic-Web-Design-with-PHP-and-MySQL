<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0408?? Field Validations</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Field Validations</h3>

<?php
	$firstname = $_POST['firstname'];
	$hourslept = $_POST['hourslept'];
	$birthyear = $_POST['birthyear'];

	// alt: if($firstname=="") or if(!$firstname)
	// text box için isset() kullanılmamasına dikkat
	if (empty($firstname))
	{
		print "You must enter a First Name";
		print "<br />Go BACK and try again";
		print "</body></html>";
		exit;
	}

	if (empty($hourslept))
	{
		print "You must enter the hours you sleep";
		print "<br />Go BACK and try again";
		print "</body></html>";
		exit;
	} else {
		if (!is_numeric($hourslept))
		{
			print "The hours you sleep must be numeric";
			print "<br />Go BACK and try again";
			print "</body></html>";
			exit;
		}
	}

	if (empty($birthyear))
	{
		print "You must enter your Birth Year";
		print "<br />Go BACK and try again";
		print "</body></html>";
		exit;
	} else {
		if (!is_numeric($birthyear))
		{
			print "Your Birth Year must be numeric.'".$birthyear."'";
			print "<br />Go BACK and try again";
			print "</body></html>";
			exit;
		} else {
			$length_of_year = strlen($birthyear);

			if ($length_of_year != 4)
			{
				print "Your Birth Year must be exaclty four numbers";
				print "<br />Go BACK and try again";
				print "</body></html>";
				exit;
			}
		}
	}


	$current_year = date('Y');

	$age = $current_year - $birthyear;

	$years_slept = ($hourslept/24) * $age;

	print "<p>Your name is $firstname and you have ";
	print "spent $years_slept years of your life sleeping</p>";

	if ($age > 50) {
		print "<p>Better start planning for Retirement!</p>";

		if ($years_slept > 15)
		{
			print "<p>You sleep too much!</p>";
		}
	} else {
		print "<p>Time is on your side! Really.</p>";
		print "<p>Yes, I mean it to you too</p>";
	}

	print "<p> - END - </p>";

?>

</body>
</html>
