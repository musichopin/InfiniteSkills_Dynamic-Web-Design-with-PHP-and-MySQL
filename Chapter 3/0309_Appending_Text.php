<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>303 HTML Forms</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Appending Text</h3>

<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];

	$middle_init = 'Q.';

	$fullname = $firstname.' '.$middle_init.' '.$lastname;

	$factor = 5;

	$ageplus = $age + $factor;

	//$current_year = date('Y');

	$birth_year = date('Y') - $ageplus;

	print "<p>Regarding ".$fullname;
	print "<br />Entered age of ".$age;
	print "<br />Our profile program concludes that your real age is: ".$ageplus ;
	print "<br />and were born in the year: ".$birth_year;
	print "<br />The current year is ".date('Y')."</p>";
?>

</body>
</html>
