<?php
include '../../../script/database.php';

mysqli_set_charset($db, 'utf8');
$table_of_image;
$weight_of_image = '';
$current_image;
$admin_updater;
$tag_of_image = '';
$likes_of_image = '';
$tblNameFromNW = '';
$alt_of_image_hn = '';
$alt_of_image_en = '';
$newname_of_image = '';
$current_path = '';
$image_id = '';

$table_of_image  = $_POST['table'];

if (isset($_POST['id_image'])) {
    $image_id = $_POST['id_image'];
}
if (isset($_POST['path'])) {
    $current_path = $_POST['path'];
}

if (isset($_POST['newname'])) {
    $name_from_input = $_POST['newname'];
    $final_name = preg_replace('#[ -]+#', '-', $name_from_input);
    $newname_of_image = $final_name . '.jpg';
}
$table_of_image  = $_POST['table'];
if (isset($_POST['weight'])) {
    $weight_of_image = $_POST['weight'];
}
if (isset($_POST['tag'])) {
    $tag_of_image    = $_POST['tag'];
}
if (isset($_POST['likes'])) {
    $likes_of_image  = $_POST['likes'];
}
if (isset($_POST['alt_hn'])) {
    $alt_of_image_hn  = $_POST['alt_hn'];
}
if (isset($_POST['alt_en'])) {
    $alt_of_image_en  = $_POST['alt_en'];
}
$current_image   = $_POST['image'];
$admin_updater   = $_POST['admin'];
if (isset($_POST['tblNameFromNW'])) {
    $tblNameFromNW   = $_POST['tblNameFromNW'];
}
// For Moderator
if (!empty($tblNameFromNW)) {
    if (!empty($weight_of_image)) {
        $sql = "UPDATE `designs` SET `weight` = '$weight_of_image' ,
         `comment` =CONCAT_WS('','$admin_updater - weight $weight_of_image , ',comment) 
WHERE `image` = '$current_image'";
        if (mysqli_query($db, $sql)) {
            echo "Weight add Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($tag_of_image)) {
        $sql = "UPDATE `designs` SET `tag` = '$tag_of_image' , `comment` =CONCAT_WS('','$admin_updater - $tag_of_image , ',comment) WHERE `image` = '$current_image'";

        if (mysqli_query($db, $sql)) {
            echo "Tag adding Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($likes_of_image)) {
        $sql = "UPDATE `designs` SET `hit` = '$likes_of_image' , `comment` =CONCAT_WS('','$admin_updater - likes $likes_of_image , ',comment) WHERE `image` = '$current_image'";

        if (mysqli_query($db, $sql)) {
            echo "Like adding Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } else {
        echo "Error updating record";
    }
} else { // For admin
    if (!empty($weight_of_image)) {
        $sql = "UPDATE `designs` SET `weight` = '$weight_of_image' , `comment` =CONCAT_WS('','$admin_updater - weight $weight_of_image , ',comment) WHERE `image` = '$current_image'";

        if (mysqli_query($db, $sql)) {
            echo "Weight adding Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($tag_of_image)) {
        $sql = "UPDATE `designs` SET `tag` = '$tag_of_image' , `comment` =CONCAT_WS('','$admin_updater - $tag_of_image , ',comment) WHERE `image` = '$current_image'";

        if (mysqli_query($db, $sql)) {
            echo "Success";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($likes_of_image)) {
        $sql = "UPDATE `designs` SET `hit` = '$likes_of_image' , `comment` =CONCAT_WS('','$admin_updater - likes $likes_of_image , ',comment) WHERE `image` = '$current_image'";

        if (mysqli_query($db, $sql)) {
            echo "Likes adding Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($alt_of_image_en)) {
        $sql = "UPDATE `designs` SET `alt` = '$alt_of_image_en' ,`alt_hn` = '$alt_of_image_hn' , `comment` =CONCAT_WS('','$admin_updater - alt , ',comment) WHERE `image` = '$current_image' AND `category` = '$table_of_image'";

        if (mysqli_query($db, $sql)) {
            echo "Alt Updating Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } elseif (!empty($newname_of_image)) {
        $sql = "UPDATE `designs` SET `image` = '$newname_of_image' WHERE `id` = '$image_id'";
        if (mysqli_query($db, $sql)) {
            rename('../../djp/' . $current_path . $current_image, '../../djp/' . $current_path . $newname_of_image);
            rename('../../images/thumb/' . $current_path . $current_image, '../../images/thumb/' . $current_path . $newname_of_image);

            echo "ReNaming Success.";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    } else {
        echo "Error updating record";
    }
}
