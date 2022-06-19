<?php
include_once '../../script/database.php';
// Getting User IP and storing it in "ip_address_raw" cookie .
if(!isset($_COOKIE['ip_address_raw'])){
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
setcookie("ip_address_raw", $ipaddress, strtotime('+15 days'), "/", "", "", TRUE);
}

//Checking if IP cookie is set or not, and if not set than setting it.
if(!isset($_COOKIE['ip_addr_test1']) && isset($_COOKIE['ip_address_raw'])){
    
$ip_raw = $_COOKIE['ip_address_raw'];
//Saving IP in integer value for easy handling
$ip = ip2long($ip_raw);
//Checking if IP is set in "site_users".
$query = mysqli_query($db_login,"SELECT ip FROM site_users WHERE ip ='".$ip."'");
//Checking if IP is set in "verified_users".
$query_vu = mysqli_query($db_login,"SELECT ip FROM verified_users WHERE ip ='".$ip."'");
//if IP is verified than setting cookie "VERIFIED".
if (mysqli_num_rows($query_vu) != 0 )
    {
        setcookie("ip_verified",$ip,strtotime('+30 days'), "/", "", "", TRUE);
        setcookie("ip_addr_test1","ip_addr_test1",strtotime('+15 days'), "/", "", "", TRUE);
    }
//If ip exist than creating cookie so this code wont run again.
elseif(mysqli_num_rows($query) != 0 || mysqli_num_rows($query_vu) != 0 )
    {
        setcookie("ip_addr_test1","ip_addr_test1",strtotime('+15 days'), "/", "", "", TRUE);
    }
//If ip is neither in "site_users" nor in "verified_users", than creating a row in site_users.
  else
    {
    //Setting india Time Zone cause server TZ is different.
    date_default_timezone_set('Asia/Kolkata');
    //Current Time
    $cur_date = date("d-m-Y");
    $ip_data = "INSERT INTO site_users (ip, date) VALUES ('$ip','$cur_date')";
    $result    = mysqli_query($db_login, $ip_data);
    }
}
//Adding 10 point to IP if user come after 3 hours.
if(!isset($_COOKIE['ip_count_test2'])  && !isset($_COOKIE['ip_verified'])  && isset($_COOKIE['ip_address_raw'])){
    $ip_raw = $_COOKIE['ip_address_raw'];
    $ip = sprintf('%u', ip2long($ip_raw));
    if($ip != 0){
        $query = mysqli_query($db_login,"UPDATE `site_users` SET `count` = (`count` + 10) WHERE ip ='".$ip."'");
        if ($query)
        {
                setcookie("ip_count_test2","ip_count_test2",strtotime('+3 hours'), "/", "", "", TRUE);
        }
            else{
                echo mysqli_error($db_login);
            }
    }
}
//If user is verified and he uses site from dff data carrier/IP than storing current IP as verified.

if(isset($_COOKIE['ip_verified']) && isset($_COOKIE['ip_address_raw'])){
$ip_raw = $_COOKIE['ip_address_raw'];
$ip = ip2long($ip_raw);
if($ip != $_COOKIE['ip_verified']){
    $ip_data = "INSERT INTO verified_users (ip) VALUES ('$ip')";
    $result    = mysqli_query($db_login, $ip_data);
}}
?>