<?php

include '../../../script/database.php';
$table_to_be_delete = $_POST['table'] ;
$to_be_delete_image = $_POST['image'] ;
$admin_updater = $_POST['admin'] ;
$id_image = $_POST['id_image'] ;

$sql = "UPDATE `designs` SET `dp` = '0' , `comment` =CONCAT_WS('','$admin_updater - Delete, ',comment) WHERE `id` = '$id_image'";
if (mysqli_query($db, $sql)) {
   echo "Successfully deleted.";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
?>