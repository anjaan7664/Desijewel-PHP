<?php


    $ad_url = "https://desijewel.in/logos/update.jpg";
    $ad_desc = "app अपडेट करे";
    $ad_number = "";
    $ad_map = "";
    $ad_name = "";
$image = "https://desijewel.in/logos/update.jpg";
$weight = "app अपडेट करे";
$thumb_path= "";
$img= "";
$img_tag = "";
$hit = "";
$date = "";
      $post_data_array[] =
        array(
          'image' => $image,
          'weight' => $weight,
          'thumb' => $thumb_path,
          'image_title' => $img,
          'tag' => $img_tag,
          'hit' => $hit,
          'date' => $date
        
    );



$advertiser_array = array(
        'ad_url' => $ad_url,
        'ad_desc' => $ad_desc,
        'ad_number' => $ad_number,
        'ad_name' => $ad_name,
        'ad_map' => $ad_map
                  );

$post_data = json_encode(array(
    'images' => $post_data_array,
    'advertiser' => $advertiser_array
));
//sleep(2);
echo $post_data;

//$myfile = fopen("test.txt", "a") or die("Unable to open file!");
//fwrite($myfile,$rawSql);
//fclose($myfile);
