<html>
<head><title>0301 Using PHP Script Tags</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>

<body>
	<h1>0301 Using PHP Script Tags</h1>
	<p>What are script tags and why do we need them to run PHP?</p>

	<?php
		$today = date('Y-m-d h:g:s');
		print "<p><b>Today is $today </b></p>";
	?>

</body>

</html>