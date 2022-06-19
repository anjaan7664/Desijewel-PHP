<!-- Design Filter -->

					
					<?php if(isset($test_var)) {
	?>
					<div id="sort_design_div" class="btn_simple hidden-xs category align_center col-xs-12 col-md-2 col-md-pull-10">
						<?php if(isset($_SESSION['top'.$table])) {
		?><a class="btn btn-danger" href="?submit_sort&new">Show New Design</a>
						<?php
	}
	else {
		?><a class="btn btn-success" href="?submit_sort&top">Show Top Design</a>
						<?php
	}
	?>
					</div>
					<?php
}

?>
					<?php if(isset($test_var)) {
	?>
					<?php if(isset($checkbox2)) {
		?>
					<div class="btn_simple hidden-xs align_center col-xs-12 col-md-2 col-md-pull-10  ">
						<div class="side-header">Filter</div>
						<form method="GET">
							<div class="checkbox btn-group align_center">
								<div class="col-md-12"><input id="checkbox1" name="<?php echo $checkbox1 ?>" type="checkbox" <?php if(isset($_SESSION[$checkbox1])) { echo "checked"; } ?>><label style="z-index:10" class="btn-info btn btn_filter" for="checkbox1"><?php echo $checkbox_value1 ?></label><br></div>
								<div class="col-md-12"><input id="checkbox2" name="<?php echo $checkbox2 ?>" type="checkbox" <?php if(isset($_SESSION[$checkbox2])) { echo "checked"; } ?>><label class="btn-info btn btn_filter" for="checkbox2"><?php echo $checkbox_value2 ?></label><br></div>
								<?php if(!empty($checkbox3)) {
			?>
								<div class="col-md-12"><input id="checkbox3" name="<?php echo $checkbox3 ?>" type="checkbox" <?php if(isset($_SESSION[$checkbox3])) { echo "checked"; } ?>><label class="btn-info btn btn_filter" for="checkbox3"><?php echo $checkbox_value3 ?></label><br></div>
								<?php
		}
		?>
								<?php if(!empty($checkbox4)) {
			?>
								<div class="col-md-12"><input id="checkbox4" name="<?php echo $checkbox4 ?>" type="checkbox" <?php if(isset($_SESSION[$checkbox4])) { echo "checked"; } ?>><label class="btn-info btn btn_filter" for="checkbox4"><?php echo $checkbox_value4 ?></label><br></div>
								<?php
		}
		?>
								<?php if(!empty($checkbox5)) {
			?>
								<div class="col-md-12"><input id="checkbox5" name="<?php echo $checkbox5 ?>" type="checkbox" <?php if(isset($_SESSION[$checkbox5])) { echo "checked"; } ?>><label class="btn-info btn" for="checkbox5"><?php echo $checkbox_value5 ?></label><br></div>
								<?php
		}
		?>
								<div class="col-md-12"><br><input class="btn-primary btn col-md-12" style="margin-right:-27px;" type="submit" name="submit_filter" value="Submit"><br></div>
								<?php if((!empty($checkbox1) && isset($_SESSION[$checkbox1])) || (!empty($checkbox2) && isset($_SESSION[$checkbox2])) || (!empty($checkbox3) && isset($_SESSION[$checkbox3])) || (!empty($checkbox4) && isset($_SESSION[$checkbox4])) || (!empty($checkbox5) && isset($_SESSION[$checkbox5]))) {
			?>
								<div class="col-md-12"><a class="btn-warning btn col-md-12 " style="margin-right: -27px;" href="?submit_filter=submit_filter">All Images</a></div>
								<?php
		}
		?>
							</div>
						</form>
					</div>
					<?php
	}
	?>
					<?php
}

?>
					<!-- Weight Filter -->
					<div class="btn_simple hidden-xs category align_center col-xs-12 col-md-2 col-md-pull-10  ">
						<div class="side-header">Weight</div>
						<form method="GET"><strong>From</strong><input style="width: 50px;" name="<?php echo $s_value_1 ?>" type="number" placeholder="<?php if(isset($_SESSION[$s_value_1])){ echo $_SESSION[$s_value_1]; }?>"><br><strong>To</strong><input style="width: 50px;margin-right: -6px;" name="<?php echo $s_value_2 ?>" type="number" placeholder="<?php if(isset($_SESSION[$s_value_2])){ echo $_SESSION[$s_value_2]; }?>"><br><input style="margin-right:-27px;" type="submit" name="submit" value="submit"><br>
							<?php if(isset($_SESSION[$s_value_1]) || isset($_SESSION[$s_value_2])) {
	?><a style="margin-right: -27px;width:64px;" class="btn btn_all_images" href="?<?php echo $s_value_1 ?>=&<?php echo $s_value_2 ?>=&submit=submit">All</a>
							<?php
}

?>
						</form>
					</div>