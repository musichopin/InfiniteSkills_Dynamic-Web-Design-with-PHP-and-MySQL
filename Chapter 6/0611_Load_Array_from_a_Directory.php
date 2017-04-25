<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0611_Load_Array_from_a_Directory</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Load Array from a Directory</h3>


<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 6/'.'house_images';
	// alt: $dirname = 'C:/wamp64/www/my-site/Chapter 6/'.'house_images';
	// alt: $dirname = 'house_images'

	$dirhandle = opendir($dirname);


	if ($dirhandle)
	{
		 $houseFiles = array();  //creates new empty array

		 // alt:
		 // $file = "asdf";
   		 // while ($file) {
		 // 	$file = readdir($dirhandle);
		 // 	if ($file != '.' && $file != '..' && $file != "")
   		 while (false !== ($file = readdir($dirhandle)))
		 {
			if ($file != '.' && $file != '..')
			{
				array_push($houseFiles, $file);
			}
		 }

	}

	sort($houseFiles);

	foreach ($houseFiles as $element)
	{
		$imagename = 'house_images/'.$element;
		print "<p><img src='".$imagename."'></p>";
	}


?>


</body>
</html>
