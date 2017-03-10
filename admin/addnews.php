<?php require('head.php');?>

<div align="center"><b><u>Add News Article</b></u><p>

<b>Note:</b> HTML must be used to format all news articles.<p>

<?php 
if (!isset($_POST['add'])) {
echo '<form method="post" action="addnews.php">
Title:<br>
<input type="text" name="title" size="35"><p>
Article:<br>
<textarea rows="10" cols="60" name="article"></textarea><p>
<input type="submit" name="add" value="Add Article">
</form>';
}else{
$poster = $_SESSION["rp_djname"];
$date = date("M d, Y h:i A");
$ipaddr = $_SERVER['REMOTE_ADDR'];
$title = $_POST["title"];
$article = $_POST["article"];
if (isset($_POST["add"])) {
if($title==NULL|$article==NULL) {
echo "<h1>You forgot to fill in a field.<br><a href='javascript:history.back()'>Go Back</a></h1>";
}else{
$query = "INSERT INTO rp_news (poster, ip, date, title, article) VALUES('$poster','$ipaddr','$date','$title','$article')";
mysql_query($query) or die(mysql_error());
echo "<h1>Article successfully added!</h1>";
}
}
}
?>
</div>

<?php require('bottom.php');?>