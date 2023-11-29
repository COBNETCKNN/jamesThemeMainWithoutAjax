<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <div class="grid lg:grid-cols-7 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1 relative z-10">
            <?php get_template_part('partials/left', 'sidebar'); ?>
        </div>
        <!-- RIGHT SIDE -->
        <div class="md:col-span-5 lg:col-span-6">
            <div class="hidden md:grid gap-4 h-20 flex justify-end">
                <button class="newsletterModal_open newsletterRedirect_wrapper h-[75px] w-[324px]"></button>
            </div>
            <!-- Blog posts -->
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:mr-10">
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
                <h4 class="categoriesSidebar_filter__heading font-avenir text-white text-2xl font-bold uppercase border-b-2 border-gray-500 mb-2 w-[85%]">Filters</h4>
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