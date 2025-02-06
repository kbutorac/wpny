<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpny
 */

get_header();

$gallery              = ( ! empty( get_field( 'project_images' ) ) ) ? get_field( 'project_images' ) : '';
$project_description  = ( ! empty( get_field( 'project_description' ) ) ) ? get_field( 'project_description' ) : '';
$project_video        = ( ! empty( get_field( 'project_video' ) ) ) ? get_field( 'project_video' ) : '';
$quote                = ( ! empty( get_field( 'quote' ) ) ) ? get_field( 'quote' ) : '';
$quote_author         = ( ! empty( get_field( 'quote_author' ) ) ) ? get_field( 'quote_author' ) : '';
$stats_counter        = ( ! empty( get_field( 'stats_counter' ) ) ) ? get_field( 'stats_counter' ) : '';
$stats_title          = ( ! empty( get_field( 'stats_title' ) ) ) ? get_field( 'stats_title' ) : '';
$highlights_content   = ( get_field( 'highlights_content' ) ) ? get_field( 'highlights_content' ) : '';
$related_systems      = ( ! empty( get_field( 'related_systems' ) ) ) ? get_field( 'related_systems' ) : '';
$related_projects     = ( ! empty( get_field( 'project_related_projects' ) ) ) ? get_field( 'project_related_projects' ) : '';
$location             = ( get_field( 'project_location' ) ) ? get_field( 'project_location' ) : '';
$installer            = ( get_field( 'project_installer' ) ) ? get_field( 'project_installer' ) : '';
$architect            = ( get_field( 'project_architect' ) ) ? get_field( 'project_architect' ) : '';
$project_gc           = ( get_field( 'project_gc' ) ) ? get_field( 'project_gc' ) : '';
$project_testimonials = ( ! empty( get_field( 'project_testimonials' ) ) ) ? get_field( 'project_testimonials', get_the_ID() ) : '';

?>

