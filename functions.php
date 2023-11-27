<?php 
// Enquesing custom CSS&JS files
function portfolioTheme_files() {
    //enqueue CSS
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css', array(), '3.8');
    wp_enqueue_style('fontAwesomeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    if(is_single()){
      wp_enqueue_style('modalCSS', get_template_directory_uri() . '/css/modal.css', array(), '3.8');
    }

    //enqueue JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 3.8, true);
    wp_enqueue_script('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js');
    wp_enqueue_script('masonryLayout', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array(), 3.8, true);

    wp_localize_script('ajaxJS', 'wpAjax',
    array('ajaxUrl' => admin_url('admin-ajax.php'))
  );
     
  wp_register_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array('jquery'), false, true);
  wp_enqueue_script('bootstrapjs');


  // Localize the script with new data
  $script_data_array = array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'security' => wp_create_nonce( 'view_post' ),
  );
  wp_localize_script( 'custom-script', 'blog', $script_data_array );
  wp_enqueue_script('custom-script');
}
add_action( 'wp_enqueue_scripts', 'portfolioTheme_files' );



// Registrating Custom Post Types
require_once('partials/post_types.php');

// Custom Taxonomies
//require_once('partials/custom-taxonomies.php');

// Removing deafult taxonomies by WordPress for Posts
//require_once('partials/remove-taxonomies.php');

// Registration of menus
require_once('partials/menu-registration.php');

// Remvoing category slugs from the URL
//require_once('partials/remove-category-slugs.php');

// Loading custom shortcodes
include('custom-shortcodes.php');




// Adding theme supports
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

// Removing editor from Pages
/** 
function remove_editor() {
    remove_post_type_support('page', 'editor');
    remove_post_type_support('post', 'editor');
  }
  add_action('admin_init', 'remove_editor'); */

// Adding custom image sizes
add_image_size( 'logo-size', 200, 60, true);
add_image_size('social-media-icons', 30, 30, true);
add_image_size('modal-thumbnail', 450, 250, true);
add_image_size('newsletter-icon', 45, 45, true);

// Enqueue Ajax scripts
function add_ajax_scripts() {
  wp_enqueue_script( 'ajax_term', get_stylesheet_directory_uri() . '/ajax/filter-ajax.js', array('jquery'), 3.8, true );
  wp_enqueue_script('ajax_modal', get_stylesheet_directory_uri() . '/ajax/modal-ajax.js', array('jquery'), 3.8, true);
  wp_enqueue_script('ajax_term_ce', get_stylesheet_directory_uri() . '/ajax/ce-ajax-filter.js', array('jquery'), 3.8, true);
	wp_localize_script( 'ajax_term', 'wpAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));	

  wp_register_script( 'scroll-to-load', get_template_directory_uri() . '/ajax/ajax-scroll-to-load.js');
  wp_enqueue_script( 'scroll-to-load' );

  wp_localize_script( 'scroll-to-load', 'ajax_posts', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'noposts' => __('No older posts found', 'twentyfifteen'),
  ));
}
add_action( 'wp_enqueue_scripts', 'add_ajax_scripts' );



// Ajax callback for category filter
require_once('ajax/ajax-callback.php');

// Ajax callback for modal pop up
require_once('ajax/modal-callback.php');

// Ajax callback for loading posts on scroll
require_once('ajax/ajax-scroll-to-load.php');

// Copywriting Examples Taxonomy filter
require_once('ajax/ce-ajax-filter.php');

add_filter('register_taxonomy_args','devvn_remove_parent_slug_category', 10, 2);
function devvn_remove_parent_slug_category($args, $name){
    if($name == 'category'){
        $args['rewrite']['hierarchical'] = false;
    }
    return $args;
}

