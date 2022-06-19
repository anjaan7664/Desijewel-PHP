<?php session_start();
include "../script/db_script_cg.php";
include '../../script/database.php';
// include '../script/track_ip.php';
include_once "../login/init.php";
$shopper_num = "7597937664";
$checkbox1;
$checkbox2;
$checkbox3;
$checkbox4;
$checkbox5;

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
}

if ($lang == "en") {
    $all_word = "All";
    $fancy_word = "Fancy";
    $kundan_word = "Kundan";
    $desi_word = "Desi";
} else {
    $all_word = "सभी";
    $fancy_word = "फैंसी";
    $kundan_word = "कुंदन";
    $desi_word = "देसी";
};

?>
<!DOCTYPE html>
<html lang="en-US">
<html>


<?php include "../includes/header.php" ; ?>

<body>

	<div class="container">
		<a href="/">
			<div class="hidden-xs back" alt="website logo"></div>
			<div class="visible-xs" alt="website logo"><img class="col-xs-12 back" src="/logos/logo-xs.webp"></div>
		</a>
		<!-- Navigation Bar -->
		<?php include "../includes/nav_bar.php" ; ?>
		<div class="container-2">


			<!-- Google Ad 1
			<div id="divAd1"></div> -->
			<!-- Main content -->
			<div style="padding: 0px;margin: 0px" class="row MainContent">
				<!-- Displaying images -->
				<div class=" ">
					<div class="col-md-10 align_center bg col-md-push-2">

						<div class="align_center gallery">
							<div class="align_center col-md-12">
								<h1 class="h1_tag col-md-12">
									<?php if ($lang == "en") {?>
									Showing Images of <?php echo $design;?>
									<?php  } else { ?>
                                    <?php echo $design;?> की डिजाईन दिखा रहे
                                    <?php  }; ?>

								</h1>
								<?php if (isset($emboss) || isset($kundan)) { ?>
								<div style="margin: 0px 0px 15px 0px" class="align_center col-md-12">
									<a class="btn btn_category btn-success align_center all_category " href="?subCat=">
										&nbsp;  <?php echo $all_word;?> &nbsp; &nbsp;
									</a>

									<a class="btn btn_category btn-primary align_center desi_category " href="?subCat=desi">
										&nbsp;  <?php echo $desi_word;?> &nbsp;
									</a>
									<?php if (isset($emboss)) { ?>
									<a class="btn btn_category btn-danger align_center emboss_category " href="?subCat=fancy">
										 <?php echo $fancy_word;?>
									</a>
									<?php } ?>
									<?php if (isset($kundan)) { ?>
									<a class="btn btn_category btn-info align_center kundan_category " href="?subCat=kundan">
										 <?php echo $kundan_word;?>
									</a>
									<?php } ?>
								</div>
								<?php } ?>
							</div>

							<div class="col-md-6">
								<div style="text-align:center">
									<a style="text-decoration: none" class="fancybox" href="/shoppers/silver.webp" data-fancybox="image">
										<?php if (isset($ad)) { ?>
										<img class="galleryimage" src="<?php echo $ad ?>">
										<?php } else { ?>
										<img class="galleryimage" src="/shoppers/silver.webp">
										<?php } ?>
									</a>

									<h5 id="weight_gm" class="col-xs-12 col-md-12" style="margin-top:0px;color:black;" class="align_center"><?php if ($lang == "en") {?> Contact for more info - "<?php echo $shopper_num; ?>" (Near Jodhpur)
<?php  } else { ?>अधिक जानकारी के लिए संपर्क करे - "<?php echo $shopper_num; ?>"(केवल जोधपुर और आसपास के इलाके )<?php  }; ?></h5>
								</div>
								<br><br>

							</div>

							<?php include "../includes/data_load.php" ?>
						</div>
						<div class="align_center">
							<div class=" col-md-12 pagination gallery">
								<?php echo $paginationctrl;
?>
							</div>
						</div>
						<h4 class="col-md-12 col-xs-12"><?php if ($lang == "en") {?> Contact for more info - "<?php echo $shopper_num; ?>" (Near Jodhpur)
<?php  } else { ?>अधिक जानकारी के लिए संपर्क करे - "<?php echo $shopper_num; ?>"(केवल जोधपुर और आसपास के इलाके )<?php  }; ?></h4>
						<div>
							<h5>
								<?php if (isset($comment)) {
    echo $comment;
}

?>
							</h5>
						</div>

						<!-- Google Ad 2 -->
						<!--<div id="divAd2"></div> -->

						<?php include "../includes/disc.php" ; ?>

						<!-- Design Filter --></div>
						<?php //include "../includes/filter.php" ;?>

						<!-- Category -->
						<?php include "../includes/category.php" ; ?>
					</div>
				</div>



				<div style="font-size: 15px" class="row align_center footer">
					<div>Copyright &copy  <?php if ($lang == "en") {?> भाषा - <a href="?lang=hn" >हिंदी</a> <?php  } else { ?> language - <a href="?lang=en" >English</a>	<?php  }; ?> | <a href="/" title="Desi Jewel">Desijewel.in</a>| <a href="/contact_us.php">Contact Us</a>| <a href="/privacy.html">Privacy Policy</a>| <a href="/tos.html">Terms of Service</a>| <a href="/about_us.html">About Us</a>| <a href="/disclaimer.html">Disclaimer</a></div>
				</div>

			</div>
		</div>
	</div>
	<?php include "../includes/google_tag.php" ; ?>
</body>
<?php include "../includes/footer.php" ; ?>
<!--
<div id="divAd1Data" style="display: none;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- First_ad --> <!-- <ins class="adsbygoogle" style="display:block" data-full-width-responsive="true" data-ad-client="ca-pub-9733613923055204" data-ad-slot="4184477932" data-ad-format="auto"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({}

		);
	</script>
</div>
<div id="divAd2Data" style="display: none;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- S A --> <!--<ins class="adsbygoogle large" style="display:inline-block;" data-full-width-responsive="true" data-ad-client="ca-pub-9733613923055204" data-ad-slot="6978245353"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({}

		);
	</script>
</div>
<script type="text/javascript">
	window.onload = function() {
		document.getElementById('divAd1').appendChild(document.getElementById('divAd1Data'));
		document.getElementById('divAd1Data').style.display = '';
		document.getElementById('divAd2').appendChild(document.getElementById('divAd2Data'));
		document.getElementById('divAd2Data').style.display = '';

	};
</script> -->

</html>
