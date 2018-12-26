<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>402 Simple Math</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Simple Math</h3>

<?php
	$apples = $_POST['apples'];
	$pears = $_POST['pears'];

	$totalFruit = $apples + $pears;

	$diff = $apples - $pears;

	$reverseDiff = -$diff;

	$multpliedApples = $apples * 5;

	$dividedApples = $apples / 3;

	$moduloApples = $apples % 3;


	print "<p>The number of Apples is $apples and the number of Pears is $pears ";

	print "<p>There $diff more Apples than Pears ";

	print "<p>The reverse of that would be $reverseDiff ";

	print "<p>Five times as many Apples would be $multpliedApples Apples";

	print "<p>If I divided the Apples equally between three of us, each person ";
	print "would get $dividedApples Apples";

	print "<p>If I rounded the number above to two decimal places it would be: ";
	print number_format($dividedApples, 2);

	print "<p>If I divided the Apples equally between three of us, there ";
	print "would be $moduloApples Apples left over";

?>

</body>
</html>
