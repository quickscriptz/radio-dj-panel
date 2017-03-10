<?php require('head.php');?>

<center><b><u>Delete News Article</u></b><p>

<form method='POST' action='deletenews.php'>
<?php
$result = mysql_query("SELECT id, poster, ip, date, title, article FROM rp_news ORDER BY id DESC");
echo '<div align="center"><table width="90%" border="0" align="center"><tr><td align="center"><b>#</b></td><td><b>Title</b></td><td><b>Poster</b></td><td><b>Date</b></td></tr>';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<tr><td width="" align="center"><input type="checkbox" class="normal" name="msgid[]" value="' . $row['id'] . '"></td><td width="" align="left">' . $row['title'] . '</td><td width="">' . $row['poster'] . '</td><td width="" align="left">' . $row['date'] . '</td></tr>';
    }
    echo '</table></div>';
?>

<?php 
if ($_POST['delete']) {
$msgid_array = $_POST['msgid'];
foreach($msgid_array as $delid) {
$result = mysql_query("DELETE FROM rp_news WHERE id = '$delid'") or die(mysql_error());
}
print "<p><center><h1>Selected Article(s) Deleted!<br><a href='deletenews.php'>Refresh</a></h1></center>";
}
?>

<p><input type="submit" name="view" value="View"><input type="submit" name="delete" value="Delete">
</form>

<?php
if ($_POST['view']) {
$msgid_array = $_POST['msgid'];
foreach($msgid_array as $viewid)
$result = mysql_query("SELECT id, poster, ip, date, title, article FROM rp_news WHERE id = '$viewid'") or die(mysql_error());
echo '<p><hr><p><table width="300px" align="center">';
while($row = mysql_fetch_assoc($result)) {
echo '<tr>
<td align="left" width="50px"><b>Title:</b></td>
<td align="left" width="250px">' . $row['title'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Poster:</b></td>
<td align="left" width="250px">' . $row['poster'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>Date:</b></td>
<td align="left" width="250px">' . $row['date'] . '</td>
</tr>
<tr>
<td align="left" width="50px"><b>IP:</b></td>
<td align="left" width="250px">' . $row['ip'] . '</td>
</tr>
<tr>
<td align="left" width="50px" valign="top"><b>Article:</b></td>
<td align="left" width="250px">' . $row['article'] . '</td>
</tr>';
echo '</table><p>
<form method="post" action="deletenews.php">
<input type="hidden" name="id" value="' . $row['id'] . '">
<input type="submit" name="delete2" value="Delete">
</form>';
}
}
?>

<?php 
if ($_POST['delete2']) {
$delid = $_POST['id'];
$result = mysql_query("DELETE FROM rp_news WHERE id = '$delid'") or die(mysql_error());
print "<p><center><h1>Selected Article(s) Deleted!<br><a href='deletenews.php'>Refresh</a></h1></center>";
}
?>


<?php require('bottom.php');?>