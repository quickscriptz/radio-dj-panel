<?php require('head2.php');?>

<center>

<b><u>Suspend A DJ</u></b><p>

<?php
$edid = $_POST['edid'];
if ($_POST['suspend'] && $edid != 1) {
	$result = mysql_query("UPDATE rp_users SET rank = 'Suspended' WHERE id = '$edid'") or die(mysql_error());
	echo "<center><h1>User has been suspended.<br>
	-To Unsuspend Use Edit DJ-</h1></center>";
}elseif($edid == 1){
	echo "<center><h1><b>You cannot suspend the root admin account!</h1>";
}
?>

<form method="POST" action="suspenddjhead.php">
<?php
    $result = mysql_query("SELECT id, username FROM rp_users ORDER BY username ASC");
    echo '<select name="edid">';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<option value="' . $row['id'] . '">' . $row['username'];
        if($row['rank'] == "Administrator"){echo ' (Admin)';}
        echo '</option>';
    }
    echo '</select>';
?>
<p><input type="submit" name="suspend" value="Suspend">
</form>


</center>

<?php require('bottom2.php');?>