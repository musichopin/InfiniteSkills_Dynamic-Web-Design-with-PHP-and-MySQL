<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0811_Common_Functions_Tester</title>

	<link rel="stylesheet" type="text/css" href="css/king_4.css" />

</head>

<body>

<div>
	<a href="assignment_6.php" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>


<div id="realtorlist">
<h4 style="color: blue;">Our Realtors</h4>
<?php
	include '0811_common_functions.php';

	displayRealtors();
?>

</div>


<div id="endpage">
	<br /><br /><br /><br />
</div>


</body>
</html>

<?php
function displayRealtors()
{
	$statement  = "SELECT firstname, image_file ";
	$statement .= "FROM realtor ";
	$statement .= "ORDER BY firstname ";

	$sqlResults = selectResults($statement);
	// returns array

	$error_or_rows = $sqlResults[0];

	if (substr($error_or_rows, 0 , 5) == 'ERROR')
	{
		print "Error on Database: <br/>";
		print $error_or_rows;
	} else { // if not error

		$arraySize = $error_or_rows;

		for ($i=1; $i <= $arraySize; $i++)
		{
			$firstname = $sqlResults[$i]['firstname'];
			$image_file = $sqlResults[$i]['image_file'];

			print "<p><img src='realtors/".$image_file."'>";

			print "<br />".$firstname."</p>\n";
		}
	}
}


?>
