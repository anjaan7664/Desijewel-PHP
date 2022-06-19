<?php
include '../../../script/database.php';
$table_of_image = $_POST['table'] ;
$user_of_image = $_POST['user'] ;
$current_image = $_POST['image'] ;
$admin_updater = $_POST['admin'] ;
if(is_numeric($user_of_image)){
$sql ="UPDATE `$table_of_image` SET `user` = '$user_of_image' , `comment` =CONCAT_WS('','$admin_updater - $user_of_image , ',comment) WHERE `$table_of_image`.`image` = '$current_image'";
if (mysqli_query($db, $sql)) {
} else {
   echo "Error updating record: " . mysqli_error($db);
}}
else{
$sql_user_sn = "SELECT sn FROM members WHERE username = '$user_of_image' ";
$query_user_sn = mysqli_query($db_login, $sql_user_sn);
while ($row = mysqli_fetch_array($query_user_sn, MYSQLI_ASSOC)) {
      $user_of_image_2     = $row['sn']; }
$sql_user_update ="UPDATE `$table_of_image` SET `user` = '$user_of_image_2' , `comment` =CONCAT_WS('','$admin_updater - $user_of_image_2 , ',comment) WHERE `$table_of_image`.`image` = '$current_image'";
if (mysqli_query($db, $sql_user_update)) {
      echo $user_of_image_2;
} else{
}}
?>