<section id="primary" class="px-5">
	<main id="main">
		<div class="container mt-16 lg:mt-20">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<div class="md:pt-36 md:pb-16 pb-6 pt-20">
					<?php echo do_shortcode( '[breadcrumbs]' ); ?>
					<h1 class="mt-10 md:mt-8 md:col-span-9 text-[32px] md:text-[68px] lg:text-[80px]"><?php echo get_the_title(); ?></h1>
				</div>
				<?php if ( $gallery ) { ?>
					<div class="gallery-wrapper relative">
						<div class="gallery-slider">
						<?php foreach ( $gallery as $g ) { ?>
							<?php $image_caption = get_post( $g )->post_excerpt; ?>
							<div class="gallery-slider__item h-[260px] md:h-[336px] lg:h-[640px] overflow-hidden relative ">
									<a class="h-full w-full absolute top-0 left-0 before:absolute before:left-0 before:right-0 before:top-0 before:z-[1] before:h-full before:w-full before:bg-gradient-to-t before:from-black-rgba before:to-transparent" href="<?php echo wp_get_attachment_url( $g ); ?>" data-lightbox="gallery" data-title="<?php echo ( $image_caption ) ? : ''; ?>">
											<?php echo wp_get_attachment_image( $g, 'project-gallery', false, array( 'class' => 'gallery-slider__image h-full w-full object-cover object-center absolute top-0 left-0' ) ); ?>
									</a>
									<?php
									if ( ! empty( $image_caption ) ) {
											echo '<figcaption class="absolute bottom-0 text-white z-[2] text-[14px] px-20 pb-10 md:p-5  md:max-w-[40%]" itemprop="caption">' . $image_caption . '</figcaption>';
									}
									?>
							</div>
						<?php } ?>
						</div>
						<div class="arrows"></div>
						<div class="dots"></div>
					</div>
				<?php } ?>
				
				<?php
				$video_id     = isset( $project_video['video_id'] ) ? $project_video['video_id'] : '';
				$poster_image = isset( $project_video['video_poster_image'] ) ? $project_video['video_poster_image'] : '';
				$video_type   = isset( $project_video['video_type'] ) ? $project_video['video_type'] : 'youtube';
				?>
				<?php if ( $project_description || $video_id ) { ?>
					<div class="project-description my-10 md:my-16">
						<div class="grid grid-cols-12 gap-y-6 align-top">
						<?php if ( $project_description ) { ?>
							<div class="col-span-12 md:col-span-7">
								<h3 class="mb-4 font-semibold md:text-[30px] text-[24px]"><?php echo __( 'Project Description', 'wpny' ); ?></h3>
								<div class="editor"><?php echo $project_description; ?></div>
							</div>
							<?php } ?>
							<?php if ( $video_id || $poster_image ) { ?>
								<?php include get_template_directory() . '/inc/video-popup.php'; ?>
							<?php } ?>
							<?php if ($quote){ ?>
								<?php include get_template_directory() . '/inc/quote.php'; ?>
							<?php } ?>
							<?php if ($stats_counter || $stats_title) { ?>
								<?php include get_template_directory() . '/inc/stats-counter.php'; ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
				<?php if ( $highlights_content || $location || $installer || $architect || $project_gc || $project_testimonials ) { ?>
					<div class="bg-dark py-10 md:pt-16 md:pb-28 breakout-bg relative">
						<div class="grid grid-cols-12 items-end border-b border-[#929292] pb-10">
							<div class="col-span-10 md:col-span-9">
								<h2 class="text-white text-[30px] md:text-[56px]"><?php echo __( 'Project Highlights', 'wpny' ); ?></h2>
							</div>
							<div class="col-span-2 md:col-span-3 flex justify-end items-end">
								<svg class="max-w-full mt-auto h-auto" xmlns="http://www.w3.org/2000/svg" width="102" height="128" viewBox="0 0 102 128" fill="none">
									<path d="M41.6587 0.836609V94.9926L101.197 126.967V32.8107L41.6587 0.836609Z" stroke="white"/>
									<path d="M0.5 0.836609V94.9926L60.0379 126.967V32.8107L0.5 0.836609Z" stroke="white"/>
									<path opacity="0.2" d="M22 95.2917L82.5379 127.803V32.5116L22 0.000549316V95.2917Z" fill="#83E3DE"/>
								</svg>
							</div>
						</div>
						<div class="grid grid-cols-12 mt-10 gap-y-6">
							<?php if ( $location || $installer || $architect || $project_gc ) { ?>
								<div class="col-span-12 mb-0 lg:mb-6">
									<div class="grid grid-cols-12 gap-y-10">
										<?php if ( $location ) { ?>
											<div class="col-span-12 md:col-span-6 lg:col-span-3">
												<h4 class="text-accent font-semibold text-[18px] md:text-[24px] mb-2"><?php echo __( 'Location', 'wpny' ); ?></h4>
												<div class="text-white text-[15px]"><?php echo $location; ?></div>
											</div>
										<?php } ?>
										<?php if ( $architect ) { ?>
											<div class="col-span-12 md:col-span-6 lg:col-span-3">
												<h4 class="text-accent font-semibold text-[18px] md:text-[24px] mb-2"><?php echo __( 'Architect', 'wpny' ); ?></h4>
												<div class="text-white text-[15px]"><?php echo $architect; ?></div>
											</div>
										<?php } ?>
										<?php if ( $project_gc ) { ?>
											<div class="col-span-12 md:col-span-6 lg:col-span-3">
												<h4 class="text-accent font-semibold text-[18px] md:text-[24px] mb-2"><?php echo __( 'General Contractor', 'wpny' ); ?></h4>
												<div class="text-white text-[15px]"><?php echo $project_gc; ?></div>
											</div>
										<?php } ?>
										<?php if ( $installer ) { ?>
											<div class="col-span-12 md:col-span-6 lg:col-span-3">
												<h4 class="text-accent font-semibold text-[18px] md:text-[24px] mb-2"><?php echo __( 'Installer', 'wpny' ); ?></h4>
												<div class="text-white text-[15px]"><?php echo $installer; ?></div>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							<?php if ( $highlights_content ) { ?>
								<div class="col-span-12 text-white">
										<?php echo $highlights_content; ?>
								</div>
							<?php } ?>
						</div>

					<?php if ( $project_testimonials ) { ?>
						<div class="grid grid-cols-12 items-end border-b border-[#929292] pb-5 mt-20">
							<div class="col-span-10 md:col-span-9">
								<h3 class="text-white font-semibold md:text-[30px] text-[24px]"><?php echo __( 'Project Testimonials', 'wpny' ); ?></h3>
							</div>
							<div class="col-span-2 md:col-span-3 flex justify-end items-end">
							<svg xmlns="http://www.w3.org/2000/svg" width="49" height="38" viewBox="0 0 49 38" fill="none">
								<path d="M37 37.25C30.25 37.25 25.875 32.125 25.875 24.75C25.875 14 34 4.375 48 0L48.75 1.5C39 6.5 34.25 14.375 33.75 19.125L34.25 19.375C35.375 18.75 36.625 18.5 38 18.5C42.25 18.5 46.5 21.875 46.5 27.5C46.5 32.625 42.625 37.25 37 37.25ZM11.125 37.25C4.25 37.25 0 32.125 0 24.75C0 14 8 4.375 22 0L22.75 1.5C13 6.5 8.25 14.375 7.75 19.125L8.25 19.375C9.375 18.75 10.625 18.5 12 18.5C16.25 18.5 20.5 21.875 20.5 27.5C20.5 32.625 16.625 37.25 11.125 37.25Z" fill="#2DD8C0"/>
								</svg>
							</div>
						</div>

						<div class="flex flex-col gap-y-6 md:gap-y-10">
							<?php foreach ( $project_testimonials as $t ) { ?>
							<div class="text-white">
								<?php if ( isset( $t['headline'] ) ) { ?>
									<h4 class="text-[20px] mb-4"><?php echo $t['headline']; ?></h4>
								<?php } ?>
								<?php if ( isset( $t['quote'] ) ) { ?>
									<div><?php echo $t['quote']; ?></div>
								<?php } ?>
								<?php if ( isset( $t['from'] ) ) { ?>
									<em class="mt-3 block text-[16px]">- <?php echo $t['from']; ?></em>
								<?php } ?>
							</div>
							<?php	} ?>
						</div>

						<?php } ?>

					</div>
				<?php } ?>

				<?php if ( $related_systems ) { ?>
					<div class="related-sytems my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Related Glass & Systems', 'wpny' ); ?></h4>
						<div class=" gap-x-5 <?php echo ( 4 < count( $related_systems ) ) ? 'flex glass-slider' : 'grid grid-cols-2 md:grid-cols-4 gap-y-10'; ?>">
							<?php foreach ( $related_systems as $system ) { ?>
								<div>
									<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink( $system ) ); ?>" rel="bookmark">
										<?php echo get_the_post_thumbnail( $system, 'post-size', array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
									</a>
									<h4 class="text-[18px] hover:text-accent no-underline leading-normal transition-all"><a href="<?php echo esc_url( get_permalink( $system ) ); ?>" rel="bookmark"><?php echo get_the_title( $system ); ?></a></h4>
								</div>

								<?php } ?>
						</div>
						<div class="flex flex-col items-center md:flex-row-reverse mt-5 md:mt-10 gap-y-10">
							<div class="mx-auto md:ml-auto md:mr-0 slider-arrows flex gap-x-5"></div>
							<div class="flex flex-col gap-y-4 md:flex-row md:gap-x-6">
								<a class="btn btn--primary" href="<?php echo get_bloginfo( 'url' ) . '/systems'; ?>"><?php echo __( 'See all related systems', 'wpny' ); ?></a>
								<a class="btn btn--primary" href="<?php echo get_bloginfo( 'url' ) . '/glass'; ?>"><?php echo __( 'See all related glass', 'wpny' ); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>


				<?php if ( $related_projects ) { ?>
					<?php $related_projects_count = count( $related_projects ); ?>
					<div class="related-projects my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Related Projects', 'wpny' ); ?></h4>
						<div class="<?php echo ( 2 < $related_projects_count ) ? 'projects-slider' : 'grid grid-cols-12 gap-y-10 md:gap-x-5'; ?> ">
							<?php foreach ( $related_projects as $project ) { ?>
								<div class="col-span-12 md:col-span-6">
									<?php
									$location = ( get_field( 'project_location', $project ) ) ? get_field( 'project_location', $project ) : '';
									?>
									<div>
										<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink( $project ) ); ?>" rel="bookmark">
										<?php echo wp_get_attachment_image( get_post_thumbnail_id( $project ), 'post-size', array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
										</a>
										<header class="entry-header">
											<?php if ( $location ) { ?>
												<div class="post-category uppercase font-semibold text-[12px] mb-3 flex items-center gap-x-2 tracking-widest relative leading-none">
												<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
													<circle cx="4" cy="4" r="4" fill="#86E5DE"/>
												</svg>
												<span><?php echo $location; ?></span>
											</div>
											<?php } ?>
											<h4 class="hover:text-accent leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?php echo esc_url( get_permalink( $project ) ); ?>" rel="bookmark"><?php echo get_the_title( $project ); ?></a></h4>
										</header><!-- .entry-header -->
									</div><!-- #post-${ID} -->
								</div>
							<?php } ?>
						</div>
						<div class="flex  items-center  mt-5 md:mt-10 gap-y-10 <?php echo ( 2 < $related_projects_count ) ? 'flex-col md:flex-row-reverse' : ''; ?>">
							<?php if ( 2 < $related_projects_count ) { ?>
							<div class="mx-auto md:ml-auto md:mr-0 slider-arrows flex gap-x-5"></div>
							<?php } ?>
							<a class="btn btn--primary" href="<?php echo get_bloginfo( 'url' ) . '/projects'; ?>"><?php echo __( 'See more projects', 'wpny' ); ?></a>
						</div>


						
					</div>
				<?php } ?>
				


			<?php endwhile; ?>
		
			<?php get_template_part( 'template-parts/parts/cta' ); ?>

		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
