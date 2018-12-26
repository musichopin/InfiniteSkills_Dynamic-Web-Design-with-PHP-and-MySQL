<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 4 - Home List</title>
	<link rel="stylesheet" type="text/css" href="css/king_4.css" />
</head>

<body>

<div>
	<a href="assignment_4.php" border="0">
	<img src="images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<?php

	$find_city = $_POST['find_city'];

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


	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 6/house_images';

	$dirhandle = opendir($dirname);


	if ($dirhandle)
	{
   		 while (false !== ($file = readdir($dirhandle)))
		 {
			if ($file != '.' && $file != '..')
			{
				displayPropertyInfo($file, $find_city);
			}
		 }

	}

	//*****************************************
	//**   Function Definitions
	//*****************************************

	function displayPropertyInfo($image_filename, $find_city)
	{
		//Get Image File

		$imagename = 'house_images/'.$image_filename;     // .jpg file
		$house_img = "<p><img src='".$imagename."'></p>";

		//Get Image Index Information

		$index_filename = str_replace('.jpg', '.txt', $image_filename);

		$filename = 'houses_indexed/'.$index_filename;   // .txt file

		$fp = fopen($filename, 'r');


		$show_house = 'Y';   //set default value

		$descriptionFlag = "N";  //set default value
		$description = '';

		while(true)
		{
			$line = fgets($fp);

			if (feof($fp))
			{
				break;
			}

			$pos = stripos($line, 'City:');

			if ($pos !== false)
			{
				$city = substr($line, 5);
				$city = trim($city);

				if ($find_city != 'ALL')
				{

					$subpos = stripos($city, $find_city);

					if($subpos === false)
					{
						$show_house = 'N';
						break;
					}

				}
			}

			$pos = stripos($line, 'Price:');

			if ($pos !== false)
			{
				$price = substr($line, 6);
				$price = trim($price);
			}

			$pos = stripos($line, 'Bedrooms:');

			if ($pos !== false)
			{
				$bedrooms = substr($line, 9);
				$bedrooms = trim($bedrooms);
			}

			$pos = stripos($line, 'Baths:');

			if ($pos !== false)
			{
				$baths = substr($line, 6);
				$baths = trim($baths);
			}
			
			$pos = stripos($line, 'Footage:');

			if ($pos !== false)
			{
				$footage = substr($line, 8);
				$footage = trim($footage);
			}
			
			$pos = stripos($line, 'Realtor:');

			if ($pos !== false)
			{
				$realtor = substr($line, 8);
				$realtor = trim($realtor);
			}
			
			$pos = stripos($line, 'Grabber:');

			if ($pos !== false)
			{
				$grabber = substr($line, 8);
				$grabber = trim($grabber);
			}
			
			$pos = stripos($line, 'Description:');

			if ($pos !== false)
			{
				$descriptionFlag = "Y";
			}
			
			if ($descriptionFlag == "Y")
			{
				$description .= $line."<br />";
			}
			
		}

		if ($show_house == 'Y')
		{
			print $house_img;

			print "<h3>".$grabber."</h3>";
			
			print "City: ".$city."<br />";
			print "Bed/Baths: $bedrooms/ $baths<br />";
			print "Price: ".$price."<br />";
			print "Area: ".$footage."<br />";
			print "Realtor: ".$realtor."<br />";
			
			print "<p>".$description."</p><br /><br />";
			
		}

	}

?>

</body>
</html>
