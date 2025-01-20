<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

get_header();
$category_description = category_description();
$image                = get_field('image', get_queried_object());
$listing_style        = get_field('listing_style', get_queried_object());
?>
	<section id="primary" class="container px-5">
		<main id="main">
			<div class="relative hero hero--case-study px-5 alignfull pt-36 pb-16 md:pt-56 md:pb-24 bg-dark">
				<div class="container relative z-[1]">
						<div class="hero-content animate animate-up">
							<div class="grid grid-cols-12 items-center">
									<div class="col-span-12 md:col-span-7 order-last md:order-first">
										<h1 class="text-[40px] md:text-[80px] text-white leading-none"><?php echo single_term_title();?></h1>
									</div>
							</div>	
						</div>
				</div>
				<div class="absolute bottom-0 right-0 w-[100px] h-[160px] md:w-[160px] md:h-[280px] lg:w-[200px] lg:h-[360px] z-[0] ">
				<svg viewBox="0 0 217 402" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M262.465 1L1 140.727V402" stroke="white"/>
					<path d="M296.371 25.125L36.2097 158.445V402" stroke="white"/>
					<path d="M409.824 1L72.7236 187.603V402" stroke="white"/>
					<path d="M450.25 28.3848L113.15 205.276V401.999" stroke="white"/>
				</svg>

				</div>
			</div>
		<?php
			if ( have_posts() ) {
				?>
				<div class="container my-16 lg:my-20">
					<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-y-28 lg:gap-x-12">
						<?php
						// Load posts loop.
						while ( have_posts() ) {
							the_post();
					
						get_template_part( 'template-parts/content/content-post-card' );
						
						}
						?>
					</div>
				</div>
				<?php

				// Previous/next page navigation.
				?>
				<div class="container">
					<?php  wpny_custom_pagination(); ?>
				</div>
				<?php

			} else {

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content/content', 'none' );

			}
			?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
