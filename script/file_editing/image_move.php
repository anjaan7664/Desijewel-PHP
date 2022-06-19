<?php
include '../../../script/database.php';

if (isset($_POST['table_number'])) {
    $image_moving_from = $_POST['table'] ;
    $current_image = $_POST['image'] ;
    $current_path = $_POST['path'] ;
    $image_moving_to = $_POST['table_number'] ;
    $image_current_weight = $_POST['weight'] ;
    $user_id_num = $_POST['user'] ;
    $image_tag = $_POST['tag'] ;
    $image_likes = $_POST['likes'] ;
    $id_image = $_POST['id_image'] ;
    $admin_updater = $_POST['admin'] ;
    $sub_category_table = $_POST['sub_category'] ;

    switch ($image_moving_to) {
       case '01':$upload_dir = 'aad/'; $table_input_admin = "aad" ;break;
       case '02':$upload_dir = 'aawla/'; $table_input_admin = "aawla" ;break;
       case '03':$upload_dir = 'baajubandh/'; $table_input_admin = "baajubandh" ;break;
       case '04':$upload_dir = 'baali/'; $table_input_admin = "baali" ; break;
       case '05':$upload_dir = 'bala/'; $table_input_admin = "bala" ; break;
       case '06':$upload_dir = 'bala_jhela/'; $table_input_admin = "bala_jhela" ; break;
       case '07':$upload_dir = 'bangles/'; $table_input_admin = "bangles" ; break;
       case '08':$upload_dir = 'bena/'; $table_input_admin = "bena" ; break;
       case '09':$upload_dir = 'Bhujbandh/'; $table_input_admin = "bhujbandh" ;break;
       case '10':$upload_dir = 'bor/'; $table_input_admin = "bor" ; break;
       case '11':$upload_dir = 'bracelate/'; $table_input_admin = "bracelate" ;break;
       case '12':$upload_dir = 'chain/'; $table_input_admin = "chain" ; break;
       case '13':$upload_dir = 'chick/'; $table_input_admin = "chick" ;break;
       case '14':$upload_dir = 'desi_aad/'; $table_input_admin = "desi_aad" ; break;
       case '15':$upload_dir = 'fancy_ring/'; $table_input_admin = "fancy_ring" ; break;
       case '16':$upload_dir = 'gents_ring/'; $table_input_admin = "gents_ring" ; break;
       case '17':$upload_dir = 'hathphool/'; $table_input_admin = "hathphool" ;break;
       case '18':$upload_dir = 'jhoomariya/'; $table_input_admin = "jhoomariya" ;break;
       case '19':$upload_dir = 'jodha_haar/'; $table_input_admin = "jodha_haar" ;break;
       case '20':$upload_dir = 'kandora/'; $table_input_admin = "kandora" ;break;
       case '21':$upload_dir = 'kanti/'; $table_input_admin = "kanti" ; break;
       case '22':$upload_dir = 'ladies_ring/'; $table_input_admin = "ladies_ring" ; break;
       case '23':$upload_dir = 'mangalsutra/'; $table_input_admin = "mangalsutra" ;break;
       case '24':$upload_dir = 'mini_aad/'; $table_input_admin = "mini_aad" ;break;
       case '25':$upload_dir = 'nath/'; $table_input_admin = "nath" ; break;
       case '26':$upload_dir = 'necklace/'; $table_input_admin = "necklace" ; break;
       case '27':$upload_dir = 'nogariya/'; $table_input_admin = "nogariya" ;break;
       case '28':$upload_dir = 'others/'; $table_input_admin = "others" ;break;
       case '29':$upload_dir = 'pendal/'; $table_input_admin = "pendal" ;break;
       case '30':$upload_dir = 'punach/'; $table_input_admin = "punach" ;break;
       case '31':$upload_dir = 'rakhdi/'; $table_input_admin = "rakhdi" ; break;
       case '32':$upload_dir = 'rakhdi_set/'; $table_input_admin = "rakhdi_set" ;break;
       case '33':$upload_dir = 'ram_navmi/'; $table_input_admin = "ram_navmi" ;break;
       case '34':$upload_dir = 'sheeshphool/'; $table_input_admin = "sheeshphool" ; break;
       case '35':$upload_dir = 'sohan_kanthi/'; $table_input_admin = "sohan_kanthi" ;break;
       case '36':$upload_dir = 'teeka/'; $table_input_admin = "teeka" ; break;
       case '37':$upload_dir = 'thusi/'; $table_input_admin = "thusi" ;break;
       case '38':$upload_dir = 'timaniya/'; $table_input_admin = "timaniya" ;break;
       case '68':$upload_dir = 'silver_bangles/'; $table_input_admin = "silver_bangles" ; break;
       case '69':$upload_dir = 'silver_bartan/'; $table_input_admin = "silver_bartan" ;break;
       case '70':$upload_dir = 'silver_fancy_paayal/'; $table_input_admin = "silver_fancy_paayal" ; break;
       case '71':$upload_dir = 'silver_half_kandora/'; $table_input_admin = "silver_half_kandora" ;break;
       case '72':$upload_dir = 'silver_idol/'; $table_input_admin = "silver_idol" ;break;
       case '73':$upload_dir = 'silver_kada/'; $table_input_admin = "silver_kada" ;break;
       case '74':$upload_dir = 'silver_kandora/'; $table_input_admin = "silver_kandora" ; break;
       case '75':$upload_dir = 'silver_others/'; $table_input_admin = "silver_others" ;break;
       case '76':$upload_dir = 'silver_paayal/'; $table_input_admin = "silver_paayal" ; break;
       case '77':$upload_dir = 'silver_ring/'; $table_input_admin = "silver_ring" ;break;
       case '78':$upload_dir = 'silver_bracelate/'; $table_input_admin = "silver_bracelate" ;break;
       case '79':$upload_dir = 'silver_chain/'; $table_input_admin = "silver_chain" ; break;
       case '80':$upload_dir = 'silver_un/'; $table_input_admin = "silver_un" ; break;
       case '99':$upload_dir = 'test/'; $table_input_admin = "test" ; break;
}

    rename('../../djp/'.$current_path.$current_image, '../../djp/'.$upload_dir.$current_image);
    rename('../../images/thumb/'.$current_path.$current_image, '../../images/thumb/'.$upload_dir.$current_image);
    $sql = "UPDATE `designs` SET `category`= '$table_input_admin',`sub_category` = '$sub_category_table', `path` = '$upload_dir',  `comment` =CONCAT_WS('','$admin_updater - move, ',comment)
            WHERE `id` = '$id_image'";
    $result    = mysqli_query($db, $sql);

    if ($result) {
        echo "Successfully Moved" ;
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
}
