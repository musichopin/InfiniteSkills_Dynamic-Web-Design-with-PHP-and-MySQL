<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 4</title>

	<link rel="stylesheet" type="text/css" href="css/king_4.css" />

</head>

<body>

<div>
	<a href="assignment_4.php" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="featuredhouse">
	<h2 style="color: blue;">Featured Home!</h2>
	<img src="house_images/bayview_2.jpg" />
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
	displayRealtors();
?>

</div>

<div id="findhome">
<form method="post" action="assignment_4_homelist.php">
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
	<a href="assignment_4_guest_calc.php">Guest Book / Mortgage Calculator</a>
	<br /><br /><br /><br />
</div>



</body>
</html>

<?php
function displayRealtors()
{
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 6/realtors';

	$dirhandle = opendir($dirname);

	if ($dirhandle)
	{
   		 while (false !== ($file = readdir($dirhandle)))
		 {
			if ($file != '.' && $file != '..')
			{
				print "<p><img src='realtors/".$file."'>";
				
				$imagename_minus_ext = str_replace('.jpg', '', $file);
				$realtor_name = ucfirst($imagename_minus_ext);
				
				print "<br />".$realtor_name."</p>\n";
				
				
			}
		 }
	}
}


?>
