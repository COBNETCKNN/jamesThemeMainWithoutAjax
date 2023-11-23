<?php 

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    // Add new "Acquisition" taxonomy to Posts
    register_taxonomy('acquisition', 'post', array(
      // Hierarchical taxonomy (like categories)
      'hierarchical' => true,
      'show_in_rest' => true,
      // This array of options controls the labels displayed in the WordPress Admin UI
      'labels' => array(
        'name' => _x( 'Acquisition', 'taxonomy general name' ),
        'singular_name' => _x( 'Acquisition', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Acquisitions' ),
        'all_items' => __( 'All Acquisitions' ),
        'parent_item' => __( 'Parent Acquisition' ),
        'parent_item_colon' => __( 'Parent Acquisition:' ),
        'edit_item' => __( 'Edit Acquisition' ),
        'update_item' => __( 'Update Acquisition' ),
        'add_new_item' => __( 'Add New Acquisition' ),
        'new_item_name' => __( 'New Acquisition Name' ),
        'menu_name' => __( 'Acquisition' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'acquisition', // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/locations/"
        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));

    // Add new "Conversion" taxonomy to Posts
    register_taxonomy('conversion', 'post', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        'show_in_rest' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Conversion', 'taxonomy general name' ),
            'singular_name' => _x( 'Conversion', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Conversions' ),
            'all_items' => __( 'All Conversions' ),
            'parent_item' => __( 'Parent Conversion' ),
            'parent_item_colon' => __( 'Parent Conversion:' ),
            'edit_item' => __( 'Edit Conversion' ),
            'update_item' => __( 'Update Conversion' ),
            'add_new_item' => __( 'Add New Conversion' ),
            'new_item_name' => __( 'New Conversion Name' ),
            'menu_name' => __( 'Conversion' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'conversion', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
        ));

    // Add new "More" taxonomy to Posts
    register_taxonomy('more', 'post', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        'show_in_rest' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'More', 'taxonomy general name' ),
            'singular_name' => _x( 'More', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search More' ),
            'all_items' => __( 'All More' ),
            'parent_item' => __( 'Parent More' ),
            'parent_item_colon' => __( 'Parent More:' ),
            'edit_item' => __( 'Edit More' ),
            'update_item' => __( 'Update More' ),
            'add_new_item' => __( 'Add New More' ),
            'new_item_name' => __( 'New More Name' ),
            'menu_name' => __( 'More' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'more', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );