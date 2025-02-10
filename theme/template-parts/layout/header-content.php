<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpny
 */
$header_style = ( get_field( 'navigation_color' ) ) ? get_field( 'navigation_color' ) : '';

$cta_primary   = ( ! empty( get_field( 'cta_primary', 'options' ) ) ) ? get_field( 'cta_primary', 'options' ) : '';
$cta_secondary = ( ! empty( get_field( 'cta_secondary', 'options' ) ) ) ? get_field( 'cta_secondary', 'options' ) : '';

if ( is_singular( 'post' ) || is_singular( 'project' ) || is_singular( 'glass' ) || is_singular( 'system' )) {
	$header_style = 'dark';
}

switch ( $header_style ) {
	case 'dark':
		$header_style = 'transparent-dark site-header--dark';
		break;
	default:
		$header_style = 'transparent-light site-header--light';
		break;
}



?>
<?php do_action( 'before_site_header' ); ?>
<div id="site-header" class="<?php echo $header_style; ?> w-full group fixed top-0 site-header	transition-all ease-in-out duration-300 px-5 z-50 [&.scroll]:bg-white [&.scroll]:shadow-lg md:pt-10 pt-4 pb-0 [&.scroll]:pt-4">
	<div class="container top-links hidden lg:block">
		<?php if ( $cta_primary || $cta_secondary ) { ?>
			<div class="flex justify-end gap-x-4">
			<?php if ( $cta_primary ) { ?>
						<?php
							$c1_target = ( isset( $cta_primary['target'] ) && ! empty( $cta_primary['target'] ) ) ? 'target="' . $cta_primary['target'] . '"' : '';
							$c1__link  = ( isset( $cta_primary['url'] ) ) ? $cta_primary['url'] : '';
							$c1__title = ( isset( $cta_primary['title'] ) ) ? $cta_primary['title'] : '';
						?>
						<a class="flex text-[12px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark" href="<?php echo $c1__link; ?>" <?php echo $c1_target; ?>>
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
						<a class="flex text-[12px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark" href="<?php echo $c1__link; ?>" <?php echo $c2_target; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="14" viewBox="0 0 11 14" fill="none">
							<path d="M1.44765 7.70799L1.47278 7.7441C1.50348 7.78993 1.53558 7.83438 1.56768 7.88299L5.20473 13.083C5.38337 13.3385 5.73787 13.4024 5.99606 13.2233C6.05189 13.1844 6.09934 13.1372 6.13702 13.083L9.7657 7.88715C9.80059 7.83854 9.83409 7.79132 9.86758 7.74827L9.88991 7.71493C11.3958 5.39549 10.7273 2.30104 8.39797 0.801044C6.06724 -0.697567 2.95774 -0.0322893 1.45045 2.28577C0.377195 3.93716 0.377195 6.06215 1.45045 7.71354L1.44765 7.7066V7.70799ZM5.67088 2.92049C6.82647 2.92049 7.76434 3.85382 7.76434 5.00382C7.76434 6.15382 6.82647 7.08715 5.67088 7.08715C4.51528 7.08715 3.57741 6.15382 3.57741 5.00382C3.57741 3.85382 4.51528 2.92049 5.67088 2.92049Z" fill="currentColor"/>
							</svg>
							<span><?php echo $c2__title; ?></span>
						</a>
					<?php } ?>
			</div>
		<?php } ?>
	</div>
	<div class="container flex items-center relative pb-4 lg:pb-0 lg:group-[.scroll]:pb-0">
		<a class="site-logo" href="<?php echo get_bloginfo( 'url' ); ?>">
			<svg  class="text-accent group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-accent"version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 2934.8 385.9" style="enable-background:new 0 0 2934.8 385.9;" width="230px" height="31px" x="0px" y="0px"
							style="enable-background:new 0 0 920 124;" xml:space="preserve">
				<path fill="currentColor" d="M2515.9,385.8c0-126.7,0-253.4-0.2-380c0-4.6,1.2-5.8,5.8-5.7c42,0.2,83.9,0.1,125.9,0
					c3.5,0,5.1,0.8,6.1,4.5c12,44.9,24.1,89.8,36.3,134.7c8.3,30.5,17,60.9,24.3,91.7c3.5,14.8,6.5,29.7,9.8,44.6
					c0.2,0.9,0.6,1.8,1.2,3.6c5.3-24.4,10.8-47.8,16.9-71c7.2-27.2,14.6-54.4,22-81.5c11-40.7,22.2-81.4,33.1-122.2
					c0.9-3.3,2.2-4.3,5.7-4.3c44,0.1,87.9,0.1,131.9,0.1c0,127.1,0,254.1,0.1,381.2c0,3.7-0.8,4.6-4.6,4.6c-28.5-0.2-57-0.1-85.5-0.1
					c0-0.8-0.1-1.7-0.1-2.5c0-36-0.1-72.1,0-108.1c0.1-44.3-0.7-88.6,1.2-132.9c0.2-5,0.1-9.9,0.5-14.9c1-10.8-0.1-21.7,1.2-32.6
					c-0.4,0.4-0.7,0.8-0.8,1.3c-7.1,28.3-14.2,56.5-21.3,84.8c-14.8,58.9-29.7,117.8-44.4,176.8c-2.3,9.3-5.5,18.4-6.3,28
					c-33.3,0-66.6,0-100,0c-0.5-2.9-0.9-5.9-1.6-8.8c-10-40.8-20.1-81.6-30.2-122.5c-10.5-42.6-20.9-85.2-31.3-127.8
					c-2.4-9.7-4.8-19.4-7.2-29.2c-0.5,11-0.8,21.9,0.1,32.9c0.9,12,0.4,24.2,1,36.3c0.8,15.9,1,31.8,1.1,47.7
					c0.4,57.1,0.2,114.3,0.2,171.4C2576.5,385.8,2546.2,385.8,2515.9,385.8z"/>
				<path fill="currentColor" d="M750.7,385.8c0-48.3-0.1-96.6-0.1-145c0-78,0-156.1,0-234.1c0-6.6,0-6.6,6.8-6.6c32,0,64,0,95.9-0.1
					c3.3,0,5.3,0.8,7.1,3.9c26.8,46.8,53.7,93.5,80.6,140.2c18,31.4,34.4,63.6,50.6,96c0.7,1.4,0.9,3.2,1.6,3.5c0-10.8,0.3-22-0.2-33.1
					c-0.2-4.8-0.2-9.6-0.4-14.4c-0.4-11.6-0.6-23.2-1.1-34.8c-2.1-51.9-0.4-103.9-1.1-155.8c-0.1-4.9,1.7-5.6,5.9-5.6
					c28,0.2,56,0.2,83.9,0c4.9,0,6.4,1,6.4,6.2c-0.2,126.5-0.1,253.1-0.1,379.6c-36,0-72,0-108,0c-9.8-17.1-19.5-34.3-29.4-51.3
					c-34.3-58.8-69.1-117.4-100.7-177.8c-2-3.8-4.2-7.4-6.3-11.1c0.2,13,1.5,25.7,2.1,38.4c1,19.5,1.9,39,2.1,58.5
					c0.3,47.8,0.2,95.6,0.2,143.4C814.7,385.8,782.7,385.8,750.7,385.8z"/>
				<path fill="currentColor" d="M0,385.8C0,259.6,0,133.4,0,7.2c0-8-1-7,6.8-7c65.3,0,130.6-0.5,195.9,0.2
					c24.6,0.3,48.9,4.5,71.4,15.7c25.1,12.4,38.7,33.1,43.7,59.9c3.1,16.8,3,33.6-1.3,50.2c-6.4,25.2-23.2,41.5-46.2,52.2
					c-2,0.9-4.1,1.8-7.2,3.2c11.8,3.5,22,7.6,31.3,13.8c21.1,14,32.7,33.8,35.6,58.8c3.7,32-3.2,61.4-23.3,86.9
					c-14,17.8-32.5,29.2-54.1,35.7c-18.4,5.6-37.3,7.7-56.5,8.1c-1.4,0-3-0.5-4.2,0.9C128,385.8,64,385.8,0,385.8z M143.9,224.4
					c0-0.1,0-0.2,0-0.2c-14.6,0-29.3,0.1-43.9-0.1c-3.8,0-5.2,0.8-5.1,4.9c0.2,25.1,0.2,50.1,0,75.2c0,4.1,1.4,4.9,5.1,4.9
					c24.8-0.1,49.6,0.1,74.4-0.1c11.6-0.1,23.2-1.2,34.3-4.8c11.5-3.7,19.4-10.9,22.5-23c1.7-6.7,2.2-13.4,1.6-20.2
					c-1-12.2-6-22.2-17-28.8c-8.6-5.1-18.1-7.5-28-7.7C173.2,224.2,158.6,224.4,143.9,224.4z M141,78c-13.5,0-27,0.2-40.5-0.1
					c-4.2-0.1-5.7,0.8-5.7,5.4c0.3,20.8,0.2,41.5,0,62.3c0,4,1,5.4,5.2,5.3c24.8-0.2,49.6-0.1,74.4-0.1c9.5,0,18.9-0.8,27.9-4.2
					c12.8-5,20.1-14.3,21.4-28c1.3-14.6-2.5-27.1-16.4-34.5c-8.2-4.4-17.3-5.8-26.5-6C167.6,77.9,154.3,78,141,78z"/>
				<path fill="currentColor" d="M1162.5,385.8c0-68.6,0-137.1,0.1-205.7c0-58.3,0-116.5-0.1-174.8c0-4.2,1.1-5.2,5.3-5.2
					c58.3,0.1,116.6-0.5,174.8,0.4c24.5,0.3,48.3,5.7,70.9,16.1c38.4,17.6,63.4,47.1,78,86.1c7.4,19.7,11.1,40.1,13,61
					c1.6,17.9,1.6,35.9,0.6,53.7c-2.1,34.3-9.3,67.5-27.9,97.3c-17.3,27.7-41.8,46.3-72.3,57.4c-20.5,7.5-41.7,11.9-63.6,13
					c-1,0-2,0.1-2.7,1C1279.8,385.8,1221.1,385.8,1162.5,385.8z M1428.3,173.8c-2.1,1.7-4.5,3.5-6.8,5.3c-26.6,21.7-53.2,43.4-79.8,65.1
					c-21.2,17.3-42.4,34.5-63.8,51.7c-2.5,2-2.4,3.2-0.5,5.5c3.1,3.5,5.8,7.2,8.8,10.8c4.7,5.8,4.8,5.7,10.7,0.9
					c21.1-17.4,42.3-34.7,63.5-52c27.2-22.2,54.5-44.4,81.9-66.5c2-1.6,2.6-2.7,0.8-4.8c-4.1-4.7-8.1-9.6-12.2-14.4
					C1430.3,174.6,1429.9,173.5,1428.3,173.8z M1264.5,285c0.9-0.7,1.7-1.3,2.5-1.9c11.8-9.6,23.6-19.3,35.4-28.9
					c36.9-30,73.9-60,110.9-89.9c5.1-4.1,5.1-4.1,0.9-9.4c-1.7-2.1-3.4-4.1-5.1-6.1c-6.7-8.3-6.5-8.1-14.7-1.5
					c-28.1,23-56.4,45.8-84.5,68.7c-19.4,15.8-38.8,31.6-58.3,47.4c-1.8,1.5-2.8,2.6-1,4.8c4.3,5.1,8.4,10.3,12.6,15.4
					C1263.5,284,1263.9,284.4,1264.5,285z M1392.3,128.4c-0.3-0.5-0.8-1.1-1.3-1.7c-3.2-4-6.3-8.1-9.6-12.1c-4.1-5-4.4-4.9-9.4-0.8
					c-17.4,14.3-34.9,28.6-52.4,42.8c-31.3,25.4-62.5,50.9-93.9,76.2c-2.1,1.7-2,3-0.4,4.8c3.8,4.4,7.6,8.8,11.1,13.4
					c2,2.6,3.4,2.8,6,0.7c16.4-13.5,32.9-26.9,49.4-40.3c18.6-15.2,37.3-30.3,55.9-45.5c14.2-11.5,28.3-23,42.5-34.6
					C1391.1,130.6,1392.1,130,1392.3,128.4z M1187.9,190.2c0.7-0.6,1.7-1.3,2.6-2c20.4-16.5,40.7-33,61.1-49.5
					c29-23.5,57.9-47.1,86.9-70.6c2.3-1.9,2.2-3.2,0.4-5.3c-3.6-4.1-7.2-8.3-10.3-12.7c-2.2-3.1-3.8-3.2-6.7-0.8
					c-9.3,7.8-18.8,15.3-28.2,23c-26.4,21.4-52.8,42.9-79.2,64.3c-13.5,11-27,22-40.5,33c-1.1,0.9-3.2,1.6-1.3,3.8
					c4.3,5.1,8.4,10.2,12.6,15.4C1185.9,189.4,1186.4,190.4,1187.9,190.2z M1367.3,97.6c-0.4-0.4-0.9-1.1-1.4-1.7
					c-3.4-4.2-7.2-8.3-10.3-12.8c-2.5-3.6-4.6-3.9-7.9-1c-7.7,6.6-15.6,12.9-23.5,19.3c-25.2,20.5-50.4,41-75.6,61.5
					c-16,13-31.9,26-47.9,38.8c-2.2,1.7-2.5,3-0.6,5.2c3.3,3.7,6.3,7.7,9.4,11.6c4.2,5.3,4.1,5.2,9.2,1c25-20.5,50-41,75.1-61.4
					c23.7-19.2,47.4-38.4,71.1-57.6C1365.9,99.8,1367,99.3,1367.3,97.6z"/>
				<path fill="currentColor" d="M1565.3,385.8c0.1-38.4,0.1-76.7,0.2-115.1c0-88.3,0-176.7-0.1-265c0-4.3,0.9-5.6,5.4-5.6
					c29.8,0.2,59.6,0.2,89.4,0c4.3,0,5.2,1.4,5.2,5.4c-0.1,42-0.1,84-0.2,126c0,4,0.9,5.4,5.2,5.4c41.5-0.2,83-0.2,124.4,0
					c4.4,0,5.5-1.2,5.5-5.5c-0.2-42,0-84-0.2-126c0-4.2,1.2-5.2,5.3-5.2c29.8,0.2,59.6,0.2,89.4,0c4.7,0,5.4,1.5,5.4,5.6
					c-0.1,126.7-0.1,253.4-0.1,380.1c-33.3,0-66.6,0-100,0c0-52.5,0-104.9,0.1-157.4c0-4.2-1.3-5.2-5.3-5.2c-41,0.1-81.9,0.1-122.9,0.1
					c-6.8,0-6.8,0-6.8,6.6c0,52-0.1,103.9-0.1,155.9C1631.9,385.8,1598.6,385.8,1565.3,385.8z"/>
				<path fill="currentColor" d="M1976.1,385.8c0-89.3,0-178.7,0.1-268c0-37.2,0.1-74.4-0.1-111.6c0-4.6,0.9-6.2,5.9-6.2
					c94.3,0.2,188.6,0.2,282.8,0c5.1,0,6.3,1.4,6.2,6.3c-0.3,22.4-0.3,44.8,0,67.3c0.1,4.8-0.9,6.4-6.2,6.4c-61-0.2-121.9-0.1-182.9-0.2
					c-4.7,0-6.3,0.9-6.2,5.9c0.3,18.6,0.3,37.2,0,55.8c-0.1,4.7,1.1,6.1,6,6.1c54.6-0.2,109.3-0.1,163.9-0.1c1.5,0,3,0.1,4.5,0
					c2.8-0.2,3.8,0.9,3.8,3.7c-0.1,23.4-0.1,46.8,0,70.2c0,3.8-1.9,3.8-4.7,3.8c-19.8-0.1-39.6,0-59.5,0c-36.1,0-72.3,0.1-108.4-0.1
					c-4.4,0-5.6,1-5.6,5.5c0.2,23.7,0.2,47.5,0,71.2c0,4.4,1.6,5.1,5.5,5.1c63.1-0.1,126.3,0,189.4-0.2c5,0,6.4,1.2,6.4,6.3
					c-0.3,24.2-0.1,48.5,0,72.7C2176.7,385.8,2076.4,385.8,1976.1,385.8z"/>
				<path fill="currentColor" d="M490.8,250.3c0,4.3,0,8.6,0,12.9c-1,0.7-1.1,1.3,0,2c0,6.6,0,13.3,0,19.9c-0.4,0.1-1.2,0.2-1.2,0.4
					c-0.3,1,0.6,1.2,1.3,1.6c0.1,4.9,0.3,9.9,0.4,14.8c0.1,3.1,1.2,4.6,4.8,4.5c4.6-0.2,9.2,0.4,13.8,0.6c0.3,0.7,0.7,0.7,1,0
					c38,0,75.9,0,113.9,0c0.7,1.1,1.4,1.1,2,0c6,0,12,0,18,0c0.3,0.7,0.7,0.7,1,0c0.7,0,1.3,0,2,0c0.3,0.7,0.7,0.7,1,0
					c9.7,0,19.3,0,29,0c0.3,0.7,0.7,0.7,1,0c0.7,0,1.3,0,2,0c1.3,1.9-2.3,7.4,4.1,5.5c0.2,0,0.7,0.4,0.7,0.6c-0.1,6,4.4,2,6.6,3
					c0.8,12,0.7,24,0,36.1c-0.2,0.2-0.2,0.4,0,0.6c0.6,1.8,0.6,3.6,0,5.4c-0.2,0.2-0.2,0.4,0,0.6c0.2,9,0.4,18.1,0.6,27.1
					c-100.3,0-200.6,0-300.9,0c0-125.8,0-251.7,0-377.5c0-8.2,0-8.2,8.1-8.2c93.4,0,186.8,0,280.2-0.1c4.1,0,5.7,0.7,5.7,5.3
					c-0.3,23.2-0.1,46.5-0.1,69.7c0,2.2,0.8,4.8-3.1,4.8c-26.3-0.2-52.6-0.2-78.9-0.3c-5.6-5.9-9.2-5.9-11.9,0c-22.3,0-44.7,0-67,0
					c0.5-3.9-1-6.1-5.1-5.7c-4.5,0.5-1.4,3.7-1.9,5.7c-6.8,0.1-13.7,0.4-20.5,0.1c-4.8-0.2-7.4,0.7-6.4,6.1c0.1,0.6-0.1,1.3-0.1,2
					c-0.7,0.1-1.5,0.3-2.2,0.4c0.7,0.5,1.5,1.1,2.2,1.6c0,15.9,0.1,31.8,0.1,47.7c0,9.6,0.3,9.9,10,9.9c20.9,0.1,41.9,0.1,62.8,0.2
					c1,1.2,2,1.2,3,0c15.7,0,31.3,0,47,0c0.2,1.5-0.7,3.3,1.4,4.2c1-1.3,0.4-2.8,0.6-4.2c16.7-0.1,33.5-0.1,50.2-0.2
					c2.4,0,3.7,0.6,3.6,3.3c-0.2,8.6-0.3,17.2-0.4,25.8c-1,1.3-2.4,2.6,0,4c0.1,13.9,0.2,27.9,0.4,41.8c0,2.1-0.8,3-3,2.9
					c-19.3-0.2-38.6-0.3-57.9-0.4c-0.2-0.4-0.4-1-0.8-1.1c-0.8-0.3-1.1,0.5-1.2,1.1c-3.7,0.6-7.4,0.5-11.1,0c0,0-0.4-0.2-0.4-0.2
					l-0.4,0.2c-19.7,0.6-39.5,0.6-59.2,0c0,0-0.4-0.2-0.4-0.2l-0.4,0.2c-3.4,0.5-6.8,0.6-10.1-0.1c-0.3-0.4-0.4-1-0.8-1.1
					c-0.8-0.2-1,0.5-1.2,1.1c-8.8,0.1-17.5,0.5-26.2,0.2c-4.8-0.2-5.9,1.5-5.7,5.9c0.3,6.1,0,12.2-0.1,18.3
					C490.1,249.6,490.1,250,490.8,250.3z"/>
				<path fill="currentColor" d="M2338,385.8c0-126.4,0-252.8,0-379.1c0-6.5,0-6.5,6.3-6.5c29.3,0,58.6,0.1,88-0.1
					c3.6,0,4.9,0.7,4.9,4.6c-0.1,126.5-0.1,253.1-0.1,379.6c0,0.5-0.1,1-0.1,1.5C2403.9,385.8,2370.9,385.8,2338,385.8z"/>
				<path fill="currentColor" d="M692.1,316.1c-2.2-1-6.7,3.1-6.6-3c0-0.2-0.5-0.6-0.7-0.6c-6.4,1.9-2.8-3.7-4.1-5.5
					c3-1.4,6.2-0.4,9.3-0.7c2-0.2,2.6,1,2.5,2.8C692.3,311.5,692.2,313.8,692.1,316.1z"/>
				<path fill="currentColor" d="M517.8,79.7c0.5-2-2.7-5.2,1.9-5.7c4.1-0.4,5.6,1.8,5.1,5.7C522.5,79.7,520.1,79.7,517.8,79.7z"/>
				<path fill="currentColor" d="M591.8,79.6c2.7-5.9,6.3-5.9,11.9,0C599.8,79.6,595.8,79.6,591.8,79.6z"/>
				<path fill="currentColor" d="M615.7,147.7c-0.2,1.4,0.5,2.9-0.6,4.2c-2.1-0.9-1.2-2.8-1.4-4.2
					C614.4,146.9,615.1,146.9,615.7,147.7z"/>
				<path fill="currentColor" d="M669.2,180.5c-2.4-1.3-1-2.7,0-4C669.7,177.9,669.7,179.2,669.2,180.5z"/>
				<path fill="currentColor" d="M566.8,147.7c-1,1.3-2,1.3-3,0C564.8,146.7,565.8,146.8,566.8,147.7z"/>
				<path fill="currentColor" d="M490.8,89.9c-0.7-0.5-1.5-1.1-2.2-1.6c0.7-0.1,1.5-0.3,2.2-0.4C491.6,88.5,491.6,89.2,490.8,89.9z"/>
				<path fill="currentColor" d="M490.8,287.2c-0.7-0.3-1.5-0.6-1.3-1.6c0.1-0.2,0.8-0.3,1.2-0.4C491.6,285.8,491.6,286.5,490.8,287.2
					z"/>
				<path fill="currentColor" d="M606.8,224.9c0.2-0.7,0.4-1.4,1.2-1.1c0.3,0.1,0.5,0.7,0.8,1.1C608.1,224.9,607.4,224.9,606.8,224.9z
					"/>
				<path fill="currentColor" d="M522.8,224.9c0.1-0.6,0.4-1.4,1.2-1.1c0.3,0.1,0.5,0.7,0.8,1.1C524.1,224.9,523.5,224.9,522.8,224.9z
					"/>
				<path fill="currentColor" d="M490.8,265.3c-1-0.7-1-1.4,0-2C491.6,263.9,491.6,264.6,490.8,265.3z"/>
				<path fill="currentColor" d="M626.8,307.1c-0.7,1.1-1.4,1.1-2,0C625.4,306.3,626.1,306.3,626.8,307.1z"/>
				<polygon fill="currentColor" points="534.9,224.9 535.3,224.7 535.6,224.9 535.3,225 "/>
				<polygon fill="currentColor" points="594.9,224.9 595.3,224.7 595.6,224.9 595.3,225.1 "/>
				<path fill="currentColor" d="M490.8,250.3c-0.7-0.3-0.7-0.7,0-1C490.8,249.6,490.8,250,490.8,250.3z"/>
				<path fill="currentColor" d="M510.8,307.1c-0.3,0.7-0.7,0.7-1,0C510.1,307.1,510.5,307.1,510.8,307.1z"/>
				<path fill="currentColor" d="M645.7,307.1c-0.3,0.7-0.7,0.7-1,0C645.1,307.1,645.4,307.1,645.7,307.1z"/>
				<path fill="currentColor" d="M648.7,307.1c-0.3,0.7-0.7,0.7-1,0C648.1,307.1,648.4,307.1,648.7,307.1z"/>
				<path fill="currentColor" d="M678.7,307.1c-0.3,0.7-0.7,0.7-1,0C678,307.1,678.4,307.1,678.7,307.1z"/>
				<path fill="currentColor" d="M692.1,352.7c-0.2-0.2-0.2-0.4,0-0.6C692.3,352.4,692.3,352.5,692.1,352.7z"/>
				<path fill="currentColor" d="M692.1,358.7c-0.2-0.2-0.2-0.4,0-0.6C692.3,358.3,692.3,358.5,692.1,358.7z"/>
			</svg>
		</a>
		<div class="lg:hidden ml-auto">
			<button class="navbar-burger flex items-center text-blue p-3 group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'container'      => '',
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s ml-auto lg:flex gap-x-4 text-[15px] font-medium hidden lg:visible group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark" aria-label="submenu">%3$s</ul>',
					'walker'         => new Custom_Walker_Mega_Menu(),
				)
			);
		}
		?>
	</div>
