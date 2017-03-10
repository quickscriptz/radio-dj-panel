<?php require('head.php');?>

<?php
echo "<center><b><u>Requests</b></u><br>
<form method='POST' action='checkrequests.php'><br/><input type='submit' name='delete' value='Delete Selected'><br/><input type='submit' name='empty' value='Clear All'></center><p>";
if($_POST['empty']){
	$result = mysql_query("TRUNCATE rp_request");
	echo "<center><h1>Requests Cleared!<h1></center>";
}elseif($_POST['delete']){
	foreach($_POST['id'] as $id){
		mysql_query("DELETE FROM rp_request WHERE id = '$id'");
	}
	echo "<center><h1>Requests Deleted!</h1></center>";
}
?>

<?php
$result = mysql_query("SELECT id, name, type, request, ipaddr FROM rp_request ORDER BY id");
echo "<div style='margin-left:15px;'>";
while($row = mysql_fetch_assoc($result)){
echo "<table>";
echo "<tr><td width='10px'><input type='checkbox' name='id[]' value='".$row['id']."'></td><td><b>Name:</b> ".$row['name']."</td></tr>";
echo "<tr><td></td><td><b>IP:</b> ".$row['ipaddr']."</td></tr>";
echo "<tr><td></td><td><b>Type:</b> ".$row['type']."</td></tr>";
echo "<tr><td></td><td><b>Request:</b> ".stripslashes(html_entity_decode($row['request']))."</td></tr>";
echo "</table><br/><br/>";
}
echo '</div>';
?>

</form>

</center>
<?php require('bottom.php');?>