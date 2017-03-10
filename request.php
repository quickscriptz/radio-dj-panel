<html>
<head>
<title>Radio DJ Panel v3 - Request Line</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style_public.css" />

<center><b><u>Request Line</b></u><p>

<?php require('connect.php');
require('functions.php');
if($_POST['submit']) {
$bname = mysql_real_escape_string($_POST['name']);
$btype = mysql_real_escape_string($_POST['type']);
$brequest = mysql_real_escape_string($_POST['request']);
$name = htmlentities($bname);
$type = htmlentities($btype);
$request = htmlentities($brequest);
$ipaddr = $_SERVER['REMOTE_ADDR'];
if ($bname==NULL|$brequest==NULL){
echo "<center><h1><b>All fields are required.</b></h1></center><p>";
}else{
$query = "INSERT INTO rp_request (name, type, request, ipaddr) VALUES('$name','$type','$request','$ipaddr')";
mysql_query($query) or die(mysql_error());
echo "<p><b>--Your Request Has Been Sent--</b><p>";
}
}
?>

<form method='POST' action='request.php'>
<b>Name:</b><br>
<input type="text" name="name"><p>
<b>Type:</b><br>
<select name="type">
<option selected>Song Request</option>
<option>Shoutout</option>
<option>Competition</option>
<option>Joke</option>
<option>Other</option>
</select><p>
<b>Request:</b><br>
<textarea cols='20' rows='7' name='request'></textarea><p>
<input type='submit' name='submit' value='Request'>
</form>
</body>
</html>