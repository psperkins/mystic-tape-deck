<?php

/**
 * Define the metabox and field configurations.
 */

function cmb2_teaser_metaboxes() {
  $prefix = '_mtdt_';

  $mtdtdata = new_cmb2_box( array(
    'id'            => 'mtdtdata',
    'title'         => __( 'MTD Teaser Data', 'mtdtdata' ),
    'object_types'  => array( 'teaser', ), // Post type
    'context'       => 'side',
    'priority'      => 'high',
    'show_names'    => true,
    'show_in_rest' => false,
  ) );

  $mtdtdata->add_field( array(
    'name'       => __( 'Links To', 'mtdtdata' ),
    'desc'       => __( 'Where does this teaser link to', 'mtdtdata' ),
    'id'         => $prefix . 'teaser_link',
    'type'       => 'text_medium',
    'show_in_rest' => false,
  ) );
}

function cmb2_song_metaboxes() {
  $prefix = '_song_';

  $songdata = new_cmb2_box( array(
    'id'            => 'songdata',
    'title'         => __( 'MTD Song Data', 'songdata' ),
    'object_types'  => array( 'song', ), // Post type
    'context'       => 'side',
    'priority'      => 'high',
    'show_names'    => true,
    'show_in_rest' => false,
  ) );

  $songdata->add_field( array(
    'name'       => __( 'BandCamp', 'songdata' ),
    'desc'       => __( 'BandCamp Link', 'songdata' ),
    'id'         => $prefix . 'bandcamp_link',
    'type'       => 'text_medium',
    'show_in_rest' => false,
  ) );

  $songdata->add_field( array(
    'name'       => __( 'Drooble', 'songdata' ),
    'desc'       => __( 'Drooble Link', 'songdata' ),
    'id'         => $prefix . 'drooble_link',
    'type'       => 'text_medium',
    'show_in_rest' => false,
  ) );

  $songdata->add_field( array(
    'name'       => __( 'Musicoin', 'songdata' ),
    'desc'       => __( 'Musicoin Link', 'songdata' ),
    'id'         => $prefix . 'musicoin_link',
    'type'       => 'text_medium',
    'show_in_rest' => false,
  ) );

  $songdata->add_field( array(
    'name'       => __( 'ReverbNation', 'songdata' ),
    'desc'       => __( 'Reverb Nation Link', 'songdata' ),
    'id'         => $prefix . 'reverbnation_link',
    'type'       => 'text_medium',
    'show_in_rest' => false,
  ) );
}

function cmb2_attach_posts_field() {

  $prefix = 'related_';

  $song_meta = new_cmb2_box( array(
    'id'           => 'attached_posts',
    'title'        => __( 'Attached Posts', 'mtd' ),
    'object_types' => array( 'song', 'glossary', 'post'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => false, // Show field names on the left
  ) );

  $song_meta->add_field( array(
    'name'    => __( 'Attached Posts', 'mtd' ),
    'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'mtd' ),
    'id'      => $prefix . 'attached_posts',
    'type'    => 'custom_attached_posts',
    'column'  => true,
    'options' => array(
      'show_thumbnails' => true,
      'filter_boxes'    => true,
      'query_args'      => array(
        'posts_per_page' => 20,
        'post_type'      => 'post',
      ),
    ),
  ) );
}

function cmb2_attach_songs_field() {

  $prefix = 'related_song_';

  $song_meta = new_cmb2_box( array(
    'id'           => 'attached_songs',
    'title'        => __( 'Attached Songs', 'mtd' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => false, // Show field names on the left
  ) );

  $song_meta->add_field( array(
    'name'    => __( 'Attached Song', 'mtd' ),
    'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'mtd' ),
    'id'      => $prefix . 'attached_songs',
    'type'    => 'custom_attached_posts',
    'column'  => true,
    'options' => array(
      'show_thumbnails' => true,
      'filter_boxes'    => true,
      'query_args'      => array(
        'posts_per_page' => 20,
        'post_type'      => 'song',
      ),
    ),
  ) );
}

add_action( 'cmb2_init', 'cmb2_attach_songs_field' );
add_action( 'cmb2_init', 'cmb2_attach_posts_field' );
add_action( 'cmb2_init', 'cmb2_teaser_metaboxes' );
add_action( 'cmb2_init', 'cmb2_song_metaboxes' );
