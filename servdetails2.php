<?php require('head.php');?>
<center>

<?php require('serverlogger.php');?>

<?php 
if($_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'|$_SESSION['rp_rank'] == 'Head DJ'|$_SESSION['rp_rank'] == 'Administrator'){
$result = mysql_query("SELECT sitename, serveraddr, serverport, serverpass FROM rp_data") or die(mysql_error());
while($row = mysql_fetch_assoc($result)) {
echo "<b><u>".$row['sitename']." Radio Server Details</b></u><p>";
echo "<table border='0' width='500px' style='border-collapse: collapse' bordercolor='#111111'>";
echo "<tr>";
echo "<td width='300'><b>Address</b></td>";
echo "<td width='150'><b>Password</b></td>";
echo "<td width='40'><b>Port</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='300'>".$row['serveraddr']."</td>";
echo "<td width='150'>".$row['serverpass']."</td>";
echo "<td width='40'>".$row['serverport']."</td>";
echo "</tr>";
echo "</table>";
}
echo "<p><hr width='500px'><p>
<b><h1>-Notice To All Staff-</h1></b><p>
All views of the radio server details are logged. You are not to view these details unless you are the current DJ. If you attempt to give-out these details we will have you permanently ban from our radio system and site.";
}
?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'){
echo '<b><u>View Server Details</b></u><p>
Sorry, trialists are not allowed to view the server details.<br>Contact admin for server info.';
}
?>



</center>
<?php require('bottom.php');?>