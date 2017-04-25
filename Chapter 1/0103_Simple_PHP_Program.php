<html>
<head><title>0103 Simple PHP Program</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>

<body>
	<h1>Simple PHP Program</h1>

	<?php
		$today = date('Y-m-d');
		print "<p><b>Today is $today </b></p>";

		$time = date('h:g:s');
		echo "<p><b>and the Time is $time </b></p>";

		print("<p>You may use Parentheses, ");

		echo("but they are not required</p>");
	?>

	<p>End of Simple PHP Program</p>

</body>

</html>