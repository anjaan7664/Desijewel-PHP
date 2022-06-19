<?php
include '../script/database.php';

        $sql_getting_data   = "select * from designs WHERE (dp='1')";
        $query_getting_data = mysqli_query($db, $sql_getting_data);


        while ($row = mysqli_fetch_array($query_getting_data, MYSQLI_ASSOC)) {
            $image_path = $row['path'];
            $id = $row['id'];
            $img     = $row['image'];
            $image = "djp/" . $image_path . $row['image'];

            $path  = 'images/thumb/'.$image_path. $img;

            if (!file_exists('images/thumb/'.$image_path)) {
                mkdir('images/thumb/'.$image_path, 0777, true);
                echo "directory - images/thumb/".$image_path." created";
            }
            if (!file_exists('images/thumb/'.$image_path.$img)) {
                $thumb = make_thumb($image, $path, 500);
                echo $id."\n";
            }
        }

 function make_thumb($src, $dest, $desired_width)
 {
     if (file_exists($src)) {
         $source_image = imagecreatefromjpeg($src);
         $width        = imagesx($source_image);
         $height       = imagesy($source_image);

         $desired_height = floor($height * ($desired_width / $width));
         $virtual_image = imagecreatetruecolor($desired_width, $desired_height);


         imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

         imagejpeg($virtual_image, $dest);
         echo "Thumb also created.";
     }
 }
