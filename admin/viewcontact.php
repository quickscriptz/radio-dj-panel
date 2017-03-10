<?php require('head.php');?>

<center><b><u>Contact Submissions</u></b><p>

<form method='POST' action='viewcontact.php'>
<?php
$result = mysql_query("SELECT id, username, email, subject, message, ipaddr FROM rp_contact ORDER BY id ASC");
echo '<div align="center"><table width="90%" border="0" align="center"><tr><td align="center"><b>#</b></td><td><b>Subject</b></td><td><b>From</b></td><td><b>IP Address</b></td></tr>';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<tr><td width="" align="center"><input type="checkbox" class="normal" name="msgid[]" value="' . $row['id'] . '"></td><td width="" align="left">' . $row['subject'] . '</td><td width="">' . $row['username'] . '</td><td width="" align="left">' . $row['ipaddr'] . '</td></tr>';
    }
    echo '</table></div>';
?>

<?php 
if ($_POST['delete']) {
$msgid_array = $_POST['msgid'];
if($msgid_array == ""){
echo "<h1>Please select a submission to delete.</h1>";
}else{
foreach($msgid_array as $delid) {
$result = mysql_query("DELETE FROM rp_contact WHERE id = '$delid'") or die(mysql_error());
}
print "<p><center><h1>Selected Submission(s) Deleted!<br><a href='viewcontact.php'>Refresh</a></h1></center>";
}
}
?>

<p><input type="submit" name="view" value="View"><input type="submit" name="delete" value="Delete">
</form>


<?php
if ($_POST['view']) {
$msgid_array = $_POST['msgid'];
if($msgid_array == ""){
echo "<h1>Please select a submission to view.</h1>";
}else{
foreach($msgid_array as $viewid)
$result = mysql_query("SELECT id, username, email, subject, message, ipaddr FROM rp_contact WHERE id = '$viewid'") or die(mysql_error());
echo '<p><hr><p><table width="300px" align="center">';
while($row = mysql_fetch_assoc($result)) {
echo '<tr>
<td align="left" width="50px"><b>From:</b></td>
<td align="left" width="250px">' . $row['username'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>IP:</b></td>
<td align="left" width="250px">' . $row['ipaddr'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Email:</b></td>
<td align="left" width="250px">' . $row['email'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Subject:</b></td>
<td align="left" width="250px">' . $row['subject'] . '</td>
</tr>
<tr>
<td align="left" width="50px" valign="top"><b>Message:</b></td>
<td align="left" width="250px">' . $row['message'] . '</td>
</tr>';
echo '</table><p>
<form method="post" action="viewcontact.php">
<input type="hidden" name="id" value="' . $row['id'] . '">
<input type="submit" name="delete2" value="Delete">
</form>';
}
}
}
?>

<?php 
if ($_POST['delete2']) {
$delid = $_POST['id'];
$result = mysql_query("DELETE FROM rp_contact WHERE id = '$delid'") or die(mysql_error());
print "<p><center><h1>Submission Deleted!<br><a href='viewcontact.php'>Refresh</a></h1></center>";
}
?>

</center>
<?php require('bottom.php');?>