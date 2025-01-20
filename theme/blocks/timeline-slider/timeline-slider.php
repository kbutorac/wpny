<?php
defined( 'ABSPATH' ) || die();
/**
 * timeline Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Build the basic block id and class.
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-timeline-slider-' . $block['id'];
$block_class  = 'timeline-slider alignwide';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$heading = ( get_field( 'heading' ) ) ? get_field( 'heading' ) : '';
$slides  = ( ! empty( get_field( 'slides' ) ) ) ? get_field( 'slides' ) : '';
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> relative">
	<div class="container">
		<div class="grid grid-cols-12 my-10">
		<?php if ( $heading ) { ?>
			<div class="col-span-8 md:col-span-6">
				<h2 class=""><?php echo $heading; ?></h2>
			</div>
			<div class="col-span-4 md:col-span-6 flex justify-end gap-x-3">
					<button class="prev-slide">
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
					<circle cx="20" cy="20" r="20" transform="matrix(-1 0 0 1 40 0)" fill="#2DD8C0"/>
					<path d="M12.3633 20.3633L19.8633 16.0332L19.8633 24.6934L12.3633 20.3633ZM28.3633 21.1133L19.1133 21.1133L19.1133 19.6133L28.3633 19.6133L28.3633 21.1133Z" fill="black"/>
					</svg>
					</button>
					<button class="next-slide">
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
						<circle cx="20" cy="20" r="20" fill="#2DD8C0"/>
						<path d="M27.6367 20.3633L20.1367 16.0332L20.1367 24.6934L27.6367 20.3633ZM11.6367 21.1133L20.8867 21.1133L20.8867 19.6133L11.6367 19.6133L11.6367 21.1133Z" fill="black"/>
						</svg>
					</button>
				</div>
		<?php } ?>
				
		</div>

	</div>
	<?php if ( $slides ) { ?>
		<div class="timeline-slider__slides relative -mx-5">
			<?php foreach ( $slides as $slide ) { ?>
				<?php
				$heading = ( $slide['heading'] ) ? $slide['heading'] : '';
				$content = ( $slide['content'] ) ? $slide['content'] : '';
				$image   = ( $slide['image'] ) ? $slide['image'] : '';
				?>
				<div class="timeline-slider__slide relative !flex flex-col justify-center px-5">
					<div class="container relative z-[1]">
						<div class="grid grid-cols-12 items-end">
							<?php if ( $heading || $content || $image ) { ?>
								<div class="col-span-12">
										<?php if ( $image ) { ?>
											<?php echo wp_get_attachment_image( $image, 'full', '', array( 'class' => 'w-full' ) ); ?>
										<?php } ?>
										<?php if ( $heading ) { ?>
										<h4 class="leading-none text-[42px] md:text-[80px] text-accent mt-3"><?php echo $heading; ?></h4>
										<?php } ?>
										<?php if ( $content ) { ?>
										<div class=""><?php echo $content; ?></div>
										<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>

<?php
return;