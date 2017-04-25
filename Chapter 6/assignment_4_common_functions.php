<?php

function doValidation($firstname, $lastlame, $phoneormemail, $city)
{

	$errmsg = '';

	if (empty($firstname))
	{
		$errmsg .= "<br />You must enter a First Name";
	}
	
	if (empty($lastlame))
	{
		$errmsg .= "<br />You must enter a Last Name";
	}
	
	if (empty($phoneormemail))
	{
		$errmsg .= "<br />You must enter a Phone Number or Email";
	}

	if ($city == '-')
	{
		$errmsg .= "<br />You must enter a City";
	}
	

	return $errmsg;
}



?>