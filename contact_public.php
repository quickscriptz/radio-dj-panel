<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - Contact Admin</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<link rel="StyleSheet" href="style.css" type="text/css">
<script type="text/javascript" src="checkbox.js"></script> 
<?php require('connect.php');?>
<?php require('functions.php');?>
</head>
<body>

<div id="center">
<div id="header">&nbsp;</div>

<div id="content">
<div id="menu"><div id="menucontents">
<?php require('login_menu.php');?>
</div>
<div id="main">
<center>

<?php
if (!isset($_POST['contact'])) {
if($_SESSION['rp_rank'] == "Suspended"){
	echo "<h1>-Your Account Has Been Suspended-</h1><p>";
	echo "Please use the form below if you need to get in touch with the radio management.<br/><br/>";
}
echo "<form method='POST' action='contact_public.php'>
Name:<br>
<input type='text' size='25' name='fname'><p>
Email:<br>
<input type='text' size='40' name='email'><p>
<b>Subject:</b><br>
<select name='subject'>";
if($_SESSION['rp_rank'] == "Suspended"){
	echo "<option>Dispute Suspension</option>";
}else{
	echo "<option selected>General Question</option>
<option>Password Recovery</option>
<option>Report Abuse</option>
<option>Other</option>";
}
echo "</select><p>
<b>Message:</b><br>
<textarea cols='30' rows='8' name='message'></textarea><p>
<input type='submit' name='contact' value='Send'>
</form>";
} else {
$busername = mysql_real_escape_string($_POST['fname']);
$bemail = mysql_real_escape_string($_POST['email']);
$bsubject = mysql_real_escape_string($_POST['subject']);
$bmessage = mysql_real_escape_string($_POST['message']);
$username = htmlentities($busername);
$email = htmlentities($bemail);
$subject = htmlentities($bsubject);
$message = htmlentities($bmessage);
$ipaddr = $_SERVER['REMOTE_ADDR'];
if($_POST['contact']) {
if($_POST['fname'] == ""|$_POST['email'] == ""|$_POST['message'] == "") {
echo "<h1>All fields are required.<br><a href='javascript:history.back()'>Go Back</a></h1>";
} else {
$query = "INSERT INTO rp_contact (username, email, subject, message, ipaddr) VALUES('$username','$email','$subject','$message','$ipaddr')";
mysql_query($query) or die(mysql_error());
echo "<p><h1>Your submission has been sent!</h1><p>";
}
}
}
?>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca target=blank><div id=footer></div></div>
</body>
</html>