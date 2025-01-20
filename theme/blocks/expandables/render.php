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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-expandables-' . $block['id'];
$block_class  = 'block-expandables alignwide';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$expandables = (!empty( get_field( 'expandables' ) ) ) ?  get_field( 'expandables' ) : '';

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> wp-block ">
	<?php if ( $expandables ) { ?>
		<div class="accordion animate animate-up">
			<?php foreach ( $expandables as $e ) { ?>
			<div class="accordion-item bg-[#E4F9F8] mb-4 px-4 lg:px-8 lg:py-3 bg-salt-alt">
				<div class="accordion-header flex items-start py-4  cursor-pointer">
					<h4 class="font-semibold text-[18px] md:text-[22px] flex-1"><?php echo $e['title']; ?></h4>
					<span class="accordion-icon inline-block rotate-0 duration-200 ease-out ml-3 flex-none self-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
						<path d="M0.890574 0.891382L0.890486 0.891292L0.883752 0.89833C0.53875 1.25894 0.53875 1.83021 0.883752 2.19082L0.883729 2.19084L0.88714 2.19431L7.6729 9.10517L7.67288 9.10519L7.67634 9.10862C8.03426 9.46379 8.6067 9.46379 8.96462 9.10862L8.96465 9.10864L8.96806 9.10517L15.7538 2.19431L15.7724 2.17535L15.7882 2.15395C16.0876 1.74741 16.0081 1.16723 15.6053 0.859557L15.6053 0.859556L15.6046 0.859041C15.2778 0.610566 14.8261 0.610566 14.4993 0.859041L14.4777 0.875468L14.4587 0.894835L8.32048 7.14617L2.1823 0.894834L2.18232 0.894812L2.17886 0.891382C1.82094 0.536205 1.2485 0.536205 0.890574 0.891382Z" fill="#333333" stroke="#333333" stroke-width="0.75"/>
						</svg>
					</span>
				</div>
				<div class="accordion-content h-0 overflow-hidden duration-200 ease-out text-[#404759]">
					<div class="text-normal mt-4 editor mb-4">
					<?php echo $e['content']; ?>
					</div>
				</div>
			</div>
				
			<?php } ?>
			</div>
		<?php } ?>
</div>

<?php return;