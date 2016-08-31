<?php

function krux_taxonomy() {
  register_taxonomy(
    'krux_categories',  //The name of the taxonomy.
    'krux',        //post type name
    array(
      'hierarchical' => true,
      'label' => 'Krux Categories',
      'query_var' => true,
      'rewrite' => array(
        'slug' => 'kruxs',
        'with_front' => false
      )
    )
  );
}
add_action( 'init', 'krux_taxonomy');
