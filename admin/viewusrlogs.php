<?php require('head.php');?>

<?php
echo "<center><b><u>Site Login Logs</b></u><br>
<form method='POST' action='viewusrlogs.php'><input type='submit' name='empty' value='Clear Logs'></form></center><p>";
if ($_POST['empty']) {
$result = mysql_query("TRUNCATE rp_usrlogs");
echo "<center><h1>Login Logs Cleared!<h1></center>";
}
?>

<div align="center">
<table border="0" width="90%">
<tr>
<td><b><u>Username</u></b></td>
<td><b><u>Date</u></b></td>
<td><b><u>IP Address</u></b></td>
<td><b><u>Result</u></b></td>
</tr>
<?php
$result = mysql_query("SELECT id, date, username, ipaddr, result FROM rp_usrlogs ORDER BY id DESC");
while($row = mysql_fetch_assoc($result)) {
echo"<tr>
<td>".$row['username']."</td>
<td>".$row['date']."</td>
<td>".$row['ipaddr']."</td>";
if ($row['result'] == "Failed"){
echo "<td><font color='#000000'>".$row[result]."</font></td></tr>";
} else {
echo "<td>".$row[result]."</td></tr>";
}
}
?>
</table></div>

</center>
<?php require('bottom.php');?>