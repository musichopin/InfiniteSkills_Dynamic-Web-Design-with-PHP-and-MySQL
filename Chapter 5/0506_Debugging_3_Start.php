<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0506_Debugging.php</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>


<?php
//***************************************
// Gather Data from Form
//***************************************

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$filename = $DOCUMENT_ROOT.'data/'.'namelist.txt';


//***************************************
//Add Name Information to File
//***************************************

$fp = fopen($filename, 'a');   //opens the file for appending

$output_line = $lastname.'|'.$firstname.'|'."\n";

fwrite($fp, $output_line);

fclose($fp);

print "<h3>$lastname, $firstname Added to File</h3>";


//*****************************************************
//Read Name Information from a File into an HTML table
//*****************************************************

?>

<table border='1'>

<tr>
	<th>Last Name</th>
	<th>First Name</th>
</tr>


<?php
$display = "";  //empty string


$fp = fopen($filename, 'r');   //opens the file for reading

while(true)
{
	$line = fgets($fp);

	if (feof($fp))
	{
		break
	}

	$line_ctr++;

	$line_ctr_remainder = $line_ctr % 2;

	if ($line_ctr_remainder == 0)
	{
		$style = "style='background-color: #FFFFCC;'";
	} else {
		$style = "style='background-color: white;'";
	

	list($lastname, $firstname) = explode('|', $line);

	$display .= "<tr $style>";
		$display .= "<td>".$lastname."</td>";
		$display .= "<td".$firstname."</td>";
	$display .= "</tr>\n";  //added newline
}

fclose($fp );

print $display;   //This prints the table rows


?>

</table>

</div>
</body>
</html>