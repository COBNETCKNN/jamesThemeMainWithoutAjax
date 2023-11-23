<?php 
// Creating of Custom Post Types
function james_theme_post_types() {

    // Copywriting Examples post type
    register_post_type('program', array(
        'public' => true,
        'labels' => array( 
            'name' => 'Copywriting Examples',
            'add_new_item' => 'Add New Copywriting Example',
            'edit_item' => 'Edit Copywriting Example',
            'all_items' => 'All Copywriting Examples',
            'singular_name' => 'Copywriting Example',
        ),
        'menu_icon' => 'dashicons-edit-large',
        'rewrite' => array('slug' => 'inspirations'),
        'has_archive' => true,
        'supports' => array('editor', 'thumbnail', 'title'),
        'taxonomies' => array( 'category' ),
        'show_in_rest' => true,
    ));

    // Ads post type
    register_post_type('ads', array(
        'public' => true,
        'labels' => array( 
            'name' => 'Ads',
            'add_new_item' => 'Add New Ad',
            'edit_item' => 'Edit Ad',
            'all_items' => 'All Ads',
            'singular_name' => 'Ad',
        ),
        'menu_icon' => 'dashicons-money-alt',
        'rewrite' => array('slug' => 'ads'),
        'has_archive' => true,
        'supports' => array('title'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'james_theme_post_types');