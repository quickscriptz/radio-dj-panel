<?php require('head.php');?>

<center>

<b><u>Staff Chat</u></b><br>

<?php
if($_SESSION['rp_rank'] == 'Administrator'){ 
echo "<form method='POST' action='staffchat.php'><input type='submit' name='empty' value='Clear Chat'></form>";
if ($_POST['empty']) {
$result = mysql_query("TRUNCATE rp_chat");
}
}
?>

<p><iframe height="200px" content="5" width="400px" src="chat.php"><h1>Your Browser Does Not Support iFrames</h1></iframe><p>
<?php require('connect.php');
$djname = $_SESSION['rp_djname'];
$message = $_POST['message'];
$date = $_POST['date'];
if($_POST['chat']) {
if($_POST['message'] == ""){
echo "<p><h1>Please enter a message.</h1>";
}else{
$query = "INSERT INTO rp_chat (djname, message, date) VALUES('$djname','$message','$date')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Message Submitted!<h1>";
}
}
?>

<form method="POST" action="staffchat.php">
<b>Message:</b><br>
<textarea rows="7" cols="40" name="message"></textarea>
<input type="hidden" name="djname" value="<?php $_SESSION['rp_djname'];?>">
<input type="hidden" name="date" value="<?php print date("F j, Y, g:i a");?>"><br>
<input type="submit" name="chat" value="Say">
</form>

</center>
<?php require('bottom.php');?>