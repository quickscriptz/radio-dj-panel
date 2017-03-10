<?php require('check.php');?>

<meta http-equiv="refresh" content="5">

<link rel="stylesheet" type="text/css" href="style.css" />
<body bgcolor="#2A9CD0">

<?php require('connect.php');?>

<div align="left">
<?php
$result = mysql_query("SELECT id, djname, message FROM rp_chat");
while($row = mysql_fetch_assoc($result)){
echo "<font color='black'><b><i>DJ ".$row['djname'].":</b></i></font> ".$row['message']."<br>";
}
?>
<div>