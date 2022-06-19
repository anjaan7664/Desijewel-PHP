<?php
if (isset($_COOKIE['username'])) {
    $admin_name = $_COOKIE['username'];
    if (is_admin($_COOKIE['username']) === true) {
        ?>

<script type="text/javascript">
	$(document).ready(function() {
		var tag;
		var fullName;
		$(".setting_btn").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).parent().siblings('.username_div').hide();
			$(this).parent().siblings().children('.delete').show();
			$(this).parent().siblings().children('.user').show();
			$(this).parent().siblings().children('.edit').show();
			$(this).parent().siblings().children('.move').show();
			$(this).parent().siblings().children('.tag').show();
			$(this).parent().siblings().children('.likes').show();
			$(this).parent().siblings().children('.alt').show();
			$(this).parent().siblings().children('.swipe').show();
			$(this).parent().siblings().children('.rename').show();
			var table = $(this).parent().siblings().children('.tblNameFromNewPhotos').val();
			if (table === '') {
				var table = '<?php echo $table; ?>';
			}
			switch (table) {
				case 'baajubandh':
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 'bala':
					tag = ['rglr', 'tops'];
					fullName = ['Regular', 'Tops'];
					break;
				case 'bangles':
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 'desi_aad':
					tag = ['dsi', 'chti', 'stn'];
					fullName = ['Desi', 'Chataai', 'Nagina'];
					break;
				case 'emboss_baajubandh':
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 'emboss_bala':
					tag = ['rglr', 'tops'];
					fullName = ['Regular', 'Tops'];
					break;
				case 'emboss_bangles':
					tag = ['rglr', 'chpi'];
					fullName = ['Regular', 'Chapaai'];
					break;
				case 'emboss_jhoomariya':
					tag = ['1tkri', '2tkri', '3tkri'];
					fullName = ['1 Tokri', '1 Tokri', '1 Tokri'];
					break;
				case 'emboss_ladies_ring':
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 'emboss_mangalsutra':
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 'emboss_necklace':
					tag = ['stn', 'min', 'cast'];
					fullName = ['Nagina', 'Meena', 'Casting'];
					break;
				case 'rakhdi_set':
					tag = ['rset', 'bena'];
					fullName = ['RSet', 'Bena'];
					break;

				case 'emboss_rakhdi_set':
					tag = ['rset', 'bena'];
					fullName = ['RSet', 'Bena'];
					break;

				default:
					tag = '';
					fullName = '';
			}
			if (tag !== '') {
				$(this).parent().siblings().children('.tag').removeClass('btn-basic').addClass("btn-primary");
			} else {
				$(this).parent().siblings().children('.tag').removeClass('btn-primary').addClass("btn-basic");

			}
		});

		$(".rename").on('click', function(event) {
      event.preventDefault();
    $(this).hide();
    $(this).siblings('.delete').hide();
    $(this).siblings('.user').hide();
    $(this).siblings('.edit').hide();
    $(this).siblings('.tag').hide();
    $(this).siblings('.move').hide();
    $(this).siblings('.likes').hide();
    $(this).siblings('.alt').hide();
    $(this).siblings('.swipe').hide();
    $(this).siblings('.set_likes').hide();
    $(this).siblings('.rename').hide();
    $(this).siblings('.cancel').show();
    $(this).siblings('.save_rename').show();
    $(this).parent().children(':eq(1)').after('<input style="z-index:10 ;border:1px solid black;margin-left: -5px;" type="text" class=" rename_input form-control col-md-12 col-xs-12 ">');
	});

		$('.save_rename').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
      var path = $(this).siblings('.path').val();
      var newname = $(this).siblings('.rename_input').val();
      var id_image = $(this).siblings('.id_image').val();
			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
          path:path,
          newname:newname,
					image: image,
					admin: admin,
          id_image:id_image,
					table: table
				},
				success: function(data) {
					console.log(data);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.likes_input').hide();
					$(el).siblings('.alt_en_input').hide();
					$(el).siblings('.alt_hn_input').hide();
					$(el).siblings('.rename_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save_rename').hide();
					$(el).siblings('.save_alt').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(this).siblings('.rename').hide();

				 	$(el).parent().siblings().children('.setting_btn').show();
				},
				error: function(data) {
					console.log(data);
				}
			});

		});


		$(".edit").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.save').show();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.rename').hide();
			$(this).parent().children(':eq(1)').after('<input style="z-index:10; border:1px solid black;" type="text" class="btn edit_input col-md-4 col-xs-4">');
		});

		$('.save').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var weight = $(this).siblings('.edit_input').val();
			var tblNameFromNW = $(this).siblings('.tblNameFromNewPhotos').val();

			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
					weight: weight,
					image: image,
					admin: admin,
					tblNameFromNW: tblNameFromNW,
					table: table
				},
				success: function(data) {

					console.log(data);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(el).parent().siblings().children('.setting_btn').show();
					$(el).parent().siblings('.weight_gm').text(weight + " gm");
				},

				error: function(data) {
					console.log(data);
				}
			});

		});

		$(".user").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.save_user').show();
			$(this).parent().children(':eq(1)').after('<input style="z-index:10; border:1px solid black;" type="text" class="btn user_input col-md-4 col-xs-4">');
		});

		$('.save_user').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var user = $(this).siblings('.user_input').val();

			$.ajax({
				url: '../script/file_editing/image_edit_user.php',
				type: 'POST',
				data: {
					user: user,
					image: image,
					admin: admin,
					table: table
				},
				success: function(result) {
					console.log(result);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(this).siblings('.rename').hide();
					$(el).parent().siblings().children('.setting_btn').show();
					$(el).parent().siblings('.username_div').replaceWith('<h3>' + result + '</h3>');


				}
			});

		});

		$(".move").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.alt').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.okay').show();
			$(this).parent().children(':eq(1)').after('<input style="z-index:10 ;border:1px solid black;" type="number" class="btn  move_to_input col-md-4 col-xs-4">');
		});

		$('.okay').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var table_number = $(this).siblings('.move_to_input').val();
			var path = $(this).siblings('.path').val();
			var weight = $(this).siblings('.weight').val();
			var user = $(this).siblings('.user').val();
			var tag = $(this).siblings('.tag').val();
			var likes = $(this).siblings('.likes').val();
			var id_image = $(this).siblings('.id_image').val();
			var sub_category = $(this).siblings('.sub_category_table').val();
			if (table_number !== '') {
				$.ajax({
					url: '../script/file_editing/image_move.php',
					type: 'POST',
					data: {
						table_number: table_number,
						image: image,
						path: path,
						user: user,
						tag: tag,
						likes: likes,
						weight: weight,
						table: table,
						admin: admin,
						sub_category: sub_category,
						id_image: id_image
					},
					success: function(result_move) {
						$(el).parent().parent().closest('div').css('background', 'white');
						$(el).parent().parent().closest('div').fadeOut(800, function() {
							$(this).remove();
						});
						console.log(result_move);

					}
				});

			}
		});

		$(".delete").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.delete_yes').show();
		});

		$('.delete_yes').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = this.value;
			var id_image = $(this).siblings('.id_image').val();
			// AJAX Request
			$.ajax({
				url: '../script/file_editing/image_delete.php',
				type: 'POST',
				data: {
					image: image,
					admin: admin,
					table: table,
					id_image: id_image
				},
				success: function() {
					$(el).parent().parent().closest('div').css('background', 'white');
					$(el).parent().parent().closest('div').fadeOut(800, function() {
						$(this).remove();
					});
				}
			});

		});
		// Seting Tag




		$(".tag").on('click', function(event) {
			event.preventDefault();
			var table = $(this).siblings('.tblNameFromNewPhotos').val();
			if (table === '') {
				var table = '<?php echo $table; ?>';
			}



			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.set_tag').show();
			$(".set_tag").removeClass('col-md-4 col-xs-4').addClass("col-md-6 col-xs-6");
			$(".cancel").removeClass('col-md-4 col-xs-4').addClass("col-md-6 col-xs-6");
			var childChecBox = '';
			$.each(tag, function(i) {
				var checkBoxName = tag[i];

				childChecBox += '<input class="cb" name="cb" id="' + checkBoxName + '" value="' + checkBoxName + '" type="checkbox">' +
					'<label class="" for="' + checkBoxName + '">&nbsp;' + fullName[i] + '</label><br>';

			});
			$(this).parent().children(':eq(1)').after('<form class="tag_form" method="GET">' + childChecBox +
				'</form>');

		});

		$('.set_tag').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var tblNameFromNW = $(this).siblings('.tblNameFromNewPhotos').val();
			var tag = $(this).siblings().children('input[name="cb"]:checked').map(function() {
				return this.value;
			}).get().join(',');
			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
					tag: tag,
					image: image,
					admin: admin,
					tblNameFromNW: tblNameFromNW,
					table: table
				},
				success: function(data) {
					console.log(data);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(this).siblings('.rename').hide();
					$(el).parent().siblings().children('.setting_btn').show();
					$(el).siblings('.tag_form').hide();
					$(el).siblings('.tag_name').text(tag);
				},
				error: function(data) {
					console.log(data);
				}
			});

		});


		$(".likes").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.set_likes').show();
			$(this).parent().children(':eq(1)').after('<input style="z-index:10 ;border:1px solid black;" type="text" value="" class="btn likes_input col-md-4 col-xs-4">');
		});

		$('.set_likes').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var likes = $(this).siblings('.likes_input').val();
			var tblNameFromNW = $(this).siblings('.tblNameFromNewPhotos').val();

			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
					likes: likes,
					image: image,
					tblNameFromNW: tblNameFromNW,
					admin: admin,
					table: table
				},
				success: function(data) {
					console.log(data);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.likes_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(this).siblings('.rename').hide();
					$(el).parent().siblings().children('.setting_btn').show();
					$(el).siblings('.image_likes').text(likes);
				},
				error: function(data) {
					console.log(data);
				}
			});

		});

		$(".alt").on('click', function(event) {
			event.preventDefault();
			var alt_data_en = $(this).siblings('.alt_data_en').val();
			var alt_data_hn = $(this).siblings('.alt_data_hn').val();

			$(this).hide();
			$(this).siblings('.delete').hide();
			$(this).siblings('.user').hide();
			$(this).siblings('.edit').hide();
			$(this).siblings('.tag').hide();
			$(this).siblings('.move').hide();
			$(this).siblings('.likes').hide();
			$(this).siblings('.alt').hide();
			$(this).siblings('.swipe').hide();
			$(this).siblings('.set_likes').hide();
			$(this).siblings('.rename').hide();
			$(this).siblings('.cancel').show();
			$(this).siblings('.save_alt').show();
			$(this).parent().children(':eq(1)').after('<input style="z-index:10 ;border:1px solid black;margin-left: -5px;" type="text" value="' + alt_data_en + '" class=" alt_en_input form-control  col-md-12 col-xs-12">');
			$(this).parent().children(':eq(1)').after('<input style="z-index:10 ;border:1px solid black;margin-left: -5px;" type="text" value="' + alt_data_hn + '" class=" alt_hn_input form-control col-md-12 col-xs-12">');
		});

		$('.save_alt').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
        echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var alt_hn = $(this).siblings('.alt_hn_input').val();
			var alt_en = $(this).siblings('.alt_en_input').val();
			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
					alt_hn: alt_hn,
					alt_en: alt_en,
					image: image,
					admin: admin,
					table: table
				},
				success: function(data) {
					console.log(data);
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.likes_input').hide();
					$(el).siblings('.alt_en_input').hide();
					$(el).siblings('.alt_hn_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save_alt').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.alt').hide();
					$(this).siblings('.swipe').hide();
					$(this).siblings('.rename').hide();

					$(el).parent().siblings().children('.setting_btn').show();
				},
				error: function(data) {
					console.log(data);
				}
			});

		});

		$(".cancel").on('click', function(event) {
			event.preventDefault();
			$(this).hide().removeClass('col-md-8 col-xs-8').addClass('col-md-4 col-xs-4');
			$(this).siblings('.move').show();
			$(this).siblings('.edit').show();
			$(this).siblings('.user').show();
			$(this).siblings('.delete').show();
			$(this).siblings('.tag').show();
			$(this).siblings('.likes').show();
			$(this).siblings('.alt').show();
			$(this).siblings('.swipe').show();
			$(this).siblings('.rename').show();
			$(this).siblings('.edit_input').hide();
			$(this).siblings('.move_to_input').hide();
			$(this).siblings('.likes_input').hide();
			$(this).siblings('.tag_input').hide();
			$(this).siblings('.user_input').hide();
			$(this).siblings('.delete_yes').hide();
			$(this).siblings('.alt_en_input').hide();
			$(this).siblings('.alt_hn_input').hide();
			$(this).siblings('.rename_input').hide();
			$(this).siblings('.save').hide();
			$(this).siblings('.save_user').hide();
			$(this).siblings('.okay').hide();
			$(this).siblings('.set_likes').hide();
			$(this).siblings('.set_tag').hide();
      $(this).siblings('.save_alt').hide();
      $(this).siblings('.save_alt').hide();
      $(this).siblings('.save_rename').hide();
		});
	});
