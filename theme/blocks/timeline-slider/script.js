(function($){
		var initializeBlock = function( $block ) {

			$block.find('.timeline-slider__slides').slick({
			infinite: true,
			arrows: false,
			dots: false,
			autoplay: false,
			speed: 800,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
			}); 

			$(".prev-slide").click(function () {
				$(".timeline-slider__slides").slick("slickPrev");
			});
		
			$(".next-slide").click(function () {
				$(".timeline-slider__slides").slick("slickNext");
			});
		}
		// Initialize each block on page load (front end).
		$(document).ready(function(){
				$('.timeline-slider').each(function(){
						initializeBlock( $(this) );
				});
		});

})(jQuery);
