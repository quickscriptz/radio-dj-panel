<?
session_start();
require('connect.php');
$usroffline = mysql_query("UPDATE rp_users SET online = '' WHERE username = '$_SESSION[rp_username]'") or die(mysql_error());
unset($_SESSION['rp_logged']); 
unset($_SESSION['rp_username']); 
unset($_SESSION['rp_passwrd']); 
unset($_SESSION['rp_djname']); 
unset($_SESSION['rp_email']); 
unset($_SESSION['rp_rank']); 
unset($_SESSION['rp_eusername']); 
unset($_SESSION['rp_edjname']); 
unset($_SESSION['rp_epasswrd']); 
unset($_SESSION['rp_eemail']); 
unset($_SESSION['rp_erank']); 
header("Location: index.php");
?>