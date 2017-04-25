<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0609_Array_Sort</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Array Sort</h3>



<?php
    $teamMembers = array();  //creates new empty array

	//Load the Array
	for ($ii = 1; $ii <= 5; $ii++)
	{
		$member_html_name = 'member'.$ii;
		$member = $_POST[$member_html_name];

		if (!empty($member))
		{
			array_push($teamMembers, $member);
		}
	}

	sort($teamMembers);
?>

<h4>Team Members - Example 1</h4>

<?php
	$arrLen = sizeOf($teamMembers);

	for ($jj = 0; $jj < $arrLen; $jj++)
	{
		$display_num = $jj + 1;

		print "<br />".$display_num.": ".$teamMembers[$jj];
	}

?>

<h4>Team Members - Example 2</h4>

<?php
	$cntr = 0;

	foreach ($teamMembers as $element)
	{
		$cntr++;
		print "<br />".$cntr.": ".$element;
	}
?>


</body>
</html>
