jQuery(function($) {

	var ancre = window.location.hash;
	$('.tabs').each(function() {

		var current = null;
		if(ancre != '' && $(this).find('a[href="'+ancre+'"]').length > 0) {
			current = ancre;
		}
		else {
			current = $(this).find('a:first').attr('href');
		}
		$(this).find('a[href="'+current+'"]').addClass('active');
		$(current).siblings().hide();

		$(this).find('a').click(function() {
			var link = $(this).attr('href');
			if(link == current) {
				return false;
			}
			else {
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
				$(link).show().siblings().hide();
				//alert(current);
				//alert(link);
				current = link;
			}
		});
	});


});