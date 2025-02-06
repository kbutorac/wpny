<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpny
 */

get_header();

$gallery              = ( ! empty( get_field( 'gallery' ) ) ) ? get_field( 'gallery' ) : '';
$description          = ( get_field( 'description' ) ) ? get_field( 'description' ) : '';
$title                = ( get_field( 'title' ) ) ? get_field( 'title' ) : '';
$video                = ( ! empty( get_field( 'video' ) ) ) ? get_field( 'video' ) : '';
$quote                = ( ! empty( get_field( 'quote' ) ) ) ? get_field( 'quote' ) : '';
$quote_author         = ( ! empty( get_field( 'quote_author' ) ) ) ? get_field( 'quote_author' ) : '';
$key_benefits_content = ( get_field( 'key_benefits_content' ) ) ? get_field( 'key_benefits_content' ) : '';
$key_benefits_bullets = ( ! empty( get_field( 'key_benefits_bullets' ) ) ) ? get_field( 'key_benefits_bullets' ) : '';

$related_systems        = ( ! empty( get_field( 'related_systems' ) ) ) ? get_field( 'related_systems' ) : '';
$featured_installations = ( ! empty( get_field( 'featured_installations' ) ) ) ? get_field( 'featured_installations' ) : '';

$industries = ( ! empty( get_field( 'industries' ) ) ) ? get_field( 'industries' ) : '';
$number     = '';

$current_post_id = get_the_ID(); // Get the current post ID
$args            = array(
	'post_type'      => 'project',
	'meta_query'     => array(
		array(
			'key'     => 'application_filter',
			'value'   => sprintf( ':"%s";', $current_post_id ), // Match serialized value
			'compare' => 'LIKE', // Serialized data requires LIKE comparison
		),
	),
	'posts_per_page' => -1, // Get all matching projects
);

// Create a new WP_Query instance
$query = new WP_Query( $args );

// Get the count of matching projects
$number = $query->found_posts;

// Reset post data
wp_reset_postdata();

?>

