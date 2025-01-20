<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpny
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>

</div><!-- #page -->
<div id="video-popup-overlay"></div>
<div id="video-popup-container">
	<div id="video-popup-close" class="fade">&#10006;</div>
	<div id="video-popup-iframe-container">
		<iframe id="video-popup-iframe" src="" width="100%" height="100%" frameborder="0" allow='autoplay'></iframe>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
