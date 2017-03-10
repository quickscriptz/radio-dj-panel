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
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> <b>File Permissions</b></td>
</tr>
<tr>
<td valign="middle" width="15"><img src="../images/false2.gif"></td>
<td valign="middle" width="125"> Database Connect</td>
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

<b><u>Checking File Permissions</b></u><p>
Please check that all the files/folders listed below have the proper permissions.<br/>All files in red are not properly CHMOD'ed.<p></center>

<table width="100%"  border="0" cellspacing="0" cellpadding="3" style="text-align:center;">
         <tr>
        <td style="border:0px;"><b>File Name</b></td>
        <td style="border:0px;"><b>Required Chmod</b></td>
        <td style="border:0px;"><b>Current Chmod</b></td>
    </tr>
<?php
check_perms("../amessage.php","0777");
check_perms("../connect.php","0777");
check_perms("../djmessage_edit.php","0777");
check_perms("../rules_edit.php","0777");
check_perms("../uploads/","0777");
?>
<?php
function check_perms($path,$perm)
{
    clearstatcache();
    $configmod = substr(sprintf('%o', fileperms($path)), -4); 
    $trcss = (($configmod != $perm) ? "background-color:#fd7a7a;" : "background-color:#2080BD;");
    echo "<tr style=".$trcss.">"; 
    echo "<td style=\"border:0px;\">". $path ."</td>"; 
    echo "<td style=\"border:0px;\">$perm</td>"; 
    echo "<td style=\"border:0px;\">$configmod</td>"; 
    echo "</tr>";  
} 
?>
</table><p>

<center><h1>-If You Don't Know How To CHMOD-<br><a href="http://php.about.com/od/phpbasics/ht/chmod.htm" target="_blank">Learn How</a></center>

<p><br><p><center>
<form method="link" action="install2.php"><input type="submit" id="submit" value="Refresh List"></form>
<form method="link" action="install3.php"><input type="submit" id="submit" value="All The Files Permissions Are Set"></form>
</center>

</center>
</div>
</div></div>
<a href=http://www.quickscriptz.ca target=blank><div id=footer></div></div>
</body>
</html>