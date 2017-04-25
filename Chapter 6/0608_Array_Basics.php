<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0608_Array_Basics</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Array Basics</h3>

<?php

 	$fruitArray = array('Apples', 'Oranges', 'Pears');  //creates new array

	print "<br />".$fruitArray[0];
	print "<br />".$fruitArray[1];
	print "<br />".$fruitArray[2];

?>

<h4>Team Members - Example 1</h4>
<?php
    $teamMembers = array();  //creates new empty array

	for ($ii = 1; $ii <= 5; $ii++)
	{
		$member_html_name = 'member'.$ii;
		$member = $_POST[$member_html_name];
		
		$array_index = $ii - 1;
		
		$teamMembers[$array_index] = $member;

		print "<br />".$ii.": ".$teamMembers[$array_index];

		// alt: if we didnt want to add null values to array
		// if (!empty($member)) {
		// 	$teamMembers[$array_index] = $member;
		// 	print "<br />".$ii.": ".$teamMembers[$array_index];
		// }
	}
?>


<h4>Team Members - Example 2</h4>
<?php
    $teamMembers = array();  //creates new empty array

	for ($ii = 1; $ii <= 5; $ii++)
	{
		$member_html_name = 'member'.$ii;
		$member = $_POST[$member_html_name];
		
		array_push($teamMembers, $member);

		$array_index = $ii - 1;
		print "<br />".$ii.": ".$teamMembers[$array_index];
	}
?>
</body>
</html>
