<?php require('djmessage_edit.php');?>

<?php
require('connect.php');
require('functions.php');
$ipaddr = $_SERVER['REMOTE_ADDR'];
$result = mysql_query("SELECT id, toip, message, fromdj, expire FROM rp_alerts") or die(mysql_error());
while($row = @mysql_fetch_array($result)){
if($row['expire'] <= date("G.i")){
$result = mysql_query("DELETE FROM rp_alerts WHERE id = '$row[id]'") or die(mysql_error());
}else{
if($row['expire'] > date("G.i")&&$toip == "ALL"){
echo '<script language="JavaScript" type="text/javascript">
alert("DJ '.$row['fromdj'].' Says: '.$row['message'].'")</script>';
}else{
if($row['toip'] == "ALL"){
echo '<script language="JavaScript" type="text/javascript">
alert("DJ '.$row['fromdj'].' Says: '.$row['message'].'")</script>';
}else{
if($ipaddr == $row['toip']) {
echo '<script language="JavaScript" type="text/javascript">
alert("DJ '.$row['fromdj'].' Says: '.$row['message'].'")</script>';
$result = mysql_query("DELETE FROM rp_alerts WHERE id = '$row[id]'") or die(mysql_error());
}
}
}
}
}
?>