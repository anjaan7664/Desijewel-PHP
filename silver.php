<?php session_start(); ?>
<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Desi Indian Silver Jewellery Photos </title>
	<meta name="description" content="Photos of Indian, Silver, Rajasthani jewellery with weight and category wise" />
	<meta name="keywords" content="Indian,Desi,,ehnic,jewellery,kundan,emboss,design,silver,Rajasthani,photos,Emboss" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logos/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="script/desi_jewel.css" rel="stylesheet">
	<script src="/script/jquery.js"></script>
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
				<div>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- First_ad -->
					<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9733613923055204" data-ad-slot="4184477932" data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<!--  Main content    -->

				<div style="padding: 0px;margin: 0px" class="row ">

					<!--  Displaying images    -->
					<div class=" ">

						<div class="col-md-10 align_center bg col-md-push-2  ">

							<div class="align_center  gallery">
								<h1 class="h1_tag">Showing Images of Silver Jewellery</h1>
								<div class="col-md-6">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- third_ad -->
									<ins class="adsbygoogle adimage" style="display:inline-block" data-ad-client="ca-pub-9733613923055204" data-ad-slot="4606522446"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
								<?php
								
include '../script/database.php';
include "script/db_script_nogm.php";
$table = "silver_un";
$sql = 'select * from silver_un WHERE dp="1"';
anjaan($sql);
echo "<p>Showing all images </p>";
?>
							</div>
							<div class="  align_center ">
								<div class=" col-md-12 pagination gallery">
									<?php
echo $paginationctrl;
?>
								</div>
							</div>
							<div>
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- S A -->
								<ins class="adsbygoogle large" style="display:inline-block;" data-ad-client="ca-pub-9733613923055204" data-ad-slot="6978245353"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
							<div>
								<h2>Description</h2>
								<p class="discription">Welcome in this website where you look for Design of Silver Jewellery. Handcrafted by fine jewellers . Weight of these designs is based on it's appereance , actual weight can be lower and higher .
								</p>
							</div>
						</div>
						<!--  Category     -->

						<div class="btn_simple category align_center col-xs-12 col-md-2 col-md-pull-10  ">
							<?php include"login/init.php"; ?>
							<!--  Showing Username/Password Tab    -->
							<?php include"login/aside.php"; ?>
							<!--   Showing Category   -->
							<?php include"script/category_silver.php"; ?>
							
							<div style="color: black;margin-left:-25px;margin-top:10px;" class="col-md-4">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- 8 --><ins class="adsbygoogle cat hidden-xs" style="display:inline-block;width:155px;height:200px" data-ad-client="ca-pub-9733613923055204" data-ad-slot="5806077563" data-ad-format="auto"></ins>
								<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
							<div style="margin:-10px 0px 0px -8px;">
								<a href="market://details?id=satlaa.desijewellery" target="_blank">
									<img src="/logos/androidhd.png" alt="androidapp" width="150" height="55"></a>
							</div>
						</div>
					</div>
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

</html>