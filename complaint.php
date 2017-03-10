<html>
<head>
<title>Radio DJ Panel v3 - Complaint Form</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style_public.css" />

<center><b><u>Submit A Complaint</b></u><p>

<?php require('connect.php');
require('functions.php');
if($_POST['submit']) {
$username = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$subject = mysql_real_escape_string($_POST['subject']);
$message = mysql_real_escape_string($_POST['message']);
$ipaddr = $_SERVER['REMOTE_ADDR'];
if ($username==NULL|$email==NULL|$message==NULL){
echo "<p><h1><b>All fields are required.</b></h1><p>";
}else{
$query = "INSERT INTO rp_contact (username, email, subject, message, ipaddr) VALUES('$username','$email','$subject','$message','$ipaddr')";
mysql_query($query) or die(mysql_error());
echo "<p><b>Your complaint has been sent.</b><p>";
}
}
?>

<form method='POST' action='complaint.php'>
<b>Name:</b><br>
<input type="text" name="name"><p>
<b>Email:</b><br>
<input type="text" name="email"><p>
<b>Type:</b><br>
<select name="subject">
<option selected>Report A DJ</option>
<option>Missed Timeslot</option>
<option>Inappropriate Content</option>
<option>Other</option>
</select><p>
<b>Message:</b><br>
<textarea cols='20' rows='7' name='message'></textarea><p>
<input type='submit' name='submit' value='Complain'>
</form>
</body>
</html>