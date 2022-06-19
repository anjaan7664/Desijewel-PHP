<?php session_start();


if (isset($_GET['lang']) ) {
	if($_GET['lang'] != $_COOKIE['lang']){
	unset($_COOKIE['lang']);
	setcookie("lang",$_GET['lang'],strtotime('+200 days'), "/", "", "", TRUE);
	header("Refresh:0");}
}
if(isset($_COOKIE['lang']) && !empty($_COOKIE['lang'])) {
	
	$lang = $_COOKIE['lang'];
}else{
	$lang = "en";
}
?>
<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Desi Indian Rajasthani Gold Jewellery Design Photos/Images</title>
	<meta name="description" content="Photos of Indian , Desi , Rajasthani Gold jewellery Design with weight and category wise" />
	<meta name="keywords" content=",Indian,Desi,emboss,ehnic,jewellery,kundan,design,gold,Rajasthani,photos" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logos/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="script/desi_jewel.css" rel="stylesheet">
	<script src="/script/jquery.js"></script>
	<style type="text/css">
		.btn_upload {
			max-width: 250px;
			margin: 5px 5px 5px 30px;
			max-height: 30px;
			padding: 5px 5px 5px 2px;
			text-align: center;
			font-size: 18px;
			color: #0008F7;
			background-color: white;
			line-height: 1;
			transition: .2s ease-in;
			border: 1px black solid;
			border-radius: 2px;
		}

		.btn_upload:hover {
			color: white;
			background-color: #0CC0F7;
		}
	</style>
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXMSRH8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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
			<img class="col-xs-12 back" src="/logos/logo-xs.webp">
		</div>

		<!--  Nav bar    -->
		<div class="bg_n">
			<?php include "includes/nav_bar.php" ; ?>
		</div>
		<div class="container-2">

			<!--  Main content    -->

			<div style="padding: 0px;margin: 0px" class="row ">

				<!--  Displaying images    -->
				<div class=" ">

					<div class="col-md-10 align_center bg col-md-push-2  ">

						<div class="align_center gallery">
							<h1 class="h1_tag"> <?php if($lang == "en"){?>
								Showing Images of Desi Jewellery
								<?php  }else{ ?>
								देसी गोल्ड की डिजाईन दिखा रहे
								<?php  }; ?></h1>

							<?php
include '../script/database.php';
include "script/db_script_nogm.php";
$table = "homepage";
$sql = 'select * from homepage WHERE dp="1"';
anjaan($sql);
echo "<p>Showing all images </p>";
?>
						</div>
						<div class="align_center ">
							<div class=" col-md-12 pagination gallery">
								<?php
