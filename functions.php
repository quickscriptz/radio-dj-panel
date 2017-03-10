<?php

###################################
# Copyright Notice
###################################
# All script, code, and any form of programming
# contained in the Radio DJ Panel script distributed
# by QuickScriptz or any of it's affiliates is
# owned an copyrighted to QuickScriptz. You
# may not modify any of the code and then
# use/claim it as your own.
###################################
# Just A Friendly Reminder  :)
###################################


##############################
# Set The Default Timezone
##############################
# To Change Refer To: 
# http://www.modwest.com/help/kb5-258.html
# http://php.net/manual/en/timezones.php
#
# Uncomment one of the two lines starting with "//"
##############################
# Not supported by all servers
// putenv("TZ=America/Montreal");

# Requires PHP 5+
// date_default_timezone_set("EST");



##############################
# Encryption Stuff
##############################
function encryptor($string)
{
    $string = strrev($string);
    $string2 = md5(sha1($string));
    $string3 = strrev(crc32(strlen($string2)));
    $string4 = crypt($string2, $string3);
    $string5 = sha1(md5(base64_encode(string3)));
    $final = md5(strrev(base64_encode(sha1(crypt($string8, $string4)))));
    return $final;
}

function encrypt($string)
{
    $string = strrev($string);
    $string2 = md5(sha1($string));
    $string3 = crypt($string2, $string2);
    $string4 = base64_encode(sha1(md5($string3)));
    $string5 = crc32(strrev($string4));
    $string6 = sha1(md5($string5));
    $string7 = strlen(crypt($string5, $string2));  
    $string8 = encryptor($string7);
    $final = strrev(md5(sha1(base64_encode(crypt($string8, $string4)))));
    return $final;
}

function enc($string)
{
    $string = strrev($string);
    $string2 = md5(sha1($string));
    $string3 = crypt($string2, $string2);
    $string4 = base64_encode(sha1(md5($string3)));
    $string5 = crc32(strrev($string4));
    $string6 = sha1(md5($string5));
    $string7 = strlen(crypt($string5, $string2));  
    $string8 = encryptor($string7);
    $final = strrev(md5(sha1(base64_encode(crypt($string8, $string4)))));
    return $final;
}

##############################
# Resize Oversized Profile Images
##############################
function imageResize($width, $height, $target) { 
if ($width > $height) { 
$percentage = ($target / $width); 
} else { 
$percentage = ($target / $height); 
} 
$width = round($width * $percentage); 
$height = round($height * $percentage); 
return "width=\"$width\" height=\"$height\""; 
} 

##############################
# Bad Word Filter
##############################
# Not for your children or people with IQ's
# lower than 50 :P
##############################
function language_filter($string) {
  $obscenities = array(
      "fuck",
      "fucker",
      "bitch",
      "cock",
      "nigger",
      "pussy",
      "asshole",
      "bastard",
      "cunt",
      "shit",
      "bullshit",
      "whore"
      );
    foreach ($obscenities as $curse_word) {
        if (stristr(trim($string),$curse_word)) {
            $length = strlen($curse_word);
            for ($i = 1; $i <= $length; $i++) {
                $stars .= "****";
            }
            $string = preg_replace($curse_word,$stars,trim($string));
            $stars = "";
        }
    }
    return $string;
}

##############################
# Checkid
##############################

function make_checkid(){
	// Get preliminary info
	$name = $_SERVER['SERVER_NAME'];
	$ip = $_SERVER['SERVER_ADDR'];
	$prot = $_SERVER['SERVER_SOFTWARE'];
	$int = $_SERVER['GATEWAY_INTERFACE'];
	$getadmin = mysql_query("SELECT * FROM rp_users WHERE id = '1'");
	while($row = mysql_fetch_array($getadmin)){$username = $row['username'];}
	// Replacement stuff
	$finds = array('a', 'e', 'i', 'o', 'u', 'd', 's', '1', '7', '8', '3');
	$found = array('p', 'E', 'l', 'g', 'z', 'w', 'r', '9', '2', '5', '4');
	// Work it out
	$pre = $name.$ip.$prot.$int.$username;
	$pre = crypt($pre, $name).strrev($pre).crypt($pre, $ip);
	$pre = str_replace($finds, $found, $pre);
	$pre = base64_encode($pre.crypt($pre, $username));
	$pre = ereg_replace("[^A-Za-z0-9]", "", $pre);
	return $pre;
}
?>