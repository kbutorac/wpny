<?php

// Projects
add_action('init', 'cptui_register_my_cpt_project');
function cptui_register_my_cpt_project() {
register_post_type('project', array(
'label' => 'Projects',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'project', 'with_front' => true),
'query_var' => true,
'supports' => array('title','thumbnail'),
'menu_position'  => 25.1,
'labels' => array (
  'name' => 'Projects',
  'singular_name' => 'Project',
  'menu_name' => 'Projects',
  'add_new' => 'Add Project',
  'add_new_item' => 'Add New Project',
  'edit' => 'Edit',
  'edit_item' => 'Edit Project',
  'new_item' => 'New Project',
  'view' => 'View Project',
  'view_item' => 'View Project',
  'search_items' => 'Search Projects',
  'not_found' => 'No Projects Found',
  'not_found_in_trash' => 'No Projects Found in Trash',
  'parent' => 'Parent Project',
) 
) ); }

// Systems
add_action('init', 'cptui_register_my_cpt_system');
function cptui_register_my_cpt_system() {
register_post_type('system', array(
'label' => 'Systems',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'system', 'with_front' => true),
'query_var' => true,
'supports' => array('title','thumbnail'),
'menu_position'  => 25.2,
'labels' => array (
  'name' => 'Systems',
  'singular_name' => 'System',
  'menu_name' => 'Systems',
  'add_new' => 'Add System',
  'add_new_item' => 'Add New System',
  'edit' => 'Edit',
  'edit_item' => 'Edit System',
  'new_item' => 'New System',
  'view' => 'View System',
  'view_item' => 'View System',
  'search_items' => 'Search Systems',
  'not_found' => 'No Systems Found',
  'not_found_in_trash' => 'No Systems Found in Trash',
  'parent' => 'Parent System',
) 
) ); }

// System Products
add_action('init', 'cptui_register_my_cpt_system_product');
function cptui_register_my_cpt_system_product() {
register_post_type('system_product', array(
'label' => 'System Products',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'system_product', 'with_front' => true),
'query_var' => true,
'supports' => array('title','thumbnail'),
'menu_position'  => 25.3,
'labels' => array (
  'name' => 'System Products',
  'singular_name' => 'System Product',
  'menu_name' => 'System Products',
  'add_new' => 'Add Product',
  'add_new_item' => 'Add New System Product',
  'edit' => 'Edit',
  'edit_item' => 'Edit System Product',
  'new_item' => 'New System Product',
  'view' => 'View System Product',
  'view_item' => 'View System Product',
  'search_items' => 'Search System Products',
  'not_found' => 'No System Products Found',
  'not_found_in_trash' => 'No System Products Found in Trash',
  'parent' => 'Parent System Product',
) 
) ); }

// Glass Types
//add_action('init', 'cptui_register_my_cpt_glass');
function cptui_register_my_cpt_glass() {
register_post_type('glass_type', array(
'label' => 'Glass Types',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'glass_type', 'with_front' => true),
'query_var' => true,
'supports' => array('title','thumbnail'), 
'menu_position'  => 25.2,
'with_front' => false,
'labels' => array (
  'name' => 'Glass Type',
  'singular_name' => 'Glass Type',
  'menu_name' => 'Glass Types',
  'add_new' => 'Add Glass',
  'add_new_item' => 'Add New Glass Type',
  'edit' => 'Edit',
  'edit_item' => 'Edit Glass Type',
  'new_item' => 'New Glass Type',
  'view' => 'View Glass Type',
  'view_item' => 'View Glass Type',
  'search_items' => 'Search Glass Types',
  'not_found' => 'No Glass Type Found',
  'not_found_in_trash' => 'No Glass Type Found in Trash',
  'parent' => 'Parent Glass Type',
)
) ); }

