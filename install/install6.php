<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - Installation</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<link rel="StyleSheet" href="../style.css" type="text/css">
<script type="text/javascript" src="checkbox.js"></script> 
<?php require('../connect.php'); require('../functions.php');?>
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
<td valign="middle" width="15"><img src="../images/true2.gif"></td>
<td valign="middle" width="125"> Configure Panel</td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> <b>Admin User</b></td>
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

<b><u>Create Panel Admin</b></u><p>
Fill in the form below to create your panel's first user, the root admin.<br/>
The root admin account will be protected from editing/deletion by other accounts.<p><br/>

<?php
$cnt = mysql_query("SELECT * FROM rp_users WHERE id = '1'");
$num = mysql_num_rows($cnt);
if (!$_POST['register'] && $num == 0){
echo '<form method="POST" action="install6.php">
Username:<br>
<input type="text" size="25" maxlength="30" name="username"><p>
DJ Name:<br>
<input type="text" size="25" maxlength="30" name="djname"><p>
Password:<br>
<input type="password" size="25" maxlength="20" name="passwrd"><p>
Confirm Password:<br>
<input type="password" size="25" maxlength="25" name="cpasswrd"><p>
Email:<br>
<input type="text" size="45" maxlength="50" name="email"><p>
<input type="hidden" name="rank" value="Administrator">
<input type="submit" name="register" value="Register">
</form>';
}elseif($_POST["register"] && $num == 0){
	$username = $_POST["username"];
	$djname = $_POST["djname"];
	$passwrd = encrypt($_POST["passwrd"]);
	$cpasswrd = encrypt($_POST["cpasswrd"]);
	$email = $_POST["email"];
	$rank = $_POST["rank"];
	//Was a field left blank?
	if($username==NULL|$djname==NULL|$passwrd==NULL|$cpasswrd==NULL|$email==NULL|$rank==NULL) {
		echo "<h1>A field(s) was left blank.<br><a href='javascript:history.back()'>Go Back</a></h1>";
	}else{
		//Do the passwords match?
		if($passwrd!=$cpasswrd) {
			echo "<h1>Passwords do not match.<br><a href='javascript:history.back()'>Go Back</a></h1>";
		}else{
			//Has the username or email been used?
			$checkuser = mysql_query("SELECT username FROM rp_users WHERE username='$username'");
			$username_exist = mysql_num_rows($checkuser);
			$checkemail = mysql_query("SELECT email FROM rp_users WHERE email='$email'");
			$email_exist = mysql_num_rows($checkemail);
			if ($email_exist>0|$username_exist>0) {
				echo "<h1>The username or email is already in use.<br><a href='javascript:history.back()'>Go Back</a></h1>";
			}else{
				//Everything seems good, lets insert.
				$query = "INSERT INTO rp_users (username, djname, passwrd, email,rank) VALUES('$username','$djname','$passwrd','$email','$rank')";
				mysql_query($query) or die(mysql_error());
				echo "<h1>DJ $username has been successfully registered as the Root Admin.</h1><p><br><p>
				<form method='link' action='install7.php'><input type='submit' value='Finish Install'></form>";
			}
		}
	}
}elseif($num != 0){
	echo "<h1>Root Admin Already Exists!</h1><p><br><p><form method='link' action='install7.php'><input type='submit' value='Continue!'></form>";
}
?>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca target=blank><div id=footer></div></div>
</body>
</html>