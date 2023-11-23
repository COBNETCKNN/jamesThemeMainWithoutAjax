<?php 

function remove_category_taxonomy() {
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'remove_category_taxonomy' );