<html>
<head>
  <title>0807_Login_Validation</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">

<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >


<h2 style="background-color: #F5DEB3;">Login Validation</h2>



<?php
//**********************************************
//*
//*  Get Userid and Password
//*
//**********************************************

if (isset($_POST['userid']))
{
	$userid = $_POST['userid'];
} else { // bu kısım gereksiz gibi (?)
	$userid = ''; 
}

if (isset($_POST['password']))
{
	$password = $_POST['password'];
} else {
	$password = '';
}

if (isset($_POST['userid']))
{
	// *aşağıdaki form fieldlerin hidden denmesine rağmen eklenmesinin sebebi valuelarını database'deki data ile karşılaştırmak ve buna göre girişe izin vermek veya vermemek(?)*
	print "<input type='hidden' name='userid' size='11' value='".$userid."' /><br /> ";
	print "<input type='hidden' name='password' size='11' value='".$password."' /><br /> ";
} else {
	print "<h2>Enter UserId/Password to Login: </h2>";

	print "<table> ";

	print "<tr> ";
	print "<td>User ID</td><td><input type='text' name='userid' size='11' /><br /> ";
	print "</tr> ";

	print "<tr> ";
	print "<td>Password</td><td><input type='password' name='password' size='11' /></td> ";
	print "</tr> ";

	print "</table> ";

	print "<p><input type='submit' name='mysubmit' value='Login' /> ";

	print "</form></body></html>";

	exit;
	// ***because we exit the program, first time the page is loaded or when we refresh the page we dont reach the code below***

}


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

// **passwordu de check etmemize dikkat**
// *userid is primary key*
$sql_statement  = "SELECT userid ";
$sql_statement .= "FROM validusers ";
$sql_statement .= "WHERE userid = '".$userid."' ";
$sql_statement .= "AND password = '".$password."' ";

$result = mysql_query($sql_statement);

$outputDisplay = "";
$myrowcount = 0;

if (!$result) {
	$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
	$outputDisplay .= "<br />MySQL Error: ".mysql_error();
	$outputDisplay .= "<br />SQL Statement: ".$sql_statement;
	$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
} else {

	$numresults = mysql_num_rows($result);

	// *girişe izin vermez*
	if ($numresults == 0)
	{
		$outputDisplay .= "Invalid Login <br /> ";
		$outputDisplay .= "Please Go BACK and try again";
	} else {
		$outputDisplay .= doShowList();
	}
}

?>

<hr size="4" style="background-color: #F5DEB3; color: #F5DEB3;" />

<?php
	print $outputDisplay;
?>


</form>
</body>
</html>
<?php
function doShowList()
{
	$sql_statement  = "SELECT title, type ";
	$sql_statement .= "FROM book ";
	$sql_statement .= "ORDER BY title, type ";

	$result = mysql_query($sql_statement);

	$outputDisplay = "";
	$myrowcount = 0;

	if (!$result) {
		$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
		$outputDisplay .= "<br />MySQL Error: ".mysql_error();
		$outputDisplay .= "<br />SQL Statement: ".$sql_statement;
		$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
	} else {

		$outputDisplay  = "<h3>Books</h3>\n";

		$outputDisplay .= '<table border=1 style="color: black;">'."\n";
		$outputDisplay .= '<tr><th>Title</th><th>Type</th></tr>' ."\n";

		$numresults = mysql_num_rows($result);

		for ($i = 0; $i < $numresults; $i++)
		{
			if (!($i % 2) == 0)
			{
				 $outputDisplay .= "<tr style=\"background-color: #F5DEB3;\">\n";
			} else {
				 $outputDisplay .= "<tr style=\"background-color: white;\">\n";
			}

			$row = mysql_fetch_array($result);

			$title  = $row['title'];
			$type = $row['type'];

			$outputDisplay .= "<td>".$title."</td>";
			$outputDisplay .= "<td>".$type."</td>";

			$outputDisplay .= "</tr>\n";

		}

		$outputDisplay .= "</table>\n";

	}


	return $outputDisplay;
}
?>