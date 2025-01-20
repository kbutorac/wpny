(function($){
		var initializeBlock = function( $block ) {

			$block.find('.process-slider__slides').slick({
			infinite: true,
			arrows: false,
			dots: true,
			appendDots: $('.slick-slider-dots'),
			autoplay: false,
			speed: 800,
			slidesToShow: 1,
			slidesToScroll: 1,
			}); 

			$block.find('.process-slider__slides').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
			var totalSlides = slick.slideCount;
			var currentSlideIndex = currentSlide + 1;
			$block.find('.slider__counters').text(currentSlideIndex + ' OF ' + totalSlides);
			});

			//ticking machine
			var percentTime;
			var tick;
			var time = 1;
			var progressBarIndex = 0;

			$('.progressBarContainer .progressBar').each(function(index) {
					var progress = "<div class='inProgress inProgress" + index + "'></div>";
					$(this).html(progress);
			});

			function startProgressbar() {
					resetProgressbar();
					percentTime = 0;
					tick = setInterval(interval, 10);
			}

			function interval() {
					if (($('.process-slider__slides .slick-track div[data-slick-index="' + progressBarIndex + '"]').attr("aria-hidden")) === "true") {
							progressBarIndex = $('.process-slider__slides .slick-track div[aria-hidden="false"]').data("slickIndex");
							startProgressbar();
					} else {
							percentTime += 1 / (time + 5);
							$('.inProgress' + progressBarIndex).css({
									width: percentTime + "%"
							});
							if (percentTime >= 100) {
									$('.process-slider__slides').slick('slickNext');
									progressBarIndex++;
									if (progressBarIndex > 2) {
											progressBarIndex = 0;
									}
									startProgressbar();
							}
					}
			}

					function resetProgressbar() {
							$('.inProgress').css({
									width: 0 + '%'
							});
							clearInterval(tick);
					}
					startProgressbar();
					// End ticking machine

					$('.progressBarContainer div').click(function () {
						clearInterval(tick);
						var goToThisIndex = $(this).find("span").data("slickIndex");
						$('.process-slider__slides').slick('slickGoTo', goToThisIndex, false);
						startProgressbar();
						console.log(goToThisIndex);
					});
					

		}
		// Initialize each block on page load (front end).
		$(document).ready(function(){
				$('.process-slider').each(function(){
						initializeBlock( $(this) );
				});
		});

})(jQuery);