/*
// Lisec Orders
add_action('init', 'cptui_register_my_cpt_order');
function cptui_register_my_cpt_order() {
register_post_type('lisec_order', array(
'label' => 'Orders',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'orders', 'with_front' => true),
'query_var' => true,
'supports' => array('thumbnail'), 
'menu_position'  => 25.3,
'public' => false, 
/*'has_archive' => false, 
'publicaly_queryable' => false, 
'query_var' => false,
'labels' => array (
  'name' => 'Order',
  'singular_name' => 'Order',
  'menu_name' => 'Contractor Tracking',
  'add_new' => 'Add Order',
  'add_new_item' => 'Add New Order',
  'edit' => 'Edit',
  'edit_item' => 'Edit Order',
  'new_item' => 'New Order',
  'view' => 'View Order',
  'view_item' => 'View Order',
  'search_items' => 'Search Orders',
  'not_found' => 'No Orders Found',
  'not_found_in_trash' => 'No Orders Found in Trash',
  'parent' => 'Parent Order',
)
) ); }

*/

// // Campaigns
// add_action('init', 'cptui_register_my_cpt_campaign');
// function cptui_register_my_cpt_campaign() {
// register_post_type('campaign', array(
// 'label' => 'Campaign Tool',
// 'description' => '',
// 'public' => true,
// 'show_ui' => true,
// 'show_in_menu' => true,
// 'capability_type' => 'post',
// 'map_meta_cap' => true,
// 'hierarchical' => false,
// //'rewrite' => array('slug' => 'campaign', 'with_front' => true),
// 'query_var' => true,
// 'supports' => array('title'),
// 'menu_position'  => 25.4,
// 'labels' => array (
//   'name' => 'Campaigns',
//   'singular_name' => 'Campaign',
//   'menu_name' => 'Campaign Tool',
//   'add_new' => 'Add Campaign',
//   'add_new_item' => 'Add New Campaign',
//   'edit' => 'Edit',
//   'edit_item' => 'Edit Campaign',
//   'new_item' => 'New Campaign',
//   'view' => 'View Campaign',
//   'view_item' => 'View Campaign',
//   'search_items' => 'Search Campaigns',
//   'not_found' => 'No Campaigns Found',
//   'not_found_in_trash' => 'No Campaigns Found in Trash',
//   'parent' => 'Parent Campaign',
// ) 
// ) ); }

add_action('init', 'cptui_register_my_cpt_faq');
function cptui_register_my_cpt_faq() {
register_post_type('faq', array(
'label' => 'FAQS',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'faq', 'with_front' => true),
'query_var' => true,
'menu_position'  => 25.5,
'supports' => array('title','thumbnail'),
'labels' => array (
  'name' => 'FAQs',
  'singular_name' => 'FAQ',
  'menu_name' => 'FAQs',
  'add_new' => 'Add FAQ',
  'add_new_item' => 'Add New FAQ',
  'edit' => 'Edit',
  'edit_item' => 'Edit FAQ',
  'new_item' => 'New FAQ',
  'view' => 'View FAQ',
  'view_item' => 'View FAQ',
  'search_items' => 'Search FAQs',
  'not_found' => 'No FAQs Found',
  'not_found_in_trash' => 'No FAQs Found in Trash',
  'parent' => 'Parent FAQ',
)
) ); }

add_action('init', 'cptui_register_my_cpt_video');
function cptui_register_my_cpt_video() {
register_post_type('video', array(
'label' => 'Videos',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'video', 'with_front' => true),
'query_var' => true,
'menu_position'  => 25.8,
'supports' => array('title','thumbnail'),
'labels' => array (
  'name' => 'Videos',
  'singular_name' => 'Video',
  'menu_name' => 'Videos',
  'add_new' => 'Add Video',
  'add_new_item' => 'Add New Video',
  'edit' => 'Edit',
  'edit_item' => 'Edit Video',
  'new_item' => 'New Video',
  'view' => 'View Video',
  'view_item' => 'View Video',
  'search_items' => 'Search Videos',
  'not_found' => 'No Videos Found',
  'not_found_in_trash' => 'No Videos Found in Trash',
  'parent' => 'Parent Video',
)
) ); }


add_action('init', 'cptui_register_my_cpt_location');
function cptui_register_my_cpt_location() {
register_post_type('project_location', array(
'label' => 'Locations',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'project_location', 'with_front' => true),
'query_var' => true,
'menu_position'  => 25.9,
'supports' => array('title','thumbnail'),
'labels' => array (
  'nam e' => 'Locations',
  'singular_name' => 'Location',
  'menu_name' => 'Locations',
  'add_new' => 'Add Location',
  'add_new_item' => 'Add New Location',
  'edit' => 'Edit',
  'edit_item' => 'Edit Location',
  'new_item' => 'New Location',
  'view' => 'View Location',
  'view_item' => 'View Location',
  'search_items' => 'Search Locations',
  'not_found' => 'No Locations Found',
  'not_found_in_trash' => 'No Locations Found in Trash',
  'parent' => 'Parent Location',
)
) ); }

