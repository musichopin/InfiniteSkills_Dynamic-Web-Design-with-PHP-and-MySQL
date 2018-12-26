<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0403 HTML Table</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>HTML Table</h3>

<?php
	$apples = $_POST['apples'];
	$pears = $_POST['pears'];

	$totalFruit = $apples + $pears;

	$diff = $apples - $pears;

	$reverseDiff = -$diff;

	$multpliedApples = $apples * 5;

	$dividedApples = $apples / 3;

	$moduloApples = $apples % 3;

?>

<table border='1'>
	<tr>
		<th>Description</th>
		<th>Calculated Amount</th>
	</tr>

<?php

	print "<tr><td>The number of Apples is </td><td>$apples</td></tr>\n";

	print "<tr><td>The number of Pears is </td><td>$pears</td></tr>\n";

	print "<tr><td>The number of Apples than Pears </td><td>$diff</td></tr>\n";

	print "<tr><td>The reverse of that would be </td><td>$reverseDiff</td></tr>\n";

	print "<tr><td>Five times as many Apples would be </td><td>$multpliedApples</td></tr>\n";

	print "<tr><td>Apples divided between three would get </td><td>";
	print $dividedApples;
	print "</td></tr>\n";

	print "<tr><td>Rounded to two decimal places would be: </td><td>";
	print number_format($dividedApples, 2);
	print "</td></tr>\n";

	print "<tr><td>Apples left over between three would be </td><td>";
	print $moduloApples;
	print "</td></tr>\n";
?>

</table>


</body>
</html>
