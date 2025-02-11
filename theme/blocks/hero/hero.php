<?php
defined( 'ABSPATH' ) || die();

/**
 * Hero Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Build the basic block id and class.
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-hero-' . $block['id'];
$block_class  = 'block-hero alignfull';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$heading          = get_field( 'heading' ) ? get_field( 'heading' ) : get_the_title();
$content          = get_field( 'content' ) ? get_field( 'content' ) : '';
$hero_bg_image    = get_field( 'hero_bg_image' ) ? get_field( 'hero_bg_image' ) : '';
$right_side_image = get_field( 'right_side_image' ) ? get_field( 'right_side_image' ) : '';
$text_color       = ( get_field( 'dark_text' ) ) ? 'text-dark' : 'text-white';

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> relative px-5 pt-36 pb-16 md:pt-56 md:pb-32 bg-dark">
	<div class="container relative z-[1]">
		<div class="grid grid-cols-12 gap-y-10 items-center">
			<div class="col-span-12 <?php echo ( $right_side_image ) ? 'md:col-span-7' : ''; ?>">
			<?php if ( $heading ) { ?>
				<h1 class="<?php echo $text_color; ?> leading-none text-[40px] md:text-[60px] lg:text-[80px]"><?php echo $heading; ?></h1>
			<?php } ?>
			<?php if ( $content ) { ?>
				<div class="<?php echo $text_color; ?>  mt-5 lc-reset lg:max-w-[500px] flex gap-x-5">
					<?php if ( $content ) { ?>
						<div>
							<?php echo $content; ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
			<?php if ( $right_side_image ) { ?>
				<div class="col-span-12 md:col-span-5 flex justify-center md:justify-end">
				<?php echo wp_get_attachment_image( $right_side_image, 'full', '', array( 'class' => '' ) ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php if ( $hero_bg_image ) { ?>
			<div class="absolute top-0 left-0 w-full h-full z-[0]">
			<?php echo wp_get_attachment_image( $hero_bg_image, 'full', '', array( 'class' => 'mt-0 w-full h-full object-cover' ) ); ?>
			</div>
	<?php } ?>
</div>

<?php
return;