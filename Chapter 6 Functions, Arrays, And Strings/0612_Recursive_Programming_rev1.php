<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>0612 Recursive Programming</title>
	<link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<h2>Recursive Programming</h2>

<!-- <form method="post" action="0612_Recursive_Programming_rev1.php"> -->

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<?php
//***************************************
// Gather Data from Form
//***************************************

// ***submit edilen text box olmasına rağmen recursive submittion olduğu için (yani formun olduğu yerde php kodu kullanıldığından) else kısmı text***
if (isset($_POST['item_1']))
{
	$item_1 = $_POST['item_1'];
} else {
	$item_1 = '';
}

if (isset($_POST['item_2']))
{
	$item_2 = $_POST['item_2'];
} else {
	$item_2 = '';
}

if (isset($_POST['amount_1']))
{
	$amount_1 = $_POST['amount_1'];
} else {
	$amount_1 = '';
}

if (isset($_POST['amount_2']))
{
	$amount_2 = $_POST['amount_2'];
} else {
	$amount_2 = '';
}


$display  = 'dummy';
$total = 0;
$err_cntr = 0;

$display = "<table border='1'>\n";

$display .= "<tr>";
	$display .= "<th>Item</th>";
	$display .= "<th>Amount</th>";
$display .= "</tr>\n";

$display .= "<tr>";
	$display .= "<td><input type='text' name='item_1' value='".$item_1."'></td>";
	$display .= "<td><input type='text' name='amount_1' value='".$amount_1."'></td>";

	if (!empty($amount_1))
	{
		if (is_numeric($amount_1))
		{
			$total += $amount_1;
		}
		else
		{
			$err_cntr++;
			$display .= "<td style='color: red;'>Amount $amount_1 not Numeric</td>";
		}
	}

$display .= "</tr>\n";  //added newline

$display .= "<tr>";
	$display .= "<td><input type='text' name='item_2' value='".$item_2."'></td>";
	$display .= "<td><input type='text' name='amount_2' value='".$amount_2."'></td>";

	if (!empty($amount_2))
	{
		if (is_numeric($amount_2))
		{
			$total += $amount_2;
		}
		else
		{
			$err_cntr++;
			$display .= "<td style='color: red;'>Amount $amount_2 not Numeric</td>";
		}
	}

$display .= "</tr>\n";  //added newline

$display .= "</table>\n";

$display .= "<br /><input type='submit' name='mysubmit' value='Click Me'>";


if ($err_cntr > 0)
{
	$display .= "<p style='color: red;'>Number of Errors: $err_cntr</p>";
}
else
{
	$display .= "<p>Total Amount: $total</p>";
}


print $display;   //This prints the table rows


?>



</form>

</body>
</html>