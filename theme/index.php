<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

get_header();
?>

	<section id="primary" class="container">
		<main id="main">
		<?php
		if ( have_posts() ) {

			if ( is_home() && ! is_front_page() ) :	
				global $post;
				$page_for_posts_id = get_option('page_for_posts');
				if ( $page_for_posts_id ) : 
				$post = get_page($page_for_posts_id);
				setup_postdata($post);
				the_content();
				rewind_posts();
				endif;
			endif;

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
				<?php	wpny_custom_pagination(); ?>
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
