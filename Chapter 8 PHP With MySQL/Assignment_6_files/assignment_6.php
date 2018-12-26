<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 6</title>

	<link rel="stylesheet" type="text/css" href="../css/king_6.css" />

</head>

<body>

<div>
	<a href="assignment_6.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="featuredhouse">
	<h2 style="color: blue;">Featured Home!</h2>
	<img src="../featured_house/bayview_2.jpg" />
	<p><strong>As Far as the Eye Can See!</strong></p>
	<p>Spectacular Ocean and Canyon views!!<br />
This large estate has room to entertain with<br />
1200 sq. ft. "ballroom" that features modern<br />
stone and wood work, vaulted ceilings and <br />
huge bay windows.  Large Master Suites<br />
featuring "His" and "Her" bathrooms. </p>
</div>

<div id="realtorlist">
<h4 style="color: blue;">Our Realtors</h4>
<?php
	include 'assignment_6_common_functions.php';

	displayRealtors();
?>

</div>

<div id="findhome">
<form method="post" action="assignment_6_homelist.php">
	<p><strong>Enter City:</strong>
		<input type="text" name="find_city" size="30" />  <br />
		(Leave blank to find all houses listed)
	</p>

	<p>
	<input type="submit" value="Find Homes" />
	</p>

	<p>Note: We represent homes in the following cities: OceanCove, Tomsville, Pine Beach

</form>
</div>


<div id="endpage">
	<a href="http://localhost/assignment_6_files/assignment_6_guest_calc.php">Guest Book / Mortgage Calculator</a>
	<br /><br /><br /><br />
</div>


</body>
</html>

<?php
function displayRealtors()
{
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$statement  = "SELECT firstname, image_file ";
	$statement .= "FROM realtor ";
	$statement .= "ORDER BY firstname ";

	$sqlResults = selectResults($statement);

	$error_or_rows = $sqlResults[0];

	if (substr($error_or_rows, 0 , 5) == 'ERROR')
	{
		print "<br />Error on DB";
	} else {

		$arraySize = $error_or_rows;

		for ($i=1; $i <= $error_or_rows; $i++)
		{
			$firstname = $sqlResults[$i]['firstname'];
			$image_file = $sqlResults[$i]['image_file'];

			print "<p><img src='../realtors/".$image_file."'>";

			print "<br />".$firstname."</p>\n";
		}
	}
}


?>
