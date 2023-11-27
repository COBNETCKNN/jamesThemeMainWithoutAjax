<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <div class="grid lg:grid-cols-7 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1 relative z-10">
            <div class="leftSidebar">
                <!-- Logo -->
                <div class="logoWrapper">
                    <a href="<?php echo site_url(); ?>">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'logo-size' );
                            if ( has_custom_logo() ) {
                                echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
                </div>
                <!-- Categories in the sidebar -->
                <div class="categoriesSidebar flex items-center justify-start min-h-[90vh] relative">
                <div class="nonvisible categoriesSidebar_overlay z-10 absolute"></div>
                    <div class="sidebar_indicator relative z-50 h-[240px] w-[80px]">
                            <!-- Filter button -->
                            <div class="categoriesSidebar_filter">
                                <a type="button" class="categoriesSidebar_filter__button h-[30px] w-[30px] p-2 absolute top-6 left-4"></a>
                                <!-- Filter popup -->
                                <div class="nonvisible categoriesSidebar_filter__popup bg-darkBlue w-[170px] h-fit rounded-2xl">
                                    <div class="categoriesSidebar_popup__content p-4">
                                        <h4 class="categoriesSidebar_filter__heading font-avenir text-white text-lg font-bold uppercase border-b-2 border-gray-500 mb-2">Filters</h4>
                                        <?php
                                            $categories = get_categories();

                                            if (!empty($categories)) {
                                                echo '<ul>';
                                                
                                                foreach ($categories as $category) {
                                                    $category_link = get_category_link($category->term_id);
                                                    
                                                    echo '<li class="py-0.5 text-avenir font-normal text-base">
                                                    <a class="text-white category-'. $category->slug .'" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>
                                                    </li>';
                                                }

                                                echo '</ul>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Newsletter Button -->
                            <div class="newsletterModal_open categoriesSidebar_newsletter__wrapper">
                            <?php 
                                $args = array(
                                    'page_id' => 214,
                                );

                                $newsletterPageQuery = new WP_Query($args);


                                while($newsletterPageQuery->have_posts()){
                                    $newsletterPageQuery->the_post(); ?> 
                                        <!-- Newsletter image -->
                                            <div class="categoriesSidebar_newsletter__img flex justify-center">
                                            <?php
                                                $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'newsletter-icon');

                                                if ($post_thumbnail) {
                                                echo $post_thumbnail;
                                            }
                                            
                                            ?>
                                            </div>
                                            <div class="categoriesSidebar_newsletter_text font-avenir tracking-widest">
                                                <?php 
                                                    $textBelowButton = get_field('newsletter_text_below_button_in_sidebar');
                                                    echo $textBelowButton; 
                                                ?>
                                            </div>
                                    <?php } 
                                        wp_reset_postdata();
                                    ?>
                            </div>
                            <!-- Conversion Button -->
                            <div class="categoriesSidebar_conversion">
                                <!-- Conversion Button -->
                                <a type="button" class="categoriesSidebar_conversion__button h-[30px] w-[30px] p-2 absolute bottom-6 left-4"></a>
                                <!-- Conversion Popup -->
                                <div class="nonvisible categoriesSidebar_conversion__popup bg-darkBlue w-[170px] h-fit rounded-2xl">
                                    <div class="categoriesSidebar_popup__content p-4">
                                        <div class="categoriesSidebar_conversion__pages">
                                        <?php 
                                            wp_nav_menu(
                                                array(
                                                'theme_location' => 'header-menu',
                                                'container_class' => 'text-white font-bold text-lg font-avenir',
                                                )
                                            );
                                            ?>
                                        </div>
                                        <div class="categoriesSidebar_conversion__socialMedia flex justify-between items-center mt-5">
                                        <?php 
                                            $args = array(
                                                'page_id' => 44,
                                            );

                                            $socialMediaButtonsQuery = new WP_Query($args);

                                            while($socialMediaButtonsQuery->have_posts()){
                                                $socialMediaButtonsQuery->the_post(); ?>

                                            <?php 
                                            // Check rows exists.
                                            if( have_rows('social_media_buttons') ):

                                                // Loop through rows.
                                                while( have_rows('social_media_buttons') ) : the_row();

                                                    // Load sub field value.
                                                    $socialMediaImage = get_sub_field('social_media_icon');
                                                    $socialMediaLink = get_sub_field('social_media_link');

                                                    echo "<a href='".$socialMediaLink."'>";
                                                    echo wp_get_attachment_image( $socialMediaImage, 'social-media-icons' ); 
                                                    echo "</a>";
                                                    ?>
                                                        
                                                    <?php
                                                endwhile;
                                            endif;

                                            ?>
                                            <?php } 
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <!-- "Join the newsletter" button in header -->
        <div class="md:col-span-5 lg:col-span-6">
            <div class="hidden md:grid gap-4 h-20 flex justify-end">
                <button class="newsletterModal_open newsletterRedirect_wrapper h-[75px] w-[324px]">
                </button>
            </div>
            <!-- Blog posts -->
            <div id="response"  class="ajax-posts">
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:mr-5 mx-6 lg:mx-4 lg:mx-0">
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
    <!-- Content Modal -->
    <div id="modal" class="modal relative">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div class="modalClose_wrapper p-2 md:hidden absolute z-10 top-2 right-3">
            <a href="#!" class="modalPost_close">
                <i class="fa-solid fa-x text-lg text-white text-2xl"></i>
            </a>
        </div>
        <div class="modal-content">
            <div id="modal-content-placeholder"></div>
            
        </div>
    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>
    <!-- Mobile categories -->
    <div class="mobileCategories_wrapper hidden w-full h-fit bg-white absolute bottom-0 right-0">
    <div class="">
    <a href="#" class="close_mobileCategories__wrapper absolute top-6 right-5">
        <i class="fa-solid fa-x text-2xl text-black"></i>
    </a>
    </div>
    <div class="customTaxonomyWrapper mb-6">
        <div class="categoriesSidebar">
            <?php
                $parent_cats = get_categories(array('parent' => 0));
            ?>
            <?php if( ! empty( $parent_cats ) ) :
            
            foreach( $parent_cats as $parent_cat ) :
                $child_cats = get_categories(array('parent' => $parent_cat->term_id));
            ?>

                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic"><?php echo $parent_cat->name; ?></h3>

                    <?php if( $child_cats ) : ?>

                        <ul class="child-cats flex flex-wrap pt-1 mb-3">

                            <?php 

                            foreach( $child_cats as $child_cat ) :

                            $subcategory_link = get_category_link($child_cat->term_id);
                            ?>

                                <li class="py-2">

                                    <a href="<?php echo $subcategory_link; ?>" class="w-fit block py-1 px-3 mr-4 font-medium font-avenir shadow-md <?php echo 'subCategory' . '-' . $child_cat->slug?>"><?php echo $child_cat->name; ?></a>
                                        
                                </li>

                            <?php endforeach; ?>
                            
                        </ul>

                    <?php endif; ?>

                <?php endforeach; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>