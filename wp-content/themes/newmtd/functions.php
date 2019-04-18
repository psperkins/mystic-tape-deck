<?php

define('THEME_IMG', get_template_directory_uri() . '/images/');

// Require cmb2 meta boxes.
require_once( __DIR__ . '/includes/cmb2/meta-boxes.php' );
require_once( __DIR__ . '/includes/post-types.php' );

add_action( 'wp_enqueue_scripts', 'mtd_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mtd_enqueue_scripts' );
remove_filter( 'term_description', 'wpautop' );
add_action( 'add_meta_boxes', 'remove_yoast_metabox_reservations', 100 );
add_action( 'init', 'mtd_menus' );
add_action( 'pre_get_posts', 'mtd_modify_main_query' );

add_image_size( 'teaser', 320, 198, array( 'center', 'center' ) );
add_image_size( 'social', 130, 130, false );

if ( ! function_exists( 'mtd_sidebars' ) ) {
	/**
	 * Add custom sidebars
	 */
	function mtd_sidebars() {
		register_sidebar( array(
			'id'            => 'mtd_reviews',
			'class'         => 'mtd-reviews',
			'name'          => __( 'Reviews Page', 'mystic_tape_deck' ),
			'description'   => __( 'Reviews Page Sidebar Area', 'mystic_tape_deck' ),
			'before_widget' => '<div class="widget col-4-xs">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		));
	}
	add_action( 'widgets_init', 'mtd_sidebars' );
}

function mtd_enqueue_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Cinzel:400,900|Nanum+Gothic');
	wp_enqueue_style( 'mtd-styles', get_stylesheet_directory_uri() . '/css/mtd.css', array( ), rand(1, 1234), 'all' );
}

function mtd_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script( 'mtd-js', get_stylesheet_directory_uri() . '/js/mtd.js', 'jquery', '1.0', true );
    wp_enqueue_script( 'mtd-bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
    wp_enqueue_script( 'holder-js', get_stylesheet_directory_uri() . '/js/holder.js', 'jquery', '1.0', true );
}

# Hide Yoast Meta boxes in unnecessary post type

function remove_yoast_metabox_reservations(){
    remove_meta_box('wpseo_meta', 'teaser', 'normal');
}

function mtd_menus() {
  register_nav_menus(
    array(
      'mtd_main_menu' => __( 'MTD Main Menu' ),
      'mtd_social'	=>	__( 'MTD Social Menu' ),
    )
  );
}

/**
 * Add custom sorting for stories category view.
 *
 * @param object $query The query being executed.
 */
function mtd_modify_main_query( $query ) {
	if ( $query->is_category( array( 'mythology' ) ) && $query->is_main_query() ) {
		$query->query_vars['order'] = 'ASC';
	}
	if ( $query->is_post_type_archive( 'song' ) && $query->is_main_query() ) {
		$query->query_vars['order'] = 'ASC';
	}
	if ( $query->is_post_type_archive( 'glossary' ) || is_tax( 'glossarytype' ) && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}

/**
 * Set up wp pagination using bootstrap markup and styles
 */
function wp_bs_pagination( $pages = '', $range = 4 ) {
	$showitems = ($range * 2) + 1;
	global $paged;

	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( '' == $pages ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<div class="text-center">';
		echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page ' . $paged . ' of ' . $pages . '</span></span></li>';

		if ( $paged > 2 && $paged > $range ++ && $showitems < $pages ) {
			echo "<li><a href='" . get_pagenum_link( 1 ) . "' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo "<li><a href='" . get_pagenum_link( $paged - 1 ) . "' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range ++ || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ?  "<li class='active'><span>" . $i . " <span class='sr-only'>(current)</span></span></li>" : "<li><a href='" . get_pagenum_link( $i ) . "'>" . $i . "</a></li>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<li><a href="' . get_pagenum_link( $paged + 1 ) . '"\"  aria-label="Next"><span class="hidden-xs">Next </span>&rsaquo;</a></li>';
		}

         if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) {
         	echo "<li><a href='" . get_pagenum_link( $pages ) . "' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
		}

		echo "</ul></nav>";
		echo "</div>";
	}
}

