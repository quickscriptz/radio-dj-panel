<?php require('head.php');?>

<?php
if($_SESSION['rp_rank'] == "Administrator") {
	$filename = "http://www.quickscriptz.ca/radiodjpanel_plugins.txt";
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
			list($_html) = explode("~", $_divide[$_array]);
			echo "$_html";
			$_array++;
		}
	}else{
		echo '<center><font size="2"><i>Unable to reach plugin server at this time.</i></font></center>';
	}
}
?>

<?php require('bottom.php');?>