$('.site-header .more-nav').click(function(e) {
	$('.nav-menu').show();
	$('body').addClass('nav-open');
	setTimeout(function() {
		$('.nav-menu .more-nav').addClass('open');
		$('.site-header .more-nav').addClass('open');
	}, 10);
	e.preventDefault();
});

$('.nav-menu .more-nav').click(function(e) {
	$('.nav-menu').hide();
	$('body').removeClass('nav-open');
	setTimeout(function() {
		$('.nav-menu .more-nav').removeClass('open');
		$('.site-header .more-nav').removeClass('open');
	}, 10);
	e.preventDefault();
});