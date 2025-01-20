<?php
/**
 * Grid Columns Block Template.
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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-grid-columns-' . $block['id'];
$block_class  = 'block-grid-columns ';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.
$columns = ( ! empty( get_field( 'columns' ) ) ) ? get_field( 'columns' ) : '';
?>

<div id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?> overflow-hidden relative" <?php echo get_block_wrapper_attributes(); ?>>
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 border-r border-[#CCDFE8]">
		<?php foreach ( $columns as $c ) { ?>
			<?php
			$title        = ( isset( $c['title'] ) ) ? $c['title'] : '';
			$icon         = ( isset( $c['icon'] ) ) ? $c['icon'] : '';
			$content      = ( isset( $c['content'] ) ) ? $c['content'] : '';
			$cta_button   = ( ! empty( $c['cta_button'] ) ) ? $c['cta_button'] : '';
			$target       = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
			$button_link  = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
			$button_title = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';
			?>
			<div class="flex flex-col border border-[#CCDFE8] py-10 px-6 md:py-16 md:px-10 -mr-[1px] -mb-[1px]">
				<?php if ( $icon ) { ?>
					<div class="w-12 h-12 mb-3">
						<?php echo wp_get_attachment_image( $icon, 'full' ); ?>
					</div>
				<?php } ?>
				<?php if ( $title ) { ?>
					<h4 class="text-[#07075F] text-[18px] md:text-[24px] font-medium mb-3"><?php echo $title; ?></h4>
				<?php } ?>
				<?php if ( $content ) { ?>
					<div class="text-[17px]"><?php echo $content; ?></div>
				<?php } ?>
				<?php if ( $cta_button ){ ?>
					<a class="btn group transition-all text-[17px] text-[#07075F] font-medium mt-4 flex items-center hover:text-accent" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>>
						<span><?php echo esc_html( $button_title ); ?> </span>
						<svg class="group-hover:ml-3 ml-2 transition-all" width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.8961 5.74153C12.2513 5.175 11.6029 4.60846 10.958 4.04193C9.92844 3.13912 8.89885 2.23632 7.86569 1.33352C7.62699 1.12518 7.39186 0.916843 7.15316 0.708504C7.00709 0.580576 6.79334 0.562301 6.65083 0.708504C6.52258 0.840086 6.50476 1.09594 6.65083 1.22387C7.29567 1.7904 7.94406 2.35694 8.5889 2.92348C9.6185 3.82628 10.6481 4.72908 11.6813 5.63188C11.8215 5.75433 11.9608 5.87677 12.1 5.99937C11.5523 6.48001 11.0027 6.9605 10.4557 7.44114C9.42611 8.34394 8.39652 9.24675 7.36336 10.1495C7.12466 10.3579 6.88953 10.5662 6.65083 10.7746C6.50476 10.9025 6.52258 11.1583 6.65083 11.2899C6.7969 11.4398 7.00709 11.4179 7.15316 11.2899C7.798 10.7234 8.44639 10.1569 9.09123 9.59032C10.1208 8.68752 11.1504 7.78472 12.1836 6.88192C12.4223 6.67358 12.6574 6.46524 12.8961 6.2569C13.0351 6.13628 13.0351 5.86215 12.8961 5.74153Z" fill="#FF460C" stroke="#FF460C"/>
							<path d="M6.63573 6.88204C6.87443 6.6737 7.10956 6.46536 7.34826 6.25702C7.4872 6.1364 7.4872 5.86227 7.34826 5.74166C6.70342 5.17512 6.05503 4.60858 5.41019 4.04205C4.38059 3.13925 3.35099 2.23644 2.31783 1.33364C2.07914 1.1253 1.844 0.916965 1.60531 0.708626C1.45924 0.580698 1.24548 0.562423 1.10298 0.708626C0.974725 0.840208 0.956911 1.09606 1.10298 1.22399C1.74781 1.79053 2.39621 2.35706 3.04105 2.9236C4.07064 3.8264 5.10024 4.7292 6.1334 5.632C6.27368 5.75445 6.41292 5.87689 6.55216 5.99949C6.00441 6.48013 5.45487 6.96062 4.90786 7.44126C3.87826 8.34407 2.84866 9.24687 1.8155 10.1497C1.57681 10.358 1.34167 10.5663 1.10298 10.7747C0.956911 10.9026 0.974725 11.1585 1.10298 11.2901C1.24548 11.4399 1.45924 11.418 1.60531 11.2901C2.25014 10.7235 2.89854 10.157 3.54338 9.59045C4.57297 8.68764 5.60257 7.78484 6.63573 6.88204Z" fill="#FF460C" stroke="#FF460C"/>
						</svg>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php
return;