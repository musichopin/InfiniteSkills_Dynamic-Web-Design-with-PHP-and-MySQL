<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0604 Function - data in out</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Function - data in and out</h3>

<?php
	$in_firstname = $_POST['firstname'];
	$in_hourslept = $_POST['hourslept'];
	$in_birthyear = $_POST['birthyear'];

	$rtnmsg = doValidation($in_firstname, $in_hourslept, $in_birthyear);

	if ($rtnmsg == '')
	{
		displayPage($in_firstname, $in_hourslept, $in_birthyear);
	}
	else
	{
		print $rtnmsg;
		print "<br>Go BACK and try again!";
	}


	//************************************************
	//*  Begin Function Definitions
	//************************************************

	function doValidation($firstname, $hourslept, $birthyear)
	{

		$errmsg = '';

		if (empty($firstname))
		{
			$errmsg .= "<br />You must enter a First Name";
		}

		if (empty($hourslept))
		{
			$errmsg .= "<br />You must enter the hours you sleep";
		}
		else
		{
			if (!is_numeric($hourslept))
			{
				$errmsg .= "<br />The hours you sleep must be numeric";
			}
		}

		if (empty($birthyear))
		{
			$errmsg .= "<br />You must enter your birthyear";
		}
		else
		{
			if (!is_numeric($birthyear))
			{
				$errmsg .= "<br />Your Birth Year must be numeric";
			}
			else
			{
				$length_of_year = strlen($birthyear);

				if ($length_of_year != 4)
				{
					$errmsg .= "<br />Your Birth Year must be exaclty four numbers";
				}
			}
		}

		return $errmsg;
	}

	function displayPage($firstname, $hourslept, $birthyear)
	{
		$current_year = date('Y');

		$age = $current_year - $birthyear;

		$years_slept = ($hourslept/24) * $age;

		print "<p>Your name is $firstname and you have ";
		print "spent $years_slept years of your life sleeping</p>";

		if ($age > 50)
		{
			print "<p>Better start planning for Retirement!</p>";

			if ($years_slept > 15)
			{
				print "<p>You sleep too much!</p>";
			}
		}
		else
		{
			print "<p>Time is on your side! Really.</p>";
			print "<p>Yes, I mean it to you too</p>";
		}

		print "<p> - END - </p>";
	}
?>

</body>
</html>
