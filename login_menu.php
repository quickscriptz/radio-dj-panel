<?php
if($_SESSION['rp_rank'] == "Suspended"){
echo "<div class='title'>System</div>
<b>IP: </b>"; 
$ipaddr=$_SERVER['REMOTE_ADDR']; 
echo "$ipaddr";
echo "<br/><b>User: </b>";
echo "$_SESSION[rp_username]";
echo "<br/><b>Rank: </b>";
echo "$_SESSION[rp_rank] <p></p>";
}
?>

<?php
if($_SESSION['rp_logged'] != "TRUE"){
echo "<div class='title'>Welcome</div>
-<a href='index.php'>Login</a><br/>
-<a href='forgotpassword.php'>Forgot Password</a><br/>
-<a href='contact_public.php'>Contact Admin</a><br/>";
}
?>

<?php
if($_SESSION['rp_rank'] == "Suspended"){
echo "<div class='title'>Welcome</div>
-<a href='contact_public.php'>Contact Admin</a><br/>
-<a href='logout.php'>Logout</a>";
}
?>
</div>