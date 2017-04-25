<?php
$link = mysql_connect('localhost:81','root','');
if (!$link) {
	die('Could not connect to MySQL: ' . mysql_error());
}
echo 'Connection OK'; mysql_close($link);
?>