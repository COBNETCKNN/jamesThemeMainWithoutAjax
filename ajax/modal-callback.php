<?php 

function get_post_content() {
    $post_id = $_POST['post_id'];
    $post_slug = $_POST['post_slug'];

    $args = array(
        'p' => $post_id,
        'post_type' => 'post',
    );

    $singlePostQuery = new WP_Query($args);

    if ($singlePostQuery->have_posts()) {
        while ($singlePostQuery->have_posts()) {
            $singlePostQuery->the_post(); 
            $thumb = get_the_post_thumbnail_url();
            ?>
            <div class="modalPost_wrapper mx-auto">
                <!-- Thumbnail section of modal tablet and desktop -->
                <div class="relative modalPost_thumbnail__wrapper flex justify-center">
                    <div class="hidden md:block modalPost_thumbnail__blured" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')"></div>
                    <div class="modalPost_thumbnail relative mx-auto">
                        <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'modal-thumbnail', array( 'class' => 'pb-5 mx-auto modal_post__thumbnail') );
                                }
                            ?>
                            <h1 class="blogPostCard_title__modal text-2xl font-sans text-white font-bold text-center"><?php the_title(); ?></h1>
                            <div class="">
                                <?php
                                    $taxonomy_names = array('acquisition', 'conversion', 'more');

                                    foreach ($taxonomy_names as $taxonomy_name) {
                                        $terms = get_the_terms(get_the_ID(), $taxonomy_name);

                                        if ($terms && !is_wp_error($terms)) {
                                            $term_links = array();
                                            foreach ($terms as $term) { ?>
                                                <span class="blogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 md:bottom-8 right-4 font-medium item-<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
                                            
                                            <?php }
                                            echo implode(', ', $term_links);
                                            echo '</p>';
                                        }
                                    }
                                ?>
                                <!-- Reading time -->
                                <div class="blogPost_readingTime__wrapper">
                                    <?php 
                                    $readingTime = get_field('reading_time');
                                    ?>
                                    <div class="blogPost_readingTime text-white text-avenir absolute bottom-8 left-4">
                                        <i class="fa-regular fa-lightbulb"></i>
                                        <span><?php echo $readingTime; ?></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Mobile thumbnail -->
                <div class="md:hidden relative mobileThumbnail_wrapper h-[200px] w-full" style="background-image: url('<?php echo $thumb;?>')">
                    <h1 class="blogPostCard_title__modal text-2xl font-sans text-white font-bold text-center"><?php the_title(); ?></h1>
                    <div class="">
                        <?php
                            $taxonomy_names = array('acquisition', 'conversion', 'more');

                            foreach ($taxonomy_names as $taxonomy_name) {
                                $terms = get_the_terms(get_the_ID(), $taxonomy_name);

                                if ($terms && !is_wp_error($terms)) {
                                    $term_links = array();
                                    foreach ($terms as $term) { ?>
                                        <span class="blogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 md:bottom-8 right-4 font-medium item-<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
                                    
                                    <?php }
                                    echo implode(', ', $term_links);
                                    echo '</p>';
                                }
                            }
                        ?>
                        <!-- Reading time -->
                        <div class="blogPost_readingTime__wrapper">
                            <?php 
                            $readingTime = get_field('reading_time');
                            ?>
                            <div class="blogPost_readingTime text-white text-avenir absolute bottom-4 left-4">
                                <i class="fa-regular fa-lightbulb"></i>
                                <span><?php echo $readingTime; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section of modal -->
                <div class="modal_contentArea__wrapper lg:px-20 py-10">
                    <?php 
                        echo the_content();
                    ?>
                <div class="modalContent_author py-5">
                    <span class="font-avenirLegit font-normal text-lg text-avenir italic">- <?php echo get_the_author(); ?></span>
                </div>
                </div>
            </div>
            <!-- Social media sharing icons -->
            <?php get_template_part('partials/social', 'share'); ?>
            <?php 
        }
    } else {
        // No posts found
        echo 'No posts found';
    }
    wp_die();

}
add_action('wp_ajax_get_post_content', 'get_post_content');
add_action('wp_ajax_nopriv_get_post_content', 'get_post_content');