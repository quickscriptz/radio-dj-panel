<?php require('head.php');?>

<center>


<b><u>Edit Your Profile</u></b><p>

<?php
$edusername = $_POST[edusername];
$eddjname = $_POST[eddjname];
$edemail = $_POST[edemail];
$edfavsong = $_POST[edfavsong];
$edfavband = $_POST[edfavband];
$edfavfood = $_POST[edfavfood];
$edpetpeeves = $_POST[edpetpeeves];
$edsayings = $_POST[edsayings];
$edaboutyou = $_POST[edaboutyou];
$edavatar = $_POST[edavatar];
if ($_POST['submit']) {
$result = mysql_query("UPDATE rp_users SET djname = '$eddjname',email = '$edemail', favsong = '$edfavsong', favband = '$edfavband', favfood = '$edfavfood', petpeeves = '$edpetpeeves', sayings = '$edsayings', aboutyou = '$edaboutyou', avatar = '$edavatar' WHERE username = '$edusername'") or die(mysql_error());
unset($_SESSION['eusername']); 
unset($_SESSION['edjname']); 
unset($_SESSION['eemail']); 
unset($_SESSION['erank']); 
unset($_SESSION['efavsong']); 
unset($_SESSION['efavband']); 
unset($_SESSION['efavfood']); 
unset($_SESSION['epetpeeves']); 
unset($_SESSION['esayings']); 
unset($_SESSION['eaboutyou']); 
unset($_SESSION['eavatar']); 
$query = mysql_query("SELECT username,djname,passwrd,rank,email FROM rp_users WHERE username = '". mysql_real_escape_string($username)."'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["rp_logged"] = TRUE;
$_SESSION["rp_username"] = $row['username'];
$_SESSION["rp_passwrd"] = md5($row['passwrd']);
$_SESSION["rp_djname"] = $row['djname'];
$_SESSION["rp_email"] = $row['email'];
$_SESSION["rp_rank"] = $row['rank'];
echo "<center><h1>Your profile has been successfully updated.<br></h1></center><p>";
}
?>

<?php
session_start();
$query = mysql_query("SELECT username,djname,email,favsong,favband,favfood,petpeeves,sayings,aboutyou,avatar FROM rp_users WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["eusername"] = $row['username'];
$_SESSION["edjname"] = $row['djname'];
$_SESSION["eemail"] = $row['email'];
$_SESSION["efavsong"] = $row['favsong'];
$_SESSION["efavband"] = $row['favband'];
$_SESSION["efavfood"] = $row['favfood'];
$_SESSION["epetpeeves"] = $row['petpeeves'];
$_SESSION["esayings"] = $row['sayings'];
$_SESSION["eaboutyou"] = $row['aboutyou'];
$_SESSION["eavatar"] = $row['avatar'];
?>

<?php
echo "
<form method='POST' action='editprofile.php'>
<input type='hidden' name='edusername' value='$_SESSION[eusername]'>
DJ Name:<br>
<input type='text' name='eddjname' value='$_SESSION[edjname]'><p>
Email:<br>
<input type='text' name='edemail' value='$_SESSION[eemail]' size='40'><p>
Favourite Song:<br>
<input type='text' name='edfavsong' value='$_SESSION[efavsong]' size='30'><p>
Favourite Band:<br>
<input type='text' name='edfavband' value='$_SESSION[efavband]' size='30'><p>
Favourite Food:<br>
<input type='text' name='edfavfood' value='$_SESSION[efavfood]' size='30'><p>
Pet Peeves:<br>
<input type='text' name='edpetpeeves' value='$_SESSION[epetpeeves]' size='40'><p>
Sayings:<br>
<input type='text' name='edsayings' value='$_SESSION[esayings]' size='50'><p>
About You:<br>
<textarea rows='5' cols='30' maxlength='500' name='edaboutyou'>" . $_SESSION['eaboutyou'] . "</textarea><br><font color='black'><b>-Max 500 Chars-</b></font><p>
Avatar URL:<br>
<input type='text' name='edavatar' value='$_SESSION[eavatar]' size='50'><br>
<font color='black'><b>-Max Size 200x200-</b></font><p>
<input type='submit' name='submit' value='Edit'>
</form>
";?>


</center>

<?php require('bottom.php');?>