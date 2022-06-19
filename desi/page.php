<?php session_start();
include "../script/db_script_cg.php";
include '../../script/database.php';
include '../script/track_ip.php';
include_once "../login/init.php";
$shopper_num = "8239418128";
$checkbox1;
$checkbox2;
$checkbox3;
$checkbox4;
$checkbox5;
?>
<html lang="en-US">
<html>


<?php include "../includes/header.php" ; ?>

<body>
	<?php include "../includes/google_tag.php" ; ?>

	<div class="container">
		<!-- Navigation Bar -->
		<?php include "../includes/nav_bar.php" ; ?>
		<div class="container-2">
			<div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- First_ad --><ins class="adsbygoogle" style="display:block" data-full-width-responsive="true" data-ad-client="ca-pub-9733613923055204" data-ad-slot="4184477932" data-ad-format="auto"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({}

					);
				</script>
			</div>
			<!-- Main content -->
			<div style="padding: 0px;margin: 0px" class="row ">
				<!-- Displaying images -->
				<div class=" ">
					<div class="col-md-10 align_center bg col-md-push-2">

						<!-- <div id="accordion" class="panel-group visible-xs"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Design Filter</a></h4></div><div id="collapseOne" class="panel-collapse collapse">here goes all filter code </div></div></div>-->
						<div class="align_center gallery">
							<div class="align_center col-md-12">
								<h1 class="h1_tag">Showing Images of
									<?php echo $design;
?>
								</h1>
								<div style="text-align:right;" class="">
									<a class="username" style="font-size:16px;text-align:left;z-index:10;height:25px; margin-right: 0px;font-weight: 500" href="?subCat=">
										Type - All
									</a>
								</div>
							</div>

							<div class="col-md-6">
								<div style="text-align:center">
									<a style="text-decoration: none" class="fancybox" href="/advertisers/anjaan.jpg" data-fancybox="image">
										<?php if(isset($ad)) { ?>
										<img class="galleryimage" src="<?php echo $ad ?>">
										<?php }else{ ?>
										<img class="galleryimage" src="/advertisers/anjaan.jpg">
										<?php } ?>
									</a>

									<h5 id="weight_gm" class="col-xs-12 col-md-12" style="margin-top:0px;color:black;" class="align_center">अधिक जानकारी के लिए संपर्क करे - "<?php echo $shopper_num; ?>"(केवल जोधपुर और आसपास के इलाके )</h5>
								</div>
								<br><br>
								<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
													<ins class="adsbygoogle adimage" style="display:inline-block" data-ad-client="ca-pub-9733613923055204" data-ad-slot="4606522446"></
													>
													<script>
														(adsbygoogle = window.adsbygoogle || []).push({});
													</script> -->
							</div>
			

							<?php include "../includes/data_load.php" ?>
						</div>
						<div class="align_center ">
							<div class=" col-md-12 pagination gallery">
								<?php echo $paginationctrl;
?>
							</div>
						</div>
						<h4 class="col-md-12 col-xs-12">अधिक जानकारी के लिए संपर्क करे - "<?php echo $shopper_num; ?>"(केवल जोधपुर और आसपास के इलाके )</h4>
						<div>
							<h5>
								<?php if(isset($comment)) {
	echo $comment;
}

?>
							</h5>
						</div>
						<div>
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- S A --><ins class="adsbygoogle large" style="display:inline-block;" data-full-width-responsive="true" data-ad-client="ca-pub-9733613923055204" data-ad-slot="6978245353"></ins>
							<script>
								(adsbygoogle = window.adsbygoogle || []).push({}

								);
							</script>
						</div>

						<?php include "../includes/disc.php" ; ?>

						<!-- Design Filter -->
						<?php include "../includes/filter.php" ; ?>

						<!-- Category -->
						<?php include "../includes/category.php" ; ?>
					</div>
				</div>
			</div>
			<!-- Footer content-->
			<?php include "../includes/footer.php" ; ?>
			<div style="font-size: 15px" class="row align_center footer">
				<div>Copyright &copy <a href="/" title="Desi Jewel">Desijewel.in</a>| <a href="/contact_us.php">Contact Us</a>| <a href="/privacy.html">Privacy Policy</a>| <a href="/tos.html">Terms of Service</a>| <a href="/about_us.html">About Us</a>| <a href="/disclaimer.html">Disclaimer</a></div>
			</div>
		</div>
	</div>
</body>

</html>
