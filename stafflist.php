<?php require('head.php');?>
<center>

<b><u>Staff/DJ List</b></u><p>

Click the staff member's username to view their profile.<br>
(<img src="images/online.gif"> = Online)<p>

<table width="450" border="0">
<tr>
<td width="5px"></td>
<td width="150px"><b>Username</b></td>
<td width="150px"><b>DJ Name</b></td>
<td width="145px"><b>Rank</b></td>
</tr>

<?php
$result = mysql_query("SELECT username, djname, rank, online FROM rp_users ORDER BY username ASC");
while($row = mysql_fetch_assoc($result)){
echo '<tr><td width="5px">';
if($row['online'] == "YES"){
echo '<img src="images/online.gif">';
}
echo '</td><td width="150px"><a href="viewprofile.php?dj=' . $row['username'] . '">'.$row['username'].'</a></td>
<td width="150px">'.$row['djname'].'</td>
<td width="145px">'.$row['rank'].'</td>
</tr>';
}
?>
</table>

</center>
<?php require('bottom.php');?>