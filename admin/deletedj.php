<?php require('head.php');?>

<center>


<b><u>Delete A DJ</u></b><p>
<form method='POST' action='deletedj.php'>

<?php
session_start();
if ($_POST['del_username']) {
$del_username=$_POST['del_username'];
$result = mysql_query("DELETE FROM rp_users WHERE username = '$del_username'");
echo "<center><h1><b>The user $del_username has been successfully deleted.</h1><p>";
session_unregister ('del_username');
}
?>

<?php
    $result = mysql_query("SELECT username, rank FROM rp_users ORDER BY username ASC");
    echo '<select name="del_username">';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<option value="' . $row['username'] . '">' . $row['username'];
        if($row['rank'] == "Administrator"){echo ' (Admin)';}
        echo '</option>';
    }
    echo '</select>';
?>
<p><input type="submit" name="submit" value="Delete">
</form>


</center>

<?php require('bottom.php');?>