</div>

<div class="navbar-menu relative z-50 hidden">
	<div class="navbar-backdrop fixed inset-0 bg-dark opacity-50"></div>
	<nav class="side-navbar fixed top-0 right-0 bottom-0 w-0 [&.active]:w-2/3 flex flex-col bg-[#F8F8F8] overflow-y-auto transition-all">
		<div class="container mx-auto px-8">
			<div class="flex mt-0 py-8 justify-between items-center">
			<button class="navbar-close">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<line y1="-1" x2="25.2616" y2="-1" transform="matrix(0.712544 -0.701627 0.712544 0.701627 1.43164 19.8164)" stroke="black" stroke-width="2"/>
					<line y1="-1" x2="25.2616" y2="-1" transform="matrix(0.712544 0.701627 -0.712544 0.701627 0.339844 2.18164)" stroke="black" stroke-width="2"/>
				</svg>
			</button>
			<a class="site-logo" href="<?php echo get_bloginfo( 'url' ); ?>">
				<svg class="text-accent max-w-[140px]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 2934.8 385.9" style="enable-background:new 0 0 2934.8 385.9;" width="230px" height="31px" x="0px" y="0px"
							style="enable-background:new 0 0 920 124;" xml:space="preserve">
				<path fill="currentColor" d="M2515.9,385.8c0-126.7,0-253.4-0.2-380c0-4.6,1.2-5.8,5.8-5.7c42,0.2,83.9,0.1,125.9,0
					c3.5,0,5.1,0.8,6.1,4.5c12,44.9,24.1,89.8,36.3,134.7c8.3,30.5,17,60.9,24.3,91.7c3.5,14.8,6.5,29.7,9.8,44.6
					c0.2,0.9,0.6,1.8,1.2,3.6c5.3-24.4,10.8-47.8,16.9-71c7.2-27.2,14.6-54.4,22-81.5c11-40.7,22.2-81.4,33.1-122.2
					c0.9-3.3,2.2-4.3,5.7-4.3c44,0.1,87.9,0.1,131.9,0.1c0,127.1,0,254.1,0.1,381.2c0,3.7-0.8,4.6-4.6,4.6c-28.5-0.2-57-0.1-85.5-0.1
					c0-0.8-0.1-1.7-0.1-2.5c0-36-0.1-72.1,0-108.1c0.1-44.3-0.7-88.6,1.2-132.9c0.2-5,0.1-9.9,0.5-14.9c1-10.8-0.1-21.7,1.2-32.6
					c-0.4,0.4-0.7,0.8-0.8,1.3c-7.1,28.3-14.2,56.5-21.3,84.8c-14.8,58.9-29.7,117.8-44.4,176.8c-2.3,9.3-5.5,18.4-6.3,28
					c-33.3,0-66.6,0-100,0c-0.5-2.9-0.9-5.9-1.6-8.8c-10-40.8-20.1-81.6-30.2-122.5c-10.5-42.6-20.9-85.2-31.3-127.8
					c-2.4-9.7-4.8-19.4-7.2-29.2c-0.5,11-0.8,21.9,0.1,32.9c0.9,12,0.4,24.2,1,36.3c0.8,15.9,1,31.8,1.1,47.7
					c0.4,57.1,0.2,114.3,0.2,171.4C2576.5,385.8,2546.2,385.8,2515.9,385.8z"/>
				<path fill="currentColor" d="M750.7,385.8c0-48.3-0.1-96.6-0.1-145c0-78,0-156.1,0-234.1c0-6.6,0-6.6,6.8-6.6c32,0,64,0,95.9-0.1
					c3.3,0,5.3,0.8,7.1,3.9c26.8,46.8,53.7,93.5,80.6,140.2c18,31.4,34.4,63.6,50.6,96c0.7,1.4,0.9,3.2,1.6,3.5c0-10.8,0.3-22-0.2-33.1
					c-0.2-4.8-0.2-9.6-0.4-14.4c-0.4-11.6-0.6-23.2-1.1-34.8c-2.1-51.9-0.4-103.9-1.1-155.8c-0.1-4.9,1.7-5.6,5.9-5.6
					c28,0.2,56,0.2,83.9,0c4.9,0,6.4,1,6.4,6.2c-0.2,126.5-0.1,253.1-0.1,379.6c-36,0-72,0-108,0c-9.8-17.1-19.5-34.3-29.4-51.3
					c-34.3-58.8-69.1-117.4-100.7-177.8c-2-3.8-4.2-7.4-6.3-11.1c0.2,13,1.5,25.7,2.1,38.4c1,19.5,1.9,39,2.1,58.5
					c0.3,47.8,0.2,95.6,0.2,143.4C814.7,385.8,782.7,385.8,750.7,385.8z"/>
				<path fill="currentColor" d="M0,385.8C0,259.6,0,133.4,0,7.2c0-8-1-7,6.8-7c65.3,0,130.6-0.5,195.9,0.2
					c24.6,0.3,48.9,4.5,71.4,15.7c25.1,12.4,38.7,33.1,43.7,59.9c3.1,16.8,3,33.6-1.3,50.2c-6.4,25.2-23.2,41.5-46.2,52.2
					c-2,0.9-4.1,1.8-7.2,3.2c11.8,3.5,22,7.6,31.3,13.8c21.1,14,32.7,33.8,35.6,58.8c3.7,32-3.2,61.4-23.3,86.9
					c-14,17.8-32.5,29.2-54.1,35.7c-18.4,5.6-37.3,7.7-56.5,8.1c-1.4,0-3-0.5-4.2,0.9C128,385.8,64,385.8,0,385.8z M143.9,224.4
					c0-0.1,0-0.2,0-0.2c-14.6,0-29.3,0.1-43.9-0.1c-3.8,0-5.2,0.8-5.1,4.9c0.2,25.1,0.2,50.1,0,75.2c0,4.1,1.4,4.9,5.1,4.9
					c24.8-0.1,49.6,0.1,74.4-0.1c11.6-0.1,23.2-1.2,34.3-4.8c11.5-3.7,19.4-10.9,22.5-23c1.7-6.7,2.2-13.4,1.6-20.2
					c-1-12.2-6-22.2-17-28.8c-8.6-5.1-18.1-7.5-28-7.7C173.2,224.2,158.6,224.4,143.9,224.4z M141,78c-13.5,0-27,0.2-40.5-0.1
					c-4.2-0.1-5.7,0.8-5.7,5.4c0.3,20.8,0.2,41.5,0,62.3c0,4,1,5.4,5.2,5.3c24.8-0.2,49.6-0.1,74.4-0.1c9.5,0,18.9-0.8,27.9-4.2
					c12.8-5,20.1-14.3,21.4-28c1.3-14.6-2.5-27.1-16.4-34.5c-8.2-4.4-17.3-5.8-26.5-6C167.6,77.9,154.3,78,141,78z"/>
				<path fill="currentColor" d="M1162.5,385.8c0-68.6,0-137.1,0.1-205.7c0-58.3,0-116.5-0.1-174.8c0-4.2,1.1-5.2,5.3-5.2
					c58.3,0.1,116.6-0.5,174.8,0.4c24.5,0.3,48.3,5.7,70.9,16.1c38.4,17.6,63.4,47.1,78,86.1c7.4,19.7,11.1,40.1,13,61
					c1.6,17.9,1.6,35.9,0.6,53.7c-2.1,34.3-9.3,67.5-27.9,97.3c-17.3,27.7-41.8,46.3-72.3,57.4c-20.5,7.5-41.7,11.9-63.6,13
					c-1,0-2,0.1-2.7,1C1279.8,385.8,1221.1,385.8,1162.5,385.8z M1428.3,173.8c-2.1,1.7-4.5,3.5-6.8,5.3c-26.6,21.7-53.2,43.4-79.8,65.1
					c-21.2,17.3-42.4,34.5-63.8,51.7c-2.5,2-2.4,3.2-0.5,5.5c3.1,3.5,5.8,7.2,8.8,10.8c4.7,5.8,4.8,5.7,10.7,0.9
					c21.1-17.4,42.3-34.7,63.5-52c27.2-22.2,54.5-44.4,81.9-66.5c2-1.6,2.6-2.7,0.8-4.8c-4.1-4.7-8.1-9.6-12.2-14.4
					C1430.3,174.6,1429.9,173.5,1428.3,173.8z M1264.5,285c0.9-0.7,1.7-1.3,2.5-1.9c11.8-9.6,23.6-19.3,35.4-28.9
					c36.9-30,73.9-60,110.9-89.9c5.1-4.1,5.1-4.1,0.9-9.4c-1.7-2.1-3.4-4.1-5.1-6.1c-6.7-8.3-6.5-8.1-14.7-1.5
					c-28.1,23-56.4,45.8-84.5,68.7c-19.4,15.8-38.8,31.6-58.3,47.4c-1.8,1.5-2.8,2.6-1,4.8c4.3,5.1,8.4,10.3,12.6,15.4
					C1263.5,284,1263.9,284.4,1264.5,285z M1392.3,128.4c-0.3-0.5-0.8-1.1-1.3-1.7c-3.2-4-6.3-8.1-9.6-12.1c-4.1-5-4.4-4.9-9.4-0.8
					c-17.4,14.3-34.9,28.6-52.4,42.8c-31.3,25.4-62.5,50.9-93.9,76.2c-2.1,1.7-2,3-0.4,4.8c3.8,4.4,7.6,8.8,11.1,13.4
					c2,2.6,3.4,2.8,6,0.7c16.4-13.5,32.9-26.9,49.4-40.3c18.6-15.2,37.3-30.3,55.9-45.5c14.2-11.5,28.3-23,42.5-34.6
					C1391.1,130.6,1392.1,130,1392.3,128.4z M1187.9,190.2c0.7-0.6,1.7-1.3,2.6-2c20.4-16.5,40.7-33,61.1-49.5
					c29-23.5,57.9-47.1,86.9-70.6c2.3-1.9,2.2-3.2,0.4-5.3c-3.6-4.1-7.2-8.3-10.3-12.7c-2.2-3.1-3.8-3.2-6.7-0.8
					c-9.3,7.8-18.8,15.3-28.2,23c-26.4,21.4-52.8,42.9-79.2,64.3c-13.5,11-27,22-40.5,33c-1.1,0.9-3.2,1.6-1.3,3.8
					c4.3,5.1,8.4,10.2,12.6,15.4C1185.9,189.4,1186.4,190.4,1187.9,190.2z M1367.3,97.6c-0.4-0.4-0.9-1.1-1.4-1.7
					c-3.4-4.2-7.2-8.3-10.3-12.8c-2.5-3.6-4.6-3.9-7.9-1c-7.7,6.6-15.6,12.9-23.5,19.3c-25.2,20.5-50.4,41-75.6,61.5
					c-16,13-31.9,26-47.9,38.8c-2.2,1.7-2.5,3-0.6,5.2c3.3,3.7,6.3,7.7,9.4,11.6c4.2,5.3,4.1,5.2,9.2,1c25-20.5,50-41,75.1-61.4
					c23.7-19.2,47.4-38.4,71.1-57.6C1365.9,99.8,1367,99.3,1367.3,97.6z"/>
				<path fill="currentColor" d="M1565.3,385.8c0.1-38.4,0.1-76.7,0.2-115.1c0-88.3,0-176.7-0.1-265c0-4.3,0.9-5.6,5.4-5.6
					c29.8,0.2,59.6,0.2,89.4,0c4.3,0,5.2,1.4,5.2,5.4c-0.1,42-0.1,84-0.2,126c0,4,0.9,5.4,5.2,5.4c41.5-0.2,83-0.2,124.4,0
					c4.4,0,5.5-1.2,5.5-5.5c-0.2-42,0-84-0.2-126c0-4.2,1.2-5.2,5.3-5.2c29.8,0.2,59.6,0.2,89.4,0c4.7,0,5.4,1.5,5.4,5.6
					c-0.1,126.7-0.1,253.4-0.1,380.1c-33.3,0-66.6,0-100,0c0-52.5,0-104.9,0.1-157.4c0-4.2-1.3-5.2-5.3-5.2c-41,0.1-81.9,0.1-122.9,0.1
					c-6.8,0-6.8,0-6.8,6.6c0,52-0.1,103.9-0.1,155.9C1631.9,385.8,1598.6,385.8,1565.3,385.8z"/>
				<path fill="currentColor" d="M1976.1,385.8c0-89.3,0-178.7,0.1-268c0-37.2,0.1-74.4-0.1-111.6c0-4.6,0.9-6.2,5.9-6.2
					c94.3,0.2,188.6,0.2,282.8,0c5.1,0,6.3,1.4,6.2,6.3c-0.3,22.4-0.3,44.8,0,67.3c0.1,4.8-0.9,6.4-6.2,6.4c-61-0.2-121.9-0.1-182.9-0.2
					c-4.7,0-6.3,0.9-6.2,5.9c0.3,18.6,0.3,37.2,0,55.8c-0.1,4.7,1.1,6.1,6,6.1c54.6-0.2,109.3-0.1,163.9-0.1c1.5,0,3,0.1,4.5,0
					c2.8-0.2,3.8,0.9,3.8,3.7c-0.1,23.4-0.1,46.8,0,70.2c0,3.8-1.9,3.8-4.7,3.8c-19.8-0.1-39.6,0-59.5,0c-36.1,0-72.3,0.1-108.4-0.1
					c-4.4,0-5.6,1-5.6,5.5c0.2,23.7,0.2,47.5,0,71.2c0,4.4,1.6,5.1,5.5,5.1c63.1-0.1,126.3,0,189.4-0.2c5,0,6.4,1.2,6.4,6.3
					c-0.3,24.2-0.1,48.5,0,72.7C2176.7,385.8,2076.4,385.8,1976.1,385.8z"/>
				<path fill="currentColor" d="M490.8,250.3c0,4.3,0,8.6,0,12.9c-1,0.7-1.1,1.3,0,2c0,6.6,0,13.3,0,19.9c-0.4,0.1-1.2,0.2-1.2,0.4
					c-0.3,1,0.6,1.2,1.3,1.6c0.1,4.9,0.3,9.9,0.4,14.8c0.1,3.1,1.2,4.6,4.8,4.5c4.6-0.2,9.2,0.4,13.8,0.6c0.3,0.7,0.7,0.7,1,0
					c38,0,75.9,0,113.9,0c0.7,1.1,1.4,1.1,2,0c6,0,12,0,18,0c0.3,0.7,0.7,0.7,1,0c0.7,0,1.3,0,2,0c0.3,0.7,0.7,0.7,1,0
					c9.7,0,19.3,0,29,0c0.3,0.7,0.7,0.7,1,0c0.7,0,1.3,0,2,0c1.3,1.9-2.3,7.4,4.1,5.5c0.2,0,0.7,0.4,0.7,0.6c-0.1,6,4.4,2,6.6,3
					c0.8,12,0.7,24,0,36.1c-0.2,0.2-0.2,0.4,0,0.6c0.6,1.8,0.6,3.6,0,5.4c-0.2,0.2-0.2,0.4,0,0.6c0.2,9,0.4,18.1,0.6,27.1
					c-100.3,0-200.6,0-300.9,0c0-125.8,0-251.7,0-377.5c0-8.2,0-8.2,8.1-8.2c93.4,0,186.8,0,280.2-0.1c4.1,0,5.7,0.7,5.7,5.3
					c-0.3,23.2-0.1,46.5-0.1,69.7c0,2.2,0.8,4.8-3.1,4.8c-26.3-0.2-52.6-0.2-78.9-0.3c-5.6-5.9-9.2-5.9-11.9,0c-22.3,0-44.7,0-67,0
					c0.5-3.9-1-6.1-5.1-5.7c-4.5,0.5-1.4,3.7-1.9,5.7c-6.8,0.1-13.7,0.4-20.5,0.1c-4.8-0.2-7.4,0.7-6.4,6.1c0.1,0.6-0.1,1.3-0.1,2
					c-0.7,0.1-1.5,0.3-2.2,0.4c0.7,0.5,1.5,1.1,2.2,1.6c0,15.9,0.1,31.8,0.1,47.7c0,9.6,0.3,9.9,10,9.9c20.9,0.1,41.9,0.1,62.8,0.2
					c1,1.2,2,1.2,3,0c15.7,0,31.3,0,47,0c0.2,1.5-0.7,3.3,1.4,4.2c1-1.3,0.4-2.8,0.6-4.2c16.7-0.1,33.5-0.1,50.2-0.2
					c2.4,0,3.7,0.6,3.6,3.3c-0.2,8.6-0.3,17.2-0.4,25.8c-1,1.3-2.4,2.6,0,4c0.1,13.9,0.2,27.9,0.4,41.8c0,2.1-0.8,3-3,2.9
					c-19.3-0.2-38.6-0.3-57.9-0.4c-0.2-0.4-0.4-1-0.8-1.1c-0.8-0.3-1.1,0.5-1.2,1.1c-3.7,0.6-7.4,0.5-11.1,0c0,0-0.4-0.2-0.4-0.2
					l-0.4,0.2c-19.7,0.6-39.5,0.6-59.2,0c0,0-0.4-0.2-0.4-0.2l-0.4,0.2c-3.4,0.5-6.8,0.6-10.1-0.1c-0.3-0.4-0.4-1-0.8-1.1
					c-0.8-0.2-1,0.5-1.2,1.1c-8.8,0.1-17.5,0.5-26.2,0.2c-4.8-0.2-5.9,1.5-5.7,5.9c0.3,6.1,0,12.2-0.1,18.3
					C490.1,249.6,490.1,250,490.8,250.3z"/>
				<path fill="currentColor" d="M2338,385.8c0-126.4,0-252.8,0-379.1c0-6.5,0-6.5,6.3-6.5c29.3,0,58.6,0.1,88-0.1
					c3.6,0,4.9,0.7,4.9,4.6c-0.1,126.5-0.1,253.1-0.1,379.6c0,0.5-0.1,1-0.1,1.5C2403.9,385.8,2370.9,385.8,2338,385.8z"/>
				<path fill="currentColor" d="M692.1,316.1c-2.2-1-6.7,3.1-6.6-3c0-0.2-0.5-0.6-0.7-0.6c-6.4,1.9-2.8-3.7-4.1-5.5
					c3-1.4,6.2-0.4,9.3-0.7c2-0.2,2.6,1,2.5,2.8C692.3,311.5,692.2,313.8,692.1,316.1z"/>
				<path fill="currentColor" d="M517.8,79.7c0.5-2-2.7-5.2,1.9-5.7c4.1-0.4,5.6,1.8,5.1,5.7C522.5,79.7,520.1,79.7,517.8,79.7z"/>
				<path fill="currentColor" d="M591.8,79.6c2.7-5.9,6.3-5.9,11.9,0C599.8,79.6,595.8,79.6,591.8,79.6z"/>
				<path fill="currentColor" d="M615.7,147.7c-0.2,1.4,0.5,2.9-0.6,4.2c-2.1-0.9-1.2-2.8-1.4-4.2
					C614.4,146.9,615.1,146.9,615.7,147.7z"/>
				<path fill="currentColor" d="M669.2,180.5c-2.4-1.3-1-2.7,0-4C669.7,177.9,669.7,179.2,669.2,180.5z"/>
				<path fill="currentColor" d="M566.8,147.7c-1,1.3-2,1.3-3,0C564.8,146.7,565.8,146.8,566.8,147.7z"/>
				<path fill="currentColor" d="M490.8,89.9c-0.7-0.5-1.5-1.1-2.2-1.6c0.7-0.1,1.5-0.3,2.2-0.4C491.6,88.5,491.6,89.2,490.8,89.9z"/>
				<path fill="currentColor" d="M490.8,287.2c-0.7-0.3-1.5-0.6-1.3-1.6c0.1-0.2,0.8-0.3,1.2-0.4C491.6,285.8,491.6,286.5,490.8,287.2
					z"/>
				<path fill="currentColor" d="M606.8,224.9c0.2-0.7,0.4-1.4,1.2-1.1c0.3,0.1,0.5,0.7,0.8,1.1C608.1,224.9,607.4,224.9,606.8,224.9z
					"/>
				<path fill="currentColor" d="M522.8,224.9c0.1-0.6,0.4-1.4,1.2-1.1c0.3,0.1,0.5,0.7,0.8,1.1C524.1,224.9,523.5,224.9,522.8,224.9z
					"/>
				<path fill="currentColor" d="M490.8,265.3c-1-0.7-1-1.4,0-2C491.6,263.9,491.6,264.6,490.8,265.3z"/>
				<path fill="currentColor" d="M626.8,307.1c-0.7,1.1-1.4,1.1-2,0C625.4,306.3,626.1,306.3,626.8,307.1z"/>
				<polygon fill="currentColor" points="534.9,224.9 535.3,224.7 535.6,224.9 535.3,225 "/>
				<polygon fill="currentColor" points="594.9,224.9 595.3,224.7 595.6,224.9 595.3,225.1 "/>
				<path fill="currentColor" d="M490.8,250.3c-0.7-0.3-0.7-0.7,0-1C490.8,249.6,490.8,250,490.8,250.3z"/>
				<path fill="currentColor" d="M510.8,307.1c-0.3,0.7-0.7,0.7-1,0C510.1,307.1,510.5,307.1,510.8,307.1z"/>
				<path fill="currentColor" d="M645.7,307.1c-0.3,0.7-0.7,0.7-1,0C645.1,307.1,645.4,307.1,645.7,307.1z"/>
				<path fill="currentColor" d="M648.7,307.1c-0.3,0.7-0.7,0.7-1,0C648.1,307.1,648.4,307.1,648.7,307.1z"/>
				<path fill="currentColor" d="M678.7,307.1c-0.3,0.7-0.7,0.7-1,0C678,307.1,678.4,307.1,678.7,307.1z"/>
				<path fill="currentColor" d="M692.1,352.7c-0.2-0.2-0.2-0.4,0-0.6C692.3,352.4,692.3,352.5,692.1,352.7z"/>
				<path fill="currentColor" d="M692.1,358.7c-0.2-0.2-0.2-0.4,0-0.6C692.3,358.3,692.3,358.5,692.1,358.7z"/>
			</svg>
			</a>
			</div>
			<div class="-mx-5 px-5">
			<?php
			if ( has_nav_menu( 'mobile-menu' ) ) {
				wp_nav_menu(
					array(
						'container'      => '',
						'theme_location' => 'mobile-menu',
						'menu_id'        => 'mobile-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s flex flex-col" aria-label="submenu">%3$s</ul>',
						'walker'         => new Custom_Mobile_Walker_Nav_Menu(),
					)
				);
			}
			?>
			</div>
			<div class="-mx-5 mt-8 px-5">
			<?php
			if ( has_nav_menu( 'mobile-menu-additional' ) ) {
				wp_nav_menu(
					array(
						'container'      => '',
						'theme_location' => 'mobile-menu-additional',
						'menu_id'        => 'mobile-menu-additional',
						'items_wrap'     => '<ul id="%1$s" class="%2$s    flex flex-col" aria-label="submenu">%3$s</ul>',
						'walker'         => new Custom_Mobile_Walker_Nav_Menu(),
					)
				);
			}
			?>
			</div>
			<?php if ( $cta_primary || $cta_secondary ) { ?>
			<div class="flex flex-col gap-y-4 mt-10">
				<?php if ( $cta_primary ) { ?>
						<?php
							$c1_target = ( isset( $cta_primary['target'] ) && ! empty( $cta_primary['target'] ) ) ? 'target="' . $cta_primary['target'] . '"' : '';
							$c1__link  = ( isset( $cta_primary['url'] ) ) ? $cta_primary['url'] : '';
							$c1__title = ( isset( $cta_primary['title'] ) ) ? $cta_primary['title'] : '';
						?>
						<a class="flex text-[11px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark" href="<?php echo $c1__link; ?>" <?php echo $c1_target; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.34648 0.947266C4.59072 0.947266 3.16514 2.37022 3.16514 4.12337V5.8241H2.69868C1.97279 5.8241 1.37793 6.41896 1.37793 7.14223V12.1003C1.37793 12.8262 1.97541 13.4184 2.69868 13.4184H10.0598C10.7857 13.4184 11.3779 12.8236 11.3779 12.1003V7.14223C11.3779 6.41634 10.7831 5.8241 10.0598 5.8241H9.53045V4.12337C9.53045 2.37022 8.10487 0.947266 6.34648 0.947266ZM6.34648 1.68102C7.70917 1.68102 8.79669 2.7633 8.79669 4.12337V5.8241H3.89889V4.12337C3.89889 2.7633 4.9838 1.68102 6.34648 1.68102ZM2.69868 6.55785H10.0598C10.3926 6.55785 10.6442 6.81205 10.6442 7.14223V12.1003C10.6442 12.4305 10.39 12.6847 10.0598 12.6847H2.69868C2.36588 12.6847 2.11168 12.4305 2.11168 12.1003V7.14223C2.11168 6.81205 2.36588 6.55785 2.69868 6.55785Z" fill="#1EBBAE" stroke="#1EBBAE"/>
							</svg>
							<span class="leading-none mt-0.5"><?php echo $c1__title; ?></span>
						</a>
					<?php } ?>
					<?php if ( $cta_secondary ) { ?>
						<?php
							$c2_target = ( isset( $cta_secondary['target'] ) && ! empty( $cta_secondary['target'] ) ) ? 'target="' . $cta_secondary['target'] . '"' : '';
							$c2__link  = ( isset( $cta_secondary['url'] ) ) ? $cta_secondary['url'] : '';
							$c2__title = ( isset( $cta_secondary['title'] ) ) ? $cta_secondary['title'] : '';
						?>
						<a class="flex text-[11px] tracking-widest items-center gap-x-3 uppercase font-semibold hover:text-accent group-[.site-header--light]:text-white group-[.site-header--light.scroll]:text-dark" href="<?php echo $c1__link; ?>" <?php echo $c2_target; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
							<path d="M1.17619 8.65525L1.20119 8.69136C1.23175 8.7372 1.26369 8.78164 1.29564 8.83025L4.91508 14.0303C5.09286 14.2858 5.44564 14.3497 5.70258 14.1705C5.75814 14.1316 5.80536 14.0844 5.84286 14.0303L9.45397 8.83442C9.48869 8.78581 9.52203 8.73859 9.55536 8.69553L9.57758 8.6622C11.0762 6.34275 10.4109 3.24831 8.09286 1.74831C5.77341 0.249699 2.67897 0.914976 1.17897 3.23303C0.110916 4.88442 0.110916 7.00942 1.17897 8.66081L1.17619 8.65386V8.65525ZM5.37897 3.86775C6.52897 3.86775 7.4623 4.80109 7.4623 5.95109C7.4623 7.10109 6.52897 8.03442 5.37897 8.03442C4.22897 8.03442 3.29564 7.10109 3.29564 5.95109C3.29564 4.80109 4.22897 3.86775 5.37897 3.86775Z" fill="#3AC3B8"/>
							</svg>
							<span class="leading-none mt-0.5"><?php echo $c2__title; ?></span>
						</a>
					<?php } ?>
			</div>
		<?php } ?>
	</nav>
</div>

