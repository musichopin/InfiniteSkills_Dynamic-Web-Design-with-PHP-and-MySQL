<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0614_Using_Regular_Expressions</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Using Regular Expressions</h3>

<?php

	$teamMembers = array();

	$teamMembers[0] = 'Steve';
	$teamMembers[1] = 'Tory';
	$teamMembers[2] = 'Jane';
	$teamMembers[3] = 'Judy';
	$teamMembers[4] = 'Mary';
	$teamMembers[5] = 'John';
	$teamMembers[6] = 'Edward';


	$find_name = $_POST['find_name'];

	if (!empty($find_name))
	{
		print "<h4>Searching for Team Member names that BEGINS WITH: $find_name</h4>";

		foreach ($teamMembers AS $member)
		{
			$pattern = '/^'.$find_name.'/i';  //matched beginning of String

			$num_of_matches = preg_match($pattern, $member);

			if ($num_of_matches > 0)
			{
				print "<br />$num_of_matches Team Member Found: ".$member ;
			}
		}

		print "<h4>Searching for Team Member names that ENDS WITH: $find_name</h4>";

		foreach ($teamMembers AS $member)
		{
			$pattern = '/'.$find_name.'$/i';  //matched ending of String

			$num_of_matches = preg_match($pattern, $member);

			if ($num_of_matches > 0)
			{
				print "<br />$num_of_matches Team Member Found: ".$member ;
			}
		}
	}

?>

</body>
</html>
