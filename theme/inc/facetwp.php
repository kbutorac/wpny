<?php

// modify pagination output to display 2 digit numbers
add_filter(
	'facetwp_render_output',
	function ( $out, $params ) {
			$pager_args    = FWP()->facet->pager_args;
			$range         = 2; // +/- pages from the current page
			$showitems     = ( $range * 2 ) + 1;
			$page          = $pager_args['page'];
			$pages         = $pager_args['total_pages'];
			$prev_disabled = ( $page == 1 ) ? 'disabled' : '';
			$next_disabled = ( $page >= $pages ) ? 'disabled' : '';

			$output  = '<nav class="page-navigation" aria-label="Pagination">';
			$output .= '<ul class="pagination flex items-center gap-x-5 leading-none">';
			$output .= '<li class="page-item ' . $prev_disabled . '"><a class="facetwp-page mx-0 page-link transition-all hover:text-accent" href="#" data-page="' . ( $page - 1 ) . '"><svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.363281 4.36328L7.86328 0.0331548L7.86328 8.69341L0.363281 4.36328ZM16.3633 5.11328L7.11328 5.11328L7.11328 3.61328L16.3633 3.61328L16.3633 5.11328Z" fill="currentColor"/>
			</svg>
			</a></li>';

			for ( $i = 1; $i <= $pages; $i++ ) {
					if ( 1 != $pages && ( ! ( $i >= $page + $range + 1 || $i <= $page - $range - 1 ) || $pages <= $showitems ) ) {
							$formatted_page_number = sprintf('%02d', $i); // Format the page number with leading zero
							if ( $page == $i ) {
									$output .= '<li class="page-item active border border-accent rounded-full w-10 h-10 flex items-center justify-center transition-all leading-none"><span class="page-link"><span class="sr-only">Current Page </span>' . $formatted_page_number . '</span></li>';
							} else {
									$output .= '<li class="page-item w-10 border border-transparent hover:border-accent rounded-full h-10 flex items-center justify-center transition-all leading-none"><a class="page-link facetwp-page !mx-0" href="#" data-page="' . $i . '"><span class="sr-only">Page </span>' . $formatted_page_number . '</a></li>';
							}
					}
			}

			$output .= '<li class="page-item ' . $next_disabled . '"><a class="facetwp-page !mx-0 page-link transition-all hover:text-accent" href="#" data-page="' . ( $page + 1 ) . '"><svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M16.6367 4.36328L9.13672 0.0331548L9.13672 8.69341L16.6367 4.36328ZM0.636719 5.11328L9.88672 5.11328L9.88672 3.61328L0.636719 3.61328L0.636719 5.11328Z" fill="currentColor"/>
			</svg>
			</a></li>';
			$output .= '</ul></nav>';
			$out['pager'] = $output;
			return $out;
	},
	99,
	2
);

