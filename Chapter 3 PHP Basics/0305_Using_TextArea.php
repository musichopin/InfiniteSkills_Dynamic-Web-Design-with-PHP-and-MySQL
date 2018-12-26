<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>305 Using TextArea</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>Using TextArea</h3>

<?php
	$firstname = $_POST['firstname'];
	$comments = $_POST['comments'];

	print "<p>You are <span class='textblue'> $firstname</span> and ";
	print "your comments about the college are: </p>";

	//print "<p><span class='textblue'> $comments </span></p>";


	// alternate way to display information

	print "<textarea name='comments' rows='7' cols='50' disabled='disabled' class='textdisabled'>";
	print $comments;
	print "</textarea>";


?>

</body>
</html>


