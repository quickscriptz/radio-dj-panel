<?php require('head.php');?>
<center>

Welcome <b>DJ <?php echo "$_SESSION[rp_username]";?></b>,<br/>
you are a(n) <b><?php echo "$_SESSION[rp_rank]";?></b>.<p>

<script language="JavaScript">
<!-- Hide from old browsers
var a = Math.random() + ""
var rand1 = a.charAt(5)
quotes = new Array
quotes[1] = "Remember to double check the <a href='servdetails.php'>server details</a> before going live!";
quotes[2] = "You can keep in touch with other DJ's via the <a href='staffchat.php'>staff chat</a>.";
quotes[3] = "Remember to check the <a href='timetable.php'>timetable</a> often for changes!";
quotes[4] = "Don't forget to read up on the <a href='rules.php'>rules</a> before DJ'ing!";
quotes[5] = "Get the latest updates by checking the <a href='news.php'>news</a>!";
quotes[6] = "You can send private messages to other DJ's from your <a href='inbox.php'>inbox</a>!";
quotes[7] = "Send messages directly to listeners via the <a href='sendalert.php'>alerts</a> page!";
quotes[8] = "Broadcast public messages using the <a href='editdjmessage.php'>dj says</a> when you're live!";
quotes[9] = "Remember to keep your eyes tuned to the <a href='checkrequests.php'>requests page</a> while DJ'ing!";
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

	// Check install folder
	$install = 'install/'; 	
	if(file_exists($install)){ 
		echo "<blockquote class='delete'>We have detected that you have not yet deleted the install directory. Please do so before continuing.</blockquote><p>";
	}

	// Current panel version
	$result = mysql_query("SELECT panel_version FROM rp_data");
	while($row = mysql_fetch_assoc($result)){$v = $row['panel_version'];}

	// Contact server
	$filename = "http://rdjp.quickscriptz.ca/update.php?v=$v";
	$do = @file_get_contents($filename);
	if($do){
		$parts = explode("||", $do);
		if($parts[0] == "01"){
			// Newer version
			echo '<blockquote class="exclamation">There is a newer version of the Radio DJ Panel available for download! <a href="admin/update.php">Click here for more info</a>.</blockquote>';
			echo $parts[1];
			
		}
	}
}
?>



</center>
<?php require('bottom.php');?>