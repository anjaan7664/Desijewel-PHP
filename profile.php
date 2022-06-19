<?php
session_start();
include '../script/database.php';
include '../script/database_user.php';
include_once 'login/init.php';

if(isset($_GET['username']) === true && empty($_GET['username']) === false ){
	$_SESSION ['username_profile'] = $_GET['username'];
    $username_session= $_SESSION ['username_profile'];
	$_SESSION ['username_profile'] = $_GET['username'];
	if(user_exists($username_session) === true){
	 $sql  = "SELECT * FROM members WHERE username ='$username_session'";
     $query = mysqli_query($db_login, $sql);
     while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$_SESSION ['f_name'] = $row['f_name'];
        $_SESSION ['s_name'] = $row['s_name'];
        $_SESSION ['email']  = $row['email'];
        $_SESSION ['number'] = $row['number'];
		$user_dir = $row['storage'];
		$_SESSION ['profile']= $row['profile'];
		$_SESSION ['address']= $row['address'];
        $_SESSION ['user_table']  = $row['user_table'];
        $_SESSION ['u_desc'] = $row['u_desc'];
        $_SESSION ['shop'] = $row['shop'];
		
      } }
else{
	header ('location:index.php');
	exit();

}

}
    
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
			<?php include "script/nav_bar.php" ; ?>
		</div>
		<div class="container-2">
			<?php if($username_session != $_COOKIE["username"]){ ?>
			<div id="user_detail" style="background: white;" class="btn_simple category align_center  col-md-3 ">

				<?php if(!empty($_SESSION ['profile'])){ ?><img class="profile_image" src="/login/profile/<?php echo $_SESSION ['profile'] ?>" alt="">
				<?php } ;?>
				<h2>
					<?php echo  $_SESSION ['shop']; ?>
				</h2>
				<h2>
					<?php echo  $_SESSION ['f_name']." ".$_SESSION ['s_name']; ?>
				</h2>
				<h2>
					<?php echo $_SESSION ['number']; ?>
				</h2>
				<h2>
					<?php echo $_SESSION ['address']  ;?>
				</h2>
			</div>
			<?php }else{ ?>

			<div id="user_detail" style="background: white;" class="btn_simple category align_center  col-md-3 ">
				<?php if(!empty($profile)){ ?><img class="profile_image" src="/login/profile/<?php echo $profile ?>" alt="">
				<?php } ;?>
				<h2>
					<?php if(!empty($f_name)){ echo $shop;}
				else{ echo "Click on Setting to Enter Info";}?>
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

				<?php if(is_admin($_COOKIE['username']) === true){  ?><a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/admin.php">Admin</a>

				<a style="margin-left:0px" class="btn btn-primary btn-block" href="/ul.php">Direct Upload</a>
				<?php }?>
				<a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/setting.php">Setting</a>
				<a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/logout.php">Log Out</a>

			</div>

			<?php } ?>


			<!--  Main content    -->

			<div style="padding: 0px;margin: 0px" class="row ">

				<!--  Displaying images    -->
				<div class=" ">

					<div class="col-md-9 align_center bg ">
						<div class="align_center gallery">

							<h2>
								<?php echo $_SESSION ['u_desc']  ;?>
							</h2>

							<?php

include "script/db_script_user.php";
$user_table_direct = $_SESSION ['user_table'];
$sql = "SELECT * from $user_table_direct WHERE dp='1' ";
anjaan($sql);
echo "<p>Showing all images </p>";
?>
						</div>

						<div class="align_center ">
							<div class=" col-md-12 pagination gallery">
								<?php
echo $paginationctrl;
if(isset($_GET['pn']) && $_GET['pn'] >= '2'){
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
	<script src="/frameworks/fancybox/jquery.fancybox.min.js"></script>
	<script src="/frameworks/bootstrap/js/bootstrap.min.js">
	</script>
	<script src="/script/fancy_box_button.js">
	</script>
	<link rel="stylesheet" type="text/css" href="/frameworks/fancybox/jquery.fancybox.min.css">
</footer>
<script type="text/javascript">
	$(document).ready(function() {
		$('#setting_user').remove();
		$('#div_setting').remove();
	});
</script>

</html>