<html>
<head>
  <title>0803_Adding_Rows_to_a_Table</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

  <style>
  	/*pozisyonlamak bakımından önemli bu 2 div*/
	#addauthor {
		position: absolute;
		top: 80px;
		left: 400px;
		width: 300px;
		height: 500px;
		padding: 10px;
		background-color: #CCCCFF;
	}

	#displayauthor {
		position: absolute;
		top: 80px;
		left: 10px;
		width: 300px;
		height: auto;
		padding: 10px;
		background-color: #CCCCFF;
	}
  </style>

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">

<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<h2 style="background-color: #F5DEB3;">Adding Rows to a Table</h2>

<div id='addauthor'>
    <h3>Add Author</h3>

	<p>Enter SSN:<br />
		<input type='text' name='myssn' size='11' />
	</p>

	<p>Enter Last Name:<br />
		<input type='text' name='mylastname' size='20' />
	</p>

	<p>Enter First Name:<br />
		<input type='text' name='myfirstname' size='20' />
	</p>

	<br /><input type="submit" value="Add Author" />


<?php


//**********************************************
//*
//*  Connect to MySQL and Database
//*
//**********************************************

$db = mysql_connect('localhost','root','');

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>"; // exit demesi gerekirdi (?
}

$dbname = 'test';

$btest = mysql_select_db($dbname);

if (!$btest)
{
	print "<h1>Unable to Select the Database</h1>"; // exit demesi gerekirdi (?)
}

//**********************************************
//*
//*  Add Author to Table
//*
//**********************************************

if (isset($_POST['myssn']))
{
	$myssn = trim($_POST['myssn']);
} else { // ***sayfa refresh edilirse/yüklenirse veya checkbox olmasına karşın (?)***
	$myssn = '';
}

if (isset($_POST['mylastname']))
{
	$mylastname = trim($_POST['mylastname']);
} else {
	$mylastname = '';
}

if (isset($_POST['myfirstname']))
{
	$myfirstname = trim($_POST['myfirstname']);
} else {
	$myfirstname = '';
}


if (empty($myssn) || empty($mylastname) || empty($myfirstname))
{
	$rtncode = '';
} else {
	$rtncode = insertAuthor($db, $myssn, $mylastname, $myfirstname);
}


//**********************************************
//*
//*  SELECT from table and display Results
//*
//**********************************************

$sql_statement  = "SELECT ssn, lastname, firstname ";
$sql_statement .= "FROM author ";
$sql_statement .= "ORDER BY lastname, firstname ";

$result = mysql_query($sql_statement); // if successful $result is grid like

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
	$outputDisplay .= '<tr><th>SSN</th><th>Last Name</th><th>First Name</th></tr>';

	$numresults = mysql_num_rows($result);

	for ($i = 0; $i < $numresults; $i++)
	{
		if (!($i % 2) == 0)
		{
			 $outputDisplay .= "<tr style=\"background-color: #F5DEB3;\">";
		} else {
			 $outputDisplay .= "<tr style=\"background-color: white;\">";
		}


		$myrowcount++;

		$row = mysql_fetch_array($result);

		$ssn 	   = $row['ssn'];
		$lastname  = $row['lastname'];
		$firstname = $row['firstname'];


		// **bu kısım önemli**
		if ($rtncode == $ssn)
		{
			$outputDisplay .= "<td style='color: red;'>".$ssn."</td>";
		} else {
			$outputDisplay .= "<td>".$ssn."</td>";
		}

		$outputDisplay .= "<td>".$lastname."</td>";
		$outputDisplay .= "<td>".$firstname."</td>";

		$outputDisplay .= "</tr>";
	}

	$outputDisplay .= "</table>";

}

?>


</div>

<div id='displayauthor'>
	<?php
		$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
		print $outputDisplay;
	?>
</div>

</form>
</body>
</html>

<?php

function insertAuthor($db, $myssn, $mylastname, $myfirstname)
{

	$statement 	= "insert into author (ssn, lastname, firstname) ";
	$statement .= "values (";
	$statement .= "'".$myssn."', '".$mylastname."', '".$myfirstname."'";
	$statement .= ")";

	$result = mysql_query($statement);
	// **we use mysql_query() function to update db besides retrieving data**

	if ($result)
	{
		echo "<br>Author Added: ".$mylastname.", ".$myfirstname; // notification
		return $myssn;
	} else {
	    $errno = mysql_errno($db);

	    if ($errno == '1062') {
			echo "<br>Author is already in Table: <br />".$mylastname.", ".$myfirstname;
		} else {
			echo("<h4>MySQL No: ".mysql_errno($result)."</h4>");
			echo("<h4>MySQL Error: ".mysql_error($result)."</h4>");
			echo("<h4>SQL: ".$statement."</h4>");
			echo("<h4>MySQL Affected Rows: ".mysql_affected_rows($result)."</h4>");
		}

		return 'NotAdded';
	}

}
?>