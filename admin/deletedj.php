<?php require('head.php');?>

<center>


<b><u>Delete A DJ</u></b><p>
<form method='POST' action='deletedj.php'>

<?php
session_start();
if ($_POST['del_username']) {
	$del_username=$_POST['del_username'];
	if($del_username == 1){
		echo "<center><h1><b>You cannot delete the root admin account!</h1><p>";
	}else{
		$result = mysql_query("DELETE FROM rp_users WHERE id = '$del_username'");
		$i=1;
		while($i<=24){
			$sql = mysql_query("UPDATE rp_timetable SET `$i` = '' WHERE `$i` = '$del_username'");
			$i++;
		}
		echo "<center><h1><b>The user has been successfully deleted.</h1><p>";
		session_unregister ('del_username');
	}
}
?>

<?php
    $result = mysql_query("SELECT id, username, rank FROM rp_users ORDER BY username ASC");
    echo '<select name="del_username">';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<option value="' . $row['id'] . '">' . $row['username'];
        if($row['rank'] == "Administrator"){echo ' (Admin)';}
        echo '</option>';
    }
    echo '</select>';
?>
<p><input type="submit" name="submit" value="Delete">
</form>


</center>

<?php require('bottom.php');?>