<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0612 Recursive Programming</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h2>Recursive Programming</h2>

<!-- <form method="post" action="0612_Recursive_Programming.php"> -->

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<?php
//***************************************
// Gather Data from Form
//***************************************

if (isset($_POST['firstname_1']))
{
	$firstname_1 = $_POST['firstname_1'];
} else {
	$firstname_1 = '';
}

if (isset($_POST['firstname_2']))
{
	$firstname_2 = $_POST['firstname_2'];
} else {
	$firstname_2 = '';
}

if (isset($_POST['lastname_1']))
{
	$lastname_1 = $_POST['lastname_1'];
} else {
	$lastname_1 = '';
}

if (isset($_POST['lastname_2']))
{
	$lastname_2 = $_POST['lastname_2'];
} else {
	$lastname_2 = '';
}


$display  = 'dummy';

$display = "<table border='1'>\n";

$display .= "<tr>";
	$display .= "<th>Last Name</th>";
	$display .= "<th>First Name</th>";
$display .= "</tr>\n";

$display .= "<tr>";
	$display .= "<td><input type='text' name='lastname_1' value='".$lastname_1."'></td>";
	$display .= "<td><input type='text' name='firstname_1' value='".$firstname_1."'></td>";
$display .= "</tr>\n";  //added newline

$display .= "<tr>";
	$display .= "<td><input type='text' name='lastname_2' value='".$lastname_2."'></td>";
	$display .= "<td><input type='text' name='firstname_2' value='".$firstname_2."'></td>";
$display .= "</tr>\n";  //added newline

$display .= "</table>\n";

$display .= "<br /><input type='submit' name='mysubmit' value='Click Me'>";

print $display;   //This prints the table rows

?>

</form>

</body>
</html>