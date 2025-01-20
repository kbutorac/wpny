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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-project-filter-' . $block['id'];
$block_class  = '';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> wp-block alignwide mt-36 lg:mt-48 mb-20 md:mb-24 px-5 facetwp-template">
	<div class="container">
		<h1 class="text-[36px] md:text-[68px] mb-5 md:mb-10"><?=__('Projects', 'wpny')?></h1>
		<?php
		$args  = array(
			'post_type'      => 'project',
			'posts_per_page' => 9,
			'order'          => 'ASC',
			'orderby'        => 'name',
			'facetwp'        => true,
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			?>

			<div class="filters mb-10 grid grid-cols-2 lg:grid-cols-6 gap-x-3 flex-wrap gap-y-5 flex-col md:flex-row items-center">
				<div><?php echo do_shortcode( '[facetwp facet="glass_type"]' ); ?></div>
				<div><?php echo do_shortcode( '[facetwp facet="application_type"]' ); ?></div>
				<div><?php echo do_shortcode( '[facetwp facet="industry"]' ); ?></div>
				<div><?php echo do_shortcode( '[facetwp facet="interior_exterior"]' ); ?></div>
				<div><?php echo do_shortcode( '[facetwp facet="project_type"]' ); ?></div>
				<div><?php echo do_shortcode( '[facetwp facet="region"]' ); ?></div>
			</div>
			<div class="grid md:grid-cols-3 gap-10 lg:gap-x-6">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'template-parts/content/content-project-card' );
			}
			?>
			</div>
			<?php
		} else {
			// no posts found
		}
		echo '<div class="md:mt-20 md:pt-10 mt-10 pt-8">';
		echo do_shortcode( '[facetwp facet="projects_pagination"]' );
		echo '</div>';
		wp_reset_postdata();
		?>
	</div>
</div>

<?php
return;