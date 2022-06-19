<?php

if (isset($_GET['lang'])) {
    if ($_GET['lang'] != $_COOKIE['lang']) {
        unset($_COOKIE['lang']);
        setcookie("lang", $_GET['lang'], strtotime('+200 days'), "/", "", "", true);
        header("Refresh:0");
    }
}
if (isset($_COOKIE['lang']) && !empty($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = "en";
};

if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])) {
    session_start();
} ;

include_once '../script/database.php';
require "login/init.php";

if (is_admin($_COOKIE['username']) === false) {
    header("location:../index.php");
}
?>
<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>File Upload</title>
	<meta name="description" content="Photos of Indian, Desi , Rajasthani jewellery with weight and category wise" />
	<meta name="keywords" content="Indian,Desi,emboss,ehnic,jewellery,kundan,emboss,design,gold,Rajasthani,photos" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logos/favicon.ico" />
	<link href="frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="script/desi_jewel.css" rel="stylesheet">
	<script src="/script/jquery.js"></script>
	<script src="frameworks/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
		.remove_form {
			margin: 5px 5px 5px 5px
		}

		@media (max-width:600px) {
			.remove_form {
				margin: 5px 0px 5px 5px
			}

			.dropdown-menu {
				margin: 5px 20px 25px -45px;
			}
		}
	</style>

</head>

<body>

	<div class="container">
		<!--  head content     -->
		<div class="hidden-xs back" alt="website logo">
		</div>
		<div class="visible-xs" alt="website logo">
			<img class="col-xs-12 back" src="/logos/logo-xs.webp">
		</div>
		<!--  Nav bar    -->
		<div class="bg_n">
			<?php include "includes/nav_bar.php" ; ?>
		</div>
		<div class="container-2">
			<div style="max-width: 1000px;margin: 0px auto 0px auto">
				<h2></h2>
				<br>
				<?php
