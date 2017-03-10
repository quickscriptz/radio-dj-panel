<?php require('head.php');?>

<center>
<b><u>Change Your Password</b></u><p>

<?php
if($_POST['submit']){
$query = mysql_query("SELECT passwrd FROM rp_users WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
while($row = mysql_fetch_array($query)){
$passwrd = encrypt($_POST['passwrd']);
$npasswrd = encrypt($_POST['npasswrd']);
$cpasswrd = encrypt($_POST['cpasswrd']);
$oldpasswrd = $row['passwrd'];
if($passwrd == "NULL"|$npasswrd == "NULL"|$cpasswrd == "NULL"){
echo "<h1>You must fill in all fields.</h1>";
}else{
if($passwrd != $oldpasswrd){
echo "<h1>Your current password is incorrect.</h1>";
}else{
if($npasswrd == ""|$cpasswrd == ""){
echo "<h1>You left a field blank.</h1>";
}else{
if($npasswrd != $cpasswrd){
echo "<h1>Your new passwords don't match.</h1>";
}else{
if($npasswrd == $cpasswrd){
$result = mysql_query("UPDATE rp_users SET passwrd = '$npasswrd' WHERE username = '$_SESSION[rp_username]'");
$query = mysql_query("SELECT username,djname,passwrd,rank,email FROM rp_users WHERE username = '". mysql_real_escape_string($username)."'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["rp_logged"] = TRUE;
$_SESSION["rp_username"] = $row['username'];
$_SESSION["rp_passwrd"] = $row['passwrd'];
$_SESSION["rp_djname"] = $row['djname'];
$_SESSION["rp_email"] = $row['email'];
$_SESSION["rp_rank"] = $row['rank'];
echo "<center><h1>Your password has been successfully changed.<br></h1></center><p>";
}
}
}
}
}
}
}
?>

<form method="post" action="changepass.php">
Current Password:<br/>
<input type="password" name="passwrd"><p>
New Password:<br/>
<input type="password" name="npasswrd"><p>
Confirm Password:<br/>
<input type="password" name="cpasswrd"><p>
<input type="submit" name="submit" value="Change">

<?php require('bottom.php');?>