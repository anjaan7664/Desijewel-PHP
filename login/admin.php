<?php
if(!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])){
        session_start();
    } ;

include_once '../../script/database.php';
include_once "init.php";
if(is_admin($_COOKIE['username']) === false){
	header("location:../index.php");

}

?>

<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Admin Panel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/script/main_login.css" rel="stylesheet" media="screen">
	<link href="/script/desi_jewel.css" rel="stylesheet">
	<style type="text/css">
		.btn_setting {
			width: 300px;
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
				<a href="/emboss.php" class="btn btn_nav">Emboss</a>
				<a href="/kundan.php" class="btn btn_nav">Kundan</a>
				<a href="../user.php" class="btn btn_nav">Profile</a>
				<a href="/upload.php" class="hidden-xs btn btn_nav">Upload</a>
			</div>
		</div>
		<div class="container-2">

			<form style="padding: 10px; margin: 0px auto 0px auto;max-width: 350px;" enctype="multipart/form-data" method="post">
				<h1>Account Activation</h1>
				<h3>Enter Email/Username</h3>
				<input name="acc" id="acc" type="text" class="btn_setting form-control"><br>
				<button style="margin-left:0px" name="submit" id="submit_acc" class="btn_setting btn btn-lg btn-primary btn-block" type="submit">Activate</button>
				<img id="acc_load" src="/logos/loader.gif" style="display: none;" class="btn_setting " alt="Loading" title="Loading">
				<h2 id="acc_act" style="margin-left: 15px"></h2>
			</form>
			<br>
			<form style="padding: 10px; margin: 0px auto 0px auto;max-width: 350px;" enctype="multipart/form-data" method="post">
				<h1>Make Admin</h1>
				<h3>Enter Email/Username</h3>
				<input name="acc_cc" id="acc_cc" type="text" class="btn_setting form-control"><br>
				<img id="cc_load" src="/logos/loader.gif" style="display: none;" class="btn_setting " alt="Loading" title="Loading">
				<button style="margin-left:0px" name="submit" id="submit_cc" class="btn_setting btn btn-lg btn-primary btn-block" type="submit">Make Admin</button>
				<h2 id="make_adm" style="margin-left: 15px"></h2>
			</form>
			<br>
			<form style="padding: 10px; margin: 0px auto 0px auto;max-width: 350px;" enctype="multipart/form-data" method="post">
				<h1>Set Password</h1>
				<input placeholder="Username" name="acc_username" id="acc_username" type="text" class="btn_setting form-control"><br>
				<input placeholder="Password" name="acc_password" id="acc_password" type="text" class="btn_setting form-control"><br>
				<img id="pass_load" src="/logos/loader.gif" style="display: none;" class="btn_setting " alt="Loading" title="Loading">
				<button style="margin-left:0px" name="submit" id="submit_pass" class="btn_setting btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
				<h2 id="set_pass" style="margin-left: 15px"></h2>
			</form>
			<br><br><br><br><br><br><br><br>

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
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#submit_acc').click(function(event) {
				event.preventDefault();
				$('#acc_load').show();
				$('#submit_acc').hide();
				$('#acc_act').hide();
				var acc = $('#acc').val();
				// AJAX Request
				$.ajax({
					url: '../script/admin_script.php',
					type: 'POST',
					data: {
						acc: acc
					},
					success: function(result) {
						$('#acc_act').show();
						$('#acc_act').html(result);
						$('#acc').val('');
						$('#acc_load').hide();
						$('#submit_acc').show();
					}
				});

			});

			$('#submit_cc').click(function(event) {
				event.preventDefault();
				$('#cc_load').show();
				$('#submit_cc').hide();
				$('#make_adm').hide();
				var acc_cc = $('#acc_cc').val();
				// AJAX Request
				$.ajax({
					url: '../script/admin_script.php',
					type: 'POST',
					data: {
						acc_cc: acc_cc
					},
					success: function(result) {
						$('#make_adm').show();
						$('#make_adm').html(result);
						$('#acc_cc').val('');
						$('#cc_load').hide();
						$('#submit_cc').show();
					}
				});

			});
			$('#submit_pass').click(function(event) {
				event.preventDefault();
				$('#pass_load').show();
				$('#submit_pass').hide();
				$('#set_pass').hide();
				var acc_username = $('#acc_username').val();
				var acc_password = $('#acc_password').val();
				// AJAX Request
				$.ajax({
					url: '../script/admin_script.php',
					type: 'POST',
					data: {
						acc_username: acc_username,
						acc_password: acc_password
						
					},
					success: function(result) {
						$('#set_pass').show();
						$('#set_pass').html(result);
						$('#acc_username').val('');
						$('#acc_password').val('');
						$('#pass_load').hide();
						$('#submit_pass').show();
					}
				});

			});
		});
	</script>
</footer>

</html>