<?php require('head.php');?>

<center>


<b><u>New Private Message</b></u><p>

<?php require('connect.php');
$fromdj = $_SESSION['rp_username'];
$todj = $_POST['todj'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$message = $_POST['message'];
if($_POST['send']) {
if($subject == ""|$message == ""){
echo "<p><h1>You forgot something...</h1>";
}else{
$query = "INSERT INTO rp_pm (fromdj, todj, date, subject, message) VALUES('$fromdj','$todj','$date','$subject','$message')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Your PM Has Been Sent!</h1><p>";
}
}
?>

<?php
echo "<form method='POST' action='newmessage.php'>
<input type='hidden' value='$_SESSION[rp_username]' name='fromdj'>
<input type='hidden' value='";
?>

<?php print date("F j, Y, g:i a"); ?>

<?php echo "' name='date'>";
$result = mysql_query('SELECT username, djname FROM rp_users ORDER BY djname ASC');
echo '<b>To:</b><br><select name="todj">';
while($row = mysql_fetch_assoc($result))
{
echo '<option value="' . $row['username'] . '">DJ ' . $row['djname'] . '</option>';
}
echo '</select><p>';
echo "<b>Subject:</b><br>
<input name='subject' type='text'>
<p>
<b>Message:</b><br>
<textarea cols='30' rows='8' name='message' maxlength='1000'></textarea><p>
<input type='submit' name='send' value='Send'>
</form>";
?>


</center>

<?php require('bottom.php');?>