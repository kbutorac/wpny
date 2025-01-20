<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpny
 */

get_header();
?>

<section id="primary" class="px-5">
	<main id="main">
		<div class="container my-16 lg:my-20">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );
			endwhile; // End of the loop.
			?>

			<a class="btn mt-10 md:mt-16 inline-flex items-center gap-x-6 hover:gap-x-4 text-[22px] md:text-[30px] hover:underline hover:text-accent transition-all" href="<?=get_bloginfo('url')?>/press">
				<svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 55 55" fill="none">
					<circle cx="27.5" cy="27.5" r="27" stroke="#1EBBAE"/>
					<path d="M16 28L23.5 23.6699L23.5 32.3301L16 28ZM38 28.75L22.75 28.75L22.75 27.25L38 27.25L38 28.75Z" fill="black"/>
				</svg>
				<span><?=__('Back to news', 'wpny')?></span>
			</a>

			<?php
			// Get the current post's categories
			$post_categories = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));

			// If there are categories, query for related posts
			if ($post_categories) {
					$related_args = array(
							'category__in' => $post_categories,
							'post__not_in' => array(get_the_ID()),
							'posts_per_page' => 3,
							'ignore_sticky_posts' => 1,
					);

					$related_query = new WP_Query($related_args);

					// Check if there are related posts
					if ($related_query->have_posts()) {
							?>
							<div class="related-posts">
								<div class="container border-t border-[#D9D9D9] mt-12 pt-10 md:mt-20 pb-10 md:pt-20">
									<div class="flex justify-between pb-10">
										<h2 class="my-0 text-black text-[20px] md:text-[30px] font-semibold"><?=__('Related Items', 'wpny')?></h2>
										<?php } ?>
									</div>
									<div class="grid md:grid-cols-3 gap-10 lg:gap-x-6">
										<?php
										while ( $related_query->have_posts() ) {
											$related_query->the_post();
											?>
											<article id="post-<?php the_ID(); ?>" <?php post_class('bg-[#E8FAF9] p-5'); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<a class="col-span-12 md:col-span-5 mb-8 md:mb-0" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<div class="aspect-[3/2] overflow-hidden">
															<?php the_post_thumbnail('image-32',['class'=>'mt-0 h-full object-cover w-full']); ?>
														</div>
													</a>
												<?php } ?>
												<?php
												$categories = get_the_category(get_the_id());
												if ( ! empty( $categories ) ) { ?>
													<a class="py-2 px-4 rounded-[80px] bg-accent hover:bg-dark hover:text-white leading-none text-[15px] mt-4 inline-flex transition-all" href="<?=esc_url( get_category_link( $categories[0]->term_id ) )?>"><?=$categories[0]->name?></a>
												<?php	}	?>
												<header class="entry-header">
													<h4 class="text-[#2B515F] hover:text-mint-300 md:text-[22px] text-[18px my-4 flex transition-all">
														<a class="hover:text-accent hover:underline" href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a>
													</h4>
												</header><!-- .entry-header -->
											</article><!-- #post-${ID} -->
											<?php
										}?>
										</div>
									</div>
								</div>
							</div>
							<?php

					// Reset post data to restore the original query
					wp_reset_postdata();
			}
			?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
