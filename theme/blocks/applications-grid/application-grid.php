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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-application-grid-' . $block['id'];
$block_class  = 'block-application-grid';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';


?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?> wp-block alignwide mt-10 mb-20 lg:mt-20 lg:mb-28 px-5">
	<div class="container">
			<div class="filters mb-10 flex gap-x-5 flex-wrap gap-y-5 flex-col md:flex-row items-center">
				<div>	<?php echo do_shortcode( '[facetwp facet="application_tax"]' ); ?></div>
			</div>
		<?php
		$query_args = array(
			'post_type'      => 'application', // Change 'post' to your custom post type if needed
			'posts_per_page' => -1,
			'order'          => 'DESC',
			'facetwp'        => true,
		);

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			 ?>
		
			<div class="grid md:grid-cols-3 gap-y-10 md:gap-y-20 md:gap-x-5">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'template-parts/content/content-glass-card' );
			}?>
			</div>
		<?php	
		} 
		wp_reset_postdata();
		?>
	</div>
</div>

<?php return;


