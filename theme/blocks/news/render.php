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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-news-' . $block['id'];
$block_class  = 'block-news';
$block_class .= ! empty( $block['className'] ) ? ' ' .  $block['className']  : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data
$posts_number = (get_field('posts_number')) ? : 2;

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?= esc_attr( $block_class )?>" <?php echo get_block_wrapper_attributes(); ?>>
		<div class="container">
		<?php
		

		$query_args = array(
			'post_type'      => 'post', // Change 'post' to your custom post type if needed
			'posts_per_page' => $posts_number ,
		);

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) { ?>
			<div class="grid md:grid-cols-2 gap-y-12 gap-x-4">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'template-parts/content/content-post-card' );
			}?>
			</div>
		<?php	
		} 
		wp_reset_postdata();
		?>
	</div>
</div>

<?php return;


