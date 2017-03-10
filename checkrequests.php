<?php require('head.php');?>

<?php
echo "<center><b><u>Requests</b></u><br>
<form method='POST' action='checkrequests.php'><input type='submit' name='empty' value='Clear All'></form></center><p>";
if ($_POST['empty']) {
$result = mysql_query("TRUNCATE rp_request");
echo "<center><h1>Requests Cleared!<h1></center>";
}
?>

<?php
$result = mysql_query("SELECT id, name, type, request, ipaddr FROM rp_request");
while($row = mysql_fetch_assoc($result)){
echo "<b>Name:</b> ".$row['name']."<br>";
echo "<b>IP:</b> ".$row['ipaddr']."<br>";
echo "<b>Type:</b> ".$row['type']."<br>";
echo "<b>Request:</b> ".$row['request']."<p>";
}
?>

</center>
<?php require('bottom.php');?>