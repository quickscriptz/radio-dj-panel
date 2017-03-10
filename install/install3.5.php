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

<b><u>Test MySQL Database Connection</b></u><p>
If you receive an error please go back and check your connection details.<p><br><p>

<?php 
require('../connect.php');
$dbt = mysql_pconnect($dbhost,$dbuser,$dbpass); 
if (!$dbt) 
{ 
die("<h1>-Could not connect to database. Please check the connection details.-</h1><p><br><p><form method='link' action='install3.php'><input type='submit' value='Go Back To Check Connection'></form>");
}
echo "<h1>-Connection OK-</h1><p><br><p><form method='link' action='install4.php'><input type='submit' value='Ready To Create The Tables'></form>";
mysql_close($dbt);
?>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca.kz target=blank><div id=footer></div></div>
</body>
</html>