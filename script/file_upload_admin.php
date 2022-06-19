<?php

include '../../script/database.php';
mysqli_set_charset($db, 'utf8');
include_once "../login/init.php";
    $file_name = $_FILES['images']['name'];
    $weight  = "";//$_POST['weight'];
    $table_input = $_POST['table'];
    $table_input_sub_cat_get = $_POST['sub_cat'];
    $file_size =$_FILES['images']['size'];
    $file_tmp =$_FILES['images']['tmp_name'];
    $file_type=$_FILES['images']['type'];
  $errors        = '';
  $imgFile = $_FILES['images']['name'];
  $tmp_dir = $_FILES['images']['tmp_name'];
  $imgSize = $_FILES['images']['size'];
$imgLikes = '';
  $imgTag = '';
  $imgAlt = '';
  $imgAltHN = '';
  $upload_dir = '../uploads/';
  if (isset($_POST['likes'])) {
      $imgLikes = $_POST['likes'];
      if (empty($imgLikes)) {
          $imgLikes = '101';
      }
  }
  if (isset($_POST['tag'])) {
      $imgTag = $_POST['tag'] ;
  }
  date_default_timezone_set('Asia/Kolkata');
  $cur_date = date("d-m-Y");
  $upload_dir_user = "uploads_user/$user_dir/";
  $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
  $userpic = time().rand(1000, 1000000).".".$imgExt;
  $uploadOk      = 1;
  $target_file   = $upload_dir . basename($file_name);
  $target_file_user   = $upload_dir_user . basename($file_name);
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


  if ($table_input === "" || $table_input >= "100") {
      $table_input = "39";
  }

  switch ($table_input) {
       case '01':$upload_dir = 'aad/'; $table_input_admin = "aad" ; $imgAlt = 'Rajasthani Desi gold Gala-Aad'; $imgAltHN = 'राजस्थानी देसी गोल्ड गले की आड़'; break;
       case '02':$upload_dir = 'aawla/'; $table_input_admin = "aawla" ; $imgAlt = 'Rajasthani gold desi Aawla/Bangles'; $imgAltHN = 'राजस्थानी देसी गोल्ड आंवला/बेन्गल्स/चूड़िया';  break;
       case '03':$upload_dir = 'baajubandh/'; $table_input_admin = "baajubandh" ; $imgAlt = 'Rajasthani Desi gold hath-baajubandh'; $imgAltHN = 'राजस्थानी देसी गोल्ड हाथ बाजुबंध';  break;
       case '04':$upload_dir = 'baali/'; $table_input_admin = "baali" ; $imgAlt = 'Rajasthani Desi gold Baali'; $imgAltHN = 'राजस्थानी देसी गोल्ड बाली'; break;
       case '05':$upload_dir = 'bala/'; $table_input_admin = "bala" ; $imgAlt = 'Rajasthani Desi gold Bala/Kaan-pata'; $imgAltHN = 'राजस्थानी देसी गोल्ड बाला/कानपता'; break;
       case '06':$upload_dir = 'bala_jhela/'; $table_input_admin = "bala_jhela" ; $imgAlt = 'Rajasthani Desi gold Bala/kaan-pata/jhela'; $imgAltHN = 'राजस्थानी देसी गोल्ड बाला/कानपता/झेला'; break;
       case '07':$upload_dir = 'bangles/'; $table_input_admin = "bangles" ; $imgAlt = 'Rajasthani desi fancy gold Bangles'; $imgAltHN = 'राजस्थानी देसी गोल्ड बेन्गल्स/चूड़िया'; break;
       case '08':$upload_dir = 'bena/'; $table_input_admin = "bena" ; $imgAlt = 'Rajasthani desi gold rakhdi set teeka'; $imgAltHN = 'राजस्थानी देसी गोल्ड रखडी सेट बेना/टीका'; break;
       case '09':$upload_dir = 'Bhujbandh/'; $table_input_admin = "bhujbandh" ; $imgAlt = 'Rajasthani Desi gold Bhujbandh'; $imgAltHN = 'राजस्थानी देसी गोल्ड भुजबंध'; break;
       case '10':$upload_dir = 'bor/'; $table_input_admin = "bor" ; $imgAlt = 'Rajasthani desi gold rakhdi set bor'; $imgAltHN = 'राजस्थानी देसी गोल्ड रखडी सेट बोर'; break;
       case '11':$upload_dir = 'bracelate/'; $table_input_admin = "bracelate" ; $imgAlt = 'Rajasthani desi gold hand gents bracelet'; $imgAltHN = 'राजस्थानी देसी गोल्ड हाथ जेंट्स ब्रेसलेट'; break;
       case '12':$upload_dir = 'chain/'; $table_input_admin = "chain" ; $imgAlt = 'Rajasthani desi gold gala-chain'; $imgAltHN = 'राजस्थानी देसी गोल्ड गले की चैन'; break;
       case '13':$upload_dir = 'chick/'; $table_input_admin = "chick" ; $imgAlt = 'Rajasthani desi gold gala chick'; $imgAltHN = 'राजस्थानी देसी गोल्ड गला चिक सेट'; break;
       case '14':$upload_dir = 'desi_aad/'; $table_input_admin = "desi_aad" ; $imgAlt = 'Rajasthani desi gold rajputi aad'; $imgAltHN = 'राजस्थानी देसी गोल्ड राजपूती आड़'; break;
       case '15':$upload_dir = 'fancy_ring/'; $table_input_admin = "fancy_ring" ; $imgAlt = 'Rajasthani Jewellery Fancy Ring Design  in Jodhpur'; $imgAltHN = ''; break;
       case '16':$upload_dir = 'gents_ring/'; $table_input_admin = "gents_ring" ; $imgAlt = 'Rajasthani Desi gold Gents-Ring'; $imgAltHN = 'राजस्थानी देसी गोल्ड जेंट्स-रिंग/आदमी-अंगूठी'; break;
       case '17':$upload_dir = 'hathphool/'; $table_input_admin = "hathphool" ; $imgAlt = 'Rajasthani Desi gold hathphol'; $imgAltHN = 'राजस्थानी देसी गोल्ड हथफूल'; break;
       case '18':$upload_dir = 'jhoomariya/'; $table_input_admin = "jhoomariya" ; $imgAlt = 'Rajasthani Desi gold kundan kaan-jhoomariya'; $imgAltHN = 'राजस्थानी देसी गोल्ड कान-झूमरिया'; break;
       case '19':$upload_dir = 'jodha_haar/'; $table_input_admin = "jodha_haar" ; $imgAlt = 'Rajasthani Desi gold Jodha-Haar'; $imgAltHN = 'राजस्थानी देसी गोल्ड जोधा-हार'; break;
       case '20':$upload_dir = 'kandora/'; $table_input_admin = "kandora" ; $imgAlt = 'Rajasthani Desi gold Kandora/Kamarbandh'; $imgAltHN = 'राजस्थानी देसी गोल्ड  कंदोरा/कमरबंध'; break;
       case '21':$upload_dir = 'kanti/'; $table_input_admin = "kanti" ; $imgAlt = 'Rajasthani Desi gold gala-Kanthi'; $imgAltHN = 'राजस्थानी देसी गोल्ड गला-कंटी'; break;
       case '22':$upload_dir = 'ladies_ring/'; $table_input_admin = "ladies_ring" ; $imgAlt = 'Rajasthani fancy gold Ladies-Ring'; $imgAltHN = 'राजस्थानी फैंसी गोल्ड लेडीज-रिंग/अंगूठी'; break;
       case '23':$upload_dir = 'mangalsutra/'; $table_input_admin = "mangalsutra" ; $imgAlt = 'Rajasthani fancy gold Mangalsutra'; $imgAltHN = 'राजस्थानी फैंसी गोल्ड मंगलसूत्र'; break;
       case '24':$upload_dir = 'mini_aad/'; $table_input_admin = "mini_aad" ; $imgAlt = 'Rajasthani Desi gold Mini Gala-Aad'; $imgAltHN = 'राजस्थानी देसी गोल्ड गले की मिनी-आड़'; break;
       case '25':$upload_dir = 'nath/'; $table_input_admin = "nath" ; $imgAlt = 'Rajasthani Desi gold naak-Nath'; $imgAltHN = 'राजस्थानी देसी गोल्ड नाक-नथ'; break;
       case '26':$upload_dir = 'necklace/'; $table_input_admin = "necklace" ; $imgAlt = 'Rajasthani fancy gold Necklace'; $imgAltHN = 'राजस्थानी फैंसी गोल्ड नेकलेस'; break;
       case '27':$upload_dir = 'nogariya/'; $table_input_admin = "nogariya" ; $imgAlt = 'Rajasthani Desi gold Hath-Punach'; $imgAltHN = 'राजस्थानी देसी गोल्ड हाथ-पुनछ'; break;
       case '28':$upload_dir = 'others/'; $table_input_admin = "others" ; $imgAlt = ''; $imgAltHN = ''; break;
       case '29':$upload_dir = 'pendal/'; $table_input_admin = "pendal" ; $imgAlt = 'Rajasthani Desi gold Gala-Pendal'; $imgAltHN = 'राजस्थानी देसी गोल्ड गला-पेंडल'; break;
       case '30':$upload_dir = 'punach/'; $table_input_admin = "punach" ; $imgAlt = 'Rajasthani Desi gold Hath-Punach'; $imgAltHN = 'राजस्थानी देसी गोल्ड हाथ-पुनछ'; break;
       case '31':$upload_dir = 'rakhdi/'; $table_input_admin = "rakhdi" ; $imgAlt = 'Rajasthani Desi gold Rakhdi'; $imgAltHN = 'राजस्थानी देसी गोल्ड रखडी'; break;
       case '32':$upload_dir = 'rakhdi_set/'; $table_input_admin = "rakhdi_set" ; $imgAlt = 'Rajasthani Desi gold Rakhdi-Set'; $imgAltHN = 'राजस्थानी देसी गोल्ड रखडी-सेट'; break;
       case '33':$upload_dir = 'ram_navmi/'; $table_input_admin = "ram_navmi" ; $imgAlt = 'Rajasthani Desi gold Ram-Navmi'; $imgAltHN = 'राजस्थानी देसी गोल्ड राम-नवमी'; break;
       case '34':$upload_dir = 'sheeshphool/'; $table_input_admin = "sheeshphool" ; $imgAlt = 'Rajasthani Desi gold Sheesh-phool'; $imgAltHN = 'राजस्थानी देसी गोल्ड शीशफूल'; break;
       case '35':$upload_dir = 'sohan_kanthi/'; $table_input_admin = "sohan_kanthi" ; $imgAlt = 'Rajasthani Desi gold Sohan/Mohan-Kanthi'; $imgAltHN = 'राजस्थानी देसी गोल्ड सोहन/मोहन-कंठी'; break;
       case '36':$upload_dir = 'teeka/'; $table_input_admin = "teeka" ; $imgAlt = 'Rajasthani Desi gold sar-teeka'; $imgAltHN = 'राजस्थानी देसी गोल्ड सर/माथा-टीका'; break;
       case '37':$upload_dir = 'thusi/'; $table_input_admin = "thusi" ; $imgAlt = 'Rajasthani Desi gold Thusi/Thoosi'; $imgAltHN = 'राजस्थानी देसी गोल्ड ठूसी'; break;
       case '38':$upload_dir = 'timaniya/'; $table_input_admin = "timaniya" ; $imgAlt = 'Rajasthani Desi gold Timaniya'; $imgAltHN = 'राजस्थानी देसी गोल्ड तिमणिया'; break;
       case '68':$upload_dir = 'silver_bangles/'; $table_input_admin = "silver_bangles" ; $imgAlt = 'Rajasthani Desi Silver Bangles'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी  बेन्गल्स/चूडिया'; break;
       case '69':$upload_dir = 'silver_bartan/'; $table_input_admin = "silver_bartan" ; $imgAlt = 'Rajasthani Desi Silver Bartan'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी बर्तन'; break;
       case '70':$upload_dir = 'silver_fancy_paayal/'; $table_input_admin = "silver_fancy_paayal" ; $imgAlt = 'Rajasthani Desi Silver Fancy-Paayal'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी  फैंसी-पायल'; break;
       case '71':$upload_dir = 'silver_half_kandora/'; $table_input_admin = "silver_half_kandora" ; $imgAlt = 'Rajasthani Desi Silver Half-Kandora'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी हाफ-कंदोरा'; break;
       case '72':$upload_dir = 'silver_idol/'; $table_input_admin = "silver_idol" ; $imgAlt = 'Rajasthani Desi Silver Murtiya'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी मुर्तिया'; break;
       case '73':$upload_dir = 'silver_kada/'; $table_input_admin = "silver_kada" ; $imgAlt = 'Rajasthani Desi Silver Hath-Kada'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी हाथ-कड़ा'; break;
       case '74':$upload_dir = 'silver_kandora/'; $table_input_admin = "silver_kandora" ; $imgAlt = 'Rajasthani Desi Silver Kandora/Kamarabandh'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी कंदोरा/कमरबंध'; break;
       case '75':$upload_dir = 'silver_others/'; $table_input_admin = "silver_others" ; $imgAlt = 'Rajasthani Desi Silver Others'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी अन्य'; break;
       case '76':$upload_dir = 'silver_paayal/'; $table_input_admin = "silver_paayal" ; $imgAlt = 'Rajasthani Desi Silver Paayal'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी पायल'; break;
       case '77':$upload_dir = 'silver_ring/'; $table_input_admin = "silver_ring" ; $imgAlt = 'Rajasthani Desi Silver Ring'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी रिंग/अंगूठी'; break;
       case '78':$upload_dir = 'silver_bracelate/'; $table_input_admin = "silver_bracelate" ; $imgAlt = 'Rajasthani Desi Silver Bracelet'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी  ब्रेसलेट'; break;
       case '79':$upload_dir = 'silver_chain/'; $table_input_admin = "silver_chain" ; $imgAlt = 'Rajasthani Desi Silver Chain'; $imgAltHN = 'राजस्थानी देसी सिल्वर/चांदी चैन'; break;
       case '80':$upload_dir = 'silver_un/'; $table_input_admin = "silver_un" ; $imgAlt = ''; $imgAltHN = ''; break;
       case '99':$upload_dir = 'test/'; $table_input_admin = "test" ; break;
}

         // Adding subCategory
