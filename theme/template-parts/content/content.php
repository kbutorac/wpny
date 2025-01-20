<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-blue-tint pb-2'); ?>>
	<header class="entry-header">
		<div class="text-blue font-semibold"><?php echo get_the_date()?></div>
		<h3 class="h4"><a href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a></h3>
	</header><!-- .entry-header -->
	<div class="mt-4">
	<?php echo wpny_get_post_excerpt(20); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer mt-5">
	<a class="link-primary" href="<?=get_the_permalink()?>"><?=__('Read more', 'wpny')?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->
