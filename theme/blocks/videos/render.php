<?php
defined( 'ABSPATH' ) || die();

/**
 * Videos Block Template.
 *
 * @param  array       $block       The block settings and attributes.
 * @param  string      $content     The block inner HTML (empty).
 * @param  bool        $is_preview  True during AJAX preview.
 * @param  int|string  $post_id     The post ID this block is saved to.
 */

// Build the basic block id and class
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-videos-' . $block['id'];
$block_class  = 'block-videos';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$posts_number = ( get_field( 'posts_number' ) ) ? : 2;

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?>" <?php echo get_block_wrapper_attributes(); ?>>
		<div class="container">
		<?php

			// Categories
			$terms = get_terms(
				array(
					'taxonomy'   => 'video_display_cat',
					'hide_empty' => false,
				)
			);
			foreach ( $terms as $key => $term_data ) :
				?>
			<div class="video_taxonomy_section">
				<h4 class="border-b border-accent"><?php echo $term_data->name; ?></h4>
					<div class="grid md:grid-cols-3 gap-y-6 gap-x-5">
					<?php
					$args      = array(
						'post_type'      => 'video',
						/*'posts_per_page' => '6',*/
						'posts_per_page' => '-1',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'video_display_cat',
								'field'    => 'term_id',
								'terms'    => $term_data->term_id,
							),
						),
					);
					$prevposts = new WP_Query( $args );
					while ( $prevposts->have_posts() ) :
						$prevposts->the_post(); {
												get_template_part( 'template-parts/content/content-video' );
											} endwhile;
					wp_reset_query();
					?>
				</div>
			</div>
			
			<?php endforeach; ?>
	</div>
</div>

<?php
return;


