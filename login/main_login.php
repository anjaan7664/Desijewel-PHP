<?php
session_start();
if (isset($_COOKIE['username'])) {
    header("location:../index.php");
}
?>
<html lang="en-US">
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="/logo/favicon.ico" />
	<link href="/frameworks/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/script/main_login.css" rel="stylesheet" media="screen">
	<link href="/script/desi_jewel.css" rel="stylesheet">

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
			<form class="form-signin" name="form1" method="post" action="checklogin.php">
				<input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" value="<?php if(isset($_COOKIE[" member_login "])) { echo $_COOKIE["member_login "]; } ?>" autofocus>
				<input name="mypassword" id="mypassword" type="password" class="form-control" value="<?php if(isset($_COOKIE[" member_password "])) { echo $_COOKIE["member_password "]; } ?>" placeholder="Password">

				<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE[ "member_login"])) { ?> checked
				<?php } ?> />
				<label for="remember-me">Remember me</label>

				<button style="margin-left:0px" name="Submit" id="submit" class="btn btn-primary btn-block" type="submit">Sign in</button>
				<a style="margin-left:0px" href="/login/signup.php" name="Sign Up" id="signup" class="btn btn-primary btn-block" type="submit">Create account</a>

				<div id="message"></div>
			</form>
			<br><br><br><br><br><br><br><br><br><br><br><br>
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
	<!-- The AJAX login script -->
	<script src="js/login.js"></script>
</footer>

</html>