add_action('init', 'cptui_register_my_cpt_file_download');
function cptui_register_my_cpt_file_download() {
register_post_type('file_download', array(
'label' => 'Downloads',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'publicly_queryable'  => false,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'file_download', 'with_front' => true),
'query_var' => true,
'menu_position'  => 25.10,
'supports' => array('title','thumbnail'),
'labels' => array (
  'name' => 'Downloads',
  'singular_name' => 'Downloads',
  'menu_name' => 'Downloads',
  'add_new' => 'Add Download',
  'add_new_item' => 'Add Download',
  'edit' => 'Edit',
  'edit_item' => 'Edit Download',
  'new_item' => 'New Download',
  'view' => 'View Download',
  'view_item' => 'View Download',
  'search_items' => 'Search Downloads',
  'not_found' => 'No Downloads',
  'not_found_in_trash' => 'No Downloads',
  'parent' => 'Parent Download',
)
) ); }


add_action('init', 'cptui_register_my_cpt_firm');
function cptui_register_my_cpt_firm() {
register_post_type('firm', array(
'label' => 'Firms',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'firm', 'with_front' => true ),
'query_var' => true,
'menu_position'  => 25.11,
'supports' => array('title'),
'public' => false, 
'exclude_from_search' => true, 
'labels' => array (
  'name' => 'Firms',
  'singular_name' => 'Firm',
  'menu_name' => 'Firms',
  'add_new' => 'Add Firm',
  'add_new_item' => 'Add Firm',
  'edit' => 'Edit',
  'edit_item' => 'Edit Firm',
  'new_item' => 'New Firm',
  'view' => 'View Firm',
  'view_item' => 'View Firm',
  'search_items' => 'Search Firms',
  'not_found' => 'No Firms',
  'not_found_in_trash' => 'No Firms',
  'parent' => 'Parent Firm',
)
) ); }


// Taxonomies

add_action( 'init', 'register_taxonomy_firm_types' );

