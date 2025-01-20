<?php
defined( 'ABSPATH' ) || die();
/**
 * process Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Build the basic block id and class.
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-process-slider-' . $block['id'];
$block_class  = 'process-slider alignwide';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$static_content = ( get_field( 'static_content' ) ) ? get_field( 'static_content' ) : '';
$slides         = ( ! empty( get_field( 'slides' ) ) ) ? get_field( 'slides' ) : '';
$cta_button     = ( ! empty( get_field( 'cta_button' ) ) ) ? get_field( 'cta_button' ) : '';
$target         = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
$button_link    = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
$button_title   = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> relative">
	<div class="container">
		<div class="grid grid-cols-12 my-6">
				<div class="col-span-12 md:col-span-4 text-white"><?php echo $static_content; ?></div>
		</div>

	</div>
	<?php if ( $slides ) { ?>
		<div class="process-slider__slides relative">
			<?php foreach ( $slides as $slide ) { ?>
				<?php
				$number       = ( $slide['number'] ) ? $slide['number'] : '';
				$heading      = ( $slide['heading'] ) ? $slide['heading'] : '';
				$content      = ( $slide['content'] ) ? $slide['content'] : '';
				$side_graphic = ( $slide['side_graphic'] ) ? $slide['side_graphic'] : '';
				?>
				<div class="process-slider__slide relative !flex flex-col justify-center px-5">
					<div class="container relative z-[1]">
						<div class="grid grid-cols-12 items-end">
							<?php if ( $heading || $content || $number ) { ?>
								<div class="col-span-12 md:col-span-4">
								<div class="flex gap-x-5 md:mb-20">
									<?php if ( $number ) { ?>
										<div class="w-9 h-9 flex items-center justify-center text-black text-[20px] bg-accent rounded-full flex-none leading-none"><?php echo $number; ?></div>
									<?php } ?>
									<div>
										<?php if ( $heading ) { ?>
										<h4 class="font-light text-white text-[20px] md:text-[26px] mb-2"><?php echo $heading; ?></h4>
										<?php } ?>
										<?php if ( $content ) { ?>
										<div class="text-white"><?php echo $content; ?></div>
										<?php } ?>
									</div>
									</div>
								</div>
							<?php } ?>
							<?php if ( $side_graphic ) { ?>
								<div class="flex mt-5 md:mt-0 col-span-12 md:col-span-8 flex-col md:flex-row items-center justify-center md:justify-end">
									<?php echo wp_get_attachment_image( $side_graphic, 'full', '', array( 'class' => '' ) ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="process-sliders__pagination flex items-center mt-10">
			<div class="container">
				<div class="grid grid-cols-12 gap-y-4">
					<div class="col-span-12 md:col-span-4 flex gap-x-2 items-center justify-center md:justify-start">
						<svg class="hidden md:flex" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
							<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
						</svg>
						<div class="slider__counters font-semibold text-white text-[14px] min-w-[50px] tracking-widest">
							<?php
							$slides_count = count( $slides );
							?>
							1 OF <?php echo $slides_count; ?>
						</div>
					</div>
					<div class="col-span-12 md:col-span-4 flex gap-x-2 items-center justify-center">
						<div class="slick-slider-dots flex w-full justify-center"></div>
					</div>
					<div class="col-span-12 md:col-span-4 mt-6 md:mt-0 flex items-center justify-center md:justify-end">
					<?php if ($cta_button){ ?>
						<a class="btn btn--secondary group/btn !transition-none !gap-x-4 hover:text-accent text-white" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>  <?php echo get_block_wrapper_attributes(); ?>>
							<span><?php echo esc_html( $button_title ); ?> </span>
							<svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
								<circle cx="27.5" cy="27.5" r="27.5" fill="#2DD8C0"/>
								<path d="M38 28L30.5 23.6699L30.5 32.3301L38 28ZM16 28.75L31.25 28.75L31.25 27.25L16 27.25L16 28.75Z" fill="black"/>
							</svg>
						</a>
					<?php } ?>
					</div>
				</div>
				
			
			
			</div>
		
		</div>
	<?php } ?>
</div>

<?php
return;