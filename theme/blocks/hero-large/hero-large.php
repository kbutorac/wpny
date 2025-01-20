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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-hero-large-' . $block['id'];
$block_class  = 'block-hero-large alignfull';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$preheader     = get_field( 'preheader' ) ? get_field( 'preheader' ) : '';
$heading       = get_field( 'heading' ) ? get_field( 'heading' ) : get_the_title();
$content       = get_field( 'content' ) ? get_field( 'content' ) : '';
$hero_bg_image = get_field( 'hero_bg_image' ) ? get_field( 'hero_bg_image' ) : '';
$cta_button    = get_field( 'cta_button' ) ? get_field( 'cta_button' ) : '';

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> relative px-5 pt-28 pb-0 md:pt-56">
	<div class="container relative z-[1]">
		<div class="grid grid-cols-12 mb-10 md:mb-20 items-center">
			<div class="col-span-12">		
			<?php if ( $heading ) { ?>
				<h1 class="leading-none text-center text-white"><?php echo $heading; ?></h1>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php if ( $content ) { ?>
		<div class="relative z-[1] border-t border-l border-[#fff] m-auto py-6 px-4 md:py-12 md:px-10 -mr-5 max-w-[90%] md:max-w-[510px] bg-black/[.2]">
			<?php if ( $content ) { ?>
				<div class="text-white font-semibold">
					<?php echo $content; ?>
				</div>
				<?php if ( $cta_button ) { ?>
					<?php
						$target       = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
						$button_link  = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
						$button_title = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';
					?>
					<a class="btn btn--primary mt-5" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>>
					<?php echo esc_html( $button_title ); ?> 
					</a>
				<?php } ?>
			<?php } ?>
		</div>
	<?php } ?>
	<?php if ( $hero_bg_image ) { ?>
			<div class="absolute top-0 left-0 w-full h-full z-[0]">
			<?php echo wp_get_attachment_image( $hero_bg_image, 'full', '', array( 'class' => 'mt-0 w-full h-full object-cover' ) ); ?>
			</div>
	<?php } ?>
</div>

<?php
return;