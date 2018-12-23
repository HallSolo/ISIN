(function ($) {

$(document).ready(function () {

		$('.clases').slick({
			slidesToShow: 1,
			arrow: true,
			dots: true,
			prevArrow: $('.left-slide'),
			nextArrow: $('.right-slide'),
			responsive: [
				{
				breakpoint: 1200,
					settings: {
					 slidesToShow: 1,
					}
				},
				{
				breakpoint: 1024,
					settings: {
					 slidesToShow: 1,
					}
				},
				{
				breakpoint: 767,
				settings: {
				slidesToShow: 1,
				dots: true
				}
			}
		]
	});
	
});
	
})(jQuery)
