<?php require('head.php');?>
<center>

<b><u>Edit General Configuration</u></b><p>

<?php
$nsitename = $_POST[nsitename];
$nadminemail = $_POST[nadminemail];
$nserveraddr = $_POST[nserveraddr];
$nserverport = $_POST[nserverport];
$nserverpass = $_POST[nserverpass];
if ($_POST['submit']) {
if($nsitename == ""|$nadminemail == ""|$nserveraddr == ""|$nserverport == ""|$nserverpass == ""){
echo "<h1>You forgot something...</h1>";
}else{
$result = mysql_query("UPDATE rp_data SET sitename = '$nsitename', adminemail = '$nadminemail', serveraddr = '$nserveraddr', serverport = '$nserverport', serverpass = '$nserverpass'") or die(mysql_error());
echo "<center><h1>Configuration Saved!</h1></center><p>";
}
}
?>

<?php $result = mysql_query("SELECT sitename, adminemail, serveraddr, serverport, serverpass FROM rp_data") or die(mysql_error()); 
while($row = mysql_fetch_assoc($result)) {
echo "
<form method='POST' action='editconfig.php'>
Site Name:<br>
<input type='text' size='30' maxlenght='30' name='nsitename' value='".$row[sitename]."'><p>";
echo "Admin Email:<br>
<input type='text' size='40' maxlenght='30' name='nadminemail' value='".$row[adminemail]."'><p>";
echo "Radio Server Address:<br>
<input type='text' size='45' maxlenght='45' name='nserveraddr' value='".$row[serveraddr]."'><p>";
echo "Radio Server Port:<br>
<input type='text' size='15' maxlenght='10' name='nserverport' value='".$row[serverport]."'><p>";
echo "Radio Server Password:<br>
<input type='text' size='15' maxlenght='30' name='nserverpass' value='".$row[serverpass]."'><p>";
echo "<input type='submit' name='submit' value='Configure'>
</form>";
}?>

</center>
<?php require('bottom.php');?>