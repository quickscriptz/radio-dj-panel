<?php require('check.php'); require('connect.php');?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'|$_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'|$_SESSION['rp_rank'] == 'Head DJ'|$_SESSION['rp_rank'] == 'Administrator'){ 
echo "<div class='title'>System</div>
<b>IP: </b>"; 
$ipaddr=$_SERVER['REMOTE_ADDR']; 
echo "$ipaddr";
echo "<br/><b>User: </b>";
echo "$_SESSION[rp_username]";
echo "<br/><b>Rank: </b>";
echo "$_SESSION[rp_rank]";
echo "<br/><b>Panel Version:</b> ";
$result = mysql_query("SELECT panel_version FROM rp_data") or die(mysql_error());
while($row = mysql_fetch_assoc($result)) { 
echo "$row[panel_version]<br/>";
}
echo "<p></p>
<div class='title'>Radio</div>
-<a href='home.php'>Home</a><br/>
-<a href='news.php'>News</a><br/>
-<a href='rules.php'>Rules</a><br/>
-<a href='stafflist.php'>Staff List</a><br/>
-<a href='staffchat.php'>Staff Chat</a><br/>
-<a href='servdetails.php'>Server Details</a><br/>
-<a href='contact.php'>Contact Admin</a><br/>
-<a href='logout.php'>Logout</a><br/>
<p></p>
<div class='title'>DJ Tools</div>
-<a href='sendalert.php'>Alert User</a><br/>
-<a href='timetable.php'>Timetable</a><br/>
-<a href='bannedsongs.php'>Banned Songs</a><br/>
-<a href='checkrequests.php'>Check Requests</a><br/>
-<a href='editdjmessage.php'>Edit DJ Message</a><br/>
<p></p>
<div class='title'>Messaging</div>
-<a href='inbox.php'>";
$result = mysql_query("SELECT COUNT(id) FROM rp_pm WHERE todj='$_SESSION[rp_username]'");
$total = mysql_fetch_array($result);
echo "View Inbox (". $total['COUNT(id)'] .")";
echo "</a><br/>
-<a href='newmessage.php'>New Message</a><br/>
<p></p>
<div class='title'>Your Account</div>
-<a href='notes.php'>My Notes</a><br/>
-<a href='editprofile.php'>Edit Profile</a><br/>";
$username = $_SESSION['rp_username'];
echo "-<a href='viewprofile.php?dj=$username'>View Profile</a><br/>
-<a href='changepass.php'>Change Password</a><br/>
";}?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'|$_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'){ 
echo "</div>";}?>

<?php
if($_SESSION['rp_rank'] == 'Administrator'){ 
echo "<p></p>
<div class='title'>Admin Panel</div>
-<a href='admin/editdj.php'>Edit DJ</a><br/>
-<a href='admin/createdj.php'>Create DJ</a><br/>
-<a href='admin/deletedj.php'>Delete DJ</a><br/>
-<a href='admin/suspenddj.php'>Suspend DJ</a><br/>
<p></p>
<div class='title'>News Panel</div>
-<a href='admin/addnews.php'>Add Article</a><br/>
-<a href='admin/editnews.php'>Edit Article</a><br/>
-<a href='admin/deletenews.php'>Delete Article</a><br/>
<p></p>
<div class='title'>Logs Management</div>
-<a href='admin/viewusrlogs.php'>View Login Logs</a><br/>
-<a href='admin/viewlogs.php'>View Server Logs</a><br/>
-<a href='admin/viewcontact.php'>Contact Submissions</a><br/>
<p></p>
<div class='title'>Panel Configuration</div>
-<a href='admin/upload.php'>Upload Files</a><br/>
-<a href='admin/unbansong.php'>Unban Song</a><br/>
-<a href='admin/editrules.php'>Edit Radio Rules</a><br/>
-<a href='admin/editconfig.php'>Edit Configuration</a><br/>
-<a href='admin/changeamessage.php'>Edit Admin Message</a><br/>
<p></p>
<div class='title'>Extras</div>
-<a href='admin/plugins.php'>Plugin Centre</a><br/>
-<a href='admin/update.php'>Check For Updates</a><br/>
</div>";}?>

<?php
if($_SESSION['rp_rank'] == 'Head DJ'){ 
echo "<p></p><div class='title'>Head DJ Panel</div>
-<a href='admin/suspenddjhead.php'>Suspend DJ</a><br/>
-<a href='admin/unbansonghead.php'>Unban Song</a><br/>
</div>";}?>