function register_taxonomy_firm_types() {

    $labels = array( 
        'name' => _x( 'Firm Types', 'firm_types' ),
        'singular_name' => _x( 'Firm Type', 'firm_types' ),
        'search_items' => _x( 'Search Firm Types', 'firm_types' ),
        'popular_items' => _x( 'Popular Firm Types', 'firm_types' ),
        'all_items' => _x( 'All Firm Types', 'firm_types' ),
        'parent_item' => _x( 'Parent Firm Type', 'firm_types' ),
        'parent_item_colon' => _x( 'Parent Firm Type:', 'firm_types' ),
        'edit_item' => _x( 'Edit Firm Type', 'firm_types' ),
        'update_item' => _x( 'Update Firm Type', 'firm_types' ),
        'add_new_item' => _x( 'Add New Firm Type', 'firm_types' ),
        'new_item_name' => _x( 'New Firm Type', 'firm_types' ),
        'separate_items_with_commas' => _x( 'Separate firm types with commas', 'firm_types' ),
        'add_or_remove_items' => _x( 'Add or remove firm types', 'firm_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used firm types', 'firm_types' ),
        'menu_name' => _x( 'Firm Types', 'firm_types' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'firm_types', array('firm'), $args );
}

//add_action( 'init', 'register_taxonomy_glass_types' );

function register_taxonomy_glass_types() {

    $labels = array( 
        'name' => _x( 'Glass Types', 'glass_types' ),
        'singular_name' => _x( 'Glass Type', 'glass_types' ),
        'search_items' => _x( 'Search Glass Types', 'glass_types' ),
        'popular_items' => _x( 'Popular Glass Types', 'glass_types' ),
        'all_items' => _x( 'All Glass Types', 'glass_types' ),
        'parent_item' => _x( 'Parent Glass Type', 'glass_types' ),
        'parent_item_colon' => _x( 'Parent Glass Type:', 'glass_types' ),
        'edit_item' => _x( 'Edit Glass Type', 'glass_types' ),
        'update_item' => _x( 'Update Glass Type', 'glass_types' ),
        'add_new_item' => _x( 'Add New Glass Type', 'glass_types' ),
        'new_item_name' => _x( 'New Glass Type', 'glass_types' ),
        'separate_items_with_commas' => _x( 'Separate glass types with commas', 'glass_types' ),
        'add_or_remove_items' => _x( 'Add or remove glass types', 'glass_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used glass types', 'glass_types' ),
        'menu_name' => _x( 'Glass Types', 'glass_types' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'glass_types', array('product', 'project'), $args );
}

add_action( 'init', 'register_taxonomy_download_category' );
function register_taxonomy_download_category() {

    $labels = array(
        'name' => _x( 'Download Categories', 'download_category' ),
        'singular_name' => _x( 'Download Category', 'download_category' ),
        'search_items' => _x( 'Search Download Categories', 'download_category' ),
        'popular_items' => _x( 'Popular Download Categories', 'download_category' ),
        'all_items' => _x( 'All Download Categries', 'download_category' ),
        'parent_item' => _x( 'Parent Download Category', 'download_category' ),
        'parent_item_colon' => _x( 'Parent Download Category:', 'download_category' ),
        'edit_item' => _x( 'Edit Download Category', 'download_category' ),
        'update_item' => _x( 'Update Download Category', 'download_category' ),
        'add_new_item' => _x( 'Add Download Category', 'download_category' ),
        'new_item_name' => _x( 'New Download Category', 'download_category' ),
        'separate_items_with_commas' => _x( 'Separate Download Categories with commas', 'download_category' ),
        'add_or_remove_items' => _x( 'Add or remove Download Categories', 'download_category' ),
        'choose_from_most_used' => _x( 'Choose from the most used Download Categories', 'download_category' ),
        'menu_name' => _x( 'Download Categories', 'download_category' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'download_category', array('file_download'), $args );
}

add_action( 'init', 'register_taxonomy_resource_cat' );
function register_taxonomy_resource_cat() {

    $labels = array( 
        'name' => _x( 'Resource Categories', 'resource_cat' ),
        'singular_name' => _x( 'Resource Category', 'resource_cat' ),
        'search_items' => _x( 'Search Categories', 'resource_cat' ),
        'popular_items' => _x( 'Popular Categories', 'resource_cat' ),
        'all_items' => _x( 'All Categories', 'resource_cat' ),
        'parent_item' => _x( 'Parent Categories', 'resource_cat' ),
        'parent_item_colon' => _x( 'Parent Categories:', 'resource_cat' ),
        'edit_item' => _x( 'Edit Categories', 'resource_cat' ),
        'update_item' => _x( 'Update Categories', 'resource_cat' ),
        'add_new_item' => _x( 'Add New Categories', 'resource_cat' ),
        'new_item_name' => _x( 'New Categories', 'resource_cat' ),
        'separate_items_with_commas' => _x( 'Separate categories with commas', 'resource_cat' ),
        'add_or_remove_items' => _x( 'Add or remove categories', 'resource_cat' ),
        'choose_from_most_used' => _x( 'Choose from the most used categories', 'resource_cat' ),
        'menu_name' => _x( 'Resource Categories', 'resource_cat' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'resource_cat', array('video', 'additional_reading', 'drawings_specs', 'faq', 'file_download'), $args );
}

add_action( 'init', 'register_taxonomy_video_display_cat' );
function register_taxonomy_video_display_cat() {

    $labels = array(
        'name' => _x( 'Display Categories', 'resource_cat' ),
        'singular_name' => _x( 'Display Category', 'resource_cat' ),
        'search_items' => _x( 'Search Categories', 'resource_cat' ),
        'popular_items' => _x( 'Popular Categories', 'resource_cat' ),
        'all_items' => _x( 'All Categories', 'resource_cat' ),
        'parent_item' => _x( 'Parent Categories', 'resource_cat' ),
        'parent_item_colon' => _x( 'Parent Categories:', 'resource_cat' ),
        'edit_item' => _x( 'Edit Categories', 'resource_cat' ),
        'update_item' => _x( 'Update Categories', 'resource_cat' ),
        'add_new_item' => _x( 'Add New Categories', 'resource_cat' ),
        'new_item_name' => _x( 'New Categories', 'resource_cat' ),
        'separate_items_with_commas' => _x( 'Separate categories with commas', 'resource_cat' ),
        'add_or_remove_items' => _x( 'Add or remove categories', 'resource_cat' ),
        'choose_from_most_used' => _x( 'Choose from the most used categories', 'resource_cat' ),
        'menu_name' => _x( 'Display Categories', 'resource_cat' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'video_display_cat', array('video'), $args );
}

add_action( 'init', 'register_taxonomy_project_types' );
function register_taxonomy_project_types() {

    $labels = array(
        'name' => _x( 'Project Types', 'project_types' ),
        'singular_name' => _x( 'Project Type', 'project_types' ),
        'search_items' => _x( 'Search Project Types', 'project_types' ),
        'popular_items' => _x( 'Popular Project Types', 'project_types' ),
        'all_items' => _x( 'All Project Types', 'project_types' ),
        'parent_item' => _x( 'Parent Project Type', 'project_types' ),
        'parent_item_colon' => _x( 'Parent Project Type:', 'project_types' ),
        'edit_item' => _x( 'Edit Project Type', 'project_types' ),
        'update_item' => _x( 'Update Project Type', 'project_types' ),
        'add_new_item' => _x( 'Add New Project Type', 'project_types' ),
        'new_item_name' => _x( 'New Project Type', 'project_types' ),
        'separate_items_with_commas' => _x( 'Separate Project types with commas', 'project_types' ),
        'add_or_remove_items' => _x( 'Add or remove Project types', 'project_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used Project types', 'project_types' ),
        'menu_name' => _x( 'Project Types', 'project_types' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'project_types', array('project'), $args );
}

//add_action( 'init', 'register_taxonomy_building_types' );
function register_taxonomy_building_types() {

    $labels = array(
        'name' => _x( 'Building Types', 'building_types' ),
        'singular_name' => _x( 'Building Type', 'building_types' ),
        'search_items' => _x( 'Search Building Types', 'building_types' ),
        'popular_items' => _x( 'Popular Building Types', 'building_types' ),
        'all_items' => _x( 'All Building Types', 'building_types' ),
        'parent_item' => _x( 'Parent Building Type', 'building_types' ),
        'parent_item_colon' => _x( 'Parent Building Type:', 'building_types' ),
        'edit_item' => _x( 'Edit Building Type', 'building_types' ),
        'update_item' => _x( 'Update Building Type', 'building_types' ),
        'add_new_item' => _x( 'Add New Building Type', 'building_types' ),
        'new_item_name' => _x( 'New Building Type', 'building_types' ),
        'separate_items_with_commas' => _x( 'Separate Building types with commas', 'building_types' ),
        'add_or_remove_items' => _x( 'Add or remove Building types', 'building_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used Building types', 'building_types' ),
        'menu_name' => _x( 'Building Types', 'building_types' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'building_types', array('project'), $args );
}

add_action( 'init', 'register_taxonomy_loc_categories' );
function register_taxonomy_loc_categories() {

    $labels = array(
        'name' => _x( 'Categories', 'loc_categories' ),
        'singular_name' => _x( 'Category', 'loc_categories' ),
        'search_items' => _x( 'Search Categories', 'loc_categories' ),
        'popular_items' => _x( 'Popular Categories', 'loc_categories' ),
        'all_items' => _x( 'All Categories', 'loc_categories' ),
        'parent_item' => _x( 'Parent Category', 'loc_categories' ),
        'parent_item_colon' => _x( 'Parent Category:', 'loc_categories' ),
        'edit_item' => _x( 'Edit Category', 'loc_categories' ),
        'update_item' => _x( 'Update Category', 'loc_categories' ),
        'add_new_item' => _x( 'Add New Category', 'loc_categories' ),
        'new_item_name' => _x( 'New Category', 'loc_categories' ),
        'separate_items_with_commas' => _x( 'Separate Categories with commas', 'loc_categories' ),
        'add_or_remove_items' => _x( 'Add or remove Categories', 'loc_categories' ),
        'choose_from_most_used' => _x( 'Choose from the most used Categories', 'loc_categories' ),
        'menu_name' => _x( 'Categories', 'loc_categories' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'loc_categories', array('project_location'), $args );
}