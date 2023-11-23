<?php
// =============================================================
// AJAX CALLBACK FOR ACQUISITION TAXONOMY
// =============================================================

add_action('wp_ajax_nopriv_filterterm', 'filter_ajax_term');
add_action('wp_ajax_filterterm', 'filter_ajax_term');

function filter_ajax_term(){

	$category = $_POST['category'];

	$args = array(
		'post_type' => $_POST['post'], 
		'posts_per_page' => -1, 
		'orderby'	=> 'NAME', 
		'order' => 'DSC'
	);

	if ($category !== null && isset($category) && $category !== '' && !empty($category)) {
		$args['tax_query'] = 
			array( 
				array( 
						'taxonomy' => $_POST['taxonomy'], 
						'field' => 'id', 
						'terms' => array((int)$category) 
					) 
			); 
	} else {
		$all_terms = get_terms(array('taxonomy' => 'acquisition', 'fields' => 'slugs'));
		$args['tax_query'][] = [
			'taxonomy' => 'acquisition',
			'field'    => 'slug',
			'terms'    => $all_terms
		];
	}


	$the_query = new WP_Query( $args ); ?>
	
    <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1 ml-0 md:ml-3 xl:-ml-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:mr-5 mx-4 lg:mx-0">

            <?php if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php get_template_part( 'partials/blog', 'card' ); ?>
        
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php

	die();
}

?>