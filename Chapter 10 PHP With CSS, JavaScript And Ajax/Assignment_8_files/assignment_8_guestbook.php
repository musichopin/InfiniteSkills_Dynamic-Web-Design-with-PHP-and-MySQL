<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Assignment 8 - GuestBook</title>

	<link rel="stylesheet" type="text/css" href="../css/king_8.css" />

		<script>

		var XMLHttpRequestObject = false;

		if (window.XMLHttpRequest) {
		  XMLHttpRequestObject = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
		  XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		}

		function viewGuestBook()
		{

		  if(XMLHttpRequestObject) {

		    XMLHttpRequestObject.open("POST", "assignment_8_view_guestbook_ajax.php");

		    XMLHttpRequestObject.setRequestHeader('Content-Type',
		      'application/x-www-form-urlencoded');

		    XMLHttpRequestObject.onreadystatechange = function()
		    {
		      if (XMLHttpRequestObject.readyState == 4 &&
		        XMLHttpRequestObject.status == 200) {

		          var returnedData = XMLHttpRequestObject.responseText;
					//alert("RD" + returnedData);
		          processData(returnedData);
		      }
		    }

			var data = 'dummy';

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
		    var guestbookDiv = document.getElementById('guestbook');

		    var divData = "<h3>GuestBook</h3>" + returnedData;
		  	guestbookDiv.innerHTML = divData;

		  	guestbookDiv.style.visibility = "visible";

		  }

		  return false;
		}


		function addToGuestBook()
		{

		  var errmsg = validateForm();

		  if (errmsg != '')
		  {
		     processAdd(errmsg);
		     return false;
		  }

		  if(XMLHttpRequestObject) {

		    XMLHttpRequestObject.open("POST", "assignment_8_add_to_guestbook_ajax.php");

		    XMLHttpRequestObject.setRequestHeader('Content-Type',
		      'application/x-www-form-urlencoded');

		    XMLHttpRequestObject.onreadystatechange = function()
		    {
		      if (XMLHttpRequestObject.readyState == 4 &&
		        XMLHttpRequestObject.status == 200) {

		          var returnedData = XMLHttpRequestObject.responseText;
					//alert("RD" + returnedData);
		          processAdd(returnedData);
		      }
		    }

			var firstname = document.getElementById('firstname').value;
			var lastname = document.getElementById('lastname').value;

			var phoneormemail  = document.getElementById('phoneormemail').value;

			var rbphone = document.getElementById('rbphone');

			if (rbphone.checked)
			{
				var contactchoice = 'P';
			} else {
				var contactchoice = 'E';
			}

			var city = document.getElementById('city').value;

			var comments = document.getElementById('comments').value;

            var data  = firstname + '|' + lastname + '|';
                data += contactchoice + '|' + phoneormemail + '|';
                data += city + '|' + comments + '|';

		    XMLHttpRequestObject.send("data=" + data);
		  }

		  return false;

		}

		function processAdd(returnedData)
		{
			var guestbookDiv = document.getElementById('guestbook');

			guestbookDiv.innerHTML = returnedData;

			guestbookDiv.style.visibility = "visible";

		  	return false;
		}

		function validateForm()
		{

			errmsg = '';

			var firstname = document.getElementById('firstname').value;

			if (firstname == null || firstname == "")
			{
			  errmsg += "<br />You must enter a First Name";
  			}

			var lastname = document.getElementById('lastname').value;

			if (lastname == null || lastname == "")
			{
			  errmsg += "<br />You must enter a Last Name";
  			}

			var phoneormemail = document.getElementById('phoneormemail').value;

			if (phoneormemail == null || phoneormemail == "")
			{
			  errmsg += "<br />You must enter a Phone Number or Email";
  			}

			var city = document.getElementById('city').value;


			if (city == '-')
			{
			  errmsg += "<br />You must enter a City";
  			}

			return errmsg;
		}

		</script>

</head>

<body>

<div>
	<a href="assignment_8.php" border="0">
	<img src="../images/KingLogo.jpg" alt="King Real Estate Logo">
	</a>
</div>

<div id="guest">
	<form method="post">
	<p class="topofdiv">Please sign up on our guest list</p>

	<p>
	First Name:<br />
	<input type="text" name="firstname" id="firstname" size="30" />
	</p>

	<p>
	Last Name:<br />
	<input type="text" name="lastname" id="lastname" size="30" />
	</p>

	<p>
	Contact Information:
	<input type="radio" name="contact" id="rbphone" value="Phone" checked="checked" /> Phone
	<input type="radio" name="contact" id="rbemail" value="Email" /> Email <br />

	<input type="text" name="phoneormemail" id="phoneormemail" size="40" />
	</p>

	<p>
	City Where You Want to Reside:<br />
	<select name="city" id="city" size="1" >
		<option value="-">-</option>

	<?php

	include "assignment_8_Common_Functions.php";

	$outputDisplay = '';


	$sql_statement  = "SELECT name ";
	$sql_statement .= "FROM city ";
	$sql_statement .= "ORDER BY name ";

	$sqlResults = selectResults($sql_statement);

	$error_or_rows = $sqlResults[0];

	if (substr($error_or_rows, 0 , 5) == 'ERROR')
	{
		print "<br />Error on DB";
	} else {

		for ($ii = 1; $ii <= $error_or_rows; $ii++)
		{
			$name  = $sqlResults [$ii] ['name'];

			//print "<br>N: $name";

			$outputDisplay .= "<option value='".$name."'>".$ii.":".$name."</option>";
		}
	}

	print $outputDisplay;

	?>

	</select>
	</p>

	<p>
	Comments:<br />
	<textarea name="comments" id="comments" cols="40" rows="3"></textarea>
	</p>

	<p>
	<input type="button" value="Submit Information" onclick="addToGuestBook();" />
	<input type="reset" />
	</p>

	<p>For Admin Use Only: <a href="" onclick="return viewGuestBook();">View Guestbook</a></p>


	</form>

</div>

<div id="guestbook">
</div>

<div id="errordiv" style="color: red;">
</div>

</body>
</html>