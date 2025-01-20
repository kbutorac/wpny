<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wpny
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function in_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'in_pingback_header' );

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function in_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'in_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function in_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'wpny' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'wpny' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'wpny' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'wpny' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wpny' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'wpny' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wpny' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'wpny' ) . '<span>' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt   = get_post_type_object( get_queried_object()->name );
		$title = sprintf(
			/* translators: %s: Post type singular name */
			esc_html__( '%s Archives', 'wpny' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax   = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf(
			/* translators: %s: Taxonomy singular name */
			esc_html__( '%s Archives', 'wpny' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'wpny' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'in_get_the_archive_title' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
function in_can_show_post_thumbnail() {
	return apply_filters( 'in_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function in_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
function in_continue_reading_link( $more_string ) {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s', 'wpny' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		$more_string = '<a href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}

	return $more_string;
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'in_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'in_continue_reading_link' );

/**
 * Outputs a comment in the HTML5 format.
 *
 * This function overrides the default WordPress comment output in HTML5
 * format, adding the required class for Tailwind Typography. Based on the
 * `html5_comment()` function from WordPress core.
 *
 * @param WP_Comment $comment Comment to display.
 * @param array      $args    An array of arguments.
 * @param int        $depth   Depth of the current comment.
 */
function in_html5_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	$commenter          = wp_get_current_commenter();
	$show_pending_links = ! empty( $commenter['comment_author'] );

	if ( $commenter['comment_author_email'] ) {
		$moderation_note = __( 'Your comment is awaiting moderation.', 'wpny' );
	} else {
		$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'wpny' );
	}
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					if ( 0 !== $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					?>
					<?php
					$comment_author = get_comment_author_link( $comment );

					if ( '0' === $comment->comment_approved && ! $show_pending_links ) {
						$comment_author = get_comment_author( $comment );
					}

					printf(
						/* translators: %s: Comment author link. */
						wp_kses_post( __( '%s <span class="says">says:</span>', 'wpny' ) ),
						sprintf( '<b class="fn">%s</b>', wp_kses_post( $comment_author ) )
					);
					?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<?php
					printf(
						'<a href="%s"><time datetime="%s">%s</time></a>',
						esc_url( get_comment_link( $comment, $args ) ),
						esc_attr( get_comment_time( 'c' ) ),
						esc_html(
							sprintf(
							/* translators: 1: Comment date, 2: Comment time. */
								__( '%1$s at %2$s', 'wpny' ),
								get_comment_date( '', $comment ),
								get_comment_time()
							)
						)
					);

					edit_comment_link( __( 'Edit', 'wpny' ), ' <span class="edit-link">', '</span>' );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div <?php in_content_class( 'comment-content' ); ?>>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
			if ( '1' === $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
			}
			?>
		</article><!-- .comment-body -->
	<?php
}




	// Add social share shortcode
	function social_share_shortcode() {
		ob_start(); ?>
			<div class="social-share flex gap-x-5 text-lg items-center">
				<h5 class="hidden md:inline-block"><?=__('Share News', 'wpny')?></h5>
				<a class="flex gap-x-3 align-middle hover:text-secondary transition-all ease-in-out duration-300" href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer">
				<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="17" cy="17" r="16.5" stroke="#3AC3B8"/>
				<g clip-path="url(#clip0_7459_705)">
					<path d="M13.5921 13.1348V21.4132H10.6489V13.1348H13.5921Z" fill="black"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12.1205 11.8986C12.9364 11.8986 13.5921 11.2536 13.5921 10.4493C13.5921 9.64497 12.9364 9 12.1205 9C11.3047 9 10.6489 9.64497 10.6489 10.4493C10.6489 11.2536 11.3047 11.8986 12.1205 11.8986Z" fill="black"/>
					<path d="M20.1342 13.1348C18.8608 13.1348 18.0069 13.5976 17.6561 14.2502H17.618V13.1348H15.2695V21.4132H17.7247V17.3081C17.7247 16.2231 17.9306 15.1759 19.2955 15.1759C20.6603 15.1759 20.7442 16.4128 20.7442 17.3764V21.4132H23.268V16.8604C23.268 14.6296 22.78 13.1348 20.1342 13.1348Z" fill="black"/>
					</g>
				
					<defs>
					<clipPath id="clip0_7459_705">
					<rect width="12.6191" height="12.4139" fill="white" transform="translate(10.6489 9)"/>
					</clipPath>
					</defs>
				</svg>
				</a>
				<a class="flex gap-x-3 align-middle hover:text-secondary transition-all ease-in-out duration-300" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer">
				<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="17" cy="17" r="16.5" stroke="#3AC3B8"/>	
				<path d="M18.2013 23.6507V16.8216H20.2829L20.5345 14.0899H18.308V12.9973C18.308 12.4661 18.674 12.3447 18.9257 12.3447H20.4964V10H18.3309C15.9291 9.99244 15.3877 11.7377 15.3877 12.8531V14.0899H14V16.8216H15.403V23.6507H18.2013Z" fill="black"/>
				</svg>
					</a>
				<a class="flex gap-x-3 align-middle hover:text-secondary transition-all ease-in-out duration-300" href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer">
				<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="17" cy="17" r="16.5" stroke="#3AC3B8"/>
					<path d="M23.064 22.8661L18.3733 16.0277L18.3813 16.0341L22.6107 11.1328H21.1973L17.752 15.1221L15.016 11.1328H11.3093L15.6885 17.5173L15.688 17.5168L11.0693 22.8661H12.4827L16.3131 18.4277L19.3573 22.8661H23.064ZM14.456 12.1995L21.0373 21.7995H19.9173L13.3307 12.1995H14.456Z" fill="black"/>
					</svg>
					</a>
				</div>
		
				<?php
				return ob_get_clean();
		}
		
		// Register the shortcode
		add_shortcode('social_share', 'social_share_shortcode');
	
	
	
	// Add recent posts shortcode
	function recent_posts_shortcode($atts) {
		// Define shortcode attributes
		$atts = shortcode_atts(
				array(
						'count' => 3, // Number of recent posts to display
				),
				$atts,
				'recent_posts'
		);
	
		// Query recent posts
		$recent_posts = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => $atts['count'],
		));
	
		// Output the list of recent posts
		ob_start(); ?>
	
		<div class="recent-posts">
				<?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-blue-tint pb-2 mb-10'); ?>>
						<header class="entry-header">
							<div class="text-blue font-semibold"><?php echo get_the_date()?></div>
							<h4 class="h4"><a href="<?=esc_url( get_permalink() )?>" rel="bookmark"><?=get_the_title()?></a></h3>
						</header><!-- .entry-header -->
						<div class="mt-4">
						</div><!-- .entry-content -->
						<footer class="entry-footer mt-3">
						<a class="link-primary" href="<?=get_the_permalink()?>"><?=__('Read more', 'wpny')?></a>
						</footer><!-- .entry-footer -->
					</article><!-- #post-${ID} -->
				<?php endwhile; ?>
		
		</div>
	
		<?php
		// Reset post data
		wp_reset_postdata();
	
		return ob_get_clean();
	}
	
	// Register the shortcode
	add_shortcode('recent_posts', 'recent_posts_shortcode');


	if ( ! function_exists( 'wpny_custom_pagination' ) ) {
    function wpny_custom_pagination() {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        
        $pagination_args = array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, get_query_var('paged') ),
            'total'     => $wp_query->max_num_pages,
            'mid_size'  => 2,
            'prev_text' => __( '<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.363281 4.36328L7.86328 0.0331548L7.86328 8.69341L0.363281 4.36328ZM16.3633 5.11328L7.11328 5.11328L7.11328 3.61328L16.3633 3.61328L16.3633 5.11328Z" fill="currentColor"/>
						</svg>', 'wpny' ),
            'next_text' => __( '<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.6367 4.36328L9.13672 0.0331548L9.13672 8.69341L16.6367 4.36328ZM0.636719 5.11328L9.88672 5.11328L9.88672 3.61328L0.636719 3.61328L0.636719 5.11328Z" fill="currentColor"/>
						</svg>', 'wpny' ),
            'type'      => 'array',
        );
        
        $pages = paginate_links( $pagination_args );
        
        if ( is_array( $pages ) ) {
            echo '<nav class="navigation" role="navigation">';
            echo '<h2 class="screen-reader-text">Posts navigation</h2>';
            echo '<div class="wpny-pagination flex items-center gap-x-5 leading-none my-10">';
            
            foreach ( $pages as $page ) {
                $page = preg_replace_callback( '/>(\d+)</', function( $matches ) {
                    return '>' . sprintf( '%02d', $matches[1] ) . '<';
                }, $page );
                echo $page;
            }
            
            echo '</div>';
            echo '</nav>';
        }
    }
}
