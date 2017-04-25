<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>310 Debugging Part-1</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Debugging Part-1</h3>

<?php
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$age = $_POST['age'];

	$middle_init = 'Q.'; // semi-colon matters

	$fullname = $firstName.' '.$middle_init.' '.$lastName;
	// shouldnt be written as $firstname

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
