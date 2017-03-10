<?php require('head.php');?>
<center>

Welcome <b>DJ <?php echo "$_SESSION[rp_username]";?></b>,<br/>
you are a(n) <b><?php echo "$_SESSION[rp_rank]";?></b>.<p>

<script language="JavaScript">
<!-- Hide from old browsers
var a = Math.random() + ""
var rand1 = a.charAt(5)
quotes = new Array
quotes[1] = "Have you checked the <a href='servdetails.php'>server details</a> lately?";
quotes[2] = "Feel like doing some <a href='staffchat.php'>chatting</a>?";
quotes[3] = "Have you booked your <a href='timetable.php'>timeslot</a> yet this week?";
quotes[4] = "Read up on the <a href='rules.php'>rules</a> lately?";
quotes[5] = "Know what's happening lately? Why not check the <a href='news.php'>news</a>?";
quotes[6] = "Checked your <a href='inbox.php'>inbox</a> recently?";
quotes[7] = "Read up on the <a href='rules.php'>rules</a> lately?";
quotes[8] = "Don't forget to <a href='editdjmessage.php'>update the dj says</a> before you dj!";
quotes[9] = "The listener is usually right! Don't forget to <a href='checkrequests.php'>check the requests</a>!";
quotes[0] = "Feel like <a href='bannedsongs.php'>recommending</a> a song to be ban?";
var quote = quotes[rand1]
quote = quotes[rand1]
// -- End Hiding Here -->
</script>
<script language="JavaScript">
<!-- Hide this script from old browsers --
document.write("<i>" + quote + "</i>")
// -- End Hiding Here -->
</script><p><br><p>

<?php 
if($_SESSION['rp_rank'] == "Administrator") {
	$filename = 'install/'; 
	if (file_exists($filename)) { 
	echo "<blockquote class='delete'>We have detected that you have not yet deleted the install directory. Please do so before continuing.</blockquote><p>"; 
	} else { 
	} 
	$filename = "http://www.quickscriptz.ca/radiodjpanel_update.txt";
	$handle = @fopen("$filename", "r");
	$contents = '';
	if($handle){
		while (!feof($handle)) {
		$contents .= fread($handle, 8192);
		}
		fclose($handle);
		$_divide = explode("&", $contents);
		$_array = 0;
		echo "<center>";
		while($_divide[$_array] != ''){
			$result = mysql_query("SELECT panel_version FROM rp_data") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)) {
				$currentversion = $row['panel_version'];
				list($_version, $_html, $_message) = explode("~", $_divide[$_array]);
				if($_version != $currentversion|$_SESSION['rank'] == "Administrator"){
					echo "<blockquote class='exclamation'>A newer version of the Radio DJ Panel is available for download. Click <a href='admin/update.php'>here</a> to update your panel.</blockquote>";
				}
				$_array++;
				echo "</center>";
			}
		}
	}else{
		echo '<center><font size="2"><i>Unable to reach update server at this time.</i></font></center>';
	}
}
?>





</center>
<?php require('bottom.php');?>