<section id="primary" class="px-5">
	<main id="main">

		<div class="hero relative -mx-5 min-h-[300px] md:min-h-[480px] lg:min-h-[600px] flex flex-col overflow-hidden before:absolute before:left-0 before:right-0 before:top-0 before:z-[1] before:h-full before:w-full before:bg-gradient-to-t  before:from-black-rgba before:to-black-rgba">
			<div class="container relative z-[2] my-auto pt-20 px-5 xl:px-0">
				<?php echo do_shortcode( '[breadcrumbs]' ); ?>
				<h1 class="text-white mt-5 md:mt-8 md:col-span-9 text-[32px] md:text-[68px] lg:text-[80px]"><?php echo get_the_title(); ?></h1>
			</div>			
			<div class="container relative z-[2] px-5">
				<div class="absolute left-5 xl:left-0 bottom-0 dots flex mt-auto text-white"></div>
			</div>	
			<?php if ( $gallery ) { ?>
					<div class="hero-slider-wrapper absolute top-0 left-0 w-full h-full  z-0">
						<div class="hero-slider">
						<?php foreach ( $gallery as $g ) { ?>
							<div class="gallery-slider__item h-[300px] md:h-[480px] lg:h-[640px] overflow-hidden relative before:absolute before:left-0 before:right-0 before:top-0 before:z-[1] before:h-full before:w-full before:bg-gradient-to-t  before:from-black-rgba before:to-transparent">
								<?php echo wp_get_attachment_image( $g, 'project-gallery', false, array( 'class' => 'gallery-slider__image h-full w-full object-cover object-center absolute top-0 left-0' ) ); ?>
							</div>
						<?php } ?>
						</div>
						
					</div>
				<?php } ?>
		</div>
		<div class="container mt-16 lg:mt-20">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<?php if ( $title || $description || $video ) { ?>
					<?php
					$video_id     = isset( $video['video_id'] ) ? $video['video_id'] : '';
					$poster_image = isset( $video['video_poster_image'] ) ? $video['video_poster_image'] : '';
					$video_type   = isset( $video['video_type'] ) ? $video['video_type'] : 'youtube';
					?>
					<div class="project-description my-10 md:my-16">
						<div class="grid grid-cols-12 gap-y-6">
						<?php if ( $description ) { ?>
							<div class="col-span-12 md:col-span-7">
								<?php if ( $title ) { ?>
									<h3 class="mb-4 font-semibold md:text-[30px] text-[24px]"><?php echo $title; ?></h3>
								<?php } ?>
								<?php if ( $description ) { ?>
									<div class="editor"><?php echo $description; ?></div>
								<?php } ?>
							</div>
							<?php } ?>
							<?php if ( $video_id || $poster_image ) { ?>
								<?php include get_template_directory() . '/inc/video-popup.php'; ?>
							<?php } ?>
							<?php if ( $quote ) { ?>
								<?php include get_template_directory() . '/inc/quote.php'; ?>
							<?php } ?>
							<?php if ( $number ) { ?>
								<div class="col-span-12 md:col-start-9 md:col-end-13">
									<div class="bg-light-blue py-10 px-6 md:py-16 md:px-10 relative overflow-hidden">
										<div class="relative z-[1] flex flex-col items-center justify-center">
											<h4 class="counter text-[40px] md:text-[60px] text-[#2DD8C0]" data-count="<?php echo $number; ?>">
												<span class="number">0</span>
											</h4>
											<h3 class="text-[20px] md:text-[26px] text-center"><?php echo get_the_title() . ' ' . __( 'Projects', 'wpny' ); ?></h3>
										</div>
										<svg class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" width="210" height="174" viewBox="0 0 210 174" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M129 128.754L209 172V45.2456L129 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
											<path opacity="0.3" d="M1 128.754L82 172V45.2456L1 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
											<path opacity="0.3" d="M64 128.754L145 172V45.2456L64 2V128.754Z" stroke="#83E3DE" stroke-width="2"/>
										</svg>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>
				<?php } ?>


				<?php if ( $key_benefits_content || $key_benefits_bullets ) { ?>
					<div class="bg-dark pt-10 pb-16 md:pt-16 md:pb-28 breakout-bg relative">
						<div class="grid grid-cols-12 items-end border-b border-[#929292] pb-5 md:pb-10">
							<div class="col-span-10 md:col-span-9">
								<h2 class="text-white text-[30px] md:text-[56px]"><?php echo __( 'Key Benefits', 'wpny' ); ?></h2>
							</div>
							<div class="col-span-2 md:col-span-3 flex justify-end items-end">
								<svg class="max-w-full mt-auto h-auto" xmlns="http://www.w3.org/2000/svg" width="102" height="128" viewBox="0 0 102 128" fill="none">
									<path d="M41.6587 0.836609V94.9926L101.197 126.967V32.8107L41.6587 0.836609Z" stroke="white"/>
									<path d="M0.5 0.836609V94.9926L60.0379 126.967V32.8107L0.5 0.836609Z" stroke="white"/>
									<path opacity="0.2" d="M22 95.2917L82.5379 127.803V32.5116L22 0.000549316V95.2917Z" fill="#83E3DE"/>
								</svg>
							</div>
						</div>
							<?php if ( $key_benefits_content ) { ?>
							<div class="grid grid-cols-12 mt-10 gap-y-6">
								<div class="col-span-12 md:col-span-7 text-white">
										<?php echo $key_benefits_content; ?>
								</div>
							</div>
							<?php } ?>
							<?php if ( $key_benefits_bullets ) { ?>
									<div class="grid grid-cols-12 gap-y-10 md:gap-x-10 mt-10">
										<?php foreach ( $key_benefits_bullets as $bullet ) { ?>
											<div class="col-span-12 md:col-span-4">
												<svg class="mb-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<circle cx="12" cy="12" r="12" fill="#2DD8C0"/>
													<g clip-path="url(#clip0_7478_703)">
													<path d="M3.31966 12.9658C3.12178 12.7795 3.00649 12.5181 3.00002 12.2419C2.99386 11.9658 3.09717 11.699 3.28663 11.5034C3.47576 11.3081 3.73419 11.2012 4.0017 11.2075C4.2692 11.2139 4.52245 11.3329 4.70284 11.5372L8.74454 15.7096C8.86533 15.832 9.059 15.832 9.1798 15.7096L17.2972 7.33025C17.4773 7.12598 17.7305 7.00695 17.9983 7.00027C18.2658 6.99392 18.5243 7.1009 18.7134 7.29615C18.9025 7.4914 19.0062 7.7582 19 8.03469C18.9939 8.31085 18.8786 8.5723 18.6807 8.75853L9.25784 18.4221C9.1785 18.5073 9.06936 18.5558 8.95472 18.5558C8.84007 18.5558 8.73093 18.5077 8.65159 18.4221L3.31966 12.9658Z" fill="#333333"/>
													</g>
													<defs>
													<clipPath id="clip0_7478_703">
													<rect width="16" height="11.5556" fill="white" transform="translate(3 7)"/>
													</clipPath>
													</defs>
												</svg>
												<div>
												<?php if ( isset( $bullet['title'] ) ) { ?>
													<div class="text-accent font-semibold text-[18px] md:text-[24px] mb-1 leading-tight"><?php echo $bullet['title']; ?></div>
												<?php } ?>
												<?php if ( isset( $bullet['content'] ) ) { ?>
												<div class="text-white text-[15px]"><?php echo $bullet['content']; ?></div>
												<?php } ?>
												</div>
											</div>
										<?php } ?>
									</div>
					
							<?php } ?>
					
					</div>
				<?php } ?>

				<?php if ( $related_systems ) { ?>
					<div class="related-sytems my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Related Glass & System', 'wpny' ); ?></h4>
						<div class=" gap-x-5 <?php echo ( 4 < count( $related_systems ) ) ? 'flex glass-slider' : 'grid grid-cols-2 md:grid-cols-4 gap-y-10'; ?>">
							<?php foreach ( $related_systems as $system ) { ?>
								<div>
									<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
										<?php echo get_the_post_thumbnail( $system, 'post-size', array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
									</a>
									<h4 class="text-[18px] hover:text-accent no-underline leading-normal transition-all"><a href="<?php echo esc_url( get_permalink( $system ) ); ?>" rel="bookmark"><?php echo get_the_title( $system ); ?></a></h4>
								</div>
								<?php } ?>
						</div>
						<div class="flex flex-col items-center md:flex-row-reverse mt-5 md:mt-10 gap-y-10">
							<div class="mx-auto md:ml-auto md:mr-0 slider-arrows flex gap-x-5"></div>
							<a class="btn btn--primary" href="<?php echo get_bloginfo( 'url' ) . '/glass'; ?>"><?php echo __( 'See all related systems', 'wpny' ); ?></a>
						</div>
					
					</div>
				<?php } ?>

				<?php if ( $featured_installations ) { ?>
					<div class="slider-container related-projects my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Featured Installations', 'wpny' ); ?></h4>
						<div class="md:gap-x-5 <?php echo ( 2 < count( $featured_installations ) ) ? 'projects-slider' : 'grid grid-cols-12 gap-y-10 '; ?>">
							<?php foreach ( $featured_installations as $installation ) { ?>
								<div class="col-span-12 md:col-span-6">
									<?php
									$location = ( get_field( 'location', $installation ) ) ? get_field( 'location', $installation ) : '';
									?>
									<div>
										<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink( $installation ) ); ?>" rel="bookmark">
										<?php echo wp_get_attachment_image( get_post_thumbnail_id( $installation ), 'post-size', array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
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
											<h4 class="hover:text-accent leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?php echo esc_url( get_permalink( $installation ) ); ?>" rel="bookmark"><?php echo get_the_title( $installation ); ?></a></h4>
										</header><!-- .entry-header -->
									</div><!-- #post-${ID} -->
								</div>
							<?php } ?>
						</div>
						<div class="flex  items-center  mt-5 md:mt-10 gap-y-10 <?php echo ( 2 < $featured_installations ) ? 'flex-col md:flex-row-reverse' : ''; ?>">
							<?php if ( 2 < $featured_installations ) { ?>
							<div class="mx-auto md:ml-auto md:mr-0 slider-arrows flex gap-x-5"></div>
							<?php } ?>
							<a class="btn btn--primary" href="<?php echo get_bloginfo( 'url' ) . '/projects'; ?>"><?php echo __( 'See more projects', 'wpny' ); ?></a>
						</div>
					</div>
				<?php } ?>


				<?php if ( $industries ) { ?>
					<div class="my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Industries', 'wpny' ); ?></h4>
						<div class="grid grid-cols-12 gap-y-10 md:gap-x-5">
							<?php foreach ( $industries as $industry ) { ?> 
								<div class="col-span-12 md:col-span-4">
									<div>
										<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink( $industry ) ); ?>" rel="bookmark">
										<?php echo wp_get_attachment_image( get_post_thumbnail_id( $industry ), 'post-size', array( 'class' => 'w-full h-full object-cover object-center' ) ); ?>
										</a>
										<header class="entry-header">
											<h4 class="hover:text-accent leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?php echo esc_url( get_permalink( $industry ) ); ?>" rel="bookmark"><?php echo get_the_title( $industry ); ?></a></h4>
										</header><!-- .entry-header -->
										<?php
										$short_description = ( get_field( 'short_description', $industry ) ) ? get_field( 'short_description', $industry ) : '';
										if ( $short_description ) {
											?>
										<div class="mt-2"><?php echo $short_description; ?></div>
										<?php } ?>
									</div><!-- #post-${ID} -->
								</div>
							<?php } ?>
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
