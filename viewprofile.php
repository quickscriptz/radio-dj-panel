<?php require('head.php');?>

<center>

<?php 
language_filter($row);
$djname = $_GET['dj'];
echo "<b><u>DJ $djname</b></u><p></center>";
$query = mysql_query("SELECT username,djname,rank,email,favsong,favband,favfood,petpeeves,sayings,aboutyou,avatar FROM rp_users WHERE username = '$djname'") or die(mysql_error());
$row = mysql_fetch_array($query);
$djname = $_GET['dj'];
echo '<div align="center"><table width="500px" border="0"
<tr>
<td width="300px" valign="top">
<font color="black"><b>Username:</font></b> ' . $row['username'] . '<br>
<font color="black"><b>DJ Name:</font></b> ' . $row['djname'] . '<br>
<font color="black"><b>Rank:</font></b> ' . $row['rank'] . '<p>

<font color="black"><b>Favourite Song:</font></b> ' . $row['favsong'] . '<br>
<font color="black"><b>Favourite Band:</font></b> ' . $row['favband'] . '<br>
<font color="black"><b>Favourite Food:</font></b> ' . $row['favfood'] . '<br>
<font color="black"><b>Pet Peeves:</font></b> ' . $row['petpeeves'] . '<br>
<font color="black"><b>Sayings:</font></b> ' . $row['sayings'] . '<br>
<font color="black"><b>About Me:</font></b> ' . $row['aboutyou'] . '
</td>
<td align="center" width="200px">';
if($row['avatar'] == "NULL"|$row['avatar'] == ""){
echo '<img src="images/no_avatar.gif" alt="No Avatar Set" width="20" height="30"></td></tr></table>';
}else{
$pic = getimagesize("$row[avatar]"); 
if($pic[1] < "200"|$pic[0] < "200"){
echo '<img src="'.$row['avatar'].'" class="profile"></td></tr></table>';
}else{
$pic = getimagesize("$row[avatar]"); 
if($pic[1] > "200"|$pic[0] > "200"){
echo '<img src="'.$row['avatar'].'" class="profile" alt="No Avatar Set" max-height="200" max-width="200"';
echo imageResize($pic[0],
$pic[1], 200);
echo '></td>
</tr>
</table>';
}
}
}
?>

<?php require('bottom.php');?>