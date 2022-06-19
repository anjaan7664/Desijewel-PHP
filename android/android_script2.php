<?php
// Sanitize query
header('Content-Type: application/json');
include '../../script/database.php';

$response           = array();
$status             = array();
$pageNumber         = 1;
$data               = json_decode(file_get_contents('php://input'), true);
$sortType           = "hit";
$limit              = 9;
$subCategory = '';
$table_Un_Sanitized = $data["table"];
$table              = mysqli_real_escape_string($db, $table_Un_Sanitized);
if (isset($data["type"])) {
    $sort_Un_Sanitized = $data["type"];
    $sortType          = mysqli_real_escape_string($db, $sort_Un_Sanitized);
}
if (isset($data["page"])) {
    $page_Un_Sanitized = $data["page"];
    $pageNumber        = mysqli_real_escape_string($db, $page_Un_Sanitized);
}

if (isset($data["subCategory"]) && ($data["subCategory"]) != null) {
    $subCategory_Un_Sanitized = $data["subCategory"];
    $subCategory              = mysqli_real_escape_string($db, $subCategory_Un_Sanitized);
    
}
/*
if (isset($data["weightFrom"]) && ($data["weightFrom"]) != null) {
    $weightFrom_Un_Sanitized = $data["weightFrom"];
    $weightFrom              = mysqli_real_escape_string($db, $weightFrom_Un_Sanitized);
}
if (isset($data["weightTo"]) && ($data["weightTo"]) != null) {
    $weightTo_Un_Sanitized = $data["weightFrom"];
    $weightTo              = mysqli_real_escape_string($db, $weightTo_Un_Sanitized);
}
*/
//$table = "desi_aad";

$from         = ($pageNumber - 1) * $limit;
$rawSql       = "select * from designs WHERE (dp='1') AND category = '$table' ";

if (isset($subCategory) && !empty($subCategory)) {
 $rawSql=$rawSql."AND sub_category = '$subCategory' ";
}

/*
if (isset($data["sortTag"]) && ($data["sortTag"]) != "[]") {
    $sortTag_Un_Sanitized = json_decode($data["sortTag"]);
    $tag_filter="11";
foreach($sortTag_Un_Sanitized as $value) {
         $tag_filter=$tag_filter."|".$value;
}

    $sortTag  = mysqli_real_escape_string($db, $tag_filter);
    $rawSql=$rawSql."AND (tag REGEXP '($sortTag)')";
}

if (isset($weightTo) && isset($weightFrom))  {
	if ($weightFrom < $weightFrom) {
		$rawSql=$rawSql."AND (weight BETWEEN $weightTo AND $weightFrom)";
	}
	else {
		$rawSql=$rawSql."AND (weight BETWEEN $weightFrom AND $weightTo)";
	}
}

elseif (isset($weightTo)) {
	$rawSql=$rawSql."AND (weight BETWEEN $weightTo AND $weightTo)";
}
elseif (isset($weightFrom)) {
	$rawSql=$rawSql."AND (weight BETWEEN $weightFrom AND $weightFrom)";
}
*/

$queryAndroid = mysqli_query($db, $rawSql);
$rowsNum      = mysqli_num_rows($queryAndroid);
$imagesArray  = array();

$sql          = "$rawSql ORDER BY $sortType DESC LIMIT  $from, $limit";


$query           = mysqli_query($db, $sql);
$post_data_array = array();
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $img        = $row['image'];
    $id_image   = $row['id'];
    $weight     = $row['weight'];
    $image_path = $row['path'];
    $hit        = $row['hit'];
    $img_tag    = $row['tag'];
    $subCategorySending    = $row['sub_category'];
   
   
    $thumb_path = $url . 'images/thumb/' . $image_path . $img;
    $image             = $url . 'djp/' . $image_path . $row['image'];
    $post_data_array[] = array(
        'image' => $image,
        'weight' => $weight,
        'thumb' => $thumb_path,
        'image_title' => $img,
        'tag' => $img_tag,
        'hit' => $hit,
        'subCategory' => $subCategorySending
    );
}


$ad_url = $url ."shoppers/silver.jpg";
$ad_desc = "";
$ad_number = "+917597937664";
$ad_map = "geo:25.9695727,72.9625279";
$ad_name = "Desi Jewellery";


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
echo $post_data;

//$myfile = fopen("test.txt", "w") or die("Unable to open file!");
//fwrite($myfile,"\n".$sql);
//fclose($myfile);
?>