echo $paginationctrl;
?>
							</div>
						</div>

						<div class="fb-like" data-href="https://www.facebook.com/desijewelteam" data-width="300" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

						<div>
							<?php if($lang == "en"){?>

							<h2>Description</h2>
							<p class="discription">In this page we are showing Design of indian ethnic jewellery, Rajasthani desi
								Jewellery made in 22 carat gold for ladies, worn around their neck . Handcrafted by fine jewellers . Fine gold work with multicolored stone/diamond/nagina . Weight of these designs is based on it's appereance , actual weight can be lower and higher .
							</p>
							<?php  }else{ ?>
							<h2>विवरण</h2>
							<p class="discription">इस पृष्ठ में हम महिलाओं के लिए 22 कैरेट सोने में निर्मित भारतीय जातीय आभूषण, राजस्थानी देसी गहने का डिज़ाइन दिखा रहे हैं, जो उनके गले में पहना जाता है।
								बहुरंगी पत्थर / हीरा / नगीना के साथ बढ़िया सोने का काम। इन डिजाइनों का वजन इस पर आधारित है, वास्तविक वजन कम और अधिक हो सकता है।</p>
							<?php  }; ?>
						</div>
					</div>
					<!--  Category     -->

					<div class="btn_simple category align_center col-xs-12 col-md-2 col-md-pull-10">
						<?php include"login/init.php"; ?>
						<!--  Showing Username/Password Tab    -->
						<?php include"login/aside.php"; ?>
						<!--   Showing Category   -->
						<?php if($lang == "en"){?>
						<div>
							<div>

								<div class="side-header col-md-11">Desi Categories</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/new_photos" class="btn btn_custom">New Photos</a></div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Aad
										<span class="caret"></span>
									</button>
									<ul style="width:40px" class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li " href="/desi/aad">Aad</a></li>
										<li><a class="btn-li" href="/desi/desi_aad">Desi Aad</a></li>
										<li><a class="btn-li" href="/desi/mini_aad">Mini Aad</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Bangles
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li" href="/desi/bangles">Bangles</a></li>
										<li><a class="btn-li " href="/desi/aawla">Aawla</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/baali" class="btn btn_custom">Baali</a></div>
								<div class=" col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Bhujbandh
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu1">
										<li><a href="/desi/bhujbandh" class="btn-li">Bhujbandh</a></li>
										<li> <a href="/desi/bajubandh" class="btn-li">Baajubandh</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Bala Jhela
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class=" btn-li" href="/desi/bala+jhela">Bala + Jhela</a></li>
										<li><a class="btn-li " href="/desi/bala">Bala</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/bracelate" class="btn btn_custom">Bracelate</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/chain" class="btn btn_custom">Chain</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/chik_set" class="btn btn_custom">Chik Set</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/hathphool" class="btn btn_custom">Hathphool</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/jhoomariya" class="btn btn_custom">Jhoomariya</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/kandora" class="btn btn_custom">Kandora</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/kanti" class="btn btn_custom">Kanti</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/mangalsutra" class="btn btn_custom">Mangalsutra</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/nath" class="btn btn_custom">Nath</a></div>
								<div class=" col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Necklace
										<span class="caret"></span>
									</button>
									<ul style="width:40px" class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li" href="/desi/necklace">Necklace</a></li>
										<li><a class="btn-li" href="/desi/jodha_haar">Jodha Haar</a></li>

									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Punach
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class=" btn-li" href="/desi/punach">Punach</a></li>
										<li><a class="btn-li " href="/desi/nogariya">Nogariya</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/pendal" class="btn btn_custom">Pendal</a></div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Rakhdi Set
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li " href="/desi/rakhdi_set">Rakhdi Set</a></li>
										<li><a class="btn-li " href="/desi/rakhdi">Rakhdi</a></li>
										<li><a class="btn-li " href="/desi/bena">Bena</a></li>
										<li><a class="btn-li " href="/desi/bor">Bor</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Ring
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu1">
										<li><a class="btn-li " href="/desi/gents_ring">Gents Ring</a></li>
										<li><a class="btn-li" href="/desi/ladies_ring">Ladies Ring</a></li>
										<li><a class="btn-li" href="/desi/fancy_ring">Fancy Ring</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/ram_navmi" class="btn btn_custom">Ram Navmi</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/sohan_kanthi" class="btn btn_custom">Sohan Kanthi</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/sheesh_phool" class="btn btn_custom">Sheesh Phool</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/thusi" class="btn btn_custom">Thusi</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/timaniya" class="btn btn_custom">Timaniya</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/teeka" class="btn btn_custom">Teeka</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/unique" class="btn btn_custom">Unique</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/others" class="btn btn_custom">Others</a></div>
							</div>
						</div>

						<?php  }else{ ?>
						<div>
							<div>
								<div class="side-header col-md-11">गोल्ड केटेगरी</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/new_photos" class="btn btn_custom">न्यू डिजाईन</a></div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										आड़
										<span class="caret"></span>
									</button>
									<ul style="width:40px" class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li " href="/desi/aad">आड़</a></li>
										<li><a class="btn-li" href="/desi/desi_aad">देसी आड़</a></li>
										<li><a class="btn-li" href="/desi/mini_aad">मिनी आड़</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										बेन्गल्स
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li" href="/desi/bangles">बेन्गल्स</a></li>
										<li><a class="btn-li " href="/desi/aawla">आंवला</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/baali" class="btn btn_custom">बाली</a></div>
								<div class=" col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										भुजबंध
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu1">
										<li><a href="/desi/bhujbandh" class="btn-li">भुजबंध</a></li>
										<li> <a href="/desi/bajubandh" class="btn-li">बाजुबंध</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										बाला झेला
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class=" btn-li" href="/desi/bala+jhela">बाला + झेला</a></li>
										<li><a class="btn-li " href="/desi/bala">बाला</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/bracelate" class="btn btn_custom">ब्रेसलेट</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/chain" class="btn btn_custom">चैन</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/chik_set" class="btn btn_custom">चिक सेट</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/hathphool" class="btn btn_custom">हथफूल</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/jhoomariya" class="btn btn_custom">झूमरिया</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/kandora" class="btn btn_custom">कंदोरा</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/kanti" class="btn btn_custom">कंटी</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/mangalsutra" class="btn btn_custom">मंगलसूत्र</a></div>
								<div class="col-md-11 col-xs-6"> <a href="/desi/nath" class="btn btn_custom">नथ</a></div>
								<div class=" col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										नेकलेस
										<span class="caret"></span>
									</button>
									<ul style="width:40px" class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li" href="/desi/necklace">नेकलेस</a></li>
										<li><a class="btn-li" href="/desi/jodha_haar">जोधाहार</a></li>

									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										पुनछ
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class=" btn-li" href="/desi/punach">पुनछ</a></li>
										<li><a class="btn-li " href="/desi/nogariya">नोगरिया</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/pendal" class="btn btn_custom">पेंडल</a></div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn active btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										रखडी सेट
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu2">
										<li><a class="btn-li " href="/desi/rakhdi_set">रखडी सेट</a></li>
										<li><a class="btn-li " href="/desi/rakhdi">रखडी</a></li>
										<li><a class="btn-li " href="/desi/bena">बेना</a></li>
										<li><a class="btn-li " href="/desi/bor">बोर</a></li>
									</ul>
								</div>
								<div class="col-md-11 col-xs-6 drop_down dropdown">
									<button class="btn btn_custom  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										अंगूठी
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu drop-down" aria-labelledby="dropdownMenu1">
										<li><a class="btn-li " href="/desi/gents_ring">जेंट्स अंगूठी</a></li>
										<li><a class="btn-li" href="/desi/ladies_ring">लेडीज अंगूठी</a></li>
										<li><a class="btn-li" href="/desi/fancy_ring">फैंसी अंगूठी</a></li>
									</ul>
								</div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/ram_navmi" class="btn btn_custom">राम नवमी</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/sohan_kanthi" class="btn btn_custom">सोहन कंठी</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/sheesh_phool" class="btn btn_custom">शीशफूल</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/thusi" class="btn btn_custom">ठूसी</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/timaniya" class="btn btn_custom">तिमनिया</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/teeka" class="btn btn_custom">टीका</a></div>
								<div class=" col-md-11 col-xs-6"> <a href="/desi/others" class="btn btn_custom">अन्य</a></div>
							</div>
						</div>
						<?php } ?>
					</div>
					<!--  Footer content-->

				</div>
			</div>
			<div style="font-size: 15px" class="row align_center footer">
				<div>
					Copyright &copy <?php if($lang == "en"){?> भाषा - <a href="?lang=hn">हिंदी</a> <?php  }else{ ?> language - <a href="?lang=en">English</a> <?php  }; ?> | <a href="/" title="Desi Jewel">Desijewel.in</a> |
					<a href="/contact_us.php">Contact Us</a>|
					<a href="/privacy.html">Privacy Policy</a>|
					<a href="/tos.html">Terms of Service</a>|
					<a href="/about_us.html">About Us</a>|
					<a href="/disclaimer.html">Disclaimer</a>
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

</html>