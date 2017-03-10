<?php require('head.php');?>

<?php
// Basic info
$slotb = $_GET['slot'];
$day = $_GET['day'];

// User info
$username = $_SESSION['rp_username'];
$djname = $_SESSION['rp_djname'];
$rank = $_SESSION['rp_rank'];

// Get user's ID
$sql = mysql_query("SELECT id, username FROM rp_users WHERE username = '$username'");
while($row = mysql_fetch_array($sql)){
	$userid = $row['id'];
}

// Determine day of week
if($_GET['week'] == ""){
	$_GET['week'] = date("l");
}

// Determine day of week
if($_GET['day'] == ""){
	$day = $_GET['week'];
	$_GET['week'] = date("l");
}

// Get slot info
$slot = mysql_fetch_array(mysql_query("SELECT * FROM rp_timetable WHERE day = '$day'"));

// Timetable heading
echo "<div id='timetable'><center><b><u>Timetable</u></b><p>
<h1>-You are currently viewing $day's timetable-</h1><p>
<a href='?week=Monday'>Monday</a> | <a href='?week=Tuesday'>Tuesday</a> | <a href='?week=Wednesday'>Wednesday</a> | <a href='?week=Thursday'>Thursday</a> | <a href='?week=Friday'>Friday</a> | <a href='?week=Saturday'>Saturday</a> | <a href='?week=Sunday'>Sunday</a><br><hr><br>";

// Process booking
if($_GET["action"] == "book"){
	if($slot[$slotb] == ""){
		$command = mysql_query("UPDATE rp_timetable SET `$slotb` = '$userid' WHERE day = '$day'") or die(mysql_error());
		if($command){
			echo "<center><h1>Successfully booked slot!</h1></center><br/>";
			$slot = mysql_fetch_array(mysql_query("SELECT * FROM rp_timetable WHERE day = '$day'"));
		}else{
			echo "<center><h1>ERROR - An unknown error occurred, please try again.</h1></center><br/>";
		}
	}else{
		echo "<center><h1>The selected slot is already booked!</h1></center><br/>";
	}
}elseif($_GET["action"] == "unbook"){
	if($slot[$slotb] == $userid || $rank == "Administrator"){
		$command = mysql_query("UPDATE rp_timetable SET `$slotb` = '' WHERE day = '$day'") or die(mysql_error());
		if($command){
			echo "<center><h1>Successfully unbooked slot!</h1></center><br/>";
			$slot = mysql_fetch_array(mysql_query("SELECT * FROM rp_timetable WHERE day = '$day'"));
		}else{
			echo "<center><h1>ERROR - An unknown error occurred, please try again.</h1></center><br/>";
		}
	}else{
		echo "<center><h1>You cannot unbook this slot!</h1></center><br/>";
	}
}elseif($_GET["action"] == "empty"){
	if($rank == "Administrator"){
		$command = mysql_query("UPDATE rp_timetable SET `1`='', `2`='', `3`='', `4`='', `5`='', `6`='', `7`='', `8`='', `9`='', `10`='', `11`='', `12`='', `13`='', `14`='', `15`='', `16`='', `17`='', `18`='', `19`='', `20`='', `21`='', `22`='', `23`='', `24`='' WHERE day='$day'") or die(mysql_error());
		if($command){
			echo "<center><h1>Successfully cleared all slots for day!</h1></center><br/>";
			$slot = mysql_fetch_array(mysql_query("SELECT * FROM rp_timetable WHERE day = '$day'"));
		}else{
			echo "<center><h1>ERROR - An unknown error occurred, please try again.</h1></center><br/>";
		}
	}else{
		echo "<center><h1>Only administrators may unbook all slots for the day!</h1></center><br/>";
	}
}

// Start of timetable
echo "<table border='0' valign='middle' align='center'><tr>
<td width='150px' align='center'><b><u>Time</u></b></td>
<td width='150px' align='center'><b><u>DJ Booked</u></b><td></tr>
<tr><td></td><td></td></tr>";

// Display each timeslot/table
function outit($time, $num){
	global $day, $slot, $userid, $rank;
	$info = mysql_fetch_array(mysql_query("SELECT * FROM rp_users WHERE id = '".$slot[$num]."'"));
	if($slot[$num] == ""){ 
		$book[$num] = "<a href='?action=book&day=$day&slot=$num'>BOOK SLOT</a>"; 
	}elseif($userid == $slot[$num] || $rank == "Administrator"){
		$book[$num] = "<a href='?action=unbook&day=$day&slot=$num'><b>DJ ".$info['djname']." (Unbook)</a></b>";
	}else{
		$book[$num] = "<b><font color='black'>DJ ".$info['djname']."</font></b>";
	}
	if($num%2){
		echo "<tr class='colour'><td width='150px' align='center'>$time</td><td width='150px' align='center'>".$book[$num]."<td></tr>";
	}else{
		echo "<tr><td width='150px' align='center'>$time</td><td width='150px' align='center'>".$book[$num]."<td></tr>";
	}
}

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

// Bottom of timetable
echo "<tr><td align='center'>---------------</td><td align='center'>---------------</td></tr>";
echo "<tr><td width='150px' align='center'><b>$day</b></td>
<td width='150px' align='center'>";
if ($_SESSION["rp_rank"] == "Administrator"){ 
	echo("<a href='?action=empty&day=$day'>CLEAR DAY</a>");
}
echo "</td></tr></table>
</center><p></div>";
?>

<?php require('bottom.php');?>