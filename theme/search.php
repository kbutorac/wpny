<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wpny
 */

get_header();
?>

	<section id="primary" class="container">
		<main id="main">

			<header class="block-hero relative py-10 md:py-20 overflow-hidden bg-gradient-to-r from-white to-light-blue mb-10 md:mb-20">
				<div class="container">
				<?php
					printf(
						/* translators: 1: search result title. 2: search term. */
						'<h1 class="">%1$s <span>%2$s</span></h1>',
						esc_html__( 'Search results for:', 'wpny' ),
						get_search_query()
					);
					?>
				</div>
			</header><!-- .page-header -->
			<?php
			if ( have_posts() ) {
				?>
			<div class="container my-16 lg:my-20">
					<div class="grid md:grid-cols-2 gap-10 lg:gap-y-28 lg:gap-x-12">
						<?php
						// Load posts loop.
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content/content' );
						}
						?>
					</div>
				</div>
				<?php

				// Previous/next page navigation.
				?>
				<div class="container">
					<?php wpny_custom_pagination(); ?>
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
