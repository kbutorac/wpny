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

// Build the basic block id and class 
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-slider-' . $block['id'];
$block_class  = 'block-slider-container';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';



$default_blocks = array(
	array('wpny/slider-item')
);
$slider_type = ( get_field('slider_type') ) ? get_field('slider_type') : 'horizontal';
$allowed_blocks = ['wpny/slider-item'];
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> alignwide relative <?=$slider_type?>">
	<div class="slide-inner <?= ( 'horizontal' === $slider_type ) ? 'md:pr-10' : ''?>">
	<InnerBlocks/>
	</div>
	<?php if ( 'horizontal' === $slider_type ) { ?>
		<div class="dots-nav mt-10 md:mt-0  md:absolute  md:right-0  md:top-1/2  md:-translate-y-1/2"></div>
	<?php }else{ ?>
		<div class="dots-nav mt-10 flex justify-center"></div>
	<?php } ?>
</div>
<?php return;