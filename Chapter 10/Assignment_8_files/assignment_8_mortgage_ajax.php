<?php

$myData = $_POST['data'];  //This recieves the data passed from the HTML form

list($amountfinanced, $interestrate) = explode('|', $myData);


//Do Validations

$msg = "ERROR: ";
$error_cnt = 0;

if (empty($amountfinanced))
{
	$msg .= "<br><span class='errormsg'>Please enter an amount </span>";
	$error_cnt++;
} else {
	if (!is_numeric($amountfinanced))
	{
		$msg .= "<br><span class='errormsg'>Amount entered, '".$amountfinanced."' is not numeric  </span>";
		$error_cnt++;
	}
}

if (empty($interestrate))
{
	$msg .= "<br><span class='errormsg'>Please enter an interest rate  </span>";
	$error_cnt++;
} else {
	if (!is_numeric($interestrate))
	{
		$msg .= "<br><span class='errormsg'>Interest rate entered, '".$interestrate."' is not numeric  </span>";
		$error_cnt++;
	}
}


//Do Calculations

$interestrate_forcalc = $interestrate / 100 ;

$monthy_payment = ($amountfinanced * $interestrate_forcalc) / 12;

$monthy_payment_formatted = number_format($monthy_payment, 2);


//Display New Page


if ($error_cnt > 0)
{
	print $msg;
} else {
	print $monthy_payment_formatted;
}

?>