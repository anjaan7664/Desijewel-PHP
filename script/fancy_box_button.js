// Create template for download button
$.fancybox.defaults.btnTpl.download = '<a download class="fancybox-button fancybox-download"></a>';

// Choose what buttons to display by default
$.fancybox.defaults.buttons = [

	'thumbs',
	'download',
	'close'
];



// Update download link source
$('[data-fancybox]').fancybox({
	beforeShow: function(instance, current) {
		$('.fancybox-download').attr('href', current.src);
	}
});