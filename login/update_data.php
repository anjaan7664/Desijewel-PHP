<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ;
include '../../script/database.php';
if(empty($_POST) === false){
  $f_name = trim($_POST['firstname']);
  $f_name = strip_tags($f_name);
  $f_name = htmlspecialchars($f_name);
  
  $s_name = trim($_POST['lastname']);
  $s_name = strip_tags($s_name);
  $s_name = htmlspecialchars($s_name);
  
  $shop = trim($_POST['shop']);
  $shop = strip_tags($shop);
  $shop = htmlspecialchars($shop);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $number = trim($_POST['number']);
  $number = strip_tags($number);
  $number = htmlspecialchars($number);
  
  $addr = trim($_POST['address']);
  $addr = strip_tags($addr);
  $addr = htmlspecialchars($addr);
  
  $desc = trim($_POST['desc']);
  $desc = strip_tags($desc);
  $desc = htmlspecialchars($desc);
  
  
  $session_user_pass = mysqli_real_escape_string($db_login,$_COOKIE["password"]);
  $session_user_id  = mysqli_real_escape_string($db_login,$_COOKIE["username"]);
 $sql = mysqli_query($db_login,"UPDATE members 
         SET f_name = '".mysqli_real_escape_string($db_login,$f_name)."', 
         s_name = '".mysqli_real_escape_string($db_login,$s_name)."', 
         shop = '".mysqli_real_escape_string($db_login,$shop)."', 
         email = '".mysqli_real_escape_string($db_login,$email)."', 
         u_desc  = '".mysqli_real_escape_string($db_login,$desc)."',
         number = '".mysqli_real_escape_string($db_login,$number)."', 
         address = '".mysqli_real_escape_string($db_login,$addr)."'
         WHERE (username ='$session_user_id') AND (password ='$session_user_pass')");}
 
 if($sql){
   header("location:../user.php");
 }
?>

