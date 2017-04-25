<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0610 Load Array from a File</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Load Array from a File</h3>

<?php
    $teamMembers = array();  //creates new empty array

	//Load the Array

	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$filename = $DOCUMENT_ROOT.'/my-site/Chapter 6/data/'.'team_members.txt';

	$lines_in_file = count(file($filename));

	$fp = fopen($filename, 'r');   //opens the file for reading

	for ($ii = 1; $ii <= $lines_in_file; $ii++)
	{
		$line = fgets($fp);
		$member = trim($line);
		array_push($teamMembers, $member);
	}

	fclose($fp);


	sort($teamMembers);
?>

<h4>Team Members - Example</h4>

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
