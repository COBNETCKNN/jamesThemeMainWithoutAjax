<?php
// =============================================================
// AJAX CALLBACK FOR ACQUISITION TAXONOMY
// =============================================================

add_action('wp_ajax_nopriv_filtertermce', 'ce_filter_ajax_term');
add_action('wp_ajax_filtertermce', 'ce_filter_ajax_term');

function ce_filter_ajax_term(){ 

	$catSlug = $_POST['category'];

	$ajaxposts = new WP_Query([
	  'post_type' => 'program',
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	]); ?>

		<div class="examplesPosts_wrapper md:mt-10">
			<div class="examplePosts_grid mx-3 md:mx-0">

            <?php if ( $ajaxposts->have_posts() ) : 
                while ( $ajaxposts->have_posts() ) : $ajaxposts->the_post(); ?>

				<div class="imageContent relative grid-item examplesPost_post__wrapper block h-auto max-w-full">
					<?php $thumb = get_the_post_thumbnail_url(); ?> 
					<img src="<?php echo $thumb; ?>" alt="">
					<div class="imageContent_layer text-center px-5">
						<?php the_content(); ?>
					</div>  
					<!-- Link -->
					<?php $copywritingExamplesLink = get_field('copywriting_examples_link'); ?>
					<a class="imageContent_link" target=”_blank” href="<?php echo $copywritingExamplesLink; ?>">
					<i class="fa-solid fa-link"></i>
					</a>
				</div>
        
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php

	die();
}

?>