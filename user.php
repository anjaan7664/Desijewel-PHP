<?php
session_start();

include '../script/database.php';
include_once 'login/init.php';


?>
<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Desi Indian Gold Jewellery Photos </title>
	<meta name="description" content="Photos of Indian, Desi , Rajasthani jewellery with weight and category wise" />
	<meta name="keywords" content="Indian,Desi,emboss,ehnic,jewellery,kundan,emboss,design,gold,Rajasthani,photos" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logos/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="script/desi_jewel.css" rel="stylesheet">
	<script src="/script/jquery.js"></script>
	<style type="text/css">
		.box {
			border: black solid 1px;
			padding: 5px;
			margin-bottom: 10px;
			background: white;
		}

		.large {
			width: 640px;
			height: 250px
		}

		.profile_image {
			max-width: 100%;
			min-width: 100%;
			margin: 0px 0px 0px -10px;
			padding: 5px;
			object-fit: cover;
		}

		@media (max-width:500px) {
			.profile_image {
				max-width: 100%;
				min-width: 100%;
				margin: 0px 0px 0px -10px;
				padding: 5px;
				object-fit: cover;
			}
		}
	</style>
	<style type="text/css">
		.galleryimage {
			width: 330px;
		}

		.pic {
			padding: 0px;
			margin: 10px 0px 0px 0px;
		}

		.adimage_user {
			width: 330px;
			height: 250px;
			margin: 10px;
			box-shadow: 10px 10px 20px #191717;
			background-position: center center;
			background-repeat: no-repeat;
			overflow: hidden;
			cursor: pointer;
			border: 1px solid black;
			transition: .3s;
		}

		@media (max-width:500px) {
			.adimage_user {
				width: 335px;
				height: 250px;
				margin: 10px 10px 10px -20px;
				box-shadow: 10px 10px 20px #191717;
				background-position: center center;
				background-repeat: no-repeat;
				overflow: hidden;
				cursor: pointer;
				border: 1px solid black;
				transition: .3s;
			}
			.galleryimage {
				width: 330px;
			}
			.large {
				width: 335px;
				height: 250px;
				margin: 10px 10px 10px -20px;
				box-shadow: 10px 10px 20px #191717;
				background-position: center center;
				background-repeat: no-repeat;
				overflow: hidden;
				cursor: pointer;
				border: 1px solid black;
				transition: .3s;
			}
			.pic {
				padding: 10px;
				margin: 10px 0px 0px 10px;
			}
		}
	</style>
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXMSRH8"
             height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-100767429-1', 'auto');
		ga('send', 'pageview');
	</script>
	<div class="container">
		<!--  head content     -->
		<div class="hidden-xs back" alt="website logo">
		</div>
		<div class="visible-xs" alt="website logo">
			<img class="col-xs-12 back" src="/logos/logo-xs.png">
		</div>

		<!--  Nav bar    -->
		<div class="bg_n">
			<div style="text-align:center" class=" ">
				<a href="/" class="btn btn_nav">Home</a>
				<a href="/emboss.php" class="btn btn_nav">Emboss</a>
				<a href="/kundan.php" class="btn btn_nav">Kundan</a>
				<a href="/user.php" class="btn btn_nav hidden-xs">Profile</a>\
			</div>
		</div>
		<div class="container-2">
			<?php
if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])) {
    echo "<br><br><br>"; ?>
			<div style="margin: 0px auto 0px auto ; max-width: 350px">
				<?php
    include_once "login/aside.php"; ?>
			</div>
			<?php
    echo "<br><br><br><br><br><br>";
} else {?>
				<div id="user_detail" style="background: white;" class="btn_simple category align_center  col-md-3 ">
					<?php if (!empty($profile)) { ?><img class="profile_image" src="/login/profile/<?php echo $profile ?>" alt="">
					<?php } ;?>
					<h2>
						<?php if (!empty($f_name)) {
    echo $shop;
} else {
                    echo "Click on Setting to Enter Info";
                }?>
					</h2>
					<h2>
						<?php echo $f_name." ".$s_name; ?>
					</h2>
					<h2>
						<?php echo $number; ?>
					</h2>
					<h2>
						<?php echo $address  ;?>
					</h2>

					<?php if (is_admin($_COOKIE['username']) === true) {  ?><a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/admin.php">Admin</a>

					<a style="margin-left:0px" class="btn btn-primary btn-block" href="/ul.php">Direct Upload</a>
					<?php }?>
					<a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/setting.php">Setting</a>
					<a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/logout.php">Log Out</a>

				</div>

				<!--  Main content    -->

				<div style="padding: 0px;margin: 0px" class="row ">

					<!--  Displaying images    -->
					<div class=" ">

						<div class="col-md-9 align_center bg ">
							<div class="align_center gallery">

								<h2>
									<?php echo $u_desc  ;?>
								</h2>
								<div class="col-md-6 pic">

								</div>
								<?php

include '../script/database.php';
include "script/db_script_user.php";
$sql = "SELECT * from $table_user WHERE dp='1' ";
anjaan($sql);
echo "<p>Showing all images </p>";
?>
							</div>
							<div class="  align_center ">
								<div class=" col-md-12 pagination gallery">
									<?php
echo $paginationctrl;

if (isset($_GET['pn']) && $_GET['pn'] >= '2') {
    ?>
									<style type="text/css">
										@media (max-width:500px) {
											#user_detail {
												display: none;
											}
										}
									</style>
									<?php
}
?>
								</div>


								<div class="pic">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- S A  -->
									<ins class="adsbygoogle large" style="display:inline-block;" data-ad-client="ca-pub-9733613923055204" data-ad-slot="6978245353"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
						<!--  Category     -->

					</div>
					<?php }?>
				</div>



				<!--  Footer content-->
				<div style="font-size: 15px" class="row align_center footer">
					<div>
						Copyright &copy <a href="/" title="Desi Jewel">Desijewel.in</a> |
						<a href="/contact_us.php">Contact Us</a>|
						<a href="/privacy.html">Privacy Policy</a>|
						<a href="/tos.html">Terms of Service</a>|
						<a href="/about_us.html">About Us</a>|
						<a href="/disclaimer.html">Disclaimer</a>

					</div>
				</div>
		</div>
	</div>
