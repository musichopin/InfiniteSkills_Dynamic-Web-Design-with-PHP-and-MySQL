<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0615_Finding_Text_in_a_File</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Finding Text in a File</h3>


<?php
	// 1. directorydeki resimler looplanır
	// 2. her bir resimle ilgili text documentlarındaki satırlar looplanır
	// 3. satırlardaki data ile user input arasında eşleşme var mı diye check edilir
	// 4. sonuç print edilir

	$find_city = $_POST['find_city'];

	if (empty($find_city))
	{
		$find_city = 'ALL';
	}


	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

	$dirname = $DOCUMENT_ROOT.'/my-site/Chapter 6/'.'house_images';
	// alt: $dirname = 'C:/wamp64/www/my-site/Chapter 6/'.'house_images';
	// alt: $dirname = 'house_images'

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


		// **regular file reading**
		while(true)
		{
			$line = fgets($fp); // ***reads the file 1 line by 1 line through looping***

			if (feof($fp))
			{
				break;
			}

			$pos = stripos($line, 'City:');

			if ($pos !== false)
			{
				$city = substr($line, 5);
				$city = trim($city);

				// ***"ALL" ise kod break edilmez ve tüm resimler gözükür***
				if ($find_city != 'ALL')
				{

					$subpos = stripos($city, $find_city);

					if($subpos === false)
					{
						$show_house = 'N';
						break;
					// ***break yapılır ve directorydeki diğer resimlere bakılır (ilk while loop kullanılarak)***
					}
				}
			}

			// **kod bu kısma (2. lineda olduğundan) 2. iterationda gelir
			$pos = stripos($line, 'Price:');

			if ($pos !== false)
			{
				$price = substr($line, 6);
				$price = trim($price);
			}

			// **kod bu kısma 3. iteration'da gelir**
			$pos = stripos($line, 'Bedrooms:');

			if ($pos !== false)
			{
				$bedrooms = substr($line, 9);
				$bedrooms = trim($bedrooms);
			}

			// **kod bu kısma 4. iteration'da gelir**
			$pos = stripos($line, 'Baths:');

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
			print "Bed/Baths: $bedrooms/$baths<br />";
			print "Price: ".$price."<br /><br />";
		}

	}

?>

</body>
</html>
