<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="mb-4 flex w-full aspect-[3/4]" href="<?=esc_url( get_permalink() )?>" rel="bookmark">
	<?php the_post_thumbnail('post-size', ['class' => 'w-full h-full object-cover object-center']); ?>
	</a>
	<?php 
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		// Display the first category name
		?>
		<a href="<?=esc_url( get_category_link( $categories[0]->term_id ) )?>" class="post-category uppercase font-semibold text-[12px] mb-3 flex items-center gap-x-2 tracking-widest relative leading-none">
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
				<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
			</svg>
			<span><?=esc_html( $categories[0]->name )?></span>
		</a>
	<?php } ?>
	<header class="entry-header">
		<h4 class="underline text-[18px] hover:text-accent hover:no-underline leading-normal transition-all"><a href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a></h4>
	</header><!-- .entry-header -->
</article><!-- #post-${ID} -->
