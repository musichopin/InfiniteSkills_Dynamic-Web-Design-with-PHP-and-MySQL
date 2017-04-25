<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0606 Function returning multiple values</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h3>Function Returning Multiple Values</h3>

<?php
//***************************************
// Gather Data from Form
//***************************************

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$filename = $DOCUMENT_ROOT.'/my-site/Chapter 6/data/'.'namelist.txt';

$rtnmsg = addToFile($filename, $lastname, $firstname);

print $rtnmsg;

list($total_rows, $theTable) = displayTable($filename);

if ($total_rows != 'No File')
{
	print "<p>Total Rows in Table: ".$total_rows."</p>";

	print $theTable;   //This prints the table rows
}
else
{
	print "No file found";
}



//**************************************************
//*    Function Definitions
//**************************************************

function addToFile($filename, $lastname, $firstname)
{

	$fp = fopen($filename, 'a');   //opens the file for appending

	if ($fp) //if file doesnt exist we create a new file
	{
		$output_line = $lastname.'|'.$firstname.'|'."\n";

		fwrite($fp, $output_line);

		fclose($fp);

		$msg = "<h3>$lastname, $firstname Added to File</h3>"; //confirmation message to user
	} else {
		$msg = "File not opened";
	}


	return $msg;
}

//*****************************************************
//Read Name Information from a File into an HTML table
//*****************************************************

function displayTable($filename)
{

	$myTable =  "<table border='2'>";

	$myTable .= "<tr>";
	$myTable .= "	<th>Last Name</th>";
	$myTable .= "	<th>First Name</th>";
	$myTable .= "</tr>";

	$line_ctr = 0;

	$fp = fopen($filename, 'r');   //opens the file for reading

	if ($fp)
	{
		while(true)
		{

			$line = fgets($fp);

			if (feof($fp)) // if end of file
			{
				break;
			}


			$line_ctr_remainder = $line_ctr % 2;
			
			$line_ctr++;

			if ($line_ctr_remainder == 0)
			{
				$style = "style='background-color: #FFFFCC;'";
			} else {
				$style = "style='background-color: white;'";
			}

			list($lastname, $firstname) = explode('|', $line);

			$myTable .= "<tr $style>";
				$myTable .= "<td>".$lastname."</td>";
				$myTable .= "<td>".$firstname."</td>";
			$myTable .= "</tr>";  //added newline
		}

		fclose($fp);

		$myTable .= "</table>";

		$rtn = array($line_ctr, $myTable);


	} else {
		$rtn = array("No File", "dummy");
	}

	return $rtn;
}

?>


</body>
</html>