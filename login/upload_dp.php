<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ;

if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])){
	header ("location:../index.php");
}
include '../../script/database.php';
include_once("dp_upload.php")

?>

<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Signup</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logo/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/script/main_login.css" rel="stylesheet" media="screen">
	<link href="/script/desi_jewel.css" rel="stylesheet">
	<style type="text/css">
		.btn_setting {
			width: 300px;
		}
		
		.btn_nav {
			width: 250px;
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
		<div class=" bg_n">
			<div style="text-align:center" class=" ">
				<a href="/" class="btn btn_nav">Home</a>
				<a href="../user.php" class="btn btn_nav">Profile</a>
				<a href="/upload.php" class="hidden-xs btn btn_nav">Upload</a>
			</div>
		</div>
		<div class="container-2">
			<br><br><br>
			<form style="padding: 10px; margin: 0px auto 0px auto;max-width: 350px;" enctype="multipart/form-data" method="post">
				<h2>Upload Profile Picture</h2>
				<input class="btn_setting " style="width: 280px;height: 30px; font-size: 24px;" style="font-size:20px" type="file" name="upload" id="upload"><br>
				<button style="margin-left:0px" name="submit_dp" id="submit_dp" class="btn_setting btn btn-lg btn-primary btn-block" type="submit">Upload Image</button>
				<h3>
					<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
else{
    echo "Photo Chaged Successfully";
}
?>
				</h3>
			</form>

			<br><br><br><br><br><br><br><br><br><br>
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
	<script src="js/jquery-2.2.4.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script type="text/javascript" src="js/bootstrap.js"></script>



</footer>

</html>