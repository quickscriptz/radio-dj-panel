<?php require('head.php');?>

<center>

<b><u>Suspend A DJ</u></b><p>

<?php
$edusername = $_POST[edusername];
$edrank = $_POST[edrank];
if ($_POST['suspend']) {
$result = mysql_query("UPDATE rp_users SET rank = '$edrank' WHERE username = '$edusername'") or die(mysql_error());
echo "<center><h1>DJ $edusername has been suspended.<br>
-To Unsuspend Use Edit DJ-</h1></center>";
}
?>

<form method="POST" action="suspenddj.php">
<input type="hidden" name="edrank" value="Suspended">
<?php
    $result = mysql_query("SELECT username FROM rp_users ORDER BY username ASC");
    echo '<select name="edusername">';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
    }
    echo '</select>';
?>
<p><input type="submit" name="suspend" value="Suspend">
</form>


</center>

<?php require('bottom.php');?>