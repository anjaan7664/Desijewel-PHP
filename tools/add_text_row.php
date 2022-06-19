<?php
include '../../script/database.php';
// Adding a text in alt text.
$permission = "0";

if ($permission == "1") {
    
    
    $tables_name = mysqli_query($db, "show tables from anjaan");
    
    
    while ($table = mysqli_fetch_array($tables_name)) {
        $table = $table[0];
        $sql_alter    = "UPDATE `$table` SET  `alt` =CONCAT_WS(`alt`,'', ' in Jodhpur')   WHERE `dp` = '1'";
        $result_alter = mysqli_query($db, $sql_alter);
        if ($result_alter) {
            echo "Successfully altered.". "<BR>";
        } else
            (mysqli_error($db));
    }
    
}else{
    echo "nothing to do here.";
}


?>