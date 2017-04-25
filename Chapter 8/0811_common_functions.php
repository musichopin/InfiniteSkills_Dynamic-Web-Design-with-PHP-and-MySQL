<?php

function connectDatabase()
{
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

	return $db;
}

function selectResults($statement)
{

	$output = "";
	$outputArray = array();

	$db = connectDatabase();

	if ($db)
	{
		$result = mysql_query($statement);
		// *if successful $result is grid like*

		if (!$result) {
			$output .= "ERROR";
			$output .= "<br /><font color=red>MySQL No: ".mysql_errno();
			$output .= "<br />MySQL Error: ".mysql_error();
			$output .= "<br />SQL Statement: ".$statement;
			$output .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

			array_push($outputArray, $output);

		} else {

			$numresults = mysql_num_rows($result);

			array_push($outputArray, $numresults);

			for ($i = 0; $i < $numresults; $i++)
			{
				$row = mysql_fetch_array($result);
				// mysql_fetch_array() takes 1 row of the top of the $result grid

				array_push($outputArray, $row);
				// **we put row array at every iteration into outputArray array which makes it a md array**
			}
		}

	} else {

		array_push($outputArray, 'ERROR-No DB Connection');

	}

	return $outputArray;
}


?>