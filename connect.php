<?php

//set local variables
$dbhost = "localhost"; //Database Host
$dbuser = "db_user"; //Database User
$dbpass = "db_pass"; //Database Password
$dbname = "db_name"; //Database Name

//connect 
$db = mysql_pconnect($dbhost,$dbuser,$dbpass); 
mysql_select_db("$dbname",$db); 

?>