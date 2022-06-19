<?php  
 
header('content-type: image/jpeg');

    $img = imagecreatefromjpeg($_GET['image']);
    $wtrmrk_file = "logos/logo2.png";
    $img_w = imagesx($img);
    $img_h = imagesy($img);
    $dst_x = ($img_w / 1.3); // 1.5 set position of logo
    $dst_y = ($img_h / 100); // 1.5 setting position of logo
    $set_raw_width  = ($img_w / 5);
   
    $watermark_new = resize_image($wtrmrk_file, $set_raw_width);
    $new_wm_w = imagesx($watermark_new);
    $new_wm_h = imagesy($watermark_new);
    $size_x = ($img_w / 25) ; 
    imagecopy($img, $watermark_new, $dst_x, $dst_y, 0, 0, $new_wm_w , $new_wm_h);
    imagejpeg($img);  
    imagedestroy($img);
    imagedestroy($watermark_new);



function resize_image($file, $w) {
    list($width, $height) = getimagesize($file);
    $src = imagecreatefrompng($file);
    $dst = imagecreatetruecolor($w, $w);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $w, $width, $height);
    imagepng($dst,"dfdf.png");
    return $dst;
}
 
?>