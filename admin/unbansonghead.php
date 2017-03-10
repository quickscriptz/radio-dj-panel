<?php require('head2.php');?>

<center>


<b><u>Unban A Song</u></u><p>
<form method='POST' action='unbansonghead.php'>
<?php
    $result = mysql_query("SELECT id, title, artist, reason FROM rp_songs ORDER BY title ASC");
    echo '<center><table width="475px" border="0" align="center"><tr><td align="center"><b>#</b></td><td><b>Title</b></td><td><b>Artist</b></td><td><b>Reason</b></td></tr>';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<tr><td width="25px" align="center"><input type="checkbox" name="songid[]" value="' . $row['id'] . '"></td><td width="150px" align="left">' . $row['title'] . '</td><td width="125px">' . $row['artist'] . '</td><td width="175px" align="left">' . $row['reason'] . '</td></tr>';
    }
    echo '</table></center>';
?>

<?php 
if ($_POST['delete']) {
$song_array = $_POST['songid'];
if($song_array == ""){
echo "<h1>Please select a song to unban.</h1>";
}else{
foreach($song_array as $delid) {
$result = mysql_query("DELETE FROM rp_songs WHERE id = '$delid'") or die(mysql_error());
}
print "<center><h1>Selected Song(s) Unbanned!<br><a href='unbansong.php'>Refresh</a></h1></center>";
}
}
?>

<p><input type="submit" name="delete" value="Unban">
</form>

</center>

<?php require('bottom2.php');?>