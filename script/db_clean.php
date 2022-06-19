<?php
include '../../cron_jobs/database_cron.php';
$sql = "SHOW tables FROM anjaan";
$result = mysqli_query($db_cron_design, $sql);
$tables = array();
while ($table = mysqli_fetch_array($result)) {
    $tables[] = $table;
}
foreach ($tables as $table) {
    $table_db = $table[0];
    $sql = "SELECT * FROM $table_db WHERE dp = '0'";
    $result = mysqli_query($db_cron_design, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo " ".$row['image']. "<BR>";

        $id_image = $row['id'];
        $image_path   = $row['path'];
        $image = "../djp/" . $image_path . $row['image'];
        if (file_exists($image)) {
            unlink($image);
        }
        $sql_delete =  "DELETE FROM $table_db WHERE `id` = $id_image";
        $result_delete    = mysqli_query($db_cron_design, $sql_delete);
        if ($result_delete) {
            echo "DB Cleaned. ";
        } else {
            mysqli_error($db_cron_design);
        }
    }
}
