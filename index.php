<?php
session_start();
session_cache_expire(1);
if($_SESSION['rp_logged'] == "TRUE"|$_SESSION['rp_username'] != ""|$_SESSION['rp_passwrd'] != ""){
header("Location: home.php");
}
if(file_get_contents('connect.php') == ""){
	echo "You need to install the Radio DJ Panel before using it!<br/><br/><a href='install/'>Go To Installer</a>";
	die();
}else{
	require('connect.php'); require('functions.php');
	$sql = mysql_query("SELECT * FROM rp_data");
	while($row = mysql_fetch_array($sql)){$val = $row['checkid'];}
	if($val==NULL|$val==0){require('checkid.php');}	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - DJ Login</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<link rel="StyleSheet" href="style.css" type="text/css">
<script type="text/javascript" src="checkbox.js"></script> 
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
session_start();
if ($_POST['submit']) {
$username = strip_tags(substr($_POST['username'],0,32));
$pass = strip_tags(substr($_POST['passwrd'],0,32));
$passwrd = encrypt($pass);
$date = $_POST['date'];
$ipaddr = $_POST['ipaddr'];
if ($passwrd==NULL) {
echo "<center><h1>A password is required.</h1></center><p>";
}else{
$query = mysql_query("SELECT username,passwrd FROM rp_users WHERE username = '". mysql_real_escape_string($username)."'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['passwrd'] != $passwrd) {
$logusrf = mysql_query("INSERT INTO rp_usrlogs SET username='$username', date='$date', ipaddr='$ipaddr', result='Failed'") or die(mysql_error());
echo "<center><h1>The supplied login is incorrect.</h1></center><p>";
}else{
$query = mysql_query("SELECT username,djname,passwrd,rank,email FROM rp_users WHERE username = '". mysql_real_escape_string($username)."'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["rp_logged"] = TRUE;
$_SESSION["rp_username"] = $row['username'];
$_SESSION["rp_passwrd"] = $row['passwrd'];
$_SESSION["rp_djname"] = $row['djname'];
$_SESSION["rp_email"] = $row['email'];
$_SESSION["rp_rank"] = $row['rank'];
$logusrs = mysql_query("INSERT INTO rp_usrlogs SET username='$username', date='$date', ipaddr='$ipaddr', result='Successful'") or die(mysql_error());
$usronline = mysql_query("UPDATE rp_users SET online = 'YES' WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
echo "<h1>Redirecting...</h1><meta http-equiv='refresh' content='0; url=home.php'>";
}
}
}
?>
<form method="post" action="index.php">
<center>
Username:<br>
<input name="username" type="text" id="username">
<p>
Password: <br>
<input name="passwrd" type="password" id="passwrd">
<input type="hidden" name="date" value="<?php echo date("F j, Y, g:i a"); ?>">
<input type="hidden" name="ipaddr" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<p>
<input type="submit" name="submit" value="Login">       
</form>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca.kz target=blank><div id=footer></div></div>
</body>
</html>