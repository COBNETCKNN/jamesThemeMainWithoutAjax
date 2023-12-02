<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <div class="grid lg:grid-cols-10 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1 relative z-10">
            <?php get_template_part('partials/left', 'sidebar'); ?>
        </div>
        <!-- RIGHT SIDE -->
        <!-- "Join the newsletter" button in header -->
        <div class="md:col-span-5 lg:col-span-9">
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
                <div class="blogPostsWrapper mt-5 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 lg:mr-10">
                                <?php 
                                    $i = 1;
                                    // The Loop
                                    if (have_posts()) :
                                        while (have_posts()) :
                                            the_post();
                                    
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

                                        <?php get_template_part('partials/post', 'card'); ?>
                                        <?php
                                        $i++;
                                    
                                endwhile;
                                endif;
                            wp_reset_postdata();
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>
    <!-- Mobile categories -->
    <div class="mobileCategories_wrapper hidden w-full h-fit bg-darkBlue absolute bottom-0 right-0">
    <div class="">
    <a href="#" class="close_mobileCategories__wrapper absolute top-6 right-5 py-1.5 px-2">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
            <g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>
        </svg>
    </a>
    </div>
    <div class="customTaxonomyWrapper mb-6">
        <div class="categoriesSidebar_popup__content p-4">
            <h4 class="categoriesSidebar_filter__heading font-avenir text-white text-2xl font-bold uppercase border-b-2 border-gray-500 mb-2 w-[85%]">Filters</h4>
            <?php
                $categories = get_categories();

                if (!empty($categories)) {
                    echo '<ul class="grid grid-cols-2 gap-5 mt-10">';
                    
                    foreach ($categories as $category) {
                        $category_link = get_category_link($category->term_id);
                        
                        echo '<li class="py-0.5 text-avenir font-bold text-base p-5">
                        <a class="text-white font-avenir category-'. $category->slug .'" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>
                        </li>';
                    }

                    echo '</ul>';
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>