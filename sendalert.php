<?php require('head.php');?>
<center>

<b><u>Alert User By IP</b></u><p>

<?php
if ($_POST['alert']){
if($_POST['toip'] == ""|$_POST['message'] == ""){
echo "<h1>You forgot something...</h1>";
}else{
if($_POST['toip'] == "ALL"){
$message = $_POST['message'];
$toip = $_POST['toip'];
$fromdj = $_SESSION['rp_djname'];
$expire = date("G.i.s") + ("0.01");
$query = "INSERT INTO rp_alerts (toip, message, fromdj, expire) VALUES('$toip','$message','$fromdj','$expire')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Alert Sent!</h1>";
}else{
$message = $_POST['message'];
$toip = $_POST['toip'];
$fromdj = $_SESSION['rp_djname'];
$expire = date("G.i.s") + ("9.99");
$query = "INSERT INTO rp_alerts (toip, message, fromdj, expire) VALUES('$toip','$message','$fromdj','$expire')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Alert Sent!</h1>";
}
}
}
?>

<?php
if($_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'|$_SESSION['rp_rank'] == 'Head DJ'|$_SESSION['rp_rank'] == 'Administrator'){
echo '
<form method="POST" action="sendalert.php"><p>
<b>Message:</b><br>
<input type="text" size="45" maxlength="400" name="message"><p>
<b>Ip Address:</b><br />
<input type="text" size="20" maxlength="400" name="toip"><p>
<input type="submit" name="alert" value="Send">
</form><p><br><p><hr width="50%">
<h1>-How To Send An Alert To All Listeners-</h1>Type in "ALL" in the IP Address box, this will show the message to every visitor for the next 1 minute. After 1 minute is up the next visitor will automatically delete the alert.<p><hr width="50%"><h1>-Current Active Alerts-</h1>';
echo '<div align="center"><table width="450" border="0">
<tr>
<td width="150px" align="center"><b>Sent By</b></td>
<td width="150px" align="center"><b>Message</b></td>
<td width="150px" align="center"><b>Expire</b></td>
</tr>';
$result = mysql_query("SELECT id, toip, message, fromdj, expire FROM rp_alerts ORDER BY expire DESC");
while($row = mysql_fetch_assoc($result)){
echo '<tr><td width="150px" align="center">'.$row['fromdj'].'</td>
<td width="150px" align="center">'.$row['message'].'</td>
<td width="150px" align="center">'.$row['expire'].'</td>
</tr>';
}
}
echo '</table></div>';
echo "<p><form method='POST' action='sendalert.php'><input type='submit' name='empty' value='Clear Alerts'></form></center><p>";
if ($_POST['empty']) {
$result = mysql_query("TRUNCATE rp_alerts");
echo "<center><h1>Alerts Cleared!<br><a href='sendalert.php'>Refresh</a><h1></center>";
}
?>

<?php
$result = mysql_query("SELECT id, toip, message, fromdj, expire FROM rp_alerts") or die(mysql_error());
while($row = @mysql_fetch_array($result)){
if($row['expire'] <= date("G.i")){
$result = mysql_query("DELETE FROM rp_alerts WHERE id = '$row[id]'") or die(mysql_error());
}
}
?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'){
echo 'Sorry, trialists are not allowed to send ip alerts.';
}
?>


</center>
<?php require('bottom.php');?>