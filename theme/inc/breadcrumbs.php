<?php
// Define the function to generate breadcrumbs
function custom_breadcrumbs_shortcode( $atts ) {
	// Extract shortcode parameters
	$atts    = shortcode_atts(
		array(
			'white' => 'false', // Default value is 'false'
		),
		$atts,
		'breadcrumbs'
	);
	$post_id = get_the_ID();
	// Get the post ancestors
	$ancestors = get_ancestors( $post_id, 'page' );

	// Reverse the order of ancestors to start from top-level parent
	$ancestors = array_reverse( $ancestors );

	// Add the current post to the ancestors array
	$ancestors[] = $post_id;
	$icon        = '';

	$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
	<path d="M6.42423 1.87581C6.31171 1.76332 6.15912 1.70013 6.00003 1.70013C5.84093 1.70013 5.68834 1.76332 5.57583 1.87581L1.37582 6.07581C1.26653 6.18897 1.20605 6.34053 1.20742 6.49785C1.20879 6.65516 1.27189 6.80565 1.38313 6.9169C1.49438 7.02814 1.64487 7.09124 1.80218 7.09261C1.9595 7.09398 2.11106 7.0335 2.22422 6.92421L2.40002 6.7484V10.7C2.40002 10.8591 2.46324 11.0117 2.57576 11.1243C2.68828 11.2368 2.84089 11.3 3.00002 11.3H4.20003C4.35915 11.3 4.51177 11.2368 4.62429 11.1243C4.73681 11.0117 4.80002 10.8591 4.80002 10.7V9.5C4.80002 9.34088 4.86324 9.18826 4.97576 9.07574C5.08828 8.96322 5.2409 8.9 5.40003 8.9H6.60003C6.75916 8.9 6.91177 8.96322 7.02429 9.07574C7.13681 9.18826 7.20003 9.34088 7.20003 9.5V10.7C7.20003 10.8591 7.26324 11.0117 7.37576 11.1243C7.48828 11.2368 7.6409 11.3 7.80003 11.3H9.00003C9.15916 11.3 9.31177 11.2368 9.42429 11.1243C9.53681 11.0117 9.60003 10.8591 9.60003 10.7V6.7484L9.77583 6.92421C9.88899 7.0335 10.0405 7.09398 10.1979 7.09261C10.3552 7.09124 10.5057 7.02814 10.6169 6.9169C10.7282 6.80565 10.7913 6.65516 10.7926 6.49785C10.794 6.34053 10.7335 6.18897 10.6242 6.07581L6.42423 1.87581Z" fill="currentColor"/>
	</svg>';

	$breadcrumbs = '';

	if ( is_singular( 'project' ) ) {
					$breadcrumbs  = '<div class="breadcrumbs flex items-center gap-3 text-[12px] uppercase tracking-widest leading-none">';
					$breadcrumbs .= '<a aria-label="Back to Home" href="' . home_url() . '">' . $icon . '</a>';
					$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
					</svg><a href="' . get_bloginfo( 'url' ) . '/projects">' . __( 'Projects', 'wpny' ) . '</a>';
					$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>';
					$breadcrumbs .= '<span class="current font-semibold text-accent truncate ...">' . get_the_title() . '</span>';
					$breadcrumbs .= '</div>';
			return $breadcrumbs;
	}
	if ( is_singular( 'glass' ) ) {
		$breadcrumbs  = '<div class="breadcrumbs flex items-center gap-3 text-[12px] uppercase tracking-widest leading-none">';
		$breadcrumbs .= '<a aria-label="Back to Home" href="' . home_url() . '">' . $icon . '</a>';
		$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
			<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
			</svg><a href="' . get_bloginfo( 'url' ) . '/glass">' . __( 'Glass', 'wpny' ) . '</a>';
		$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
			<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>';
		$breadcrumbs .= '<span class="current font-semibold text-accent truncate ...">' . get_the_title() . '</span>';
		$breadcrumbs .= '</div>';
		return $breadcrumbs;
	}
	if ( is_singular( 'application' ) ) {
		$breadcrumbs  = '<div class="breadcrumbs flex items-center gap-3 text-[12px] uppercase tracking-widest leading-none text-white">';
		$breadcrumbs .= '<a class="text-white" aria-label="Back to Home" href="' . home_url() . '">' . $icon . '</a>';
		$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
			<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
			</svg><a href="' . get_bloginfo( 'url' ) . '/application">' . __( 'Application', 'wpny' ) . '</a>';
		$breadcrumbs .= '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
			<path d="M4.5 2.5L8 6L4.5 9.5" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>';
		$breadcrumbs .= '<span class="current font-semibold text-accent truncate ...">' . get_the_title() . '</span>';
		$breadcrumbs .= '</div>';
		return $breadcrumbs;
	}
}

// Register the shortcode
function register_breadcrumbs_shortcode() {
	add_shortcode( 'breadcrumbs', 'custom_breadcrumbs_shortcode' );
}

add_action( 'init', 'register_breadcrumbs_shortcode' );
