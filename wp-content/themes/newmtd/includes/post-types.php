<?php


// Register Custom Post Type
function teaser_post_type() {

	$labels = array(
		'name'                  => _x( 'Teasers', 'Post Type General Name', 'mtd_new' ),
		'singular_name'         => _x( 'Teaser', 'Post Type Singular Name', 'mtd_new' ),
		'menu_name'             => __( 'Teasers', 'mtd_new' ),
		'name_admin_bar'        => __( 'Teasers', 'mtd_new' ),
		'archives'              => __( 'Teaser Archives', 'mtd_new' ),
		'attributes'            => __( 'Item Attributes', 'mtd_new' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mtd_new' ),
		'all_items'             => __( 'All Items', 'mtd_new' ),
		'add_new_item'          => __( 'Add New Item', 'mtd_new' ),
		'add_new'               => __( 'Add New', 'mtd_new' ),
		'new_item'              => __( 'New Item', 'mtd_new' ),
		'edit_item'             => __( 'Edit Item', 'mtd_new' ),
		'update_item'           => __( 'Update Item', 'mtd_new' ),
		'view_item'             => __( 'View Item', 'mtd_new' ),
		'view_items'            => __( 'View Items', 'mtd_new' ),
		'search_items'          => __( 'Search Item', 'mtd_new' ),
		'not_found'             => __( 'Not found', 'mtd_new' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mtd_new' ),
		'featured_image'        => __( 'Featured Image', 'mtd_new' ),
		'set_featured_image'    => __( 'Set featured image', 'mtd_new' ),
		'remove_featured_image' => __( 'Remove featured image', 'mtd_new' ),
		'use_featured_image'    => __( 'Use as featured image', 'mtd_new' ),
		'insert_into_item'      => __( 'Insert into item', 'mtd_new' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mtd_new' ),
		'items_list'            => __( 'Items list', 'mtd_new' ),
		'items_list_navigation' => __( 'Items list navigation', 'mtd_new' ),
		'filter_items_list'     => __( 'Filter items list', 'mtd_new' ),
	);
	$args = array(
		'label'                 => __( 'Teaser', 'mtd_new' ),
		'description'           => __( 'Teaser content to show on pages', 'mtd_new' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);
	register_post_type( 'teaser', $args );

}

function feature_post_type() {

	$labels = array(
		'name'                  => _x( 'Features', 'Post Type General Name', 'mtd_new' ),
		'singular_name'         => _x( 'Feature', 'Post Type Singular Name', 'mtd_new' ),
		'menu_name'             => __( 'Features', 'mtd_new' ),
		'name_admin_bar'        => __( 'Features', 'mtd_new' ),
		'archives'              => __( 'Feature Archives', 'mtd_new' ),
		'attributes'            => __( 'Item Attributes', 'mtd_new' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mtd_new' ),
		'all_items'             => __( 'All Items', 'mtd_new' ),
		'add_new_item'          => __( 'Add New Item', 'mtd_new' ),
		'add_new'               => __( 'Add New', 'mtd_new' ),
		'new_item'              => __( 'New Item', 'mtd_new' ),
		'edit_item'             => __( 'Edit Item', 'mtd_new' ),
		'update_item'           => __( 'Update Item', 'mtd_new' ),
		'view_item'             => __( 'View Item', 'mtd_new' ),
		'view_items'            => __( 'View Items', 'mtd_new' ),
		'search_items'          => __( 'Search Item', 'mtd_new' ),
		'not_found'             => __( 'Not found', 'mtd_new' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mtd_new' ),
		'featured_image'        => __( 'Featured Image', 'mtd_new' ),
		'set_featured_image'    => __( 'Set featured image', 'mtd_new' ),
		'remove_featured_image' => __( 'Remove featured image', 'mtd_new' ),
		'use_featured_image'    => __( 'Use as featured image', 'mtd_new' ),
		'insert_into_item'      => __( 'Insert into item', 'mtd_new' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mtd_new' ),
		'items_list'            => __( 'Items list', 'mtd_new' ),
		'items_list_navigation' => __( 'Items list navigation', 'mtd_new' ),
		'filter_items_list'     => __( 'Filter items list', 'mtd_new' ),
	);
	$args = array(
		'label'                 => __( 'Feature', 'mtd_new' ),
		'description'           => __( 'Feature content to show on pages', 'mtd_new' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);
	register_post_type( 'feature', $args );

}

function song_post_type() {

	$labels = array(
		'name'                  => _x( 'Songs', 'Post Type General Name', 'mtd_new' ),
		'singular_name'         => _x( 'Song', 'Post Type Singular Name', 'mtd_new' ),
		'menu_name'             => __( 'Songs', 'mtd_new' ),
		'name_admin_bar'        => __( 'Songs', 'mtd_new' ),
		'archives'              => __( 'Song Archives', 'mtd_new' ),
		'attributes'            => __( 'Item Attributes', 'mtd_new' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mtd_new' ),
		'all_items'             => __( 'All Items', 'mtd_new' ),
		'add_new_item'          => __( 'Add New Item', 'mtd_new' ),
		'add_new'               => __( 'Add New', 'mtd_new' ),
		'new_item'              => __( 'New Item', 'mtd_new' ),
		'edit_item'             => __( 'Edit Item', 'mtd_new' ),
		'update_item'           => __( 'Update Item', 'mtd_new' ),
		'view_item'             => __( 'View Item', 'mtd_new' ),
		'view_items'            => __( 'View Items', 'mtd_new' ),
		'search_items'          => __( 'Search Item', 'mtd_new' ),
		'not_found'             => __( 'Not found', 'mtd_new' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mtd_new' ),
		'featured_image'        => __( 'Featured Image', 'mtd_new' ),
		'set_featured_image'    => __( 'Set featured image', 'mtd_new' ),
		'remove_featured_image' => __( 'Remove featured image', 'mtd_new' ),
		'use_featured_image'    => __( 'Use as featured image', 'mtd_new' ),
		'insert_into_item'      => __( 'Insert into item', 'mtd_new' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mtd_new' ),
		'items_list'            => __( 'Items list', 'mtd_new' ),
		'items_list_navigation' => __( 'Items list navigation', 'mtd_new' ),
		'filter_items_list'     => __( 'Filter items list', 'mtd_new' ),
	);
	$args = array(
		'label'                 => __( 'Song', 'mtd_new' ),
		'description'           => __( 'Songs', 'mtd_new' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite' => array('slug' => 'songs'),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'song', $args );

}

function glossary_post_type() {

	$labels = array(
		'name'                  => _x( 'Glossary Entries', 'Post Type General Name', 'mtd_new' ),
		'singular_name'         => _x( 'Glossary Entry', 'Post Type Singular Name', 'mtd_new' ),
		'menu_name'             => __( 'Glossary Entries', 'mtd_new' ),
		'name_admin_bar'        => __( 'Glossary Entries', 'mtd_new' ),
		'archives'              => __( 'Glossary', 'mtd_new' ),
		'attributes'            => __( 'Item Attributes', 'mtd_new' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mtd_new' ),
		'all_items'             => __( 'All Items', 'mtd_new' ),
		'add_new_item'          => __( 'Add New Item', 'mtd_new' ),
		'add_new'               => __( 'Add New', 'mtd_new' ),
		'new_item'              => __( 'New Item', 'mtd_new' ),
		'edit_item'             => __( 'Edit Item', 'mtd_new' ),
		'update_item'           => __( 'Update Item', 'mtd_new' ),
		'view_item'             => __( 'View Item', 'mtd_new' ),
		'view_items'            => __( 'View Items', 'mtd_new' ),
		'search_items'          => __( 'Search Item', 'mtd_new' ),
		'not_found'             => __( 'Not found', 'mtd_new' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mtd_new' ),
		'featured_image'        => __( 'Featured Image', 'mtd_new' ),
		'set_featured_image'    => __( 'Set featured image', 'mtd_new' ),
		'remove_featured_image' => __( 'Remove featured image', 'mtd_new' ),
		'use_featured_image'    => __( 'Use as featured image', 'mtd_new' ),
		'insert_into_item'      => __( 'Insert into item', 'mtd_new' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mtd_new' ),
		'items_list'            => __( 'Items list', 'mtd_new' ),
		'items_list_navigation' => __( 'Items list navigation', 'mtd_new' ),
		'filter_items_list'     => __( 'Filter items list', 'mtd_new' ),
	);
	$args = array(
		'label'                 => __( 'Glossary Entry', 'mtd_new' ),
		'description'           => __( 'Glossary Entries', 'mtd_new' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite' => array('slug' => 'glossary'),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'glossary', $args );
}

// Register Custom Taxonomy
function glossary_types() {

	$labels = array(
		'name'                       => _x( 'Glossary Types', 'Taxonomy General Name', 'newmtd' ),
		'singular_name'              => _x( 'Glossary Type', 'Taxonomy Singular Name', 'newmtd' ),
		'menu_name'                  => __( 'Glossary Type', 'newmtd' ),
		'all_items'                  => __( 'All Glossary Types', 'newmtd' ),
		'parent_item'                => __( 'Parent Glossary Type', 'newmtd' ),
		'parent_item_colon'          => __( 'Parent Glossary Type:', 'newmtd' ),
		'new_item_name'              => __( 'New Glossary Type', 'newmtd' ),
		'add_new_item'               => __( 'Add New Glossary Type', 'newmtd' ),
		'edit_item'                  => __( 'Edit Glossary Type', 'newmtd' ),
		'update_item'                => __( 'Update Glossary Type', 'newmtd' ),
		'view_item'                  => __( 'View Glossary Type', 'newmtd' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'newmtd' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'newmtd' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'newmtd' ),
		'popular_items'              => __( 'Popular Items', 'newmtd' ),
		'search_items'               => __( 'Search Items', 'newmtd' ),
		'not_found'                  => __( 'Not Found', 'newmtd' ),
		'no_terms'                   => __( 'No items', 'newmtd' ),
		'items_list'                 => __( 'Items list', 'newmtd' ),
		'items_list_navigation'      => __( 'Items list navigation', 'newmtd' ),
	);
	$rewrite = array(
		'slug'                       => 'glossary-type',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'glossarytype', array( 'glossary' ), $args );

}

add_action( 'init', 'glossary_types', 0 );
add_action( 'init', 'teaser_post_type', 0 );
add_action( 'init', 'feature_post_type', 0 );
add_action( 'init', 'song_post_type', 0 );
add_action( 'init', 'glossary_post_type', 0 );

