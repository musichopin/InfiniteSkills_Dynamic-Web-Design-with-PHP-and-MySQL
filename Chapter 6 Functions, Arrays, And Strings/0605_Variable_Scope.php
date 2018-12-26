<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0605 Variable Scope</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
</head>

<body>

<h3>Variable Scope</h3>

<?php
	
	$institution = "Infinite Skills";

	$rtr_info = doStartUp();

	print "<br />Insitution: ".$institution;
	print "<br />Class: ".$class;
	print "<br />Class Type: ".$class_type;
	print "<br />rtr_info: ".$rtr_info;
	print "<br />Degree: ".$degree;


	function doStartUp()
	{
		global $degree; // **getClassInstructorInfo() fonksiyonunda deklare edildiği için ve tekrardan fonksiyon içinde kullandığımız için global olur**
		global $class;
		$class = "PHPMySQL";

		$classInstructorInfo = getClassInstructorInfo($class);
		return $classInstructorInfo."*DEGREE: ".$degree;
	}

	function getClassInstructorInfo($a_class)
	{

		global $degree;
		global $class_type;
		$class_type = "Video"; // must be declared global

		if ($a_class == 'PHPMySQL')
		{
			$instructor = 'Steve Perry';
			$degree = 'MAED';
		}

		return $instructor;

	}
/*
Insitution: Infinite Skills
Class: PHPMySQL
Class Type: Video
rtr_info: Steve Perry*DEGREE: MAED
Degree: MAED 
*/
?>

</body>
</html>
