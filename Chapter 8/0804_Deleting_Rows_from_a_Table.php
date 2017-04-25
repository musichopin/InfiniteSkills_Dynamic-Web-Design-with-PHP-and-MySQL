<html>
<head>
  <title>0804_Deleting_Rows_from_a_Table</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

  <style>

	#displayauthor {
		position: absolute;
		top: 80px;
		left: 10px;
		width: 400px;
		height: auto;
		padding: 10px;
		background-color: #CCCCFF;
	}
  </style>

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">

<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<h2 style="background-color: #F5DEB3;">Deleting Rows from a Table</h2>

<div id='displayauthor'>


<?php


//**********************************************
//*
//*  Connect to MySQL and Database
//*
//**********************************************

$db = mysql_connect('localhost','root','');

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
}

$dbname = 'test';

$btest = mysql_select_db($dbname);

if (!$btest)
{
	print "<h1>Unable to Select the Database</h1>";
}



//**********************************************
//*
//*  SELECT from table and display Results
//*
//**********************************************

$sql_statement  = "SELECT ssn, lastname, firstname ";
$sql_statement .= "FROM author ";
$sql_statement .= "ORDER BY lastname, firstname ";

$result = mysql_query($sql_statement);

$outputDisplay = "";
$myrowcount = 0;

if (!$result) {
	$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
	$outputDisplay .= "<br />MySQL Error: ".mysql_error();
	$outputDisplay .= "<br />SQL Statement: ".$sql_statement;
	$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
} else {

	$outputDisplay  = "<h3>Author Table Data</h3>";

	$outputDisplay .= '<table border=1 style="color: black;">';
	$outputDisplay .= '<tr><th>Delete?</th><th>SSN</th><th>Last Name</th><th>First Name</th></tr>'."\n";

	$numresults = mysql_num_rows($result);

	for ($i = 0; $i < $numresults; $i++)
	{
		if (!($i % 2) == 0)
		{
			 $outputDisplay .= "<tr style=\"background-color: #F5DEB3;\">";
		} else {
			 $outputDisplay .= "<tr style=\"background-color: white;\">";
		}

		$row = mysql_fetch_array($result);

		$ssn 	   = $row['ssn'];
		$lastname  = $row['lastname'];
		$firstname = $row['firstname'];

        if (isset($_POST[$ssn])) // **checkbox check edilip submit edilirse**
        {
        	$checked = $_POST[$ssn]; // $checked, Y olur
        } else { // **sayfa refresh edilirse/yüklenirse veya checkbox olmasına karşın (?)**
        	$checked = 'N';
        }

		if ($checked == 'Y')
		{
			deleteAuthor($db, $ssn, $lastname, $firstname);
			// **deleteAuthor() methodu (önceki ve sonraki örnekteki gibi) önceden de çağırılabilirdi**
		} else {

			$myrowcount++;

			$outputDisplay .= "<td><input type='checkbox' name='".$ssn."' value='Y'></td>";
			$outputDisplay .= "<td>".$ssn."</td>";
			$outputDisplay .= "<td>".$lastname."</td>";
			$outputDisplay .= "<td>".$firstname."</td>";
			$outputDisplay .= "</tr>\n";
		}
	}

	$outputDisplay .= "</table>";

}

$outputDisplay .= '<br /><input type="submit" value="Delete Authors" />';

$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
print $outputDisplay;

?>
</div>

</form>
</body>
</html>

<?php

function deleteAuthor($db, $ssn, $lastname, $firstname)
{
	$statement 	= "DELETE FROM author ";
	$statement .= "WHERE ssn = '".$ssn."' ";
	// ***ssn: column name, $ssn: data corresponding to ssn column name and specific row***

	$result = mysql_query($statement);
	// **we use mysql_query() function to update db besides retrieving data**

	if ($result)
	{
		echo "<br />Author deleted: ".$lastname.", ".$firstname;
	} else {
		echo("<h4>MySQL No: ".mysql_errno($result)."</h4>");
		echo("<h4>MySQL Error: ".mysql_error($result)."</h4>");
		echo("<h4>SQL: ".$statement."</h4>");
		echo("<h4>MySQL Affected Rows: ".mysql_affected_rows($result)."</h4>");
	}
}
?>