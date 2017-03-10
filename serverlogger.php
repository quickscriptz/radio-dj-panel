<?php require('connect.php');
$username = $_SESSION['rp_username'];
$date = date("F j, Y, g:i a");
$ipaddr = $_SERVER['REMOTE_ADDR'];
$query = "INSERT INTO rp_logs (username, date, ipaddr) VALUES('$username','$date','$ipaddr')";
mysql_query($query) or die(mysql_error());
?>