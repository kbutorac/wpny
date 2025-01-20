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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-post-filter-' . $block['id'];
$block_class  = '';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> wp-block alignwide  px-5 py-14 md:py-20">
		<div class="container">
		<?php
		$args  = array(
			'post_type'      => 'post',
			'posts_per_page' => 8,
			'order'          => 'DESC',
			'facetwp'        => true,
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			?>

			<div class="blog-filters mb-10">
				<?php echo do_shortcode( '[facetwp facet="post_categories"]' ); ?>
			</div>
			<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-x-6">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'template-parts/content/content-post-card' );
			}
			?>
			</div>
			<?php
		} else {
			// no posts found
		}
		echo '<div class="border-t border-[#D1D1D1] md:mt-20 md:pt-10 mt-10 pt-8">';
		echo do_shortcode( '[facetwp facet="pagination"]' );
		echo '</div>';
		wp_reset_postdata();
		?>
	</div>
</div>

<?php
return;