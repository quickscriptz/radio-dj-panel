<?php
session_start();
require('connect.php');
if($_SESSION['rp_logged'] == "TRUE") { 
	$username = $_SESSION['rp_username']; 
	$passwrd = $_SESSION['rp_passwrd']; 
	$rank = $_SESSION['rp_rank']; 
	$check = mysql_query("SELECT username, passwrd FROM rp_users WHERE username = '$username'")or die(mysql_error()); 
	if(mysql_num_rows($check) == 0) {
		unset($_SESSION['rp_logged']); 
		unset($_SESSION['rp_username']); 
		unset($_SESSION['rp_passwrd']); 
		unset($_SESSION['rp_djname']); 
		unset($_SESSION['rp_email']); 
		unset($_SESSION['rp_rank']); 
		header("Location: index.php"); 
		exit();
	}else{
		while($info = mysql_fetch_array( $check )) { 
			if($info['username'] = ""){
				unset($_SESSION['rp_logged']); 
				unset($_SESSION['rp_username']); 
				unset($_SESSION['rp_passwrd']); 
				unset($_SESSION['rp_djname']); 
				unset($_SESSION['rp_email']); 
				unset($_SESSION['rp_rank']); 
				header("Location: index.php"); 
				exit();
				}
			if($passwrd != $info['passwrd']) { 
				unset($_SESSION['rp_logged']); 
				unset($_SESSION['rp_username']); 
				unset($_SESSION['rp_passwrd']); 
				unset($_SESSION['rp_djname']); 
				unset($_SESSION['rp_email']); 
				unset($_SESSION['rp_rank']); 
				header("Location: index.php"); 
				exit();
			} 
			if($password == "NULL"|$username == "NULL") {
				unset($_SESSION['rp_logged']); 
				unset($_SESSION['rp_username']); 
				unset($_SESSION['rp_passwrd']); 
				unset($_SESSION['rp_djname']); 
				unset($_SESSION['rp_email']); 
				unset($_SESSION['rp_rank']); 
				header("Location: index.php"); 
				exit();
			}
			if($_SESSION['rp_rank'] == "Suspended") {
				header("Location: contact_public.php");
			}
			$query = mysql_query("SELECT username,djname,passwrd,rank,email FROM rp_users WHERE username = '$username'") or die(mysql_error());
			$row = mysql_fetch_array($query);
			$_SESSION["rp_logged"] = TRUE;
			$_SESSION["rp_username"] = $row['username'];
			$_SESSION["rp_passwrd"] = $row['passwrd'];
			$_SESSION["rp_djname"] = $row['djname'];
			$_SESSION["rp_email"] = $row['email'];
			$_SESSION["rp_rank"] = $row['rank'];
		}
	}
}else { 
	header("Location: index.php"); 
	exit();
} 
?>