<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - Installation</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<link rel="StyleSheet" href="../style.css" type="text/css">
<script type="text/javascript" src="checkbox.js"></script> 
<script type="text/javascript" src="functions.js"></script>
<?php require('../connect.php');?>
</head>
<body>

<div id="center">
<div id="header">&nbsp;</div>

<div id="amessage">
<marquee>Welcome to the Radio DJ Panel v3!</marquee>
</div>
<div id="content">
<div id="menu"><div id="menucontents">
<div class='title'>Progress</div>
<table width="140px">
<tr>
<td valign="middle" width="15"><img src="../images/true2.gif"></td>
<td valign="middle" width="125"> License</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/true2.gif"></td>
<td valign="middle" width="125"> File Permissions</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/true2.gif"></td>
<td valign="middle" width="125"> Database Connect</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/true2.gif"></td>
<td valign="middle" width="125"> Create Tables</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> <b>Configure Panel</b></td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> Admin User</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> Finished</td>
</tr>
</table>
</div>
</div>
<div id="main">
<center>

<b><u>Configure Your Panel</b></u><p>
Now it is time to configure the panel to fit your site! So go ahead and input the appropriate details below.<p>

<?php
$cnt = mysql_query("SELECT * FROM rp_data");
$num = mysql_num_rows($cnt);
if (!$_POST['save'] && $num == 0) {
	echo '<form method="POST" action="install5.php">
	Site Name:<br>
	<input type="text" size="25" maxlenght="30" name="nsitename"><p>
	Admin Email:<br>
	<input type="text" size="45" maxlenght="30" name="nadminemail"><p>
	Radio Server Address:<br>
	<input type="text" size="45" maxlenght="50" name="nserveraddr"><p>
	Radio Server Port:<br>
	<input type="text" size="25" maxlenght="10" name="nserverport"><p>
	Radio Server Password:<br>
	<input type="text" size="25" maxlenght="30" name="nserverpass"><p>
	<h1>-Only Submit This Form Once Or You Will Get Errors-</h1><p>
	<input type="submit" name="save" value="Configure">
	</form>';
}elseif($_POST['save'] && $num == 0){
	$nsitename = $_POST[nsitename];
	$nadminemail = $_POST[nadminemail];
	$nserveraddr = $_POST[nserveraddr];
	$nserverport = $_POST[nserverport];
	$nserverpass = $_POST[nserverpass];
	$npanelversion = '3.1.0';
	$result = mysql_query("INSERT INTO rp_data SET sitename = '$nsitename', adminemail = '$nadminemail', serveraddr = '$nserveraddr', serverport = '$nserverport', serverpass = '$nserverpass', panel_version = '$npanelversion'") or die(mysql_error());
	echo '<center><h1>Configuration Saved!</h1></center><p><br><p>
	<form method="link" action="install6.php"><input type="submit" value="Finished Configuration"></form>';
}elseif($num != 0){
	echo "<h1>Panel Already Configured!</h1><p><br><p><form method='link' action='install6.php'><input type='submit' value='Continue!'></form>";
}
?>


</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca target=blank><div id=footer></div></div>
</body>
</html>




