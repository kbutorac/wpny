<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */
$description = ( get_field( 'short_description', get_the_ID() ) ) ? get_field( 'short_description', get_the_ID() ) : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="mb-4 flex w-full aspect-[3/2]" href="<?=esc_url( get_permalink() )?>" rel="bookmark">
	<?php the_post_thumbnail('image-32', ['class' => 'w-full h-full object-cover object-center']); ?>
	</a>
	<header class="entry-header">
		<h4 class="underline text-[18px] hover:text-accent no-underline leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a></h4>
		<?php if ($description ){ ?>
			<div><?=$description ?></div>
		<?php } ?>
	</header>
</article>
