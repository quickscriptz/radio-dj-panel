<?php require('head.php');?>

<center>


<b><u>Your Inbox</u></u><p>
<form method='POST' action='inbox.php'>
<?php
    $result = mysql_query("SELECT id, todj, fromdj, subject, date FROM rp_pm WHERE todj = '$_SESSION[rp_username]' ORDER BY date DESC");
    echo '<center><table width="475px" border="0" align="center"><tr><td align="center"><b>#</b></td><td><b>Subject</b></td><td><b>From</b></td><td><b>Sent</b></td></tr>';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<tr><td width="25px" align="center"><input type="checkbox" class="normal" name="msgid[]" value="' . $row['id'] . '"></td><td width="150px" align="left">' . $row['subject'] . '</td><td width="125px">' . $row['fromdj'] . '</td><td width="175px" align="left">' . $row['date'] . '</td></tr>';
    }
    echo '</table></center>';
?>

<?php 
if ($_POST['delete']) {
$msgid_array = $_POST['msgid'];
if($msgid_array == ""){
echo "<h1>Please select a message to delete.</h1>";
}else{
foreach($msgid_array as $delid) {
$result = mysql_query("DELETE FROM rp_pm WHERE id = '$delid'") or die(mysql_error());
}
print "<p><center><h1>Selected Message(s) Deleted!<br><a href='inbox.php'>Refresh</a></h1></center>";
}
}
?>

<p><input type="submit" name="view" value="View"><input type="submit" name="delete" value="Delete">
</form>

<?php
if ($_POST['view']) {
$msgid_array = $_POST['msgid'];
if($msgid_array == ""){
echo "<h1>Please select a message to view.</h1>";
}else{
foreach($msgid_array as $viewid)
$result = mysql_query("SELECT id, todj, fromdj, date, subject, message FROM rp_pm WHERE id = '$viewid'") or die(mysql_error());
echo '<p><hr><p><table width="300px" align="center">';
while($row = mysql_fetch_assoc($result)) {
echo '<tr>
<td align="left" width="50px"><b>From:</b></td>
<td align="left" width="250px">' . $row['fromdj'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Subject:</b></td>
<td align="left" width="250px">' . $row['subject'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Sent:</b></td>
<td align="left" width="250px">' . $row['date'] . '</td>
</tr>
<tr>
<td align="left" width="50px" valign="top"><b>Message:</b></td>
<td align="left" width="250px">' . $row['message'] . '</td>
</tr>';
echo '</table><p>
<form method="post" action="inbox.php">
<input type="hidden" name="id" value="' . $row['id'] . '">
<input type="hidden" name="replyto" value="' . $row['fromdj'] . '">';
if(strstr($row['subject'], "RE:") != FALSE){
	echo '<input type="hidden" name="replysub" value="' . $row['subject'] . '">';
}else{
	echo '<input type="hidden" name="replysub" value="RE: ' . $row['subject'] . '">';	
}
echo 'Your reply:<br/>
<textarea rows="7" cols="45" name="replymsg"></textarea><br/><br/>
<input type="submit" name="reply" value="Reply"> 
<input type="submit" name="delete2" value="Delete">
</form>';
}
}
}
?>

<?php 
if ($_POST['delete2']) {
	$delid = $_POST['id'];
	$result = mysql_query("DELETE FROM rp_pm WHERE id = '$delid'") or die(mysql_error());
	print "<p><center><h1>Message Deleted<br><a href='inbox.php'>Refresh</a></h1></center>";
}elseif($_POST['reply']){
	$fromdj = $_SESSION['rp_username'];
	$todj = $_POST['replyto'];
	$subject = $_POST['replysub'];
	$date = date("F j, Y, g:i a");
	$message = $_POST['replymsg'];
	if($message == ""){
		echo "<p><hr><p><h1>Your reply was blank!</h1><a href='javascript:history.go(-1)'>Go Back</a>";
	}else{
		$query = "INSERT INTO rp_pm (fromdj, todj, date, subject, message) VALUES('$fromdj','$todj','$date','$subject','$message')";
		mysql_query($query) or die(mysql_error());
		echo "<p><hr><p><h1>Reply Sent!</h1><p>";
	}
}
?>


</center>

<?php require('bottom.php');?>