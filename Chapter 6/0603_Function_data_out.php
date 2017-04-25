<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0603 Function data out</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Function data out</h3>

<?php

	$rtnData = displayMsg();

	print $rtnData;


	function displayMsg()
	{
		$firstname = $_POST['firstname'];
		$display = '<p>Hi '.$firstname.'</p>';

		return $display;
	}

?>

</body>
</html>