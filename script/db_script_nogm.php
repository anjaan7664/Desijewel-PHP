<?php
function anjaan($sql)
{
    include '../script/database.php';
    mysqli_set_charset($db, 'utf8');
    $sql;
    $query     = mysqli_query($db, "$sql");
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
    } elseif ($pagenum > $last) {
        $pagenum = $last;
    }

    $limit = 'LIMIT' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
    $n     = ($pagenum - 1) * $page_rows;
    $sql1  = "  $sql ORDER BY id DESC LIMIT $n ,$page_rows";
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
        $img   = $row['image'];
        $image_path   = $row['path'];
        $image = "djp/" . $image_path . $row['image'];
        $alt   = $row['alt'];
        $path  = 'images/thumb/'.$image_path . $img; ?>
<div class="col-md-6 col-lg-6 display_div">
	<a style="text-decoration: none" class="" href="<?php echo $image; ?>" data-fancybox="image">
<img style="object-fit: cover;" id="galleryimage" class="galleryimage" src= "<?php echo $path; ?>" alt="<?php echo $alt; ?>"></a>
	<div class="col-xs-4 col-md-4"></div>


</div>

<?php
    }
} ?>
