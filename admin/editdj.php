<?php require('head.php');?>

<center>

<b><u>Edit A DJ</u></u><p>
<form method='POST' action='editdj2.php'>

<?php
    $result = mysql_query("SELECT username, rank FROM rp_users ORDER BY username ASC");
    echo '<select name="eusername">';
    while($row = mysql_fetch_assoc($result))
    {
        echo '<option value="'.$row['username'].'">'.$row['username'];
        if($row['rank'] == "Administrator"){echo ' (Admin)</option>';}
        echo '</option>';
    }
    echo '</select>';
?>

<p><input type='submit' name='selectuser' value='Select'>
</form>

</center>

<?php require('bottom.php');?>