</body>
<footer>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".setting_btn").on('click', function(event) {
				event.preventDefault();
				$(this).hide();
				$(this).parent().siblings().children('.delete').show();
				$(this).parent().siblings().children('.edit').show();
			});
			$(".edit").on('click', function(event) {
				event.preventDefault();
				$(this).hide();
				$(this).siblings('.delete').hide();
				$(this).siblings('.cancel').show();
				$(this).siblings('.save').show();
				$(this).parent().children(':eq(1)').after('<input style="z-index:10; border:1px solid black;" type="text" class="btn edit_input col-md-4 col-xs-4">');
			});
			$(".delete").on('click', function(event) {
				event.preventDefault();
				$(this).hide();
				$(this).siblings('.edit').hide();
				$(this).siblings('.cancel').show().removeClass('col-md-4 col-xs-4').addClass('col-md-8 col-xs-8');
				$(this).siblings('.delete_yes').show();
			});

			$(".cancel").on('click', function(event) {
				event.preventDefault();
				$(this).hide().removeClass('col-md-8 col-xs-8').addClass('col-md-4 col-xs-4');
				$(this).siblings('.edit').show();
				$(this).siblings('.delete').show();
				$(this).siblings('.edit_input').hide();
				$(this).siblings('.delete_yes').hide();
				$(this).siblings('.save').hide();
			});

			$('.delete_yes').click(function(event) {
				event.preventDefault();
				var el = this;
				var table = '<?php echo $table_user; ?>';
				var image = this.value;
				var id_image = $(this).siblings('.id_image').val();
				// AJAX Request
				$.ajax({
					url: 'script/file_editing/index_image_delete.php',
					type: 'POST',
					data: {
						image: image,
						table: table,
						id_image: id_image
					},
					success: function(result_del) {
						console.log(result_del);
						$(el).parent().parent().closest('div').css('background', 'white');
						$(el).parent().parent().closest('div').fadeOut(800, function() {
							$(this).remove();
						});
					}
				});

			});

			$('.save').click(function(event) {
				event.preventDefault();
				var el = this;
				var table = '<?php echo $table_user; ?>';
				var image = $(this).siblings('.delete_yes').val();
				var weight = $(this).siblings('.edit_input').val();

				$.ajax({
					url: 'script/file_editing/index_image_edit.php',
					type: 'POST',
					data: {
						weight: weight,
						image: image,
						table: table
					},
					success: function() {
						$(el).parent().siblings('.weight_gm').text(weight + " gm");
						$(el).hide();
						$(el).siblings('.edit').hide();
						$(el).siblings('.delete').hide();
						$(el).siblings('.edit_input').hide();
						$(el).siblings('.user_input').hide();
						$(el).siblings('.save_user').hide();
						$(el).siblings('.save').hide();
						$(el).siblings('.cancel').hide();
						$(el).parent().siblings().children('.setting_btn').show();



					}
				});

			});



		});
	</script>
	<script src="/frameworks/fancybox/jquery.fancybox.min.js"></script>
	<script src="/frameworks/bootstrap/js/bootstrap.min.js">
	</script>
	<script src="/script/fancy_box_button.js">
	</script>
	<link rel="stylesheet" type="text/css" href="/frameworks/fancybox/jquery.fancybox.min.css">
</footer>

</html>
<?php
?>
