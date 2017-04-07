<?php

wp_enqueue_style( 'mtd-stylesheet', get_stylesheet_directory_uri() . '/assets/stylesheets/mtd.css', array('main-stylesheet'), '1.0', 'all' );
wp_enqueue_script( 'mtd-js', get_stylesheet_directory_uri() . '/assets/js/mtd.js', 'jquery', '1.0', true );

remove_filter('term_description','wpautop');

function mtd_unregister_parent_sidebars() {
  unregister_sidebar('footer-widgets');
}
add_action( 'widgets_init', 'mtd_unregister_parent_sidebars', 11 );

function foundationpress_entry_meta() {
    /* translators: %1$s: current date, %2$s: current time */
    global $post;
    $blterm = wp_get_post_terms( $post->ID, 'byline' );
    echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %1$s at %2$s.', 'mystictapedeck' ), get_the_date(), get_the_time() ) . '</time>';
    echo '<p class="byline author">' . __( 'Transcribed by', 'mystictapedeck' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a> - <em>"' . term_description( $blterm[0]->term_id, 'post_tag' ) . '"</em></p>';


}

if ( ! function_exists( 'mtd_sidebars' ) ) {
  function mtd_sidebars() {
    register_sidebar( array(
      'id'            => 'mtd_front_middle',
      'class'         => 'mtd-front-middle',
      'name'          => __( 'Front Page Middle', 'mystic_tape_deck' ),
      'description'   => __( 'Front Page Middle Sidebar Area', 'mystic_tape_deck' ),
      'before_widget' => '<div id="%1$s" class="large-4 columns widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '',
      'after_title'   => '',
    ));

    register_sidebar( array(
      'id'            => 'mtd_footer_left',
      'class'         => 'mtd-footer-left',
      'name'          => __( 'Footer Left', 'mystic_tape_deck' ),
      'description'   => __( 'Footer Left Sidebar Area', 'mystic_tape_deck' ),
      'before_widget' => '<div id="%1$s" class="large-4 columns widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title">',
      'after_title'   => '</div>',
    ));

    register_sidebar( array(
      'id'            => 'mtd_footer_center',
      'class'         => 'mtd-footer-center',
      'name'          => __( 'Footer Center', 'mystic_tape_deck' ),
      'description'   => __( 'Footer Center Sidebar Area', 'mystic_tape_deck' ),
      'before_widget' => '<div id="%1$s" class="large-4 columns widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title">',
      'after_title'   => '</div>',
    ));

    register_sidebar( array(
      'id'            => 'mtd_footer_right',
      'class'         => 'mtd-footer-right',
      'name'          => __( 'Footer Right', 'mystic_tape_deck' ),
      'description'   => __( 'Footer Right Sidebar Area', 'mystic_tape_deck' ),
      'before_widget' => '<div id="%1$s" class="large-4 columns widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title">',
      'after_title'   => '</div>',
    ));
  }
  add_action( 'widgets_init', 'mtd_sidebars' );
}
