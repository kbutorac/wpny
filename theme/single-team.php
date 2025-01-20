<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */

get_header();
$position = ( get_field( 'position' ) ) ? get_field( 'position' ) : '';
$linkedin = ( get_field( 'linkedin' ) ) ? get_field( 'linkedin' ) : '';
$email    = ( get_field( 'email' ) ) ? get_field( 'email' ) : '';
/**
 * Renders the content for a single team member page.
 *
 * This code is responsible for displaying the hero section and the main content
 * for a single team member page. It retrieves the team member's title and
 * position, and displays them in the hero section. It then displays the main
 * content of the team member's page.
 */
?>
	<section id="primary" class="container">
		<main id="main">
			<div class="relative hero hero--case-study px-5 alignfull pt-36 pb-16 md:pt-56 md:pb-24 bg-dark">
				<div class="container relative z-[1]">
						<div class="hero-content animate animate-up">
							<div class="grid grid-cols-12 items-center">
									<div class="col-span-12 md:col-span-7 order-last md:order-first">
										<h1 class="text-[40px] md:text-[80px] text-white leading-none"><?php echo get_the_title(); ?></h1>
											<?php if ( $position ) { ?>
											<div class="mt-5 flex flex-col items-start">
												<?php if ( $position ) { ?>
												<div class="text-white text-[13px] pb-3 mb-5 inline-flex items-center gap-x-4 uppercase font-medium has-dots tracking-[3px]">
													<?php echo $position; ?>
												</div>
											<?php } ?>
											<?php if ( $linkedin || $email ) { ?>
												<div class="flex gap-x-3">
													<?php if ($linkedin){ ?>
														<a class="text-accent hover:text-white" href="<?=$linkedin?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
															<circle cx="19" cy="19" r="19" fill="currentColor"/>
															<path d="M15.0375 15.5977V25.4283H11.5425V15.5977H15.0375Z" fill="#333333"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M13.2898 14.1296C14.2586 14.1296 15.0373 13.3637 15.0373 12.4085C15.0373 11.4534 14.2586 10.6875 13.2898 10.6875C12.3209 10.6875 11.5422 11.4534 11.5422 12.4085C11.5422 13.3637 12.3209 14.1296 13.2898 14.1296Z" fill="#333333"/>
															<path d="M22.8061 15.5977C21.294 15.5977 20.2799 16.1473 19.8634 16.9222H19.8181V15.5977H17.0293V25.4283H19.9448V20.5535C19.9448 19.265 20.1893 18.0215 21.8101 18.0215C23.4308 18.0215 23.5304 19.4903 23.5304 20.6346V25.4283H26.5275V20.0219C26.5275 17.3728 25.948 15.5977 22.8061 15.5977Z" fill="#333333"/>
															</svg>
														</a>
													<?php } ?>
													<?php if ($email){ ?>
														<a class="text-accent hover:text-white" href="mailto:<?=$email?>">
														<svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
															<circle cx="19.875" cy="19" r="19" fill="currentColor"/>
															<g clip-path="url(#clip0_1301_2360)">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M20.3404 20.5594L11.4131 13.0625H29.3364L20.3404 20.5594Z" fill="#333333"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M17.0186 18.7028L10.4442 24.6867C10.3751 24.5492 10.3751 24.4116 10.3751 24.2052V14.0946C10.3751 13.7507 10.4442 13.5443 10.6519 13.3379L17.0186 18.7026V18.7028Z" fill="#333333"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M29.752 25.1679C29.6136 25.1679 29.4751 25.2366 29.3368 25.2366H11.3435C11.2051 25.2366 11.0666 25.1679 10.9975 25.1679L17.5718 19.1152L20.1323 21.2474C20.2706 21.3849 20.4783 21.3849 20.5475 21.2474L23.1773 19.1152L29.752 25.1679Z" fill="#333333"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M30.375 24.2052C30.375 24.4116 30.3058 24.5491 30.2367 24.6867L23.6623 18.7028L30.029 13.3379C30.2367 13.5441 30.375 13.7505 30.375 14.0944V24.2052Z" fill="#333333"/>
															</g>
															<defs>
															<clipPath id="clip0_1301_2360">
															<rect width="20" height="12.1739" fill="white" transform="matrix(-1 0 0 1 30.375 13.0625)"/>
															</clipPath>
															</defs>
															</svg>
														</a>
													<?php } ?>
												</div>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
							</div>	
						</div>
				</div>
				<div class="absolute bottom-0 right-0 w-[100px] h-[160px] md:w-[160px] md:h-[280px] lg:w-[200px] lg:h-[360px] z-[0] ">
				<svg viewBox="0 0 217 402" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M262.465 1L1 140.727V402" stroke="white"/>
					<path d="M296.371 25.125L36.2097 158.445V402" stroke="white"/>
					<path d="M409.824 1L72.7236 187.603V402" stroke="white"/>
					<path d="M450.25 28.3848L113.15 205.276V401.999" stroke="white"/>
				</svg>

				</div>
			</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'mt-10 md:mt-16' ); ?>>
				<div <?php in_content_class( 'entry-content' ); ?>>
					<?php
					the_content();
					?>
				</div><!-- .entry-content -->
			</article>
			<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
