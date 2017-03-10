<?php require('head.php');?>

<center>
<b><u>Radio DJ Panel Plugin Centre</u></b><br/><br/>

<?php
if($_SESSION['rp_rank'] == "Administrator") {

	// Contact server
	$filename = "http://rdjp.quickscriptz.ca/plugins.php";
	$do = @file_get_contents($filename);
	if($do){
		echo $do;
	}else{
		// Could not contact server
		echo '<blockquote class="delete">An error occurred while attempting to contact the plugin server! Please try again later.</blockquote>';
	}
}
?>

</center>

<?php require('bottom.php');?>