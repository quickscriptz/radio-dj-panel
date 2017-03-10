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
Please check that all the variables in the below textbox are set according to the database that you want to install this script on.<p>

<?php
$file = "../connect.php";
if (!isset($_POST['submit']))
{
  $fo = fopen($file, "r");
  $fr = fread($fo, filesize($file));
  if ( get_magic_quotes_gpc () ) $fr = stripslashes($fr);
  
  $fr = str_replace("&", "&amp;", $fr);
  $fr = str_replace("<", "&lt;", $fr);
  $fr = str_replace(">", "&gt;", $fr);
  
  echo "<form method='post' action='{$_SERVER['PHP_SELF']}'>
        <textarea name='newfile' rows='10' cols='60'>{$fr}</textarea>
        <p>
        <input type='submit' name='submit' value='Save' />
        </form>";
  fclose($fo);
}
else
{
  $fo = fopen($file, "w");
  $fw = fwrite($fo, (get_magic_quotes_gpc()?stripslashes($_POST['newfile']):$_POST['newfile']));
  fclose($fo);
echo "<center><h1>Connection Details Saved!</h1><p><br><p><form method='link' action='install3.5.php'><input type='submit' value='Lets Check The Connection'></form></center>";
}
?>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca.kz target=blank><div id=footer></div></div>
</body>
</html>