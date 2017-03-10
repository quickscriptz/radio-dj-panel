<?php require('head.php');?>

<?php
if($_SESSION['rp_rank'] == "Administrator") {
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
		while($_divide[$_array] != '')
		{
			$result = mysql_query("SELECT panel_version FROM rp_data") or die(mysql_error());
			while($row = mysql_fetch_assoc($result)) {
				$currentversion = $row['panel_version'];
				list($_version, $_html, $_message) = explode("~", $_divide[$_array]);
				if($_version != $currentversion){
					echo "<center><b><u>Radio DJ Panel Auto-Updater</u></b><p>";
					echo "<blockquote class='exclamation'>";
					echo $_message;
					echo "</blockquote>";
					echo "$_html";
					$_array++;
				} elseif($_version == $currentversion) {
				echo "<b><u>Radio DJ Panel Auto-Update</u></b><p><blockquote class='exclamation'>Your panel is currently up to date and using the latest version of our dj panel script.</blockquote>";
				$_array++;
				}
			}
		}
	}else{
		echo '<center><font size="2"><i>Unable to reach update server at this time.</i></font></center>';
	}
}
?>

<?php require('bottom.php');?>