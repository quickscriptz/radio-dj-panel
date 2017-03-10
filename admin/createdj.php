<?php require('head.php');?>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=yes,location=0,statusbar=0,menubar=0,resizable=1,width=500,height=500,left = 262,top = 134');");
}
// End -->
</script>

<center>

<b><u>Create A New DJ</u></b><p>

<?php 
//Are they just getting here or submitting their info?
if (isset($_POST["username"])) {
$username = $_POST["username"];
$djname = $_POST["djname"];
$passwrd = encrypt($_POST["passwrd"]);
$cpasswrd = encrypt($_POST["cpasswrd"]);
$email = $_POST["email"];
$rank = $_POST["rank"];
//Was a field left blank?
if($username==NULL|$djname==NULL|$passwrd==NULL|$cpasswrd==NULL|$email==NULL|$rank==NULL) {
echo "<h1>All fields are required.</h1>";
}else{
//Do the passwords match?
if($passwrd!=$cpasswrd) {
echo "<h1>Passwords do not match.</h1>";
}else{
//Has the username or email been used?
$checkuser = mysql_query("SELECT username FROM rp_users WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);

$checkemail = mysql_query("SELECT email FROM rp_users WHERE email='$email'");
$email_exist = mysql_num_rows($checkemail);

if ($email_exist>0|$username_exist>0) {
echo "<h1>The username or email is already in use.</h1>";
}else{
//Everything seems good, lets insert.
$query = "INSERT INTO rp_users (username, djname, passwrd, email,rank) VALUES('$username','$djname','$passwrd','$email','$rank')";
mysql_query($query) or die(mysql_error());
echo "<h1>DJ $username has been successfully created as a(n) $rank.</h1>";
}
}
}
}
?>

<form method="POST" action="createdj.php">
Username:<br>
<input type="text" size="15" maxlength="25" name="username"><p>

DJ Name:<br>
<input type="text" size="15" maxlength="25" name="djname"><p>

Password:<br>
<input type="password" size="15" maxlength="25" name="passwrd"><p>

Confirm Password:<br>
<input type="password" size="15" maxlength="25" name="cpasswrd"><p>

Email:<br>
<input type="text" size="40" maxlength="50" name="email"><p>

Rank:<br>
<select name="rank">
<option>Suspended</option>
<option selected>Trialist DJ</option>
<option>Junior DJ</option>
<option>Senior DJ</option>
<option>Head DJ</option>
<option>Administrator</option>
</select><br>
<font size="1">
<A HREF="javascript:popUp('aboutranks.php')">-About Ranks-</A>
</font>
<p>

<input type="submit" name="submit" value="Create User">

</form>

</center>

<?php require('bottom.php');?>