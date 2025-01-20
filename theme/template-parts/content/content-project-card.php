<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

$location = ( get_field( 'project_location', get_the_ID() ) ) ? get_field( 'project_location', get_the_ID() ) : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="mb-4 flex w-full aspect-[3/2]" href="<?=esc_url( get_permalink() )?>" rel="bookmark">
	<?php the_post_thumbnail('post-size', ['class' => 'w-full h-full object-cover object-center']); ?>
	</a>
	<header class="entry-header">
		<?php if ($location){ ?>
			<div class="post-category uppercase font-semibold text-[12px] mb-3 flex items-center gap-x-2 tracking-widest relative leading-none">
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
				<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
			</svg>
			<span><?=$location?></span>
		</div>
		<?php } ?>
		<h4 class="underline text-[18px] hover:text-accent no-underline leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a></h4>
	</header><!-- .entry-header -->
</article><!-- #post-${ID} -->