switch ($table_input_sub_cat_get) {
   case '1':$table_input_sub_cat ='desi';break;
   case '2':$table_input_sub_cat ='emboss';break;
   case '3':$table_input_sub_cat ='kundan';break;
   default:$table_input_sub_cat ='desi';


}


  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      $errors .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  if ($imgSize > 5242880) {
      $errors .= "Sorry, your file is too large.";
      $uploadOk = 0;
  }
    if ($uploadOk == 0) {
        echo "Some Error.";
    } else {
        if (move_uploaded_file($tmp_dir, "../djp/".$upload_dir.$userpic)) {

               // Uploading raw image without DJ watermark
            if (!file_exists("../raw/".$upload_dir)) {
                mkdir("../raw/".$upload_dir, 0777, true);
            }

            copy("../djp/".$upload_dir.$userpic, "../raw/".$upload_dir.$userpic);
            // Watermarking an image
            $file_watermarked = "../djp/".$upload_dir.$userpic ;
            $watermark = '../logos/dj_logo.png' ;

            watermark_image($file_watermarked, $watermark, $file_watermarked);
            $form_data = "INSERT INTO designs (category, image, weight, path, sub_category, date, hit, tag, alt, alt_hn)
            VALUES ('$table_input_admin','$userpic','$weight','$upload_dir','$table_input_sub_cat','$cur_date', '$imgLikes', '$imgTag', '$imgAlt', '$imgAltHN')";
            $result    = mysqli_query($db, $form_data);
            $upload_admin = $_COOKIE["username"];


            $form_data_new = "INSERT INTO designs (category, image ,weight ,path ,admin ,sub_category, date, hit, tag)
            VALUES ('new_photos', '$userpic','$weight','$upload_dir','$upload_admin','$table_input_sub_cat','$cur_date', '$imgLikes', '$imgTag')";
            $result_new    = mysqli_query($db, $form_data_new);

            if ($result) {
                echo "Upload Success.  ";
                $image = "../djp/" . $upload_dir . $userpic;
                $path  = '../images/thumb/'.$upload_dir. $userpic;
                make_thumb($image, $path, 500);
            } else {
                echo mysqli_error($db);
            }
        }
    }

function watermark_image($target, $wtrmrk_file, $newcopy)
{
    $img = imagecreatefromjpeg($target);
    $img_w = imagesx($img);
    $img_h = imagesy($img);
    $dst_x = ($img_w / 20);
    $dst_y = ($img_h / 1.15);
    $set_raw_width  = ($img_w / 14);
    $set_raw_height = ($img_h / 14);
    if ($set_raw_height > $set_raw_width) {
        $set_raw_width = $set_raw_height;
    }
    $watermark_new = resize_image($wtrmrk_file, $set_raw_width);
    $new_wm_w = imagesx($watermark_new);
    $new_wm_h = imagesy($watermark_new);
    $size_x = ($img_w / 25) ;
    imagecopy($img, $watermark_new, $dst_x, $dst_y, 0, 0, $new_wm_w, $new_wm_h);
    imagejpeg($img, $newcopy, 100);
    imagedestroy($img);
    imagedestroy($watermark_new);
}

function resize_image($file, $w)
{
    list($width, $height) = getimagesize($file);
    $src = imagecreatefrompng($file);
    $dst = imagecreatetruecolor($w, $w);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $w, $width, $height);
    imagepng($dst, "../logos/logo2.png");
    return $dst;
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
