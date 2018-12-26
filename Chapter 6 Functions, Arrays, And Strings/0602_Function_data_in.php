<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0602 Function with data in</title>

	<link rel="stylesheet" type="text/css" href="css/king_2.css" />

</head>

<body>

<h3>Function with data in</h3>

	<?php
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

		$filename = $DOCUMENT_ROOT.'/my-site/Chapter 6/data/'.'cities.txt';

		displayFile($filename);


		function displayFile($a_filename)
		{

			$lines_in_file = count(file($a_filename));

			$fp = fopen($a_filename, 'r');   //opens the file for reading

			for ($ii = 1; $ii <= $lines_in_file; $ii++)
			{
				$line = fgets($fp);
				$city = trim($line);

				print 'City: '.$city.'<br />';
			}

			fclose($fp);
		}

	?>


</body>
</html>
