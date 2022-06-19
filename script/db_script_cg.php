<?php

function anjaan($sql, $sort_type)
{    // setting kundan var as global
    global $kundan;
    global $emboss;
    global $lang;
    include '../../script/database.php';
    mysqli_set_charset($db, 'utf8');
    $sql;
    $sort_type;
    $query     = mysqli_query($db, $sql);
    $row       = mysqli_num_rows($query);
    $rows      = $row[0];
    $page_rows = 25;
    $last      = ceil($row / $page_rows);
    if ($last < 1) {
        $last = 1;
    }

    $pagenum = 1;
    if (isset($_GET['pn'])) {
        $pagenum = (int) $_GET['pn'];
    }

    if ($pagenum < 1) {
        $pagenum = 1;
    } elseif ($pagenum > $last) {
        $pagenum = $last;
    }
    $n     = ($pagenum - 1) * $page_rows;
    $sql1  = "$sql ORDER BY $sort_type DESC LIMIT  $n ,$page_rows ";

    $query = mysqli_query($db, $sql1);
    global $paginationctrl;
    $paginationctrl = '';
    if ($last != 1) {
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationctrl .= '<a  href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '">Pr</a>' . '&nbsp;';
            for ($i = $pagenum - 3; $i < $pagenum; $i++) {
                if ($i > 0) {
                    $paginationctrl .= '<a  class="active" href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '">' . $i . '</a>' . '&nbsp;';
                }
            }
        }

        $paginationctrl .= '' . $pagenum . '&nbsp;';
        for ($i = $pagenum + 1; $i < $last; $i++) {
            $paginationctrl .= '<a  class="active" href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '">' . $i . '</a>' . '&nbsp;';
            if ($i >= $pagenum + 4) {
                break;
            }
        }
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationctrl .= ' <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '">Next</a>';
        }
    }
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $img     = $row['image'];
        $id_image = $row['id'];
        $weight    = $row['weight'];
        $row_date  = $row['date'];
        $sub_category  = $row['sub_category'];
        $image_path   = $row['path'];
        // for thumb
        $image = "../djp/" . $image_path . $row['image'];
        $alt_weight = "";
        $alt_en   = $row['alt'];
        $alt_hn = $row['alt_hn'];
        if ($weight != '') {
            if ($lang == "en") {
                $alt_weight = " And Weight is ".$weight." gm";
            } else {
                $alt_weight = " और वजन ".$weight." ग्राम";
            }
        }
        if ($lang == "en") {
            $alt   = "Marwadi ".$row['alt'].$alt_weight ;
        } else {
            $alt = "मारवाड़ी ".$row['alt_hn'].$alt_weight;
        }

        $likes = $row['hit'];
        $tag = $row['tag'];
        // for thumb
        $path  = '../images/thumb/'.$image_path. $img;
        // if (!file_exists('../images/thumb/'.$image_path)) {
        //   mkdir('../images/thumb/'.$image_path, 0777, true);}


        // For real image
        $image = "djp/" . $image_path . $row['image'];
        $path  = 'images/thumb/'.$image_path. $img;
        $tag_short_form = array("min", "cast", "stn");
        $tag_full_name   = array("Meena", "Casting", "Nagina");
        $tag_name = str_replace($tag_short_form, $tag_full_name, $tag); ?>
<div class="col-md-6 col-lg-6 display_div">
	<a style="text-decoration: none" class="" href="/watermark.php?image=<?php  echo $image; ?>" data-fancybox="image">
