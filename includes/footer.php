<footer>


	<?php include_once "../script/file_editing/btn_script.php"; ?>



	<link rel="stylesheet" type="text/css" href="/frameworks/fancybox/jquery.fancybox.min.css">
	<script src="/frameworks/fancybox/jquery.fancybox.min.js"></script>
	<script src="/frameworks/bootstrap/js/bootstrap.min.js"></script>

	<script src="/script/fancy_box_button.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#language').click(function() {
				var lang = this.value;
				location.reload();
				console.log(lang);

			});
		});
	</script>
</footer>