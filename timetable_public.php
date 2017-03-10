<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Radio DJ Panel v3 - Timetable</title>
<meta http-equiv="content-type" content="charset=UTF-8">
<style type="text/css">
body{
	background: #CCCCCC url(images/background.gif) repeat-x top left;
	background-attachment: fixed;
	font-family: Verdana;
	font-size: 10px;
	color: #FFFFFF;
	text-align: center;
}
h1{
	font-size: 10px;
	font-weight: bold;
}
#timetable_pub {
	font-family: Verdana;
	font-size: 10px;
	color: #000000;
}
#timetable_pub td {
	font-family: Verdana;
	font-size: 10px;
	color: #000000;
}
#timetable_pub a {
	font-family: Verdana;
	font-size: 10px;
	color: #0000FF;
}
#timetable_pub a {
	text-decoration: none;
}
#timetable_pub a:hover {
	text-decoration: underline;
	color: #0000FF;
}
#timetable_pub .colour{
	background: #B0B0B0;
}
</style>
<?php require('functions.php');?>
</head>
<body>

<?php
include("connect.php");
$day = $_GET['week'];

// Get day of week
if($_GET['week'] == ""){
	$day = date("l");
	$_GET['week'] = date("l");
}

// Get slot info
$slot = mysql_fetch_array(mysql_query("SELECT * FROM rp_timetable WHERE day = '$day'"));

// Prepare output
function outit($time, $num){
	global $day, $slot;
	$info = mysql_fetch_array(mysql_query("SELECT * FROM rp_users WHERE id = '".$slot[$num]."'"));
	if($slot[$num] == ""){ 
		$book[$num] = "OPEN SLOT"; 
	}else{
		$book[$num] = "<b>DJ ".$info['djname']."</b>";
	}
	if($num%2){
		echo "<tr class='colour'><td width='150px' align='center'>$time</td><td width='150px' align='center'>".$book[$num]."<td></tr>";
	}else{
		echo "<tr><td width='150px' align='center'>$time</td><td width='150px' align='center'>".$book[$num]."<td></tr>";
	}
}

// Start of timetable
echo "<div id='timetable_pub'><center>";
$result = mysql_query("SELECT sitename FROM rp_data");
while($row = mysql_fetch_assoc($result)) {
echo "<u>".$row['sitename']." Radio Timetable</u><p>";
}
echo "<h1>-You are currently viewing ";
echo "$day";
echo "'s timetable-</h1><p>";
echo "<a href='?week=Monday'>Monday</a> | <a href='?week=Tuesday'>Tuesday</a> | <a href='?week=Wednesday'>Wednesday</a> | <a href='?week=Thursday'>Thursday</a> | 
<a href='?week=Friday'>Friday</a> | 
<a href='?week=Saturday'>Saturday</a> | <a href='?week=Sunday'>Sunday</a><br><hr><br>
<table border='0' valign='middle' align='center'><tr>
<td width='150px' align='center'><u>Time</u></td>
<td width='150px' align='center'><u>DJ Booked</u><td></tr>";

// Print it out
// Print it out
outit('12:00 - 01:00 AM', 1);
$i = 2;
while($i <= 12){
	$start_time = $i - 1;
	$end_time = $i;
	if(strlen($start_time) == 1){$start_time = "0".$start_time;}
	if(strlen($end_time) == 1){$end_time = "0".$end_time;}
	$full_time = "$start_time:00 - $end_time:00 AM";
	outit($full_time, $i);
	$i++;
}
outit('12:00 - 01:00 PM', 13);
$i = 14;
while($i <= 24){
	$start_time = $i - 13;
	$end_time = $i - 12;
	if(strlen($start_time) == 1){$start_time = "0".$start_time;}
	if(strlen($end_time) == 1){$end_time = "0".$end_time;}
	$full_time = "$start_time:00 - $end_time:00 PM";
	outit($full_time, $i);
	$i++;
}

// Finish it off
echo "</table>
</center><p></div>";
?>
</body>
</html>