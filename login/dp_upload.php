<?php
include '../../script/database.php';
if (isset($_POST['submit_dp']) ) {
if (isset($_FILES['upload']))
{
  $errors        = '';
  $imgFile = $_FILES['upload']['name'];
  $tmp_dir = $_FILES['upload']['tmp_name'];
  $imgSize = $_FILES['upload']['size'];
  $upload_dir = 'profile/';
  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));  
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
  $userpic = rand(1000,1000000).time().".".$imgExt;
  $uploadOk      = 1;
  $target_file   = $upload_dir . basename($_FILES["upload"]["name"]);
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  
  if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if ($check !== false) {

            $uploadOk = 1;
        } else {
            $errors .= "File is not an image.";
            $uploadOk = 0;
        }
    }
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
   if ($_FILES["upload"]["size"] > 5242880) {
        $errors .= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    } else {

    if( move_uploaded_file($tmp_dir,$upload_dir.$userpic)){
     
             $session_user_pass = mysqli_real_escape_string($db_login,$_COOKIE["password"]);
             $session_user_id  = mysqli_real_escape_string($db_login,$_COOKIE["username"]);
            include "init.php";
            $form_data = "UPDATE members SET profile = '$userpic'
             WHERE (username ='$session_user_id') AND (password ='$session_user_pass')";
            $result    = mysqli_query($db_login, $form_data);
            if($result){ }
            else{
                echo "Error";
            echo mysqli_error($db_login);}
            header('Location: ../user.php');
         }
    } }}
?>