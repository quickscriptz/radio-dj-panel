<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - Installation</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<link rel="StyleSheet" href="../style.css" type="text/css">
<script type="text/javascript" src="checkbox.js"></script> 
<script type="text/javascript" src="functions.js"></script> 
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
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> <b>Database Connect</b></td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> Create Tables</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> Configure Panel</td>
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

<b><u>Connect To Database</b></u><p>
Please check that all the variables in the below fields are set according to the database that you want to install this script on.<p><br/>

<?php
if($_POST['save']){
	$host = $_POST['host'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	if($host && $username && $password && $name){
		$con = @mysql_connect($host,$username,$password); 
		$db = @mysql_select_db($name, $con);
		if($con && $db){
$file="<?php
"."$"."con"." = mysql_connect('$host', '$username', '$password');
"."$"."dbs"." = mysql_select_db('$name', "."$"."con".");
?>";
			// Write connection info
			$fp = fopen('../connect.php', 'w');
			$fp1 = fwrite($fp, $file);
			$fp2 = fclose($fp);
			if($fp && $fp1 && $fp2){
				echo "<h1>Connection Details Saved!</h1><p><br><p><form method='link' action='install4.php'><input type='submit' value='Continue!'></form>";
			}else{
				echo '<h1>An error occurred while attempting to write to configuration file.</h1>
				You will now need to manually write your database connection file.<br/>
				Please start by opening the "connect.php" file in your main "radiodjpanel" directory.<br/>
				Once open, paste the following code into the file, then save it.<br/><br/><br/>
				<textarea rows="4" cols="80"><?php
$con = mysql_connect(\''.$host.'\', \''.$username.'\', \''.$password.'\');
$dbs = mysql_select_db(\''.$name.'\', $con);
?></textarea><br/><br/><br/><br/>
				When finished, you may proceed.<br/><br/>
				<form method="link" action="install4.php"><input type="submit" value="Continue"></form>';
			}
		}else{
			echo '<h1>Unable to connect to database with information provided!</h1>';
			echo '<h1>Verify you have all the correct details and try again!</h1>';
			echo 'MySQL Server returned the following error:<br/>'.mysql_error().'<br/><br/><br/>';
			$show = 1;
		}
	}else{
		echo '<h1>Please fill in ALL fields!</h1><br/>';
		$show = 1;
	}
}else{
	$show = 1;
}
if($show == 1){
	echo '<form method="POST">
	MySQL Server Host:<br/>
	<input type="text" name="host" value="'.$host.'"><br/><br/>
	MySQL Database Username:<br/>
	<input type="text" name="username" value="'.$username.'"><br/><br/>
	MySQL Database Password:<br/>
	<input type="text" name="password" value="'.$password.'"><br/><br/>
	MySQL Database Name:<br/>
	<input type="text" name="name" value="'.$name.'"><br/><br/>
	<input type="submit" name="save" value="Save Details" />
	</form>';
}
?>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca target=blank><div id=footer></div></div>
</body>
</html>