<?php
$design = "Recently Added Photos";
$design_alt= "recently";
$s_value_1= "";
$s_value_2= "";
$table= "new_photos";
$design_detail = "RECENTLY ADDED";
$category = "../script/category_desi.php";
$alt = "" ;
?>
<style type="text/css">
	#weight {
		display: none;
	}
</style>
<?php
include '../script/page.php';

?>

<style type="text/css">
	.galleryimage {
		max-width: 96%;
		min-width: 96%;
		min-height: 300px;
		max-height: 300px;
	}

	#img_text {
		display: none;
	}

	.adimage {
		max-width: 96%;
		min-width: 96%;
		min-height: 300px;
		max-height: 300px;
	}

	@media(max-width:600px) {
		.galleryimage {
			max-width: 100%;
			min-width: 100%;
			min-height: 150px;
			max-height: 400px;
		}
		.adimage {
			max-width: 100%;
			min-width: 100%;
			min-height: 200px;
			max-height: 400px;
		}
	}
</style>
