(function($) {
	$('.metabox').on('click', function(e) {
		$('.metabox').not(this).removeClass('expanded');
		$(this).toggleClass('expanded');
	})
})(jQuery);
