<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <?php
        $previousLink = wp_get_referer();
    ?>
    <a href="
    <?php if (!$previousLink){
        echo home_url();
    }else {
        echo $previousLink;
    } ?>
    " class="modalRedirect_close__button cursor-pointer">
        <i class="singleBlogPost_closing__icon fa-solid fa-x absolute text-white top-24 lg:top-12 xl:top-8 right-8 text-2xl z-50"></i>
    </a>
    <div class="grid lg:grid-cols-7 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1 relative z-10">
            <?php get_template_part('partials/left', 'sidebar'); ?>
        </div>
        <!-- RIGHT SIDE -->
        <!-- "Join the newsletter" button in header -->
        <div class="md:col-span-5 lg:col-span-6">
            <div class="flex justify-end items-top h-20">
                <div class="">
                    <button class="newsletterModal_open newsletterRedirect_wrapper h-[47px] w-[130px]"></button>
                </div>
                <div class="newsletterModal_open newsletterNavbar_content__wrapper h-[47px] flex justify-center items-center">
                <?php 
                $args = array(
                    'page_id' => 214,
                );

                $newsletterPageQuery = new WP_Query($args);


                while($newsletterPageQuery->have_posts()){
                    $newsletterPageQuery->the_post(); ?> 
                            <span class="text-white uppercase text-base font-bold px-5"><?php the_title(); ?></span>
                <?php }
                wp_reset_postdata();
                ?>

                </div>
            </div>
            <!-- Blog posts -->
            <div id="response"  class="ajax-posts">
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:mr-10">
                        <?php 
                            $i = 1;
                                $args = array(
                                    'post_type' => 'post', // Specify the post type (e.g., 'post', 'page', etc.)
                                    'posts_per_page' => -1, // Set to -1 to retrieve all posts
                                    'post_status' => 'publish', // Retrieve only published posts
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                            
                                // display add after certain number of posts 
                                if($i == 3) {
                                    get_template_part('partials/ads', 'post'); 
                                }

                                if($i == 8) {
                                get_template_part('partials/ads', 'post'); 
                                }

                                if($i == 13) {
                                    get_template_part('partials/ads', 'post'); 
                                }
                                ?>

                                <?php $post_id = get_the_ID(); ?>
                            <!-- Associated subcateegory to the post -->
                            <?php
                                $count = 0;
                                $postCategories = get_the_category();
                                $subcategoryTerm = $postCategories[0]->name;
                                $subcategoryTermSlug = $postCategories[0]->slug;
                                $subcategoryTermID = $postCategories[0]->term_id;
                                
                            ?>
                                <div class="blogCardBlackOverlay post-<?php echo $post_id; ?> py-1 px-8 xl:px-0">
                                    <div class="col-span-1">
                                    <?php 
                                        $thumb = get_the_post_thumbnail_url(); 
                                    ?>
                                        <div class="relative blogPostCard blogPostCard-<?php echo $subcategoryTermSlug ?>" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
                                        <h6 class="blogPostCard_title text-avenir font-avenir text-white font-bold text-start"><?php the_title(); ?></h6>



                                        <span class="blogCard_taxonomy__item px-7 text-sm bg-white text-avenir font-avenir absolute bottom-4 -right-2 font-medium uppercase"><?php echo $subcategoryTerm; ?></span>
                                        <!-- Reading time -->
                                        <div class="blogPost_readingTime__wrapper">
                                            <?php 
                                            $readingTime = get_field('reading_time');
                                            ?>
                                            <div class="blogPost_readingTime text-white text-avenir font-avenir absolute bottom-1 left-4">
                                                <i class="fa-solid fa-book-open"></i>
                                                <span><?php echo $readingTime; ?></span>
                                            </div>
                                        </div>
                                        <!-- Reddirect icon -->
                                        <div class="blogPost_redirect__icon blogPost_redirect__icon-<?php echo $subcategoryTermSlug ?> p-4 bg-white absolute -top-7 -right-7">
                                            <i class="fa-solid fa-arrow-right text-black text-3xl font-light"></i>
                                        </div>
                                        <a href="<?php echo home_url() . '/' . get_post_field('post_name', $post_id); ?>" type="button" class="frontPage-view-post" data-postid="<?php the_ID(); ?>" data-slug="<?php echo get_post_field('post_name', $post_id); ?>"></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            
                                    }
                                }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="
        <?php if (!$previousLink){
            echo home_url();
        }else {
            echo $previousLink;
        } ?>
    " class="modalRedirect bg-transparent"></a>
    <div class="singleModal visible">
        <div class="modalClose_wrapper p-2 md:hidden absolute z-10 top-5 right-3">
            <a href="       
                <?php if (!$previousLink){
                    echo home_url();
                }else {
                    echo $previousLink;
                } ?>
            " class="modalPost_close">
                <i class="fa-solid fa-x text-lg text-white text-2xl"></i>
            </a>
        </div>
        <div class="singleModal_content">
            <?php $thumb = get_the_post_thumbnail_url(); ?>
            <div class="modalPost_wrapper mx-auto">
                <!-- Thumbnail section of modal -->
                <div class="relative modalPost_thumbnail__wrapper flex justify-center">
                    <div class="relative modalPost_thumbnail mx-auto">
                        <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'single-thumbnail');
                                }
                            ?>
                            <h1 class="blogPostCard_title__modal text-2xl font-sans text-white font-bold text-center"><?php the_title(); ?></h1>

                                <!-- Associated subcateegory to the post -->
                                <?php
                                    $count = 0;
                                    $postCategories = get_the_category();
                                    $subcategoryTerm = $postCategories[0]->name;
                                    $subcategoryTermSlug = $postCategories[0]->slug;
                                    $subcategoryTermID = $postCategories[0]->term_id;
                                    
                                ?>
                                <span class="blogCard_taxonomy__item px-7 text-sm bg-white text-avenir font-avenir absolute bottom-5 -right-2 font-medium uppercase blogCard_taxonomy__<?php echo $subcategoryTermSlug; ?>"><?php echo $subcategoryTerm; ?></span>

                                <!-- Reading time -->
                                <div class="blogPost_readingTime__wrapper">
                                    <?php 
                                    $readingTime = get_field('reading_time');
                                    ?>
                                    <div class="blogPost_readingTime text-white text-avenir absolute bottom-4 left-8">
                                        <i class="fa-solid fa-book-open"></i>
                                        <span><?php echo $readingTime; ?></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Mobile thumbnail -->
                <div class="md:hidden relative mobileThumbnail_wrapper h-[200px] w-full" style="background-image: url('<?php echo $thumb;?>')">
                    <div class="flex flex-wrap">
                        <span class="blogPostCard_title__modal_single text-2xl font-sans text-white font-bold text-center"><?php the_title(); ?></span>
                    </div>
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
                                <i class="fa-solid fa-book-open"></i>
                                <span><?php echo $readingTime; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section of modal -->
                <div class="modal_contentArea__wrapper lg:px-20 py-10 font-avenir">
                        <?php 
                            echo the_content();
                        ?>
                    <div class="modalContent_author py-5">
                        <span class="font-avenirLegit font-normal text-lg text-avenir italic">- <?php echo get_the_author(); ?></span>
                    </div>
                </div>
                <!-- Social media sharing icons -->
                <?php get_template_part('partials/social', 'share'); ?>
            </div>
        </div>

    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>
    <!-- Mobile categories -->
    <div class="mobileCategories_wrapper hidden w-full h-fit bg-darkBlue absolute bottom-0 right-0">
    <div class="">
    <a href="#" class="close_mobileCategories__wrapper absolute top-6 right-5 py-1 px-2">
        <i class="fa-solid fa-x text-2xl text-white"></i>
    </a>
    </div>
        <div class="customTaxonomyWrapper mb-6">
            <div class="categoriesSidebar_popup__content p-4">
                <h5 class="categoriesSidebar_filter__heading font-avenir text-white text-2xl font-bold uppercase border-b-2 border-gray-500 mb-2 w-[85%]">Filters</h5>
                <?php
                    $categories = get_categories();

                    if (!empty($categories)) {
                        echo '<ul class="grid grid-cols-2 gap-5 mt-10">';
                        
                        foreach ($categories as $category) {
                            $category_link = get_category_link($category->term_id);
                            
                            echo '<li class="py-0.5 text-avenir font-bold text-xl p-5">
                            <a class="text-white category-'. $category->slug .'" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>
                            </li>';
                        }

                        echo '</ul>';
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>