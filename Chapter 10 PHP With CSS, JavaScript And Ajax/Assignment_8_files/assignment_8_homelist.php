<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 8 - Home List</title>
	<link rel="stylesheet" type="text/css" href="../css/king_8.css" />
</head>

<body>

<div>
	<a href="assignment_8.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="homelist">

<?php

	if (isset($_POST['find_city']))
	{
		$find_city = $_POST['find_city'];
	} else {
		$find_city = 'ALL';
	}

	if (empty($find_city))
	{
		$find_city = 'ALL';
	}

	if ($find_city == 'ALL')
	{
		print "<h2>Current Listings</h2>";
	} else {
		print "<h2>Current Listings that match: ".$find_city."</h2>";
	}


	include 'assignment_8_common_functions.php';

	retrieveHomes($find_city);


	//*****************************************
	//**   Function Definitions
	//*****************************************

	function retrieveHomes($find_city)
	{
		$statement  = "SELECT city, ";
		$statement .= "       price, ";
		$statement .= "       baths, ";
		$statement .= "       bedrooms, ";
		$statement .= "       footage, ";
		$statement .= "       realtor, ";
		$statement .= "       image_file, ";
		$statement .= "       grabber, ";
		$statement .= "       description ";
		$statement .= "FROM home ";

		if ($find_city != 'ALL')
		{
			$statement .= "WHERE city LIKE '".$find_city."%' ";
		}

		$statement .= "ORDER BY city, price ";

		$sqlResults = selectResults($statement);

		$error_or_rows = $sqlResults[0];

		if (substr($error_or_rows, 0 , 5) == 'ERROR')
		{
			print "<br />Error on DB";
			print "<br />$error_or_rows";
		} else {

			$arraySize = $error_or_rows;

			for ($i=1; $i <= $error_or_rows; $i++)
			{
				$city = $sqlResults[$i]['city'];
				$price = $sqlResults[$i]['price'];
				$baths = $sqlResults[$i]['baths'];
				$bedrooms = $sqlResults[$i]['bedrooms'];
				$footage = $sqlResults[$i]['footage'];
				$realtor = $sqlResults[$i]['realtor'];
				$grabber = $sqlResults[$i]['grabber'];
				$description = $sqlResults[$i]['description'];
				$image_file = $sqlResults[$i]['image_file'];


				print "<img src='../house_images/".$image_file."'>";

				print "<h3>".$grabber."</h3>";

				print "City: ".$city."<br />";
				print "Bed/Baths: $bedrooms / $baths<br />";

				$formatted_price = number_format($price);
				print "Price: $".$formatted_price."<br />";

				print "Area: ".$footage." sq.ft.<br />";
				print "Realtor: ".$realtor."<br /><br />";

				print $description."<br /><br /><hr /><br />";

			}
		}
	}

?>

<div>
</body>
</html>
