<?php require('head.php');?>

<center>


<b><u>Edit A DJ</u></b><p>


<?php
$eusername=$_POST['eusername'];
$query = mysql_query("SELECT username,djname,passwrd,rank,email FROM rp_users WHERE username = '$eusername'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["eusername"] = $row['username'];
$_SESSION["edjname"] = $row['djname'];
$_SESSION["epasswrd"] = $row['passwrd'];
$_SESSION["eemail"] = $row['email'];
$_SESSION["erank"] = $row['rank'];
;?>

<?php
$edusername = $_POST[edusername];
$eddjname = $_POST[eddjname];
$edpasswrd = encrypt($_POST[edpasswrd]);
$edrank = $_POST[edrank];
$edemail = $_POST[edemail];
if ($_POST['submit']) {
$result = mysql_query("UPDATE rp_users SET djname = '$eddjname',passwrd = '$edpasswrd',email = '$edemail',rank = '$edrank' WHERE username = '$edusername'") or die(mysql_error());
echo "<center><h1>The users details has been successfully updated.<br>
-Refreshing Does Not Show Changes-</h1><p></center>";
unset($_SESSION['eusername']); 
unset($_SESSION['edjname']); 
unset($_SESSION['epasswrd']); 
unset($_SESSION['eemail']); 
unset($_SESSION['erank']); 
}
?>

<?php
echo "
<form method='POST' action='editdj2.php'>
<input type='hidden' name='edusername' value='$_SESSION[eusername]'>
DJ Name:<br>
<input type='text' name='eddjname' value='$_SESSION[edjname]'><p>
Password:<br>
<input type='password' name='edpasswrd' value=''><p>
Email:<br>
<input type='text' size='40' name='edemail' value='$_SESSION[eemail]'><p>
Rank:<br>
<select name='edrank'>
<option>Suspended</option>
<option selected>Trialist DJ</option>
<option>Junior DJ</option>
<option>Senior DJ</option>
<option>Head DJ</option>
<option>Administrator</option>
</select><p>
<input type='submit' name='submit' value='Edit'>
</form>
";?>


</center>

<?php require('bottom.php');?>