<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0502 The WHILE loop</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>The WHILE Loop</h3>

<h4>Simple While Loop</h4>
<?php
	$cntr = 1;

	while($cntr <= 7)
	{
		print "line: ".$cntr."<br />";
		$cntr++;   // Add 1 to $cntr
	}
?>

<h4>Grocery List</h4>
<?php

	$cntr = 1;

	$item = 'dummy';

	while(!empty($item))
	{
		$item_html_name = 'item'.$cntr;

		$item = $_POST[$item_html_name];

		if (!empty($item))
		{
			print "Item: ".$item."<br />";
			$cntr++;
		}
	}

?>

<h4>Traditional Way to see Grocery List</h4>
<?php 
	$cntr = 1;

	while($cntr < 8)
	{
		$item_html_name = 'item'.$cntr;

		$item = $_POST[$item_html_name];

		// if (empty($item)) {break;}
		
		print "Item: ".$item."<br />";
		
		$cntr++;
		
	}
?>


<h4>Alternate Way to see Grocery List</h4>
<?php

	$cntr = 1;

	while(true)
	{
		$item_html_name = 'item'.$cntr;

		$item = $_POST[$item_html_name];

		if (empty($item))
		{
			break;
		}

		$cntr++;

		print "Item: ".$item."<br />";

	}

?>

<h4>Grocery List - Skipping Pears</h4>
<?php

	$cntr = 1;

	while(true)
	{
		$item_html_name = 'item'.$cntr;

		$item = $_POST[$item_html_name];

		if (empty($item))
		{
			break;
		}

		$cntr++;

		if ($item == 'Pears')
		{
			continue;  //go back to top and processes next iteration of the loop
		}

		print "Item: ".$item."<br />";

	}

?>
</body>
</html>
