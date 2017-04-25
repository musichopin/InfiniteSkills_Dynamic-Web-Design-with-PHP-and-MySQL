<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 8 - Mortgage Calculator</title>

	<link rel="stylesheet" type="text/css" href="../css/king_8.css" />

	<script>

	var XMLHttpRequestObject = false;

	if (window.XMLHttpRequest) {
	  XMLHttpRequestObject = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
	  XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
	}

	function calcMortgage()
	{

	  if(XMLHttpRequestObject) {

	    XMLHttpRequestObject.open("POST", "assignment_8_mortgage_ajax.php");

	    XMLHttpRequestObject.setRequestHeader('Content-Type',
	      'application/x-www-form-urlencoded');

	    XMLHttpRequestObject.onreadystatechange = function()
	    {
	      if (XMLHttpRequestObject.readyState == 4 &&
	        XMLHttpRequestObject.status == 200) {

	          var returnedData = XMLHttpRequestObject.responseText;

	          processData(returnedData);
	      }
	    }

		var amountfinanced = document.getElementById('amountfinanced').value;
        var interestrate = document.getElementById('interestrate').value;

		var data = amountfinanced + '|' + interestrate + '|';

	    XMLHttpRequestObject.send("data=" + data);
	  }

	  return false;

	}

	function processData(returnedData)
	{

	  if (returnedData.substr(0,5) == 'ERROR')
	  {
	  	var errorDiv = document.getElementById('errordiv');
	  	errorDiv.innerHTML = "ERROR ON DATABASE";
	  } else {
	    monthlypayment = document.getElementById('monthlypayment');
	    monthlypayment.value = returnedData;
	  }

	  return false;
	}


	</script>

</head>

<body>

<div>
	<a href="assignment_8.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>


<div id="calculator">
	<p class="topofdiv">Mortgage Calculator</p>

	<form method="post" action="assignment_8_mortgage.php">

	<table>

	<tr>
		<td>Amount Financed</td>
		<td><input type="text" name="amountfinanced" id="amountfinanced" size="11" /></td>
	</tr>

	<tr>
		<td>Interest Rate</td>
		<td><input type="text" name="interestrate" id="interestrate" size="11" /></td>
	</tr>


	<tr>
		<td>Calculated Monthly Payment</td>
		<td><input class="textdisabled" disabled="disabled" type="text" name="monthlypayment" id="monthlypayment" size="11"  /></td>
	</tr>


	</table>

	<p><input type="button" value="Calculate Payment" onClick="calcMortgage();"/></p>


	</form>
</div>

<div id="errordiv" style="color: red;"></div>


</body>
</html>
