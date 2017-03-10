<?php require('head.php');?>

<center><b><u>Edit News Article</u></b><p>

<form method='POST' action='editnews.php'>
<?php
$result = mysql_query("SELECT id, poster, ip, date, title, article FROM rp_news ORDER BY id DESC");
echo '<div align="center"><table width="90%" border="0" align="center"><tr><td align="center"><b>#</b></td><td><b>Title</b></td><td><b>Poster</b></td><td><b>Date</b></td></tr>';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<tr><td width="" align="center"><input type="checkbox" class="normal" name="msgid[]" value="' . $row['id'] . '"></td><td width="" align="left">' . $row['title'] . '</td><td width="">' . $row['poster'] . '</td><td width="" align="left">' . $row['date'] . '</td></tr>';
    }
    echo '</table></div>';
?>

<p><input type="submit" name="edit" value="Edit"></form>

<?php
if ($_POST['edit']) {
$msgid_array = $_POST['msgid'];
foreach($msgid_array as $viewid)
$result = mysql_query("SELECT id, poster, ip, date, title, article FROM rp_news WHERE id = '$viewid'") or die(mysql_error());
while($row = mysql_fetch_assoc($result)) {
echo '<p><hr width="50%"><p><form method="post" action="editnews.php">
Title:<br>
<input type="text" name="etitle" size="35" value="'.$row["title"].'"><p>
Article:<br>
<textarea rows="10" cols="60" name="earticle">'.$row["article"].'</textarea><p>
<input type="submit" name="edit2" value="Edit Article">
<input type="hidden" name="id" value="'.$row[id].'">
</form>';
}
}
?>

<?php 
if ($_POST['edit2']) {
$edid = $_POST['id'];
$result = mysql_query("UPDATE rp_news SET title = '$_POST[etitle]', article = '$_POST[earticle]' WHERE id = '$edid'") or die(mysql_error());
print "<p><center><h1>Article Edited!</h1></center>";
}
?>


<?php require('bottom.php');?>