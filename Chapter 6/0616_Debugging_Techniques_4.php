<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0616_Debugging_Techniques_4</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Debugging Techniques - Part 4</h3>


<?php

	$find_city = $_POST['find_city'];

	if (empty($find_city))
	{
		$find_city = 'ALL';
	}

	print "<br/>FINDC: ".$find_city;

	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 6/'.'house_images';

	$dirhandle = opendir($dirname);


	if ($dirhandle)
	{
		 $houseFiles = array();  //creates new empty array

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
		displayPropertyInfo($element, $find_city);
	}


	//*****************************************
	//**   Function Definitions
	//*****************************************

	function displayPropertyInfo($element, $find_city)
	{
		//Get Image File



		$imagename = 'house_images/'.$element;     // .jpg file
		$house_img = "<p><img src='".$imagename."'></p>";

		//Get Image Index Information

		$index_filename = str_replace('.jpg', '.txt', $element);

		$filename = 'houses_indexed/'.$index_filename;   // .txt file



		$fp = fopen($filename, 'r');


		$show_house = 'Y';   //set default value

		while(true)
		{
			$line = fgets($fp);

			if (feof($fp))
			{
				break;
			}

			$pos = strpos($line, 'City:');



			if ($pos !== false)
			{
				$city = substr($line, 5);
				$city = trim($city);

				if ($find_city != 'ALL')
				{

					$subpos = strpos($city, $find_city);

					//print "<br>C/FC: '".$city." / '".$find_city."' $subpos";


					if($subpos === false)
					{
						$show_house = 'N';
						break;
					}

					//print "<br>HERE";

				}
			}

			$pos = strpos($line, 'Price:');

			if ($pos !== false)
			{
				$price = substr($line, 5);
				$price = trim($price);
			}

			$pos = strpos($line, 'Bedrooms:');

			if ($pos !== false)
			{
				$bedrooms = substr($line, 9);
				$bedrooms = trim($bedrooms);
			}

			$pos = strpos($line, 'Baths:');

			if ($pos !== false)
			{
				$baths = substr($line, 6);
				$baths = trim($baths);
			}

		}

		if ($show_house == 'Y')
		{
			print $house_img;
			print "City: ".$city."<br />";
			print "Bed/Baths: $bedrooms/ $baths<br />";
			print "Price: ".$price."<br /><br />";
		}

	}


?>


</body>
</html>
