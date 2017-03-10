<?php require('head.php');?>

<center><b><u>Radio News</b></u></center><p>

<?php
$result = mysql_query("SELECT poster, ip, date, title, article FROM rp_news ORDER BY id DESC");
while($row = mysql_fetch_assoc($result)){
echo "<font color='black'><b>Title:</b></font> ".$row['title']."<br/>
<font color='black'><b>Posted By:</b></font> DJ ".$row['poster']."<p>
<font color='black'><b>Article:</b></font> ".$row['article']."<br/>
<p><div align='center'><hr width='70%'></div><p>";
}
?>

<?php require('bottom.php');?>