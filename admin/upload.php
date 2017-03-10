<?php require('head.php');?>

<center><b><u>Upload A File</u></b><p>
Use this form to upload file(s) to the dj panel directory (djpanel/uploads).<p>

<form action="uploader.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input name="ufile" type="file" id="ufile" /><br>
<input name="ufile2" type="file" id="ufile2" /><br>
<input name="ufile3" type="file" id="ufile3" /><p>
<input type="submit" name="Submit" value="Upload" />
</form>

<p><br><p>

<b>Uploaded Files</b><br/><hr width="50%">

<form method="post" action="upload.php">
<?php
foreach (glob("../uploads/*.*") as $filename) {
  $files = array($filename => $filename);
$list .= '<tr>
<td align="left" width="10%"><input type="checkbox" class="normal" name="delid[]" value="' . $filename . '"></td>
<td align="left" width="90%"><a href="' . $filename . '" target="blank">' . $filename . '</a></td>
</tr>';
}
echo '<div align="center"><table width="50%" border="0"><tr>
<td align="left" width="10%"><b><u>#</u></b></td>
<td align="left" width="90%"><b><u>Link To File</u></b></td>
</tr>';
echo ($list);
echo '</table></div>';
?>

<p>
<input type="submit" name="delete" value="Delete">
</form>

<?php
if ($_POST['delete']) {
$delete_array = $_POST['delid'];
foreach($delete_array as $delid) {
$do = unlink($delid); 
} if($do=="1"){
print "<h1>-The selected file(s) were deleted successfully-<br><a href='upload.php'>Refresh List</a></h1>"; 
} else { 
echo "<h1>-There was an error trying to delete the selected file(s)-</h1>"; 
} 
}
?>


<?php require('bottom.php');?>