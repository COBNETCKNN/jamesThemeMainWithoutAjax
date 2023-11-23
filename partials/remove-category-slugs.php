<?php 

// Remove category base
add_filter('category_link', 'no_category_parents',1000,2);
function no_category_parents($catlink, $category_id) {
    $category = &get_category( $category_id );
    if ( is_wp_error( $category ) )
        return $category;
    $category_nicename = $category->slug;

    $catlink = trailingslashit(get_option( 'home' )) . user_trailingslashit( $category_nicename, 'category' );
    return $catlink;
}

add_filter('register_taxonomy_args','devvn_remove_parent_slug_category', 10, 2);
function devvn_remove_parent_slug_category($args, $name){
    if($name == 'category'){
        $args['rewrite']['hierarchical'] = false;
    }
    return $args;
}