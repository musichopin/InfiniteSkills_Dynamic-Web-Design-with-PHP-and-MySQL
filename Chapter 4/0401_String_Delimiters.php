<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>401 String Delimiters</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>String Delimiters</h3>

<?php
	// Code below should print in the following format:
	//   "Hey Steve!", I said.  "Don't do that."


	$firstname = $_POST['firstname'];

	print '<p>"Hey '.$firstname.'!", I said. "Don\'t do that."';

?>

</body>
</html>
