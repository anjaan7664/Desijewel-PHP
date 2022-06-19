<?php
function anjaan($sql)
{
    include '../script/database.php';
    function make_thumb($src, $dest, $desired_width)
    {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width        = imagesx($source_image);
        $height       = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }
    $sql;
    $query     = mysqli_query($db_user, "$sql");
    $row       = mysqli_num_rows($query);
    $rows      = $row[0];
    $page_rows = 16;
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
    } else if ($pagenum > $last) {
        $pagenum = $last;
    }

    $limit = 'LIMIT' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
    $n     = ($pagenum - 1) * $page_rows;
    $sql1  = " $sql ORDER BY id DESC LIMIT  $n ,$page_rows ";
    $query = mysqli_query($db_user, $sql1);
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
		global $user_dir ;
        $img     = $row['image'];
        $id_image = $row['id'];
        $weight    = $row['weight'];
        $row_date  = $row['date'];
		$date = substr($row_date,0,10);
		if($date === '0000-00-00'){
			$date = "";
		};
        $image_path   = $row['path'];
        $image = "uploads_user/$user_dir/". $row['image'];
        $alt   = $row['alt'];
        $path  = 'images/thumb/' . $img;
        $thumb = make_thumb($image, $path, 500);
        
?>
<div class="col-md-6 pic">
	<a style="text-decoration: none" class="fancybox" href="<?php echo $image; ?>" data-fancybox="image">
<img style="object-fit: cover;" id="galleryimage" class="galleryimage" src= "<?php echo $path; ?>" alt="<?php echo $alt; ?>"></a>
	<div style="text-align: left;margin-bottom: 10px;" class="col-xs-4 col-md-4">
		<p class="date" style="font-size:13px;">
			<?php echo $date;?>
		</p>
	</div>
	<h4 id="weight_gm" class="col-xs-4 col-md-4 weight_gm align_center" style="margin-top:0px;">
		<?php if(!empty($weight)){ echo $weight; ?> gm
		<?php } ?>
	</h4>
	<div id="setting_user" class="col-md-4" style="text-align: right">
		<input class="setting_btn" type="image" src="/logos/edit.png" alt="Setting Icon" style="width:40px; height: 40px;"></div>

	<div class="col-xs-12 col-md-12" style="" id="div_setting">
		<input type="hidden" class="id_image" value="<?php echo $id_image; ?>" />
		<input type="hidden" class="weight" value="<?php echo $weight; ?>" />
		<button style="display:none ; z-index:10" class="btn btn-primary edit col-md-6 col-xs-6">Edit Weight</button>
		<button style="display:none ; z-index:10" class="btn btn-red delete col-md-6 col-xs-6">Delete</button>
		<button style="display:none ; z-index:10" class="btn btn-success delete_yes col-md-4 col-xs-4" value="<?php echo $row['image']; ?>">Yes</button>
		<button style="display:none ; z-index:10" class="btn btn-success save col-md-4 col-xs-4">Save</button>
		<button style="display:none ; z-index:10" class="btn btn-danger cancel col-md-4 col-xs-4">Cancel</button>
	</div>
</div>
<?php }} ?>