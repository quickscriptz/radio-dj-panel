<?php require('head.php');?>
<center>

<b><u>Suggest A Song To Be Ban</b></u><p>

<?php require('connect.php');
$title = $_POST['title'];
$artist = $_POST['artist'];
$reason = $_POST['reason'];
if($_POST['ban']) {
if($title == ""|$artist == ""|$reason == ""){
echo "<h1>You forgot something...</h1>";
}else{
$query = "INSERT INTO rp_songs (title, artist, reason) VALUES('$title','$artist','$reason')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Song [$title] Has Been Ban!</h1><p>";
}
}
?>

<?php
if($_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'|$_SESSION['rp_rank'] == 'Head DJ'|$_SESSION['rp_rank'] == 'Administrator'){
echo '<form action="bannedsubmit.php" method="POST">
<b>Song Name:</b><br>
<input type="text" name="title" size="30"><p>
<b>Song Artist:</b><br>
<input type="text" name="artist" size="30"><p>
<b>Reason:</b><br>
<input type="text" name="reason" size="45"><p>
<input type="submit" name="ban" value="Ban Song">
</form>';
}?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'){
echo '
Sorry, trialists are not allowed to suggest banned songs.';
}
?>

</center>
<?php require('bottom.php');?>