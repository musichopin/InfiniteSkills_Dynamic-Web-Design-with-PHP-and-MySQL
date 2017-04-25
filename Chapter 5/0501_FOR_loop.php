<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0501 The FOR Loop</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>The FOR Loop</h3>

<h4>Simple For Loop</h4>
<?php
	for ($ii = 1; $ii <= 5; $ii++)
	{
		print "line: ".$ii."<br />";
	}
?>

<h4>Team Memebers</h4>
<?php
	for ($ii = 1; $ii <= 5; $ii++)
	{
		$member_html_name = 'member'.$ii;
		$member = $_POST[$member_html_name];
 
		print "Team Member ".$ii.": ".$member."<br />";;
	}
?>
</body>
</html>
