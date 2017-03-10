<?php require('head.php');?>
<center>

<b><u>Banned Songs</b></u><p>


<table width="500px" border="0px">
<tr>
<td width="150px"><b>Title</b></td>
<td width="150px"><b>Artist</b></td>
<td width="200px"><b>Reason</b></td>
</tr>
<?php
$result = mysql_query("SELECT id, title, artist, reason FROM rp_songs ORDER BY title ASC");
while($row = mysql_fetch_assoc($result))
{
echo '<tr>
<td width="150px">'.$row['title'].'</td>
<td width="150px">'.$row['artist'].'</td>
<td width="200px">'.$row['reason'].'</td>
</tr>';
}
?>
</table>

<p><br />
<b><h1>-Your Account Could Be Suspended If You Play These Songs-</h1></b>
<hr>
<a href="bannedsubmit.php">Suggest A Banned Song</a><br>
<?php
if($_SESSION['rp_rank'] == 'Administrator'){ 
echo '<a href="admin/unbansong.php">Unban A Song</a>';
}
?>

</center>
<?php require('bottom.php');?>