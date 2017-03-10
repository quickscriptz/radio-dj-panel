<?php require('head.php');?>

<center><b><u>Contact Admin Form</b></u><p>

<?php require('connect.php');
$username = $_SESSION['rp_username'];
$email = $_SESSION['rp_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$ipaddr = $_SERVER['REMOTE_ADDR'];
if($_POST['contact']) {
if($message == ""){
echo "<p><h1>Please enter a message.</h1>";
}else{
$query = "INSERT INTO rp_contact (username, email, subject, message, ipaddr) VALUES('$username','$email','$subject','$message','$ipaddr')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Your Submission Has Been Sent!<br>-Your Response Will Be Sent Via Email Or PM-</h1><p>";
}
}
?>

<form method='POST' action='contact.php'>
<b>Subject:</b><br>
<select name='subject'>
<option selected>General Question</option>
<option>Missed Timeslot</option>
<option>Unable To DJ</option>
<option>Report Abuse</option>
<option>Other</option>
</select><p>
<b>Message:</b><br>
<textarea cols='30' rows='8' name='message'></textarea><p>
<input type='submit' name='contact' value='Send'>
</form>

<?php require('bottom.php');?>