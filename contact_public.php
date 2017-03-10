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
echo "<h1>-Use the form below to contact the admin regarding your suspension-</h1><p>";
}
echo "<form method='POST' action='contact_public.php'>
Name:<br>
<input type='text' size='25' name='fname'><p>
Email:<br>
<input type='text' size='40' name='email'><p>
<b>Subject:</b><br>
<select name='subject'>
<option selected>General Question</option>
<option>Dispute Suspension</option>
<option>Password Recovery</option>
<option>Report Abuse</option>
<option>Other</option>
</select><p>
<b>Message:</b><br>
<textarea cols='30' rows='8' name='message'></textarea><p>
<input type='submit' name='contact' value='Send'>
</form>";
} else {
$username = mysql_real_escape_string($_POST['fname']);
$email = mysql_real_escape_string($_POST['email']);
$subject = mysql_real_escape_string($_POST['subject']);
$message = mysql_real_escape_string($_POST['message']);
$ipaddr = $_SERVER['REMOTE_ADDR'];
if($_POST['contact']) {
if($_POST['fname'] != 'NULL'|$_POST['email'] != 'NULL'|$_POST['subject'] != 'NULL'|$_POST['message'] != 'NULL') {
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
<a href=http://www.quickscriptz.ca.kz target=blank><div id=footer></div></div>
</body>
</html>