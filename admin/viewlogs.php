<?php require('head.php');?>

<?php
echo "<center><b><u>Server Details Viewing Log</b></u><br>
<form method='POST' action='viewlogs.php'><input type='submit' name='empty' value='Clear Logs'></form></center><p>";
if ($_POST['empty']) {
$result = mysql_query("TRUNCATE rp_logs");
echo "<center><h1>Server Logs Cleared!<h1></center>";
}
?>

<div align="center">
<table border="0" width="90%">
<tr>
<td><b><u>Username</u></b></td>
<td><b><u>Date</u></b></td>
<td><b><u>IP Address</u></b></td>
</tr>

<?php
$result = mysql_query("SELECT id, username, date, ipaddr FROM rp_logs ORDER BY id DESC");
while($row = mysql_fetch_assoc($result))
{
echo "<tr>
<td>".$row['username']."</td>
<td>".$row['date']."</td>
<td>".$row['ipaddr']."</td>";
}
?>

</table></div>
<?php require('bottom.php');?>