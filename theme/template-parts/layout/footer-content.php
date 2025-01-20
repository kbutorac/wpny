<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

$cta_primary   = ( ! empty( get_field( 'cta_primary', 'options' ) ) ) ? get_field( 'cta_primary', 'options' ) : '';
$cta_secondary = ( ! empty( get_field( 'cta_secondary', 'options' ) ) ) ? get_field( 'cta_secondary', 'options' ) : '';

$copyright = ( get_field( 'copyright', 'options' ) ) ? get_field( 'copyright', 'options' ) : '';

$facebook  = ( get_field( 'facebook', 'options' ) ) ? get_field( 'facebook', 'options' ) : '';
$linkedin  = ( get_field( 'linkedin', 'options' ) ) ? get_field( 'linkedin', 'options' ) : '';
$youtube   = ( get_field( 'youtube', 'options' ) ) ? get_field( 'youtube', 'options' ) : '';
$instagram = ( get_field( 'instagram', 'options' ) ) ? get_field( 'instagram', 'options' ) : '';


?>

<footer id="colophon" class="site-footer bg-black text-white py-8 md:py-10 px-5">
	<div class="container">
		<div class="site-footer__top">
			<div class="grid grid-cols-12 gap-y-8 items-center">
				<div class="col-span-12 md:col-span-1 flex justify-center items-center md:justify-start">
					<svg version="1.1" width="57" height="57" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 57.9 57.9" style="enable-background:new 0 0 57.9 57.9;" xml:space="preserve">
						<g>
						<rect x="-4" y="13.6" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.837 16.506)" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1FBCAF;" width="40.9" height="5.8"/>
					
						<rect x="2.3" y="19.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.4459 22.8043)" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1FBCAF;" width="40.9" height="5.8"/>
					
						<rect x="8.6" y="26.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -12.0547 29.1027)" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1FBCAF;" width="40.9" height="5.8"/>
					
						<rect x="14.7" y="32.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -14.5471 35.1199)" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1FBCAF;" width="40.9" height="5.8"/>
					
						<rect x="21" y="38.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -17.156 41.4183)" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1FBCAF;" width="40.9" height="5.8"/>
						</g>
					</svg>
				</div>
				<div class="col-span-12 md:col-span-7">
					<?php
					if ( has_nav_menu( 'footer-menu' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'menu_class'     => 'footer-menu text-[15px] flex flex-col items-center md:flex-row flex-wrap gap-x-3 font-semibold justify-center md:justify-start',
							)
						);
					}
					?>
				</div>
				<?php if ( $cta_primary || $cta_secondary ) { ?>
				<div class="col-span-12 md:col-span-2">
					<div class="flex flex-col pt-8 gap-y-4 items-center md:items-start">
					<?php if ( $cta_primary ) { ?>
						<?php
							$c1_target = ( isset( $cta_primary['target'] ) && ! empty( $cta_primary['target'] ) ) ? 'target="' . $cta_primary['target'] . '"' : '';
							$c1__link  = ( isset( $cta_primary['url'] ) ) ? $cta_primary['url'] : '';
							$c1__title = ( isset( $cta_primary['title'] ) ) ? $cta_primary['title'] : '';
						?>
						<a class="flex text-[12px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent" href="<?php echo $c1__link; ?>" <?php echo $c1_target; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M5.13896 1C3.55108 1 2.26182 2.28066 2.26182 3.85849V5.38915H1.83997C1.18349 5.38915 0.645508 5.92453 0.645508 6.57547V11.0377C0.645508 11.691 1.18586 12.2241 1.83997 12.2241H8.4972C9.15368 12.2241 9.68929 11.6887 9.68929 11.0377V6.57547C9.68929 5.92217 9.15131 5.38915 8.4972 5.38915H8.01846V3.85849C8.01846 2.28066 6.7292 1 5.13896 1ZM5.13896 1.66038C6.37134 1.66038 7.35487 2.63443 7.35487 3.85849V5.38915H2.92541V3.85849C2.92541 2.63443 3.90658 1.66038 5.13896 1.66038ZM1.83997 6.04953H8.4972C8.79818 6.04953 9.0257 6.2783 9.0257 6.57547V11.0377C9.0257 11.3349 8.79581 11.5637 8.4972 11.5637H1.83997C1.53898 11.5637 1.3091 11.3349 1.3091 11.0377V6.57547C1.3091 6.2783 1.53898 6.04953 1.83997 6.04953Z" fill="currentColor" stroke="currentColor"/>
							</svg>
							<span><?php echo $c1__title; ?></span>
						</a>
					<?php } ?>
					<?php if ( $cta_secondary ) { ?>
						<?php
							$c2_target = ( isset( $cta_secondary['target'] ) && ! empty( $cta_secondary['target'] ) ) ? 'target="' . $cta_secondary['target'] . '"' : '';
							$c2__link  = ( isset( $cta_secondary['url'] ) ) ? $cta_secondary['url'] : '';
							$c2__title = ( isset( $cta_secondary['title'] ) ) ? $cta_secondary['title'] : '';
						?>
						<a class="flex text-[12px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent" href="<?php echo $c1__link; ?>" <?php echo $c2_target; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="14" viewBox="0 0 11 14" fill="none">
							<path d="M1.44765 7.70799L1.47278 7.7441C1.50348 7.78993 1.53558 7.83438 1.56768 7.88299L5.20473 13.083C5.38337 13.3385 5.73787 13.4024 5.99606 13.2233C6.05189 13.1844 6.09934 13.1372 6.13702 13.083L9.7657 7.88715C9.80059 7.83854 9.83409 7.79132 9.86758 7.74827L9.88991 7.71493C11.3958 5.39549 10.7273 2.30104 8.39797 0.801044C6.06724 -0.697567 2.95774 -0.0322893 1.45045 2.28577C0.377195 3.93716 0.377195 6.06215 1.45045 7.71354L1.44765 7.7066V7.70799ZM5.67088 2.92049C6.82647 2.92049 7.76434 3.85382 7.76434 5.00382C7.76434 6.15382 6.82647 7.08715 5.67088 7.08715C4.51528 7.08715 3.57741 6.15382 3.57741 5.00382C3.57741 3.85382 4.51528 2.92049 5.67088 2.92049Z" fill="currentColor"/>
							</svg>
							<span><?php echo $c2__title; ?></span>
						</a>
					<?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="col-span-12 md:col-span-2">
					<div class="flex flex-row justify-center md:justify-end items-center gap-x-6">
						<?php if ( $facebook ) { ?>
							<a class="hover:text-accent" href="<?php echo $facebook; ?>">
								<svg width="7" height="15" viewBox="0 0 7 15" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_70_157)">
									<path d="M4.20129 14.4171V7.58794H6.28288L6.5345 4.85628H4.30804V3.76362C4.30804 3.23246 4.67403 3.11106 4.92565 3.11106H6.49637V0.766382H4.33091C1.92909 0.758794 1.38772 2.50402 1.38772 3.61945V4.85628H0V7.58794H1.40297V14.4171H4.20129Z" fill="currentColor"/>
									</g>
									<defs>
									<clipPath id="clip0_70_157">
									<rect width="6.5345" height="13.6583" fill="currentColor" transform="translate(0 0.758789)"/>
									</clipPath>
									</defs>
								</svg>
							</a>
						<?php } ?>

						<?php if ( $linkedin ) { ?>
							<a class="hover:text-accent" href="<?php echo $linkedin; ?>">
								<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_70_164)">
									<path d="M3.59212 4.1355V12.4139H0.648926V4.1355H3.59212Z" fill="currentColor"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M2.12052 2.89859C2.93638 2.89859 3.59212 2.25362 3.59212 1.4493C3.59212 0.644975 2.93638 0 2.12052 0C1.30466 0 0.648926 0.644975 0.648926 1.4493C0.648926 2.25362 1.30466 2.89859 2.12052 2.89859Z" fill="currentColor"/>
									<path d="M10.1342 4.1355C8.86084 4.1355 8.00685 4.59836 7.65611 5.25093H7.61799V4.1355H5.26953V12.4139H7.72473V8.30886C7.72473 7.22379 7.9306 6.17665 9.29545 6.17665C10.6603 6.17665 10.7442 7.41349 10.7442 8.37716V12.4139H13.268V7.86118C13.268 5.63032 12.78 4.1355 10.1342 4.1355Z" fill="currentColor"/>
									</g>
									<defs>
									<clipPath id="clip0_70_164">
									<rect width="12.6191" height="12.4139" fill="currentColor" transform="translate(0.648926)"/>
									</clipPath>
									</defs>
								</svg>
							</a>
						<?php } ?>
						<?php if ( $instagram ) { ?>
							<a class="hover:text-accent" href="<?php echo $instagram; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<g clip-path="url(#clip0_7418_190)">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M14.2692 10.9873C14.2692 12.5505 12.9883 13.8252 11.4176 13.8252H4.57806C3.00734 13.8252 1.72636 12.5505 1.72636 10.9873V4.18854C1.72636 2.62543 3.00734 1.35065 4.57806 1.35065H11.4099C12.9806 1.35065 14.2692 2.62543 14.2692 4.18854V10.9873ZM11.4099 0H4.57806C2.2601 0 0.369141 1.88181 0.369141 4.18854V10.9873C0.369141 13.2941 2.2601 15.1759 4.57806 15.1759H11.4099C13.7279 15.1759 15.6188 13.2941 15.6188 10.9873V4.18854C15.6188 1.88181 13.7279 0 11.4099 0Z" fill="currentColor"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7.99407 10.0777C6.61397 10.0777 5.49311 8.96231 5.49311 7.58889C5.49311 6.21547 6.61397 5.10005 7.99407 5.10005C9.37416 5.10005 10.495 6.21547 10.495 7.58889C10.495 8.96231 9.37416 10.0777 7.99407 10.0777ZM7.99407 3.79492C5.88961 3.79492 4.18164 5.49462 4.18164 7.58889C4.18164 9.68316 5.88961 11.3829 7.99407 11.3829C10.0985 11.3829 11.8065 9.68316 11.8065 7.58889C11.8065 5.49462 10.0985 3.79492 7.99407 3.79492Z" fill="currentColor"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12.1877 2.27734C11.8903 2.27734 11.5929 2.39875 11.3794 2.61121C11.1659 2.82368 11.0439 3.11961 11.0439 3.41553C11.0439 3.71146 11.1659 4.00739 11.3794 4.21986C11.5929 4.43232 11.8903 4.55373 12.1877 4.55373C12.485 4.55373 12.7824 4.43232 12.9959 4.21986C13.2094 4.00739 13.3314 3.71146 13.3314 3.41553C13.3314 3.11961 13.2094 2.82368 12.9959 2.61121C12.7824 2.39875 12.485 2.27734 12.1877 2.27734Z" fill="currentColor"/>
										</g>
										<defs>
										<clipPath id="clip0_7418_190">
										<rect width="15.2497" height="15.1759" fill="currentColor" transform="translate(0.369141)"/>
										</clipPath>
										</defs>
									</svg>
							</a>
						<?php } ?>
						<?php if ( $youtube ) { ?>
							<a class="hover:text-accent" href="<?php echo $youtube; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11" fill="none">
									<g clip-path="url(#clip0_7418_201)">
									<path d="M15.7609 1.71695C15.5792 1.07258 15.072 0.569007 14.4227 0.389139C13.2193 0.0351562 8.40551 0.0351562 8.40551 0.0351562C8.40551 0.0351562 3.63569 0.0351562 2.47648 0.344929C1.81926 0.510868 1.30629 1.02019 1.13916 1.67274C0.781121 2.86793 0.781121 5.34671 0.781121 5.34671C0.773801 6.5637 0.878408 7.77857 1.09403 8.97647C1.27488 9.62085 1.78236 10.1247 2.43134 10.3043C3.63508 10.6583 8.40551 10.6583 8.40551 10.6583C8.40551 10.6583 13.1753 10.6583 14.3791 10.3485C15.0281 10.1686 15.5352 9.66506 15.7164 9.02068C15.9317 7.82278 16.0363 6.60761 16.0284 5.39062C16.0284 5.39062 16.0729 2.86793 15.7609 1.71695ZM6.88948 7.60385V3.08958L10.8563 5.34671L6.88948 7.60385Z" fill="currentColor"/>
									</g>
									<defs>
									<clipPath id="clip0_7418_201">
									<rect width="15.2497" height="10.6231" fill="currentColor" transform="translate(0.780762 0.0351562)"/>
									</clipPath>
									</defs>
								</svg>
							</a>
						<?php } ?>
						</div>
				</div>
			</div>
		</div>
		<div class="site-footer__bottom mt-16 md:mt-32">
			<div class="grid grid-cols-12 gap-y-5">
				<div class="col-span-12 md:col-span-6 text-center md:text-left text-[13px] font-semibold">
					© <?php echo date( 'Y' ); ?> <?php echo $copyright; ?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->