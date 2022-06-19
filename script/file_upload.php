<?php
include '../../script/database.php';
include_once "../login/init.php";
    
    $file_name = $_FILES['images']['name'];
    $weight  = $_POST['weight'];
    $file_size =$_FILES['images']['size'];
    $file_tmp =$_FILES['images']['tmp_name'];
    $file_type=$_FILES['images']['type'];
    $errors        = '';
  $imgFile = $_FILES['images']['name'];
  $tmp_dir = $_FILES['images']['tmp_name'];
  $imgSize = $_FILES['images']['size'];
  $upload_dir = '../uploads/';
  
  date_default_timezone_set('Asia/Kolkata');
  $cur_date = date("d-m-Y");
  $upload_dir_user = "../uploads_user/$user_dir/";
  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));  
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
  $userpic = time().rand(1000,1000000).".".$imgExt;
  $uploadOk      = 1;
  $target_file   = $upload_dir . basename($file_name);
  $target_file_user   = $upload_dir_user . basename($file_name);  
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
  if ($imgSize > 5242880) {
        $errors .= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    } else {

    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
            
            if(move_uploaded_file($tmp_dir,$upload_dir.$userpic)){
                $first_dir = $upload_dir.$userpic ;
                copy($first_dir , $upload_dir_user.$userpic);
                
                $form_data_user = "INSERT INTO $table_user (image ,weight, date)
            VALUES ('$userpic','$weight','$cur_date')";
            $result_user    = mysqli_query($db_user, $form_data_user);
            if($result_user){ }
            else{
            echo mysqli_error($db_user);}
    
            $form_data = "INSERT INTO image_table (image,user,weight, date)
            VALUES ('$userpic','$sn','$weight','$cur_date')";
            $result    = mysqli_query($db, $form_data);
            if($result){
                echo "success" ;
            }
            else{
            echo mysqli_error($db);
            }
             }
            else{
                echo "error";
            }
            
            
        
           }
            
            
    else{
            if(move_uploaded_file($tmp_dir,$upload_dir.$userpic)){
        
            $form_data = "INSERT INTO image_table (image ,weight, date)
            VALUES ('$userpic',$weight,'$cur_date')";
            $result    = mysqli_query($db, $form_data);
            if($result){
                
            }
            else{
            echo mysqli_error($db);}
        
           }}
    } 

?>