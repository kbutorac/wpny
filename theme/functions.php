<?php
/**
 * wpny functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpny
 */

if ( ! defined( 'IN_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'IN_VERSION', '0.1.10' );
}


if ( ! function_exists( 'in_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function in_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpny, use a find and replace
		 * to change 'wpny' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpny', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary'                => __( 'Primary Navigation', 'wpny' ),
				'mobile-menu'            => __( 'Mobile Navigation', 'wpny' ),
				'mobile-menu-additional' => __( 'Mobile Additional Navigation', 'wpny' ),
				'footer-menu'            => __( 'Footer Navigation', 'wpny' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'in_setup' );


/**
 * Enqueue scripts and styles.
 */
function in_scripts() {
	wp_enqueue_style( 'wpny-style', get_stylesheet_uri(), array(), IN_VERSION );
	wp_enqueue_script( 'wpny-slider', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), IN_VERSION, true );
	wp_enqueue_script( 'wpny-script', get_template_directory_uri() . '/js/script.min.js', array(), IN_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular( 'project' ) ) {
		wp_enqueue_style( 'lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css' );
		wp_enqueue_script( 'lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array( 'jquery' ), null, true );
	}
}
add_action( 'wp_enqueue_scripts', 'in_scripts' );

/**
 * Enqueue the block editor script.
 */
function in_enqueue_block_editor_script() {
	wp_enqueue_script(
		'wpny-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		IN_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'in_enqueue_block_editor_script' );


add_image_size( 'post-size', 634, 722, true );
add_image_size( 'image-32', 610, 406, true );
add_image_size( 'team-size', 712, 712, true );
add_image_size( 'post-large', 1280, 560, true );
add_image_size( 'project-gallery', 1280, 640, true );
add_image_size( 'timeline-slider', 400, 450, true );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Menu Walkers.
 */
require get_template_directory() . '/inc/walker.php';

/**
 * FacetWP edits
 */
require get_template_directory() . '/inc/facetwp.php';

/**
 *Load legacy CPTs
 */
require get_template_directory() . '/inc/cpt.php';


/**
 * Register ACF Blocks
 */
require get_template_directory() . '/blocks/register-blocks.php';


/**
 * ADD ACF Options
 */
require get_template_directory() . '/inc/acf.php';


/**
 * ADD Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';

add_action(
	'init',
	function () {
		remove_theme_support( 'core-block-patterns' );
	}
);

// Allow SVG
add_filter(
	'wp_check_filetype_and_ext',
	function ( $data, $file, $filename, $mimes ) {

		$filetype = wp_check_filetype( $filename, $mimes );

		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);
	},
	10,
	4
);

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
				.attachment-266x266, .thumbnail img {
					width: 100% !important;
					height: auto !important;
				}
				.wpb_element_wrapper .textarea_html h3{
				margin:0;
				}
				</style>';
}
add_action( 'admin_head', 'fix_svg' );


add_theme_support( 'align-wide' );

// enable animations on frontend only
function add_custom_body_class( $classes ) {
	if ( ! is_admin() ) {
			$classes[] = 'animation-ready';
	}

	return $classes;
}
add_filter( 'body_class', 'add_custom_body_class' );

add_filter( 'render_block', 'wpse308021_add_class_to_list_block', 10, 2 );
/**
 * Polyfill wp-block-list class on list blocks
 *
 * Should not be necessary in future version of WP:
 *
 * @see https://github.com/WordPress/gutenberg/issues/12420
 * @see https://github.com/WordPress/gutenberg/pull/42269
 */
function wpse308021_add_class_to_list_block( $block_content, $block ) {

	if ( 'core/heading' === $block['blockName'] || 'core/paragraph' === $block['blockName'] || 'core/image' === $block['blockName'] || 'core/columns' === $block['blockName'] || 'core/table' === $block['blockName'] ) {
			$block_content = new WP_HTML_Tag_Processor( $block_content );
			$block_content->next_tag(); /* first tag should always be ul or ol */
			$block_content->add_class( 'wp-block' );
			$block_content->get_updated_html();
	}

	if ( 'core/list' === $block['blockName'] ) {
		$block_content = new WP_HTML_Tag_Processor( $block_content );
		$block_content->next_tag(); /* first tag should always be ul or ol */
		$block_content->add_class( 'wp-block wp-list-block' );
		$block_content->get_updated_html();
	}

		return $block_content;
}


// custom excerpt length
function wpny_custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'wpny_custom_excerpt_length', 999 );


function wpse_remove_edit_post_link( $link ) {
	return '';
}
add_filter( 'edit_post_link', 'wpse_remove_edit_post_link' );

function wpny_get_post_excerpt( $args = '' ) {
	if ( ! is_array( $args ) ) {
			$args = array(
				'length' => $args,
			);
	}

	// Default arguments.
	$defaults = array(
		'post'            => '',
		'length'          => 40,
		'readmore'        => false,
		'readmore_text'   => esc_html__( 'read more', 'textdomain' ) . ' →',
		'custom_excerpts' => true,
	);

	// Parse arguments, takes the function arguments and combines them with the defaults.
	$args = wp_parse_args( $args, $defaults );

	// Apply filters to the arguments.
	$args = apply_filters( 'wpny_post_excerpt_args', $args );

	// Extract arguments to make it easier to use below.
	extract( $args );

	// Get the current post.
	$post = get_post( $post );

	// Not a valid post.
	if ( ! is_a( $post, 'WP_Post' ) ) {
			return;
	}

	// Get the current post id.
	$post_id = $post->ID;

	// Check for custom excerpts and display them in full without trimming.
	if ( $custom_excerpts && has_excerpt( $post_id ) ) {
			$output = wp_kses_post( $post->post_excerpt );
	}

	// No custom excerpt...so lets generate one.
	else {

			// Generate an excerpt from the post content once shortcodes have been stripped out.
			// Note: If your site is using a shortcode based page builder such as WPBakery you will need
			// to write a complex function to grab the text from the first text block like we do in our Total theme.
			$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );
	}

	// Add the readmore text to the excerpt if enabled.
	if ( ! empty( $output ) && $readmore ) {
			$output .= '<a href="' . esc_url( get_permalink( $post_id ) ) . '">' . esc_html( $readmore_text ) . '</a>';
	}

	return apply_filters( 'wpny_post_excerpt', $output, $args );
}


add_filter( 'allowed_block_types_all', 'wpny_blacklist_blocks' );

function wpny_blacklist_blocks( $allowed_blocks ) {
	// get all the registered blocks
	$blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

	// then disable some of them
	unset( $blocks['core/buttons'] );

	// return the new list of allowed blocks
	return array_keys( $blocks );
}

// remove block editor on widgets
function wpny_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'wpny_theme_support' );



function create_bulk_glass_posts() {
	// Check if the user has the right capability
	if ( ! current_user_can( 'manage_options' ) ) {
			return;
	}

	// Titles for the new posts
	$titles = array(
		'Acoustic',
		'Back-Painted',
		'Bird-Friendly',
		'Ceramic Frit',
		'Channel',
		'Digital Printed',
		'EcoGlass',
		'Etched',
		'Lamberts Stained Glass',
		'Laminated',
		'Marker Board',
		'Mirrored',
		'Restoration Glass®',
		'Textured or Patterned (SEO)',
		'Cabinet Glass',
	);

	foreach ( $titles as $title ) {
			$post_data = array(
				'post_title'   => $title,
				'post_content' => '', // You can add content here if needed
				'post_status'  => 'publish', // You can set it to 'draft' if you don't want to publish immediately
				'post_type'    => 'glass',
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $post_data );

			if ( is_wp_error( $post_id ) ) {
					echo "Error creating post with title: $title. " . $post_id->get_error_message() . '<br>';
			} else {
					echo "Post titled '$title' created successfully with ID $post_id.<br>";
			}
	}
}

// Hook into WordPress admin to run the function on a specific admin page
function add_custom_admin_create_posts_page() {
	add_menu_page( 'Create Glass Posts', 'Create Glass Posts', 'manage_options', 'create-glass-posts', 'create_bulk_glass_posts' );
}

add_action( 'admin_menu', 'add_custom_admin_create_posts_page' );


function create_bulk_application_posts() {
	// Check if the user has the right capability
	if ( ! current_user_can( 'manage_options' ) ) {
			return;
	}

	// Titles for the new posts
	$titles = array(
		'Exterior',
		'Parking Structures',
		'Store Fronts/ Curtain Walls',
		'Daylighting Solutions',
		'Ventilated Facades/Rainscreens',
		'Guard Rails/Railings',
		'Canopies',
		'Doors/Entrances',
		'Windows/Skylights',
		'Restoration',
		'Stained Glass',
		'Interior',
		'Wall Cladding',
		'Lobbies & Elevator Cabs',
		'Partitions',
		'Shower Enclosures',
		'Back-lit Walls',
		'Guard Rails/Railings',
		'Backsplashes',
		'Ceilings/Laylights',
		'Lighting',
		'Marker Boards',
		'Stained Glass',
	);

	foreach ( $titles as $title ) {
			$post_data = array(
				'post_title'   => $title,
				'post_content' => '', // You can add content here if needed
				'post_status'  => 'publish', // You can set it to 'draft' if you don't want to publish immediately
				'post_type'    => 'application',
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $post_data );

			if ( is_wp_error( $post_id ) ) {
					echo "Error creating post with title: $title. " . $post_id->get_error_message() . '<br>';
			} else {
					echo "Post titled '$title' created successfully with ID $post_id.<br>";
			}
	}
}

// Hook into WordPress admin to run the function on a specific admin page
function add_custom_admin_create_application_posts_page() {
	add_menu_page( 'Create Application Posts', 'Create Application Posts', 'manage_options', 'create-application-posts', 'create_bulk_application_posts' );
}

add_action( 'admin_menu', 'add_custom_admin_create_application_posts_page' );



function create_bulk_industry_posts() {
	// Check if the user has the right capability
	if ( ! current_user_can( 'manage_options' ) ) {
			return;
	}

	// Titles for the new posts
	$titles = array(
		'Civic/Government/Cultural',
		'Corporate/Financial',
		'Education',
		'Healthcare',
		'Historical',
		'Hospitality',
		'Life Sciences',
		'Mixed Use',
		'Parking',
		'Religious',
		'Residential & Multi-Family',
		'Retail',
		'Sports/Recreation/Entertainment',
		'Transportation & Aviation',
	);

	foreach ( $titles as $title ) {
			$post_data = array(
				'post_title'   => $title,
				'post_content' => '', // You can add content here if needed
				'post_status'  => 'publish', // You can set it to 'draft' if you don't want to publish immediately
				'post_type'    => 'industry',
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $post_data );

			if ( is_wp_error( $post_id ) ) {
					echo "Error creating post with title: $title. " . $post_id->get_error_message() . '<br>';
			} else {
					echo "Post titled '$title' created successfully with ID $post_id.<br>";
			}
	}
}

// Hook into WordPress admin to run the function on a specific admin page
function add_custom_admin_create_industry_posts_page() {
	add_menu_page( 'Create Industry Posts', 'Create Industry Posts', 'manage_options', 'create-industry-posts', 'create_bulk_industry_posts' );
}

add_action( 'admin_menu', 'add_custom_admin_create_industry_posts_page' );
