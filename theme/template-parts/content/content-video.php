<?php
/**
 * Template part for displaying videos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

?>

<div class="video-item">

	<div class="featured-image">

		<?php if ( get_field('resource_video') ) : ?>

			<?php $videoSource = get_field('resource_video'); ?>
			<?php $videoDiv = '#inlineVideo'; ?>

		<?php elseif ( get_field('youtube_video_id') ) : ?>

			<?php $youtubeSource = get_field('youtube_video_id'); ?>
			<?php $videoDiv = '#youtubeEmbed'; ?>

		<?php endif; ?>


		<a class="watch-video fancy-video" href="<?php echo $videoDiv . $count; ?>">Watch</a>
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php echo $videoDiv . $count; ?>" class="fancy-video">
				<?php the_post_thumbnail('video-thumb'); ?>
			</a>
		<?php else : ?>
			<a href="<?php echo $videoDiv . $count; ?>" class="fancy-video">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/project-thumb.jpg">
			</a>
		<?php endif; ?>

		<div id="inlineVideo<?php echo $count; ?>" class="bendheim-modal-white bendheim-modal-video">
			<video width="1280" height="720" preload controls>
				<source src="<?php echo $videoSource; ?>" />
			</video>
		</div>

		<div id="youtubeEmbed<?php echo $count; ?>" class="bendheim-modal-white bendheim-modal-video">
			<iframe width="1280" height="700" src="https://www.youtube.com/embed/<?php echo $youtubeSource ?>?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>		

	</div>
	<div class="inner-content">
		<ul class="location">
			<li>Bendheim</li>												
		</ul>
		<h6 class="title"><?php the_title(); ?></h6>
	</div>

</div>