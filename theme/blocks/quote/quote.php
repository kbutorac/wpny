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
$block_name   = 'block-quote';
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-quote-' . $block_name . '-' . $block['id'];
$block_class  = $block_name;
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

$content      = ( get_field( 'content' ) ) ? get_field( 'content' ) : '';
$author       = ( get_field( 'author' ) ) ? get_field( 'author' ) : '';
$use_background_color       = ( get_field( 'use_background_color' ) ) ? get_field( 'use_background_color' ) : '';
$cta_button   = ( get_field( 'cta_button' ) ) ? get_field( 'cta_button' ) : '';
$target       = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
$button_link  = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
$button_title = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';
?>


<div id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?> wp-block overflow-hidden relative alignwide <?=($use_background_color ) ? 'bg-light-blue py-5 md:py-12' : ''?>" <?php echo get_block_wrapper_attributes(); ?>>
	<div class="flex gap-x-5 md:gap-x-10 <?=($use_background_color ) ? 'px-5 md:px-10' : ''?>">
		<div class="flex-none w-16 md:w-auto">
				<svg width="50" height="38" viewBox="0 0 50 38" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M37.5 37.875C30.75 37.875 26.375 32.75 26.375 25.375C26.375 14.625 34.5 5 48.5 0.624996L49.25 2.125C39.5 7.12499 34.75 15 34.25 19.75L34.75 20C35.875 19.375 37.125 19.125 38.5 19.125C42.75 19.125 47 22.5 47 28.125C47 33.25 43.125 37.875 37.5 37.875ZM11.625 37.875C4.75 37.875 0.5 32.75 0.5 25.375C0.5 14.625 8.5 5 22.5 0.624996L23.25 2.125C13.5 7.12499 8.75 15 8.25 19.75L8.75 20C9.875 19.375 11.125 19.125 12.5 19.125C16.75 19.125 21 22.5 21 28.125C21 33.25 17.125 37.875 11.625 37.875Z" fill="<?=($use_background_color ) ? '#2DD8C0' : 'white'?>"/>
				</svg>
	</div>
	<?php if ( $content || $author ) { ?>
		<div>
			<?php if ( $content ) { ?>
				<div class="text-black block-quote__content text-[24px] <?=($use_background_color ) ? 'md:text-[40px]' : 'md:text-[50px]'?>  leading-tight font-light">
					<?php echo $content; ?>
				</div>
			<?php } ?>
			<?php if ( $author ) { ?>
				<div class="text-[13px] font-semibold tracking-[3px] uppercase mt-4">
					<?php echo $author; ?>
				</div>
			<?php } ?>
			<?php if ($cta_button){ ?>
				<a class="btn btn--secondary group/btn transition-all mt-5 md:mt-8" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>  <?php echo get_block_wrapper_attributes(); ?>>
					<span><?php echo esc_html( $button_title ); ?> </span>
					<svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
						<circle cx="27.5" cy="27.5" r="27.5" fill="white"/>
						<path d="M38 28L30.5 23.6699L30.5 32.3301L38 28ZM16 28.75L31.25 28.75L31.25 27.25L16 27.25L16 28.75Z" fill="black"/>
					</svg>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
</div>
<?php
return;