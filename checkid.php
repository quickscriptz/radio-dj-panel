<?php
$v = $_GET['verify'];
if(!$v){
	$s = make_checkid();
	$l = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
	$result = @file_get_contents("http://rdjp.quickscriptz.ca/call.php?v=3.1.0&s=$s&l=$l");
	if($result && is_numeric($result)){
		$result = mysql_escape_string($result);
		@mysql_query("UPDATE rp_data SET checkid = '".$result."'");
	}elseif(!$result){
		@mysql_query("UPDATE rp_data SET checkid = '90'");
	}elseif(!is_numeric($result)){
		@mysql_query("UPDATE rp_data SET checkid = '91'");
	}else{
		@mysql_query("UPDATE rp_data SET checkid = '92'");
	}
}elseif($v == "true"){
	require('connect.php');
	require('functions.php');
	echo make_checkid();
}
?>