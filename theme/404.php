<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wpny
 */

get_header();
?>

	<section id="primary" class="container">
		<main id="main">

			<div class="bg-light-blue py-[200px]">
				<header class="page-header">
					<h1 class="page-title wp-block text-blue md:text-5xl"><?php esc_html_e( 'Page Not Found', 'wpny' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content">
					<p class="wp-block"><?php esc_html_e( 'This page could not be found. It might have been removed or renamed, or it may never have existed.', 'wpny' ); ?></p>
				</div><!-- .page-content -->
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
