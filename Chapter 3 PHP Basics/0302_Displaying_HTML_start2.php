<html>
<head><title>0302 Displaying HTML</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>

<body>
	<h1>0302 Displaying HTML</h1>
	<p>What are script tags and why do we need them to run PHP?</p>
	<p><b>

<?php
	$today = date('Y-m-d h:g:s');
	print "<span style='color: blue;'>Today is $today </span>";
?>

</b></p>
</body>

</html>