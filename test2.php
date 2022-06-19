<?php
include '../script/database.php';
    $number = 0; 
    $sql = "SELECT * FROM kundan_aad";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       $image_path   = $row['path'];
	    $image = $row['image'];
       $sql_delete =  "UPDATE kundan_aad SET `id` = '$number' , WHERE `image` = $image";
                     $result_delete    = mysqli_query($db, $sql_delete);
                     if($result_delete){
								echo "success" ;}else{
                        mysqli_error($db);
        }
		  $number++;
    }
	

?>