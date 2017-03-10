<?php require('head.php');?>

<center><b><u>Radio DJ Panel Auto-Updater</u></b><p>

<?php
if($_SESSION['rp_rank'] == "Administrator") {

	// Current panel version
	$result = mysql_query("SELECT panel_version FROM rp_data");
	while($row = mysql_fetch_assoc($result)){$v = $row['panel_version'];}

	// Contact server
	$filename = "http://rdjp.quickscriptz.ca/update.php?v=$v";
	$do = @file_get_contents($filename);
	if($do){
		$parts = explode("||", $do);
		if($parts[0] == "00"){
			// Up-to-date
			echo '<h1>YOUR RADIO DJ PANEL IS UP-TO-DATE!</h1>';
			echo 'You are using the latest available version of the Radio DJ Panel script. ';
			echo $parts[1];
			
		}elseif($parts[0] == "01"){
			// Newer version
			echo '<blockquote class="exclamation">There is a newer version of the Radio DJ Panel available for download! See below for details.</blockquote>';
			echo $parts[1];
			
		}elseif($parts[0] == "10"){
			// Unknown error (version checking)
			echo '<blockquote class="delete">An unknown error occurred while checking versions and we\'re not really sure what happened.</blockquote>';
			echo $parts[1];
		}else{
			// Unknown error (update server response)
			echo '<blockquote class="delete">An unknown error occurred while attempting to interpret the update server\'s response. Please try again later!</blockquote>';
		}
	}else{
		// Could not contact update server
		echo '<blockquote class="delete">An error occurred while attempting to contact the update server! Please try again later.</blockquote>';
	}
}
?>

</center>

<?php require('bottom.php');?>