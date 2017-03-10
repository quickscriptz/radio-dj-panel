<?php require('head.php');?>

<center>

<u><b>My Notes</b></u><p>

Store reminders and important events here. Do <b>not</b> store passwords.<p>

<?php
if($_POST['save']){
$encodenow = $_POST[notes];
$savenotes = base64_encode($encodenow);
$result = mysql_query("UPDATE rp_users SET notes = '$savenotes' WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
echo "<center><h1>Notes Saved!</h1>";
}
?>

<?php
$query = mysql_query("SELECT notes FROM rp_users WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
$row = mysql_fetch_array($query);
$decodenow = $row[notes];
$vnotes = base64_decode($decodenow);
echo "<form method='post' action='notes.php'><textarea rows='8' cols='50' maxlength='500' name='notes'>$vnotes</textarea><p><input type='submit' name='save' value='Save'></form>";
?>

</center>

<?php require('bottom.php');?>