<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpny
 */

get_header();

$gallery                        = ( ! empty( get_field( 'gallery' ) ) ) ? get_field( 'gallery' ) : '';
$description                    = ( get_field( 'description' ) ) ? get_field( 'description' ) : '';
$key_benefits_content           = ( get_field( 'key_benefits_content' ) ) ? get_field( 'key_benefits_content' ) : '';
$key_benefits_bullets           = ( ! empty( get_field( 'key_benefits_bullets' ) ) ) ? get_field( 'key_benefits_bullets' ) : '';
$options_content                = ( get_field( 'options_content' ) ) ? get_field( 'options_content' ) : '';
$images                         = ( ! empty( get_field( 'images' ) ) ) ? get_field( 'images' ) : '';
$additional_content_image       = ( get_field( 'additional_content_image' ) ) ? get_field( 'additional_content_image' ) : '';
$additional_content_title       = ( get_field( 'additional_content_title' ) ) ? get_field( 'additional_content_title' ) : '';
$additional_content_description = ( get_field( 'additional_content_description' ) ) ? get_field( 'additional_content_description' ) : '';
$related_systems                = ( ! empty( get_field( 'related_systems' ) ) ) ? get_field( 'related_systems' ) : '';
$featured_installations         = ( ! empty( get_field( 'featured_installations' ) ) ) ? get_field( 'featured_installations' ) : '';
$videos                         = ( ! empty( get_field( 'videos' ) ) ) ? get_field( 'videos' ) : '';
$downloads                      = ( ! empty( get_field( 'downloads' ) ) ) ? get_field( 'downloads' ) : '';
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
					<?php if ( $description ) { ?>
						<div class="mt-4 md:max-w-3xl editor"><?php echo $description; ?></div>
					<?php } ?>
				</div>
				<?php if ( $gallery ) { ?>
					<div class="gallery-wrapper relative mb-10 md:mb-16">
						<div class="gallery-slider">
						<?php foreach ( $gallery as $g ) { ?>
							<div class="gallery-slider__item h-[260px] md:h-[336px] lg:h-[640px] overflow-hidden relative before:absolute before:left-0 before:right-0 before:top-0 before:z-[1] before:h-full before:w-full before:bg-gradient-to-t  before:from-black-rgba before:to-transparent">
								<?php echo wp_get_attachment_image( $g, 'project-gallery', false, array( 'class' => 'gallery-slider__image h-full w-full object-cover object-center absolute top-0 left-0' ) ); ?>
								<?php
								$image_caption = get_post( $g )->post_excerpt;
								if ( ! empty( $image_caption ) ) {
										echo '<figcaption class="absolute z-[2] bottom-0 text-white text-[12px] md:text-[14px] px-20 pb-10 md:p-5  md:max-w-[40%]" itemprop="caption">' . $image_caption . '</figcaption>';
								}
								?>
							</div>
						<?php } ?>
						</div>
						<div class="arrows"></div>
						<div class="dots"></div>
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
									<div class="grid grid-cols-12 gap-y-10 md:gap-x-10 lg:gap-x-36 mt-10">
										<?php foreach ( $key_benefits_bullets as $bullet ) { ?>
											<div class="col-span-12 md:col-span-5 flex">
												<svg class="flex-none mt-2 mr-3" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
												<path d="M1.5 6.5C0.119289 5.11929 0.119289 2.88071 1.5 1.5C2.88071 0.119289 5.11929 0.119289 6.5 1.5C7.88071 2.88071 7.88071 5.11929 6.5 6.5C5.11929 7.88071 2.88071 7.88071 1.5 6.5Z" fill="#2DD8C0"/>
												</svg>
												<div>
												<?php if ( isset( $bullet['title'] ) ) { ?>
													<div class="text-white font-semibold text-[18px] mb-1"><?php echo $bullet['title']; ?></div>
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

				<?php if ( $options_content || $images ) { ?>
					<div class="bg-[#E9FAF9] pt-10 pb-16 md:pt-16 md:pb-28 breakout-bg relative">
						<div class="grid grid-cols-12 items-end border-b border-[#83E3DE] pb-5 md:pb-10"">
							<div class="col-span-10 md:col-span-9">
								<h2 class="text-black text-[30px] md:text-[56px]"><?php echo get_the_title() . ' ' . __( 'Options', 'wpny' ); ?></h2>
							</div>
							<div class="col-span-2 md:col-span-3 flex justify-end items-end">
								<svg class="max-w-full mt-auto h-auto" xmlns="http://www.w3.org/2000/svg" width="102" height="128" viewBox="0 0 102 128" fill="none">
									<path d="M41.6587 0.835632V94.9917L101.197 126.966V32.8097L41.6587 0.835632Z" stroke="#0A0A0A"/>
									<path d="M0.5 0.836609V94.9926L60.0379 126.967V32.8107L0.5 0.836609Z" stroke="#0A0A0A"/>
									<path opacity="0.4" d="M22 95.2917L82.5379 127.803V32.5116L22 0.000549316V95.2917Z" fill="#83E3DE"/>
								</svg>
							</div>
						</div>
							<?php if ( $options_content ) { ?>
							<div class="grid grid-cols-12 mt-10 gap-y-6">
								<div class="col-span-12 md:col-span-7 text-black">
										<?php echo $options_content; ?>
								</div>
							</div>
							<?php } ?>
							<?php if ( $images ) { ?>
									<div class="grid grid-cols-12 gap-y-10 gap-x-5 mt-10">
										<?php foreach ( $images as $image ) { ?>
											<div class="col-span-6 md:col-span-3">
												<div class="aspect-[3/2]">
													<?php echo wp_get_attachment_image( $image['image'], 'image-32', false, array( 'class' => '' ) ); ?>
												</div>
											</div>
										<?php } ?>
									</div>
					
							<?php } ?>
					
					</div>
				<?php } ?>

				<?php if ( $additional_content_description || $additional_content_title || $additional_content_image ) { ?>
					<div class="my-14 md:my-28">
						<div class="grid grid-cols-12 gap-y-10 md:gap-x-10">
							<?php if ( $additional_content_image ) { ?>
								<div class="col-span-12 md:col-span-6">
									<?php echo wp_get_attachment_image( $additional_content_image, 'image-32', false, array( 'class' => '' ) ); ?>
								</div>
							<?php } ?>
							<?php if ( $additional_content_title || $additional_content_description ) { ?>
								<div class="col-span-12 <?php echo ( $additional_content_image ) ? 'md:col-span-6' : ''; ?> ">
									<?php if ( $additional_content_title ) { ?>
										<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8">
											<?php echo $additional_content_title; ?>
										</h4>
									<?php } ?>
									<?php if ( $additional_content_description ) { ?>
										<div class="text-black editor">
											<?php echo $additional_content_description; ?>
										</div>
									<?php } ?>
									
								</div>
							<?php } ?>
						</div>
						
					</div>
				<?php } ?>

				<?php if ( $related_systems ) { ?>
					<div class="related-sytems my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Related Glass & System', 'wpny' ); ?></h4>
						<div class=" gap-x-5 <?=(4 < count($related_systems))? 'flex glass-slider' : 'grid grid-cols-2 md:grid-cols-4 gap-y-10'; ?>">
							<?php foreach ( $related_systems as $system ) { ?>
								<div>
									<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink($system) ); ?>" rel="bookmark">
										<?= get_the_post_thumbnail( $system  , 'post-size', ['class'=>'w-full h-full object-cover object-center'] )?>
									</a>
									<h4 class="text-[18px] hover:text-accent no-underline leading-normal transition-all"><a href="<?php echo esc_url( get_permalink($system) ); ?>" rel="bookmark"><?php echo get_the_title($system); ?></a></h4>
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
										<a class="mb-4 flex w-full aspect-[3/2]" href="<?php echo esc_url( get_permalink($installation) ); ?>" rel="bookmark">
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
											<h4 class="hover:text-accent leading-normal transition-all text-[20px] md:text-[26px]"><a href="<?php echo esc_url( get_permalink($installation) ); ?>" rel="bookmark"><?php echo get_the_title($installation); ?></a></h4>
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
				
				<?php if ( $videos ) { ?>
					<div class="my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Videos', 'wpny' ); ?></h4>
						<div class="grid grid-cols-12 md:gap-x-5 gap-y-10">
							<?php foreach ( $videos as $video ) { ?>
								<?php
									$video_type   = ( isset( $video['video_type'] ) ) ? $video['video_type'] : '';
									$video_id     = ( isset( $video['video_id'] ) ) ? $video['video_id'] : '';
									$poster_image = ( isset( $video['poster_image'] ) ) ? $video['poster_image'] : '';
									$video_title  = ( isset( $video['video_title'] ) ) ? $video['video_title'] : '';

									if ( ! $poster_image ) {
										// Determine the source of the video and fetch the thumbnail
										if ( $video_type === 'youtube' ) {
												// YouTube thumbnail URL
												$poster_image_url = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
										} elseif ( $video_type === 'vimeo' ) {
												// Fetch Vimeo thumbnail using the API
												$vimeo_data = wp_remote_get( "https://vimeo.com/api/v2/video/$video_id.json" );
												if ( is_wp_error( $vimeo_data ) ) {
														$poster_image_url = ''; // Default fallback if API call fails
												} else {
														$vimeo_data_body = wp_remote_retrieve_body( $vimeo_data );
														$vimeo_data_array = json_decode( $vimeo_data_body, true );
														$poster_image_url = $vimeo_data_array[0]['thumbnail_large'] ?? ''; // Use large thumbnail
												}
										}
								} else {
										// If poster image is uploaded, get its URL
										$poster_image_url = wp_get_attachment_url( $poster_image );
								}
								?>
								<div class="col-span-12 md:col-span-3">
									<div class="vpop relative group cursor-pointer hover:text-accent" data-type="<?php echo $video_type; ?>" data-id="<?php echo $video_id; ?>" data-autoplay='true'>
										<div class="aspect-[16/9]">
										<img src="<?php echo esc_url( $poster_image_url ); ?>" alt="Video Thumbnail" class="mt-0 w-full h-full object-cover" />
										</div>
										<?php if ( $video_title ) { ?>
											<h4 class="text-[18px] mt-4 group-hover:text-accent transition-all"><?php echo $video_title; ?></h4>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<?php if ( $downloads ) { ?>
					<div class="my-14 md:my-28">
						<h4 class="text-black text-[20px] md:text-[30px] font-semibold mb-5 md:mb-8"><?php echo __( 'Downloads', 'wpny' ); ?></h4>
						<div class="grid grid-cols-12 md:gap-x-5 gap-y-10">
							<?php foreach ( $downloads as $file ) { ?>
								<?php
									$filename   = ( isset( $file['file']['filename'] ) ) ? $file['file']['filename'] : '';
									$fileType   = pathinfo( $filename, PATHINFO_EXTENSION );
									$link       = ( isset( $file['file']['url'] ) ) ? $file['file']['url'] : '';
									$file_image = ( isset( $file['file_image'] ) ) ? $file['file_image'] : '';
									$file_name  = ( isset( $file['file_name'] ) ) ? $file['file_name'] : '';
								?>
								<div class="col-span-12 md:col-span-3 relative group">
									<div class="relative block w-full <?php echo ( $file_image ) ? 'aspect-[3/2]' : ''; ?>">
									<?php if ( $fileType ) { ?>
										<div class="<?php echo ( $file_image ) ? 'absolute top-0 left-0' : ''; ?> bg-dark inline-flex px-3 py-2 text-white uppercase font-semibold tracking-widest leading-none text-[13px] gap-x-2 items-center">
										<div>
											<?php
											switch ( $fileType ) {
												case 'pdf':
													echo '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="17" viewBox="0 0 13 17" fill="none">
													<g clip-path="url(#clip0_1301_3054)">
													<mask id="path-1-inside-1_1301_3054" fill="white">
													<path d="M12.9992 4.47088L12.9998 15.1574C12.9998 15.6644 12.7954 16.1255 12.4657 16.4592C12.1361 16.7929 11.6808 16.9998 11.1799 16.9998H1.82014C1.31931 16.9998 0.863889 16.7924 0.534411 16.4588C0.204933 16.1253 0 15.6644 0 15.1573V1.84256C0 1.33556 0.204933 0.874531 0.534411 0.540994C0.863889 0.207457 1.31916 0 1.82014 0H8.5868C8.72923 0 8.85657 0.0645352 8.94209 0.166375L12.863 4.13876C12.9532 4.23068 12.9981 4.35062 12.9992 4.47072V4.47088ZM12.0668 4.94324H9.91544C9.42348 4.94324 8.9749 4.73862 8.64915 4.40965L8.64744 4.40791C8.322 4.07737 8.12034 3.62358 8.12034 3.12602V0.944733H1.82014C1.57633 0.944733 1.35445 1.04594 1.19383 1.2087C1.03321 1.3713 0.933081 1.59591 0.933081 1.84272V15.1576C0.933081 15.4044 1.03306 15.629 1.19383 15.7916C1.35445 15.9542 1.57649 16.0556 1.82014 16.0556H11.1799C11.4237 16.0556 11.6457 15.9545 11.8063 15.7919C11.9669 15.6293 12.0668 15.4044 12.0668 15.1578V4.94324ZM9.05342 1.61118V3.12602C9.05342 3.36701 9.15013 3.58533 9.30515 3.74226L9.30686 3.74399C9.46173 3.90076 9.67754 3.99882 9.9156 3.99882H11.41L9.05357 1.61133L9.05342 1.61118Z"/>
													</mask>
													<path d="M12.9992 4.47088L12.9998 15.1574C12.9998 15.6644 12.7954 16.1255 12.4657 16.4592C12.1361 16.7929 11.6808 16.9998 11.1799 16.9998H1.82014C1.31931 16.9998 0.863889 16.7924 0.534411 16.4588C0.204933 16.1253 0 15.6644 0 15.1573V1.84256C0 1.33556 0.204933 0.874531 0.534411 0.540994C0.863889 0.207457 1.31916 0 1.82014 0H8.5868C8.72923 0 8.85657 0.0645352 8.94209 0.166375L12.863 4.13876C12.9532 4.23068 12.9981 4.35062 12.9992 4.47072V4.47088ZM12.0668 4.94324H9.91544C9.42348 4.94324 8.9749 4.73862 8.64915 4.40965L8.64744 4.40791C8.322 4.07737 8.12034 3.62358 8.12034 3.12602V0.944733H1.82014C1.57633 0.944733 1.35445 1.04594 1.19383 1.2087C1.03321 1.3713 0.933081 1.59591 0.933081 1.84272V15.1576C0.933081 15.4044 1.03306 15.629 1.19383 15.7916C1.35445 15.9542 1.57649 16.0556 1.82014 16.0556H11.1799C11.4237 16.0556 11.6457 15.9545 11.8063 15.7919C11.9669 15.6293 12.0668 15.4044 12.0668 15.1578V4.94324ZM9.05342 1.61118V3.12602C9.05342 3.36701 9.15013 3.58533 9.30515 3.74226L9.30686 3.74399C9.46173 3.90076 9.67754 3.99882 9.9156 3.99882H11.41L9.05357 1.61133L9.05342 1.61118Z" fill="white"/>
													<path d="M12.9992 4.47088H9.99922V4.47105L12.9992 4.47088ZM12.9998 15.1574H15.9998V15.1573L12.9998 15.1574ZM8.94209 0.166375L6.64467 2.09559L6.72224 2.18797L6.80698 2.27382L8.94209 0.166375ZM12.863 4.13876L15.0045 2.0378L14.9981 2.03131L12.863 4.13876ZM12.9992 4.47072H15.9992V4.45712L15.9991 4.44353L12.9992 4.47072ZM12.0668 4.94324H15.0668V1.94324H12.0668V4.94324ZM8.64915 4.40965L6.51488 6.51794L6.5174 6.52049L8.64915 4.40965ZM8.64744 4.40791L6.50965 6.51265L6.51317 6.51621L8.64744 4.40791ZM8.12034 0.944733H11.1203V-2.05527H8.12034V0.944733ZM1.19383 1.2087L3.3281 3.31699L3.32912 3.31596L1.19383 1.2087ZM1.19383 15.7916L3.3281 13.6833L3.32708 13.6823L1.19383 15.7916ZM9.05342 1.61118L11.1869 -0.49793L6.05342 -5.69067V1.61118H9.05342ZM9.30515 3.74226L11.4396 1.63411L11.4394 1.63396L9.30515 3.74226ZM9.30686 3.74399L7.17245 5.85213L7.17259 5.85228L9.30686 3.74399ZM11.41 3.99882V6.99882H18.5861L13.5452 1.89145L11.41 3.99882ZM9.05357 1.61133L11.1887 -0.496045L11.187 -0.497773L9.05357 1.61133ZM9.99922 4.47105L9.99984 15.1576L15.9998 15.1573L15.9992 4.4707L9.99922 4.47105ZM9.99984 15.1574C9.99984 14.8446 10.1283 14.5566 10.3315 14.3509L14.6 18.5675C15.4625 17.6944 15.9998 16.4843 15.9998 15.1574H9.99984ZM10.3315 14.3509C10.5351 14.1447 10.8367 13.9998 11.1799 13.9998V19.9998C12.525 19.9998 13.7371 19.441 14.6 18.5675L10.3315 14.3509ZM11.1799 13.9998H1.82014V19.9998H11.1799V13.9998ZM1.82014 13.9998C2.16509 13.9998 2.46604 14.1454 2.66868 14.3506L-1.59986 18.5671C-0.738267 19.4393 0.473533 19.9998 1.82014 19.9998V13.9998ZM2.66868 14.3506C2.87069 14.5551 3 14.8427 3 15.1573H-3C-3 16.4861 -2.46082 17.6956 -1.59986 18.5671L2.66868 14.3506ZM3 15.1573V1.84256H-3V15.1573H3ZM3 1.84256C3 2.15712 2.87078 2.44469 2.66868 2.64929L-1.59986 -1.5673C-2.46092 -0.69563 -3 0.514006 -3 1.84256H3ZM2.66868 2.64929C2.46615 2.85432 2.16507 3 1.82014 3V-3C0.47324 -3 -0.738368 -2.4394 -1.59986 -1.5673L2.66868 2.64929ZM1.82014 3H8.5868V-3H1.82014V3ZM8.5868 3C7.79873 3 7.10018 2.63804 6.64467 2.09559L11.2395 -1.76284C10.613 -2.50897 9.65972 -3 8.5868 -3V3ZM6.80698 2.27382L10.7279 6.2462L14.9981 2.03131L11.0772 -1.94107L6.80698 2.27382ZM10.7215 6.2397C10.2346 5.74342 10.0048 5.10503 9.99935 4.49791L15.9991 4.44353C15.9914 3.5962 15.6718 2.71794 15.0045 2.03781L10.7215 6.2397ZM9.99922 4.47072V4.47088H15.9992V4.47072H9.99922ZM12.0668 1.94324H9.91544V7.94324H12.0668V1.94324ZM9.91544 1.94324C10.2727 1.94324 10.5783 2.09416 10.7809 2.2988L6.5174 6.52049C7.37153 7.38307 8.57422 7.94324 9.91544 7.94324V1.94324ZM10.7834 2.30135L10.7817 2.29962L6.51317 6.51621L6.51488 6.51794L10.7834 2.30135ZM10.7852 2.30319C10.9856 2.5067 11.1203 2.79874 11.1203 3.12602H5.12034C5.12034 4.44841 5.65841 5.64803 6.50965 6.51264L10.7852 2.30319ZM11.1203 3.12602V0.944733H5.12034V3.12602H11.1203ZM8.12034 -2.05527H1.82014V3.94473H8.12034V-2.05527ZM1.82014 -2.05527C0.728654 -2.05527 -0.249661 -1.59956 -0.941454 -0.898563L3.32912 3.31596C2.95856 3.69144 2.42401 3.94473 1.82014 3.94473V-2.05527ZM-0.940434 -0.899596C-1.63042 -0.201109 -2.06692 0.771317 -2.06692 1.84272H3.93308C3.93308 2.4205 3.69685 2.9437 3.3281 3.31699L-0.940434 -0.899596ZM-2.06692 1.84272V15.1576H3.93308V1.84272H-2.06692ZM-2.06692 15.1576C-2.06692 16.2278 -1.63139 17.2011 -0.939414 17.9009L3.32708 13.6823C3.69751 14.0569 3.93308 14.581 3.93308 15.1576H-2.06692ZM-0.940434 17.8999C-0.249771 18.5991 0.727913 19.0556 1.82014 19.0556V13.0556C2.42506 13.0556 2.95867 13.3093 3.3281 13.6833L-0.940434 17.8999ZM1.82014 19.0556H11.1799V13.0556H1.82014V19.0556ZM11.1799 19.0556C12.2693 19.0556 13.2478 18.6016 13.9406 17.9002L9.67206 13.6836C10.0436 13.3075 10.578 13.0556 11.1799 13.0556V19.0556ZM13.9406 17.9002C14.6331 17.1992 15.0668 16.2256 15.0668 15.1578H9.06676C9.06676 14.5833 9.30079 14.0595 9.67206 13.6836L13.9406 17.9002ZM15.0668 15.1578V4.94324H9.06676V15.1578H15.0668ZM6.05342 1.61118V3.12602H12.0534V1.61118H6.05342ZM6.05342 3.12602C6.05342 4.18156 6.47919 5.15034 7.17088 5.85055L11.4394 1.63396C11.8211 2.02031 12.0534 2.55245 12.0534 3.12602H6.05342ZM7.17074 5.8504L7.17245 5.85213L11.4413 1.63584L11.4396 1.63411L7.17074 5.8504ZM7.17259 5.85228C7.8645 6.55271 8.83847 6.99882 9.9156 6.99882V0.998824C10.5166 0.998824 11.059 1.24881 11.4411 1.63569L7.17259 5.85228ZM9.9156 6.99882H11.41V0.998824H9.9156V6.99882ZM13.5452 1.89145L11.1887 -0.496044L6.9184 3.71871L9.27481 6.1062L13.5452 1.89145ZM11.187 -0.497773L11.1869 -0.49793L6.91995 3.72028L6.92011 3.72044L11.187 -0.497773Z" fill="white" mask="url(#path-1-inside-1_1301_3054)"/>
													</g>
													<defs>
													<clipPath id="clip0_1301_3054">
													<rect width="13" height="17" fill="white"/>
													</clipPath>
													</defs>
													</svg>';
													break;

												default:
													echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
													<g clip-path="url(#clip0_1301_3065)">
													<mask id="path-1-inside-1_1301_3065" fill="white">
													<path d="M1.01046 3.33303L6.59586 0.235416C7.16174 -0.0784722 7.83795 -0.0784722 8.40383 0.235416L13.9897 3.33351C14.6129 3.67907 15 4.34909 15 5.08053V10.9191C15 11.6508 14.6129 12.3206 13.9894 12.6667L8.40399 15.7643C8.1212 15.9214 7.8106 15.9999 7.5 15.9999C7.1894 15.9999 6.87911 15.9215 6.59601 15.7643L1.01015 12.6662C0.387092 12.3206 -0.000154495 11.6506 -0.000154495 10.9191V5.08053C-0.000154495 4.34893 0.386937 3.67907 1.01046 3.33303ZM8.03915 0.940946C7.87025 0.847355 7.68528 0.80016 7.49985 0.80016C7.31441 0.80016 7.12975 0.847035 6.96054 0.940946L1.37514 4.03824C1.32075 4.06863 1.27624 4.11055 1.22803 4.14863L7.49954 7.62588L13.7715 4.14847C13.7236 4.11039 13.6791 4.06847 13.6247 4.03808L8.0393 0.940466V0.940946H8.03915ZM13.6245 11.9619C13.9962 11.7551 14.2275 11.3556 14.2275 10.9196V5.08101C14.2275 4.9927 14.2118 4.90695 14.1935 4.82312L7.88647 8.31989V15.1203C7.93778 15.1011 7.99047 15.0864 8.03946 15.0592L13.6249 11.9619H13.6245ZM0.772484 10.9196C0.772484 11.3559 1.0035 11.7555 1.37514 11.9614L6.96054 15.0591C7.00968 15.0863 7.06207 15.101 7.11353 15.1202V8.31973L0.806479 4.82296C0.788245 4.90727 0.772484 4.99254 0.772484 5.08085V10.9195V10.9196Z"/>
													</mask>
													<path d="M1.01046 3.33303L6.59586 0.235416C7.16174 -0.0784722 7.83795 -0.0784722 8.40383 0.235416L13.9897 3.33351C14.6129 3.67907 15 4.34909 15 5.08053V10.9191C15 11.6508 14.6129 12.3206 13.9894 12.6667L8.40399 15.7643C8.1212 15.9214 7.8106 15.9999 7.5 15.9999C7.1894 15.9999 6.87911 15.9215 6.59601 15.7643L1.01015 12.6662C0.387092 12.3206 -0.000154495 11.6506 -0.000154495 10.9191V5.08053C-0.000154495 4.34893 0.386937 3.67907 1.01046 3.33303ZM8.03915 0.940946C7.87025 0.847355 7.68528 0.80016 7.49985 0.80016C7.31441 0.80016 7.12975 0.847035 6.96054 0.940946L1.37514 4.03824C1.32075 4.06863 1.27624 4.11055 1.22803 4.14863L7.49954 7.62588L13.7715 4.14847C13.7236 4.11039 13.6791 4.06847 13.6247 4.03808L8.0393 0.940466V0.940946H8.03915ZM13.6245 11.9619C13.9962 11.7551 14.2275 11.3556 14.2275 10.9196V5.08101C14.2275 4.9927 14.2118 4.90695 14.1935 4.82312L7.88647 8.31989V15.1203C7.93778 15.1011 7.99047 15.0864 8.03946 15.0592L13.6249 11.9619H13.6245ZM0.772484 10.9196C0.772484 11.3559 1.0035 11.7555 1.37514 11.9614L6.96054 15.0591C7.00968 15.0863 7.06207 15.101 7.11353 15.1202V8.31973L0.806479 4.82296C0.788245 4.90727 0.772484 4.99254 0.772484 5.08085V10.9195V10.9196Z" fill="white"/>
													<path d="M1.01046 3.33303L0.0399294 1.58429L0.0404606 1.584L1.01046 3.33303ZM6.59586 0.235416L7.56599 1.98437L7.56585 1.98445L6.59586 0.235416ZM8.40383 0.235416L7.43378 1.98442L7.4337 1.98437L8.40383 0.235416ZM13.9897 3.33351L13.0198 5.08261L13.0196 5.08251L13.9897 3.33351ZM13.9894 12.6667L14.9599 14.4154L14.9594 14.4157L13.9894 12.6667ZM8.40399 15.7643L7.43269 14.016L7.43399 14.0152L8.40399 15.7643ZM6.59601 15.7643L7.56606 14.0153L7.56725 14.0159L6.59601 15.7643ZM1.01015 12.6662L0.0400982 14.4152L1.01015 12.6662ZM8.03915 0.940946V2.94095H7.52206L7.06978 2.69032L8.03915 0.940946ZM6.96054 0.940946L7.93109 2.68967L7.93046 2.69002L6.96054 0.940946ZM1.37514 4.03824L0.399482 2.29235L0.405223 2.28916L1.37514 4.03824ZM1.22803 4.14863L0.258221 5.89776L-2.36914 4.44101L-0.011529 2.57908L1.22803 4.14863ZM7.49954 7.62588L8.46933 9.37502L7.49952 9.91272L6.52973 9.37501L7.49954 7.62588ZM13.7715 4.14847L15.016 2.5828L17.3598 4.44581L14.7413 5.89761L13.7715 4.14847ZM13.6247 4.03808L14.5947 2.28904L14.6004 2.2922L13.6247 4.03808ZM8.0393 0.940466H6.0393V-2.4557L9.0093 -0.808565L8.0393 0.940466ZM8.0393 0.940946H10.0393V2.94095H8.0393V0.940946ZM13.6245 11.9619V13.9619H5.91912L12.6519 10.2144L13.6245 11.9619ZM14.1935 4.82312L13.2237 3.07396L15.5761 1.76974L16.1478 4.39804L14.1935 4.82312ZM7.88647 8.31989H5.88647V7.14192L6.9167 6.57073L7.88647 8.31989ZM7.88647 15.1203L8.58742 16.9935L5.88647 18.0042V15.1203H7.88647ZM8.03946 15.0592L7.06863 13.3106L7.06954 13.3101L8.03946 15.0592ZM13.6249 11.9619V9.96192H21.3556L14.5948 13.711L13.6249 11.9619ZM1.37514 11.9614L2.34439 10.212L2.34514 10.2124L1.37514 11.9614ZM6.96054 15.0591L5.99205 16.8089L5.99055 16.8081L6.96054 15.0591ZM7.11353 15.1202H9.11353V18.001L6.41443 16.994L7.11353 15.1202ZM7.11353 8.31973L8.0833 6.57057L9.11353 7.14176V8.31973H7.11353ZM0.806479 4.82296L-1.14832 4.40019L-0.57905 1.76797L1.77625 3.0738L0.806479 4.82296ZM0.0404606 1.584L5.62586 -1.51361L7.56585 1.98445L1.98045 5.08206L0.0404606 1.584ZM5.62573 -1.51354C6.79505 -2.16215 8.20464 -2.16215 9.37396 -1.51354L7.4337 1.98437C7.44833 1.99249 7.47177 2 7.49985 2C7.52792 2 7.55136 1.99249 7.56599 1.98437L5.62573 -1.51354ZM9.37388 -1.51358L14.9597 1.58451L13.0196 5.08251L7.43378 1.98442L9.37388 -1.51358ZM14.9596 1.5844C16.2402 2.29449 17 3.64729 17 5.08053H13C13 5.0683 12.9969 5.06294 12.9971 5.06334C12.9973 5.06365 12.9987 5.06611 13.0025 5.06986C13.0065 5.07378 13.0123 5.07845 13.0198 5.08261L14.9596 1.5844ZM17 5.08053V10.9191H13V5.08053H17ZM17 10.9191C17 12.353 16.2398 13.705 14.9599 14.4154L13.0189 10.9179C13.0117 10.9219 13.0062 10.9263 13.0023 10.9301C12.9987 10.9337 12.9973 10.9361 12.9971 10.9364C12.9969 10.9368 13 10.9315 13 10.9191H17ZM14.9594 14.4157L9.37398 17.5133L7.43399 14.0152L13.0194 10.9176L14.9594 14.4157ZM9.37528 17.5126C8.7944 17.8353 8.14937 17.9999 7.5 17.9999V13.9999C7.47183 13.9999 7.448 14.0074 7.4327 14.016L9.37528 17.5126ZM7.5 17.9999C6.85077 17.9999 6.20606 17.8355 5.62478 17.5126L7.56725 14.0159C7.55216 14.0075 7.52802 13.9999 7.5 13.9999V17.9999ZM5.62597 17.5133L0.0400982 14.4152L1.9802 10.9172L7.56606 14.0153L5.62597 17.5133ZM0.0400982 14.4152C-1.23998 13.7052 -2.00015 12.3526 -2.00015 10.9191H1.99985C1.99985 10.9312 2.00294 10.9366 2.00276 10.9363C2.0026 10.936 2.00117 10.9336 1.99742 10.9299C1.9935 10.926 1.9877 10.9213 1.9802 10.9172L0.0400982 14.4152ZM-2.00015 10.9191V5.08053H1.99985V10.9191H-2.00015ZM-2.00015 5.08053C-2.00015 3.64668 -1.24 2.29464 0.0399294 1.58429L1.98098 5.08176C1.9881 5.07781 1.99369 5.07335 1.99752 5.06956C2.00116 5.06595 2.00258 5.06358 2.00275 5.06329C2.00299 5.06288 1.99985 5.06821 1.99985 5.08053H-2.00015ZM7.06978 2.69032C7.19526 2.75985 7.34355 2.80016 7.49985 2.80016V-1.19984C8.02701 -1.19984 8.54524 -1.06514 9.00852 -0.808432L7.06978 2.69032ZM7.49985 2.80016C7.65482 2.80016 7.80407 2.76017 7.93109 2.68967L5.99 -0.80778C6.45543 -1.0661 6.974 -1.19984 7.49985 -1.19984V2.80016ZM7.93046 2.69002L2.34506 5.78731L0.405223 2.28916L5.99063 -0.808127L7.93046 2.69002ZM2.3508 5.78412C2.45881 5.72375 2.53005 5.66709 2.54374 5.65621C2.54983 5.65137 2.55376 5.64804 2.53821 5.6609C2.52805 5.66931 2.49977 5.69276 2.46759 5.71818L-0.011529 2.57908C-0.019599 2.58545 -0.0242329 2.58939 -0.0107975 2.57828C-0.00274181 2.57162 0.0247583 2.54877 0.0547943 2.52489C0.11639 2.47593 0.237076 2.38312 0.399487 2.29236L2.3508 5.78412ZM2.19784 2.39949L8.46935 5.87674L6.52973 9.37501L0.258221 5.89776L2.19784 2.39949ZM6.52975 5.87673L12.8017 2.39932L14.7413 5.89761L8.46933 9.37502L6.52975 5.87673ZM12.527 5.71413C12.4959 5.68935 12.4681 5.6662 12.4587 5.65843C12.444 5.64625 12.4481 5.64972 12.4548 5.65508C12.4695 5.66678 12.5409 5.72353 12.649 5.78396L14.6004 2.2922C14.7629 2.38302 14.8837 2.47593 14.9462 2.52571C14.9769 2.5501 15.0045 2.57309 15.0133 2.58043C15.0274 2.59217 15.0232 2.58855 15.016 2.5828L12.527 5.71413ZM12.6547 5.78711L7.06931 2.6895L9.0093 -0.808565L14.5947 2.28905L12.6547 5.78711ZM10.0393 0.940466V0.940946H6.0393V0.940466H10.0393ZM8.0393 2.94095H8.03915V-1.05905H8.0393V2.94095ZM12.6519 10.2144C12.3709 10.3708 12.2275 10.6512 12.2275 10.9196H16.2275C16.2275 12.06 15.6215 13.1394 14.5972 13.7095L12.6519 10.2144ZM12.2275 10.9196V5.08101H16.2275V10.9196H12.2275ZM12.2275 5.08101C12.2275 5.15508 12.2341 5.21002 12.238 5.23698C12.2416 5.26186 12.2444 5.27185 12.2392 5.2482L16.1478 4.39804C16.1719 4.50892 16.2275 4.76816 16.2275 5.08101H12.2275ZM15.1633 6.57227L8.85625 10.069L6.9167 6.57073L13.2237 3.07396L15.1633 6.57227ZM9.88647 8.31989V15.1203H5.88647V8.31989H9.88647ZM7.18553 13.2472C7.22225 13.2334 7.25508 13.222 7.2667 13.218C7.28473 13.2117 7.27925 13.2136 7.27196 13.2163C7.25523 13.2224 7.17272 13.2529 7.06863 13.3106L9.01028 16.8078C8.85721 16.8928 8.72386 16.9442 8.6557 16.9693C8.62271 16.9815 8.59137 16.9923 8.58356 16.995C8.56934 17 8.57635 16.9976 8.58742 16.9935L7.18553 13.2472ZM7.06954 13.3101L12.6549 10.2129L14.5948 13.711L9.00938 16.8083L7.06954 13.3101ZM13.6249 13.9619H13.6245V9.96192H13.6249V13.9619ZM2.77248 10.9196C2.77248 10.6539 2.63054 10.3705 2.34439 10.212L0.405895 13.7109C-0.623536 13.1406 -1.22752 12.0579 -1.22752 10.9196H2.77248ZM2.34514 10.2124L7.93054 13.31L5.99055 16.8081L0.405146 13.7105L2.34514 10.2124ZM7.92904 13.3092C7.82706 13.2527 7.74626 13.2228 7.72895 13.2164C7.72143 13.2137 7.71606 13.2118 7.73347 13.2179C7.74465 13.2218 7.77683 13.233 7.81263 13.2463L6.41443 16.994C6.42449 16.9978 6.43083 16.9999 6.41618 16.9948C6.40775 16.9918 6.37657 16.981 6.34338 16.9688C6.27473 16.9434 6.14317 16.8926 5.99205 16.8089L7.92904 13.3092ZM5.11353 15.1202V8.31973H9.11353V15.1202H5.11353ZM6.14375 10.0689L-0.163292 6.57211L1.77625 3.0738L8.0833 6.57057L6.14375 10.0689ZM2.76129 5.24573C2.7557 5.27156 2.75839 5.26193 2.76195 5.2374C2.76587 5.21037 2.77248 5.15515 2.77248 5.08085H-1.22752C-1.22752 4.76751 -1.17162 4.50791 -1.14832 4.40019L2.76129 5.24573ZM2.77248 5.08085V10.9195H-1.22752V5.08085H2.77248ZM2.77248 10.9195V10.9196H-1.22752V10.9195H2.77248Z" fill="white" mask="url(#path-1-inside-1_1301_3065)"/>
													</g>
													<defs>
													<clipPath id="clip0_1301_3065">
													<rect width="15" height="16" fill="white" transform="matrix(-1 0 0 1 15 0)"/>
													</clipPath>
													</defs>
													</svg>';
													break;
											}
											?>
										</div>
											<span><?php echo $fileType; ?></span>
										</div>
									<?php } ?>
									<?php if ( $file_image ) { ?>
										<a href="<?php echo $link; ?>" target="_blank">
										<?php echo wp_get_attachment_image( $file_image, 'project-gallery', '', array( 'class' => 'mt-0 w-full h-full object-cover' ) ); ?>
										</a>
									<?php } ?>
									</div>
									<?php if ( $file_name ) { ?>
										<a class="group-hover:text-accent mt-3 flex" href="<?php echo $link; ?>" target="_blank"><?php echo $file_name; ?></a>
									<?php } ?>
										
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
