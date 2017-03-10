<?php require('head.php');?>

<center><b><u>Upload A File</u></b><p>

<?php
$path= "../uploads/".$HTTP_POST_FILES['ufile']['name'];
if($ufile !=none)
{
if(copy($HTTP_POST_FILES['ufile']['tmp_name'], $path))
{
echo "<h1>-File successfully uploaded-<br><a href='upload.php'>Upload More Files</a></h1>";
echo "<br><hr width='70%'><p><table width='70%' border='0'>
<tr>
<td width='40%'><b><u>File Name</u></b></td>
<td width='30%'><b><u>File Size</u></b></td>
<td width='30%'><b><u>File Type</u></b></td>
</tr>
<tr>
<td width='40%'><a href='$path' target='blank'>".$HTTP_POST_FILES['ufile']['name']."</a></td>
<td width='30%'>".$HTTP_POST_FILES['ufile']['size']." Bytes</td>
<td width='30%'>".$HTTP_POST_FILES['ufile']['type']."</td>
</tr></table>";
}
else
{
echo "<h1>-An error occured while processing the file or no file was selected-</h1>";
}
}
?>

<?php
$path= "../uploads/".$HTTP_POST_FILES['ufile2']['name'];
if($ufile2 !=none)
{
if(copy($HTTP_POST_FILES['ufile2']['tmp_name'], $path))
{
echo "<table width='70%' border='0'><tr>
<td width='40%'><a href='$path' target='blank'>".$HTTP_POST_FILES['ufile']['name']."</a></td>
<td width='30%'>".$HTTP_POST_FILES['ufile']['size']." Bytes</td>
<td width='30%'>".$HTTP_POST_FILES['ufile']['type']."</td>
</tr></table>";
}
else
{
echo "<h1>-An error occured while processing the file or no file was selected-</h1>";
}
}
?>

<?php
$path= "../uploads/".$HTTP_POST_FILES['ufile3']['name'];
if($ufile3 !=none)
{
if(copy($HTTP_POST_FILES['ufile3']['tmp_name'], $path))
{
echo "<table width='70%' border='0'><tr>
<td width='40%'><a href='$path' target='blank'>".$HTTP_POST_FILES['ufile3']['name']."</a></td>
<td width='30%'>".$HTTP_POST_FILES['ufile3']['size']." Bytes</td>
<td width='30%'>".$HTTP_POST_FILES['ufile3']['type']."</td>
</tr></table>";
}
else
{
echo "<h1>-An error occured while processing the file or no file was selected-</h1>";
}
}
?>


<?php require('bottom.php');?>