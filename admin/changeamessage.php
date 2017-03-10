<?php require('head.php');?>

<center>


<b><u>Edit Admin Message</u></b><br>
(Scroller/Marquee)<p>

<b>Note:</b> HTML/PHP is allowed, and page must be refreshed for changes to take effect.

<?php
$file = "../amessage.php";
if (!isset($_POST['submit']))
{
  $fo = fopen($file, "r");
  $fr = fread($fo, filesize($file));
  if ( get_magic_quotes_gpc () ) $fr = stripslashes($fr);
  
  $fr = str_replace("&", "&amp;", $fr);
  $fr = str_replace("<", "&lt;", $fr);
  $fr = str_replace(">", "&gt;", $fr);
  
  echo "<form method='post' action='{$_SERVER['PHP_SELF']}'>
        <textarea name='newfile' rows='5' cols='35'>{$fr}</textarea>
        <p>
        <input type='submit' name='submit' value='Save' />
        </form>";
  fclose($fo);
}
else
{
  $fo = fopen($file, "w");
  $fw = fwrite($fo, (get_magic_quotes_gpc()?stripslashes($_POST['newfile']):$_POST['newfile']));
  fclose($fo);
echo "<p><h1>Admin message saved!</h1>";
}
?>


</center>

<?php require('bottom.php');?>