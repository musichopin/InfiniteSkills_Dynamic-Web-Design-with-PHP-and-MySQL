<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 8</title>

	<link rel="stylesheet" type="text/css" href="../css/king_8.css" />

	<script>
	function showRealtorInfo(element, realtorInfo)
	{
		var realtorArray = realtorInfo.split('|');

		var firstname = realtorArray[0];
		var lastname  = realtorArray[1];
		var phone     = realtorArray[2];
		var email     = realtorArray[3];

		var realtorInfoDiv = document.getElementById('realtorinfo');

		var myHTML  = "<p><b>" + firstname + " " + lastname + "</b><br /><br />";
			myHTML += "Phone: " + phone + "<br />";
			myHTML += "Email: " + email + "<br />";

		realtorInfoDiv.innerHTML = myHTML;

		x = element.offsetLeft;
		y = element.offsetTop;

		//alert(x);

		realtorInfoDiv.style.top = y + 100;
		realtorInfoDiv.style.left = x + 550;



		realtorInfoDiv.style.visibility = 'visible';


	}


	function hideRealtorInfo()
	{
		var realtorInfoDiv = document.getElementById('realtorinfo');
		realtorInfoDiv.style.visibility = 'hidden';
	}


	</script>

</head>

<body>

<div>
	<a href="assignment_8.php" border="0">
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
	include 'assignment_8_common_functions.php';

	displayRealtors();
?>

</div>

<div id="findhome">
<form method="post" action="assignment_8_homelist.php">
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
	<a href="http://localhost/assignment_8_files/assignment_8_guestbook.php">Guest Book</a> /
	<a href="http://localhost/assignment_8_files/assignment_8_mortgage_calc.php">Mortgage Calculator</a>
	<br /><br /><br /><br />
</div>


<div id='realtorinfo'>
</div>


</body>
</html>

<?php
function displayRealtors()
{
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$statement  = "SELECT firstname, lastname, phone, email, image_file ";
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
			$lastname = $sqlResults[$i]['lastname'];
			$phone = $sqlResults[$i]['phone'];
			$email = $sqlResults[$i]['email'];

			$image_file = $sqlResults[$i]['image_file'];

			$realtorData = $firstname.'|'.$lastname.'|'.$phone.'|'.$email.'|';

			print "<p><img src='../realtors/".$image_file."' ";
			print "onmouseover='showRealtorInfo(this, \"".$realtorData."\");' onmouseout='hideRealtorInfo();'>";

			print "<br />".$firstname."</p>\n";
		}
	}
}


?>
