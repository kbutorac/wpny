<?php
/**
 * Button Block Template.
 *
 * @package WPNY
 */


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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-button-' . $block['id'];
$block_class  = 'block-button';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$cta_button = get_field( 'button' ) ? get_field( 'button' ) : '';
$alignment  = get_field( 'alignment' ) ? get_field( 'alignment' ) : '';

$style        = ( get_field( 'style' ) ) ? 'btn--' . get_field( 'style' ) : 'btn--primary';
$target       = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
$button_link  = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
$button_title = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';
?>
<?php if ( $alignment ) { ?>
	<div class="flex w-full mt-0 justify-<?php echo esc_html( $alignment ); ?>">

<?php } ?>

	<a class="btn <?php echo esc_html( $style ); ?> group/btn transition-all" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>  <?php echo get_block_wrapper_attributes(); ?>>
		<span><?php echo esc_html( $button_title ); ?> </span>
		
		<?php if ('btn--secondary' === $style){ ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
			<circle cx="27.5" cy="27.5" r="27.5" fill="white"/>
			<path d="M38 28L30.5 23.6699L30.5 32.3301L38 28ZM16 28.75L31.25 28.75L31.25 27.25L16 27.25L16 28.75Z" fill="black"/>
			</svg>
		<?php } ?>
	</a>

<?php if ( $alignment ) { ?>
	</div>
<?php } ?>


<?php
return;