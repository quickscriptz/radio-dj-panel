<?php require('head.php');?>
<center>

<b><u>View Server Details</b></u><p>

<?php
if($_SESSION['rp_rank'] == 'Junior DJ'|$_SESSION['rp_rank'] == 'Senior DJ'|$_SESSION['rp_rank'] == 'Head DJ'|$_SESSION['rp_rank'] == 'Administrator'){
echo '<h1>Your details will be logged. Do you wish to continue?</h1><p><a href="servdetails2.php">Yes</a> | <a href="home.php">No</a><p>';
}
?>

<?php
if($_SESSION['rp_rank'] == 'Trialist DJ'){
echo '
Sorry, trialists are not allowed to view the server details.<br>Contact admin for server info.';
}
?>

</center>
<?php require('bottom.php');?>