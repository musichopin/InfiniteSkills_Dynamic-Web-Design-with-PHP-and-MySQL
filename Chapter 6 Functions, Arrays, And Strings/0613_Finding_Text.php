<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0613_Finding_Text</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Finding Text</h3>


<?php

	$teamMembers = array();

	$teamMembers[0] = 'Steve - Shortstop';
	$teamMembers[1] = 'Tory - 2nd base';
	$teamMembers[2] = 'Jane :- Rightfield';
	$teamMembers[3] = 'Judy - Leftfield';
	$teamMembers[4] = 'Mary :- Catcher';
	$teamMembers[5] = 'John - CenterField';


	$find_name = $_POST['find_name'];

	if (!empty($find_name))
	{
		print "<h4>Searching for Team Member names that contain: $find_name</h4>";
		$i = 0;
		foreach ($teamMembers AS $member)
		{
			$member_formatted = str_replace(':', '', $member);

			$pos = stripos($member_formatted, '-');

			if ($pos === false)
			{
				//not found in list
			} else {
				$member_formatted = substr($member_formatted, 0, $pos);
				$member_formatted = trim($member_formatted);

				$pos2 = stripos($member_formatted, $find_name);  // *use strpos for case-sensitive match*

				if ($pos2 === false)
				{
					//not found in list
				} else {
					print "<br/>Team Member Found: ".$member_formatted. " in array index " .$i ;
				}
				$i++;
			}
		}
	}

?>

</body>
</html>
