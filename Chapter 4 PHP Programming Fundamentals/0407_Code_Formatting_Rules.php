<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0406 Nested IF</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

//*******************************************************
//
//  This code is purposely misaligned so you can see
//  that PHP will still work, but you will have a
//  hard time following the logic!
//
//*******************************************************


<h3>Nested IF</h3>

<?php
$firstname = $_POST['firstname'];
			$hourslept = $_POST['hourslept'];
	$birthyear = $_POST['birthyear'];
								$current_year = date('Y');

$age = $current_year - $birthyear;

	$years_slept = ($hourslept/24) * $age;

print "<p>Your name is $firstname and you have ";
	print "spent $years_slept years of your life sleeping</p>";


			if ($age > 50)
				{
print "<p>Better start planning for Retirement!</p>";

if ($years_slept > 15)
{
print "<p>You sleep too much!</p>";




}
else
{
print "<p>Yes, I mean it</p>";
}
}


		else
		{
	print "<p>Time is on your side! Really.</p>";
	print "<p>Yes, I mean it to you too</p>";
}

	print "<p> - END - </p>";

?>

</body>
</html>
