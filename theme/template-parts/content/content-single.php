<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

$categories = get_the_category( get_the_id() );
$cat_name   = ( $categories[0]->name ) ? : '';
?>
<article id="post-<?php the_ID(); ?>">
	<header class="alignwide !max-w-full grid grid-cols-12 mt-40 md:mt-64">
		<?php the_title( '<h1 class="entry-heading col-span-12 md:col-span-9 text-[40px] md:text-[68px]">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-meta alignwide !max-w-full grid grid-cols-12 mt-10 mb-10 md:mb-16 items-center">
		<div class="col-span-6 md:col-span-3 lg:col-span-1 uppercase font-semibold text-[12px]"><?php echo get_the_date(); ?></div>
		<?php if ( $cat_name ) { ?>
		<a href="<?=esc_url( get_category_link( $categories[0]->term_id ) )?>" class="post-category col-span-6 justify-end md:justify-start md:col-span-2 lg:col-span-2 uppercase font-semibold text-[12px] flex items-center gap-x-2 tracking-widest relative leading-none">
		<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
			<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
		</svg>
		<span><?php echo esc_html( $categories[0]->name ); ?></span>
	</a>
		<?php } ?>
		<div class="col-span-12 mt-4 md:mt-0 justify-center md:col-span-4 md:col-end-13 flex md:justify-end">
			<?php echo do_shortcode( '[social_share]' ); ?>
		</div>
	</div><!-- .entry-meta -->
	<?php
	if ( has_post_thumbnail() ) {
		?>
	<div class="post-featured alignwide mb-10 md:mb-20">
		<?php the_post_thumbnail( 'post-large', ['class' => 'w-full'] ); ?>
	</div>
	<?php } ?>
	<div <?php in_content_class( 'post-content' ); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'wpny' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'wpny' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-${ID} -->
