	<?php $sql="select * from designs WHERE (dp='1') AND   category = '$table' ";
$weight_desc="<p class=\"col-md-12 com-xs-12\">Showing all images </p>";
$sort_type="hit";


if (isset($_GET['subCat']) ) {
	unset($_SESSION['subCat'.$table]);
	$_SESSION['subCat'.$table]=$_GET['subCat'];	
}

if(isset($_SESSION['subCat'.$table]) && !empty($_SESSION['subCat'.$table])) {
	$subCat=$_SESSION['subCat'.$table];
	$sql=$sql."AND (sub_category = '$subCat') ";
}
anjaan($sql, $sort_type);
echo $weight_desc;
?>