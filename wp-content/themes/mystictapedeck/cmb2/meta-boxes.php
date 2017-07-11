<?php

add_action( 'cmb2_admin_init', 'cmb2_timeline_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_timeline_metaboxes() {
  $prefix = '_timeline_';

  /**
   * Initiate the metabox
   */
  $tldata = new_cmb2_box( array(
    'id'            => 'timeline_data',
    'title'         => __( 'Timeline Data', 'tldata' ),
    'object_types'  => array( 'post', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
    'show_in_rest' => true,
  ) );

  $tldata->add_field( array(
    'name'       => __( 'Timeline Year', 'tldata' ),
    'desc'       => __( 'The year this event took place', 'tldata' ),
    'id'         => $prefix . 'year',
    'type'       => 'text',
    'show_in_rest' => true,
  ) );

  $tldata->add_field( array(
    'name'    => __( 'Timeline Description', 'tldata' ),
    'desc'    => 'timeline description text',
    'id'      => $prefix . 'desc',
    'type'    => 'wysiwyg',
    'show_in_rest' => true,
    'options' => array(),
  ) );
}

add_action( 'cmb2_init', 'cmb2_timeline_metaboxes' );
