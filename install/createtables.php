<body bgcolor="#CCCCCC">

<?php require('../connect.php');?>


<?php
$query = "CREATE TABLE IF NOT EXISTS rp_alerts(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
toip VARCHAR(20) NOT NULL,
message TEXT NOT NULL,
fromdj VARCHAR(50) NOT NULL,
expire VARCHAR(20) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Alerts Tables Successfully Created!</center><p>";
?>

<?php
$query = "CREATE TABLE IF NOT EXISTS rp_chat(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
djname VARCHAR(30) NOT NULL,
message VARCHAR(150) NOT NULL,
date VARCHAR(30) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Chat Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_contact(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
subject VARCHAR(50) NOT NULL,
message TEXT NOT NULL,
ipaddr VARCHAR(20) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Contact Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_data(
sitename VARCHAR(30) NOT NULL,
adminemail VARCHAR(30) NOT NULL,
serveraddr VARCHAR(50) NOT NULL,
serverport VARCHAR(10) NOT NULL,
serverpass VARCHAR(30) NOT NULL,
panel_version VARCHAR(10) NOT NULL,
checkid INT(1) NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Data Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_logs(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
username VARCHAR(30) NOT NULL,
date VARCHAR(30) NOT NULL,
ipaddr VARCHAR(15) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Logs Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_news(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
poster VARCHAR(30) NOT NULL,
ip VARCHAR(20) NOT NULL,
date VARCHAR(20) NOT NULL,
title VARCHAR(50) NOT NULL,
article TEXT NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>News Tables Successfully Created!</center><p>";
?>

<?php
$query = "CREATE TABLE IF NOT EXISTS rp_pm(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
fromdj VARCHAR(30) NOT NULL,
todj VARCHAR(30) NOT NULL,
date VARCHAR(30) NOT NULL,
subject VARCHAR(20) NOT NULL,
message TEXT NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>PM Tables Successfully Created!</center><p>";
?>

<?php
$query = "CREATE TABLE IF NOT EXISTS rp_songs(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
title VARCHAR(50) NOT NULL,
artist VARCHAR(50) NOT NULL,
reason VARCHAR(100) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Songs Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_request(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
request VARCHAR(200) NOT NULL,
ipaddr VARCHAR(20) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Request Tables Successfully Created!</center><p>";
?>

<?php
$query = "CREATE TABLE IF NOT EXISTS rp_timetable(
`day` VARCHAR(30) NULL ,
`1` VARCHAR(30) NULL ,
`2` VARCHAR(30) NULL ,
`3` VARCHAR(30) NULL ,
`4` VARCHAR(30) NULL ,
`5` VARCHAR(30) NULL ,
`6` VARCHAR(30) NULL ,
`7` VARCHAR(30) NULL ,
`8` VARCHAR(30) NULL ,
`9` VARCHAR(30) NULL ,
`10` VARCHAR(30) NULL ,
`11` VARCHAR(30) NULL ,
`12` VARCHAR(30) NULL ,
`13` VARCHAR(30) NULL ,
`14` VARCHAR(30) NULL ,
`15` VARCHAR(30) NULL ,
`16` VARCHAR(30) NULL ,
`17` VARCHAR(30) NULL ,
`18` VARCHAR(30) NULL ,
`19` VARCHAR(30) NULL ,
`20` VARCHAR(30) NULL ,
`21` VARCHAR(30) NULL ,
`22` VARCHAR(30) NULL ,
`23` VARCHAR(30) NULL ,
`24` VARCHAR(30) NULL)";
mysql_query($query) or die(mysql_error()." at row ".__LINE__);
$query = "INSERT INTO `rp_timetable` (`day`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`) VALUES ('Monday','','','','','','','','','','','','','','','','','','','','','','','',''), ('Tuesday','','','','','','','','','','','','','','','','','','','','','','','',''),  ('Wednesday','','','','','','','','','','','','','','','','','','','','','','','',''), ('Thursday','','','','','','','','','','','','','','','','','','','','','','','',''), ('Friday','','','','','','','','','','','','','','','','','','','','','','','',''), ('Saturday','','','','','','','','','','','','','','','','','','','','','','','',''), ('Sunday','','','','','','','','','','','','','','','','','','','','','','','','')";
mysql_query($query) or die(mysql_error()." at row ".__LINE__);
echo "<center>Timetable Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_users(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
djname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
passwrd VARCHAR(100) NOT NULL,
email VARCHAR(50) NOT NULL,
rank VARCHAR (20) NOT NULL,
favsong VARCHAR(50) NULL,
favband VARCHAR(50) NULL,
favfood VARCHAR(50) NULL,
petpeeves VARCHAR(50) NULL,
sayings VARCHAR(70) NULL,
aboutyou VARCHAR(500) NULL,
avatar TEXT NULL,
online VARCHAR(3) NULL,
notes VARCHAR(500) NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>User Tables Successfully Created!</center><p>";
?>

<?php 
$query = "CREATE TABLE IF NOT EXISTS rp_usrlogs(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
username VARCHAR(30) NOT NULL,
date VARCHAR(30) NOT NULL,
ipaddr VARCHAR(15) NOT NULL,
result VARCHAR(20) NOT NULL)";
$result = mysql_query($query) or die(mysql_error());
echo "<center>Login Tables Successfully Created!</center><p>";
?>