<html>
<head><title>Hello World</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>

<body>
	<?php
		$sec = date('s');
		$colorArray = array('blue', 'green', 'red', 'maroon', 'gray');
		$colorIndex = $sec % 5;

		print '<h1 style="color: '.$colorArray[$colorIndex].';">Hello World</h1>';
		// alt: print '<h1 style="color: red;">Hello World</h1>';
		// alt: print '<h1 style="color: '. 'orange' .';">Hello World</h1>';
	?>
</body>

</html>