<img style="object-fit: cover;" id="galleryimage" class="galleryimage" src= "/watermark.php?image=<?php echo $path; ?>" title="<?php echo $alt; ?>" alt="<?php echo $alt; ?>">
</a>


	<h4 id="weight_gm" class="col-xs-12col-md-12 weight_gm align_center" style="margin-top:0px;">
		&nbsp;
		<?php if (!empty($weight)) {
            echo $weight; ?> gm
		<?php
        } ?>
		&nbsp;
	</h4>
	<?php
    if (isset($_COOKIE['username'])) {
        if (is_admin($_COOKIE['username']) === true) { ?>
	<div class="col-md-12" style="text-align: right; margin-bottom: 0px">
		<input class="setting_btn" type="image" src="/logos/edit.webp" alt="Setting Icon" style="width:40px; height: 40px;"></div>
	<?php } elseif (is_cc($_COOKIE['username']) === true) { ?>
	<div class="col-md-12" style="text-align: right; margin-bottom: 20px">
		<input class="setting_btn" type="image" src="/logos/edit.webp" alt="Setting Icon" style="width:40px; height: 40px;"></div>
	<?php }
    } ?>

	<?php if (isset($emboss) || isset($kundan)) { ?>
	<div style="text-align:left;z-index:10;margin: -20px 0px 10px 0px;" class="col-xs-12 col-md-12 username_div">
		<a class="btn btn-link" style="font-size:16px;text-align:left;z-index:10;font-weight: 500;margin-left: -18px;" href="?subCat=<?php echo $sub_category; ?>">
			Type - <?php echo $sub_category; ?>
		</a>
	</div>
	<?php } ?>
	<?php
      if (isset($_COOKIE['username'])) {
          if (is_admin($_COOKIE['username']) === true) { ?>
	<div class="col-xs-12 col-md-12 div_setting">
		<input type="hidden" class="id_image" value="<?php echo $id_image; ?>" />
		<input type="hidden" class="path" value="<?php echo $image_path; ?>" />
		<input type="hidden" class="weight" value="<?php echo $weight; ?>" />
		<input type="hidden" class="user" value="<?php echo $user; ?>" />
		<input type="hidden" class="tag" value="<?php echo $tag; ?>" />
		<input type="hidden" class="likes" value="<?php echo $likes; ?>" />
		<input type="hidden" class="alt_data_en" value="<?php echo $alt_en; ?>" />
		<input type="hidden" class="alt_data_hn" value="<?php echo $alt_hn; ?>" />
		<input type="hidden" class="sub_category_table" value="<?php echo $sub_category; ?>" />
		<input type="hidden" class="tblNameFromNewPhotos" value="<?php echo $tblNameFromNewPhotos; ?>" />
		<button style="display:none ; z-index:10" class="btn btn-primary edit col-md-4 col-xs-4">Weight</button>
		<button style="display:none ; z-index:10" class="btn btn-info move col-md-4 col-xs-4">Move</button>
		<button style="display:none ; z-index:10" class="btn btn-danger delete col-md-4 col-xs-4">Delete</button>
		<button style="display:none ; z-index:10" class="btn btn-success user col-md-4 col-xs-4">User</button>
		<button style="display:none ; z-index:10" class="btn btn-warning likes col-md-4 col-xs-4">likes</button>
		<button style="display:none ; z-index:10" class="btn btn-primary tag col-md-4 col-xs-4">Tag</button>
		<button style="display:none ; z-index:10" class="btn btn-primary alt col-md-4 col-xs-4">Alt</button>
		<button style="display:none ; z-index:10" class="btn btn-danger swipe col-md-4 col-xs-4">Swipe</button>
		<button style="display:none ; z-index:10" class="btn btn-warning rename col-md-4 col-xs-4">Rename</button>
		<button style="display:none ; z-index:10" class="btn btn-success delete_yes col-md-8 col-xs-8" value="<?php echo $row['image']; ?>">Yes</button>
		<button style="display:none ; z-index:10" class="btn btn-success save col-md-4 col-xs-4">Save</button>
		<button style="display:none ; z-index:10" class="btn btn-success save_user col-md-4 col-xs-4">Save</button>
		<button style="display:none ; z-index:10" class="btn btn-success save_alt col-md-8 col-xs-8">Save</button>
		<button style="display:none ; z-index:10" class="btn btn-success okay col-md-4 col-xs-4">Move</button>
		<button style="display:none ; z-index:10" class="btn btn-success set_likes col-md-4 col-xs-4">Set</button>
		<button style="display:none ; z-index:10" class="btn btn-success save_rename col-md-8 col-xs-8">Save</button>
		<input type="submit" form="tag_form" style="display:none ; z-index:10" class="btn btn-success set_tag col-md-4 col-xs-4" value="Set">
		<button style="display:none ; z-index:10" class="btn btn-danger cancel col-md-4 col-xs-4">Cancel</button>
		<div class="col-md-12 col-xs-12">
			<h5 id="tag_name" class="col-xs-4 col-md-4 align_center tag_name" style="margin-top:10px;color: blue">
				<?php if (!empty($tag_name)) {
              echo $tag_name; ?>
				<?php
          } ?>
			</h5>
			<h5 id="image_likes" class="col-xs-4 col-md-4 align_center image_likes" style="margin-top:10px;color: magenta">
				<?php if (!empty($likes)) {
              echo $likes; ?> Likes
				<?php
          } ?>
			</h5>
		</div>
	</div>
	<?php } elseif (is_cc($_COOKIE['username']) === true) { ?>
	<div class="col-xs-12 col-md-12 div_setting">

		<input type="hidden" class="id_image" value="<?php echo $id_image; ?>" />
		<input type="hidden" class="path" value="<?php echo $image_path; ?>" />
		<input type="hidden" class="weight" value="<?php echo $weight; ?>" />
		<input type="hidden" class="user" value="<?php echo $user; ?>" />
		<button style="display:none ; z-index:10" class="btn btn-success delete_yes col-md-4 col-xs-4" value="<?php echo $row['image']; ?>">Yes</button>
		<input style="display:none ; z-index:10; border:1px solid black;" type="text" class="btn edit_input col-md-4 col-xs-4">
		<button style="display:none ; z-index:10" class="btn btn-success save col-md-4 col-xs-4">Set Likes</button>
		<button style="display:none ; z-index:10" class="btn btn-danger cancel col-md-4 col-xs-4">Cancel</button>
		<div class="col-md-12 col-xs-12">
			<h5 id="tag_name" class="col-xs-4 col-md-4 align_center tag_name" style="margin-top:10px;color: blue">
				<?php if (!empty($tag_name)) {
              echo $tag_name; ?>
				<?php
          } ?>
			</h5>
			<h5 id="image_likes" class="col-xs-4 col-md-4 align_center image_likes" style="margin-top:10px;color: magenta">
				<?php if (!empty($likes)) {
              echo $likes; ?> Likes
				<?php
          } ?>
			</h5>
		</div>
	</div>
	<?php }
      } ?>
</div>
<?php
    }
} ?>
