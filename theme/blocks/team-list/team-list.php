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
$block_id     = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : 'block-team-list-' . $block['id'];
$block_class  = 'block-team-list';
$block_class .= ! empty( $block['className'] ) ? ' ' . $block['className'] : '';
$block_class .= ! empty( $block['align'] ) ? ' align' . sanitize_key( $block['align'] ) : '';

// Get our data.

$select  = ( ! empty( get_field( 'select' ) ) ) ? get_field( 'select' ) : '';
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> wp-block alignwide">
	<div class="container relative" <?php echo get_block_wrapper_attributes(); ?>>
		<?php
		$args = array(
			'post_type' => 'team',
		);
		if ( ! $select ) {
			$args['posts_per_page'] = -1;
		}
		if ( $select ) {
			$args['post__in'] = $select;
			$args['orderby']  = 'post__in';
		}

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			?>
			<div class="grid md:grid-cols-3 lg:gap-x-5 gap-5 gap-y-10 lg:gap-y-28 ">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					$position = ( get_field( 'position', get_the_ID() ) ) ? get_field( 'position', get_the_ID() ) : '';
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( has_post_thumbnail() ) { ?>
							<a class="col-span-12 md:col-span-5 mb-8 md:mb-0" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<div class="aspect-[1/1]">
									<?php the_post_thumbnail( 'team-size', array( 'class' => 'mt-0 h-full object-cover w-full ' ) ); ?>
								</div>
							</a>
						<?php } ?>
		
							<header class="entry-header">
							<?php if ( $position ) { ?>
									<div class="mt-6 flex gap-x-2 items-center uppercase tracking-widest leading-none text-[14px] font-semibold">
									<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
										<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
									</svg>
										<?php echo $position; ?>
									</div>
								<?php } ?>

								<h3 class="h4 !mt-2  md:text-[26px] hover:text-accent">
										<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo get_the_title(); ?></a>
								</h3>
							</header><!-- .entry-header -->
		
					</article><!-- #post-${ID} -->
					<?php
				}
				?>
			</div>
			<?php

		} else {
			// no posts found
		}
		wp_reset_postdata();
		?>
	</div>
</div>

<?php
return;