if (!empty($errors)) {
    echo "<p class='err'>".nl2br($errors)."</p>";
}
?>
				<h1 style="margin-left: 10px;">
					<?php include_once "login/init.php";
           if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
               echo "Hi ".$f_name ;
           }?>
				</h1>


				<br>
				<div class="container">


					<h1>Image Uploader</h1>

					<input type="file" name="images[]" id="images" multiple>
					<br>
					<div id="images-to-upload">

					</div>
					<!-- end #images-to-upload -->

					<br>
					<div class="col-md-12">
						<button id="upload_button" class="btn btn-sm btn-success col-md-4 col-xs-12">Upload all images</button>
					</div>

				</div>
				<!-- end .container -->
				<br><br>

			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>

		<!--  Footer content-->
		<div style="font-size: 15px" class="row align_center footer">
			<div class="col-md-12">
				Copyright &copy <a href="/" title="Desi Jewel">Desijewel.in</a> |
				<a href="contact_us.php">Contact Us</a>|
				<a href="privacy.html">Privacy Policy</a>|
				<a href="tos.html">Terms of Service</a>|
				<a href="about_us.html">About Us</a>|
				<a href="/disclaimer.html">Disclaimer</a>
			</div>
		</div>

	</div>
	</div>

	<script>
		//indirect ajax

		//file collection array
		var fileCollection = new Array();

		$('#images').on('change', function(e) {

			var files = e.target.files;
			$.each(files, function(i, file) {
				var array_field = fileCollection.push(file) - 1;

				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function(e) {
					var template = $('#images-to-upload').html();
					template += '<form id="form-' + array_field + '" class="upload_form col-md-6 col-xs-12" action="/upload">' +
						'<img style="min-width: 150px;height: 130px;padding-left:0px;margin-left:-10px;padding-right:5px" class="col-md-4 col-xs-5" src="' + e.target.result + '">' +
						'<input onchange="changeTable(this);" placeholder="table" style="width:80px; height:28px; margin-bottom:0px;margin-right:5px" class="col-md-2 col-xs-4 table" type="number" name="table" id="table">' +
						'<div id="checkBoxParent" style="padding-right: 23px" class="dropup col-md-5 col-xs-4">' +
						'<button id="tagButton" style="margin:0px 0px 0px -15px;" class="tagButton  col-xs-12 btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Tag<span class="caret"></span></button>' +
						'<div id="checkBoxList" style="position: absolute; ;padding-left: 10px" class="dropdown-menu">' +
						'</div>' +
						'</div><br/>' +
						'<input placeholder="likes" style="width:80px; height:28px; margin-bottom:0px; margin-top:5px" class="col-md-6 col-xs-4 likes" type="number" name="likes" id="likes">' +
						'<input type="hidden" class="image_loc" value="' + array_field + '">' +
						'<input name="' + array_field + '" onclick="remove_form(this);" style="z-index:10;" type="button" value="Cancel" class="btn btn-sm btn-danger remove_form col-md-4 col-xs-3">' +
						'<input placeholder="SubC" style="width:80px; height:28px; " class="col-md-4 col-xs-3 sub_cat" type="text" name="sub_cat" id="sub_cat">' +
						'<button style="margin:0px 1px 0px 5px; " class="btn btn-sm btn-primary col-md-4 col-xs-3 submit_form" value="Upload" name="submit_weight">Upload</button>' +
						'<div style="height: 30px; font-size: 20px; margin: 2px 0px 10px 0px; padding: 0px; text-align: center;" class="progress col-md-6 col-xs-6 progress-stripped active">' +
						'<div id="progress-bar-' + array_field + '" class="progress-bar " style="font-size: 15px; width:0%"></div>' +
						'</div>' +
						'</form>';

					$('#images-to-upload').html(template);

				};

			});


		});

		//form upload ...
		$(document).on('submit', 'form', function(e) {

			e.preventDefault();
			var el = this;
			var array_field = $(this).children('.image_loc').val();
			var subCat = $(this).children('.sub_cat').val();
			var table = $(this).children('.table').val();
			var tag = $(this).children().siblings().children().children('input[name="cb"]:checked');
			var likes = $(this).children('.likes').val();
			var tagData = [];
			$.each(tag, function() {
				tagData.push($(this).val());
			});
			$form = $("#form_" + array_field);
			$(this).children(".submit_form").attr("disabled", true);
			var formdata = new FormData($(this)[array_field]);
			formdata.append('images', fileCollection[array_field]);
			formdata.append('sub_cat', subCat);
			formdata.append('tag', tagData);
			formdata.append('table', table);
			formdata.append('likes', likes);

			$.ajax({
				type: 'POST',
				url: 'script/file_upload_admin.php',
				data: formdata,
				tryCount: 0,
				retryLimit: 3,
				xhr: function() {

					var xhr = new XMLHttpRequest();
					//Upload progress
					xhr.upload.addEventListener("progress", function(e) {
						if (e.lengthComputable) {
							var percentComplete = Math.round(e.loaded / e.total * 100);
							$('#progress-bar-' + array_field).width(percentComplete + '%').html(percentComplete + '%');

						}
					}, false);
					xhr.addEventListener('load', function() {
						$('#progress-bar-' + array_field).addClass('progress-bar-success').html('Upload Completed....');

					});
					return xhr;
				},
				cache: false,
				contentType: false,
				processData: false,

				success: function(data) {
					console.log(data);
					$('#form-' + array_field).remove();
				},

				error: function(xhr, textStatus, errorThrown) {
					console.log("data");
					if (textStatus == 'timeout') {
						this.tryCount++;
						if (this.tryCount <= this.retryLimit) {
							//try again
							$.ajax(this);
							return;
						}
						return;
					}
					if (xhr.status == 500) {
						//handle error
					} else {
						//handle error
					}
				}
			});




		});
		$("#upload_button").on('click', function(event) {
			event.preventDefault();
			$(".submit_form").click();
		});
		$("input.remove_form").on('click', function() {
			console.log('ee');
			$(this).parent().remove();
			$(this).remove();
		});


		function remove_form(value) {
			var form = $(value).attr('name');
			$('#form-' + form).remove();

		}
		// Checkboxes
		$('.dropdown-toggle').dropdown();
		// Dynamically creating checkboxes for tag.
		function changeTable(value) {

			var tableNow = $(value);

			var table_input = parseInt(tableNow.val());

			var assetList = tableNow.siblings().children('#checkBoxList');
			assetList.empty();
			var tag = '';
			var fullName = '';
			switch (table_input) {
				case 02:
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 04:
					tag = ['rglr', 'tops'];
					fullName = ['Regular', 'Tops'];
					break;
				case 06:
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 13:
					tag = ['dsi', 'chti', 'Nagina'];
					fullName = ['Desi', 'Chataai', 'Nagina'];
					break;
				case 15:
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 16:
					tag = ['rglr', 'tops'];
					fullName = ['Regular', 'Tops'];
					break;
				case 18:
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 20:
					tag = ['1tkri', '2tkri', '3tkri'];
					fullName = ['1 Tokri', '1 Tokri', '1 Tokri'];
					break;
				case 21:
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 22:
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 23:
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 43:
					tag = ['rset', 'bena'];
					fullName = ['R Set', 'Bena'];
					break;

				default:
					tag = '';
					fullName = '';
			}
			if (tag !== '') {
				tableNow.siblings().children('.tagButton').removeClass('btn-warning').addClass('btn-info');
			} else {
				tableNow.siblings().children('.tagButton').removeClass('btn-info').addClass('btn-warning');
			}
			$.each(tag, function(i) {
				var checkBoxName = tag[i];

				var childChecBox = '<input class="cb" name="cb" id="' + checkBoxName + '" value="' + checkBoxName + '" type="checkbox">' +
					'<label class="" for="' + checkBoxName + '">&nbsp;' + fullName[i] + '</label><br>';
				assetList.append(childChecBox);
			});
			$('.dropdown-menu').click(function(e) {
				e.stopPropagation();
			});

		}
	</script>

</body>

</html>