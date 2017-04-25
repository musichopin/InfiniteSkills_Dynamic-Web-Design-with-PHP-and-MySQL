<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0808_Relative_Referencing</title>

	<link rel="stylesheet" type="text/css" href="Assignment_6_files/king_6.css" />

</head>

<body>

<div>
	<a href="0808_Relative_Referencing.php" border="0">
	<img src="house_images/bayview_1.jpg" alt="King Real Estate Logo">
	</a>
</div>


<div id="realtorlist">
<h4 style="color: blue;">Our Realtors</h4>
<?php
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
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 8/'.'realtors';
	// alt: $dirname = 'realtors';

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