</script>

<?php
    } elseif (is_cc($_COOKIE['username']) === true) {?>
<script type="text/javascript">
	$(document).ready(function() {

		$(".setting_btn").on('click', function(event) {
			event.preventDefault();
			$(this).hide();
			$(this).parent().siblings().children('.cancel').show();
			$(this).parent().siblings().children('.save').show();
			$(this).parent().siblings().children('.edit_input').show();

		});

		$('.save').click(function(event) {
			event.preventDefault();
			var el = this;
			var admin = '<?php global $admin_name;
    echo $admin_name ; ?>';
			var table = '<?php echo $table; ?>';
			var image = $(this).siblings('.delete_yes').val();
			var weight = $(this).siblings('.edit_input').val();

			$.ajax({
				url: '../script/file_editing/image_edit.php',
				type: 'POST',
				data: {
					likes: weight,
					//	weight: weight,
					image: image,
					admin: admin,
					table: table
				},
				success: function() {
					$(el).siblings('.move').hide();
					$(el).hide();
					$(el).siblings('.edit').hide();
					$(el).siblings('.delete').hide();
					$(el).siblings('.edit_input').hide();
					$(el).siblings('.user_input').hide();
					$(el).siblings('.save_user').hide();
					$(el).siblings('.save').hide();
					$(el).siblings('.cancel').hide();
					$(el).siblings('.user').hide();
					$(this).siblings('.rename').hide();
					$(el).parent().siblings().children('.setting_btn').show();
					// uncomment when you set weight	$(el).parent().siblings('.weight_gm').text(weight + " gm");
				}
			});

		});

		$(".cancel").on('click', function(event) {
			event.preventDefault();
			$(this).hide().removeClass('col-md-8 col-xs-8').addClass('col-md-4 col-xs-4');
			$(this).siblings('.move').show();
			$(this).siblings('.edit').show();
			$(this).siblings('.user').show();
			$(this).siblings('.delete').show();
			$(this).siblings('.edit_input').hide();
			$(this).siblings('.move_to_input').hide();
			$(this).siblings('.user_input').hide();
			$(this).siblings('.delete_yes').hide();
			$(this).siblings('.save').hide();
			$(this).siblings('.save_user').hide();
			$(this).siblings('.okay').hide();
			$(this).siblings('.rename').show();
			$(this).parent().siblings().children('.setting_btn').show();
		});

	});
</script>


<?php }
} else {
}?>
