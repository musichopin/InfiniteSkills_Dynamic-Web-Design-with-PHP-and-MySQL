<?php

$myData = $_POST['data'];  //This recieves the data passed from the HTML form

list($userid, $password) = explode('|', $myData);

include "1008_common_functions.php";

//***************************************
//Add Guestbook Information to File
//***************************************

$statement  = "INSERT INTO validusers ";
$statement .= "(userid, password) ";
$statement .= "VALUES (";
$statement .= "'".$userid."', '".$password."')";

$rtn = iduResults($statement);

print "Insert Result Code: $rtn";

?>