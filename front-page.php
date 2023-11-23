<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <a class="modalRedirect_close__button cursor-pointer hidden">
        <i class="fa-solid fa-x absolute md:top-24 lg:top-12 xl:top-8 right-10 text-2xl z-50"></i>
    </a>
    <a class="modalRedirect hidden">
    </a>
    <div class="grid lg:grid-cols-6 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1">
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

                                <ul class="child-cats flex flex-wrap w-10/12 border-solid border-2 border-gray-100 rounded-lg shadow-md py-1">

                                    <?php 

                                    foreach( $child_cats as $child_cat ) :

                                    $subcategory_link = get_category_link($child_cat->term_id);
                                    ?>

                                        <li class="py-2">

                                            <a href="<?php echo $subcategory_link; ?>" class="w-fit block py-1 px-3 mr-3 font-medium font-avenir shadow-md <?php echo 'subCategory' . '-' . $child_cat->slug?>"><?php echo $child_cat->name; ?></a>
                                                
                                        </li>

                                    <?php endforeach; ?>
                                    
                                </ul>

                            <?php endif; ?>

                        <?php endforeach; endif; ?>
                </div>
                <!-- Newsletter Sidebar -->
                <?php get_template_part( 'partials/newsletter', 'sidebar' ); ?>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="md:col-span-5 lg:col-span-5">
            <div class="hidden md:grid md:grid-cols-1 xl:grid-cols-2 gap-4 h-20">
                <!-- Newsletter area -->
                <div class="flex justify-start items-center hidden xl:flex">
                <?php 
                    $shortcode = get_field('newsletter_shortcode', 214);
                    echo do_shortcode($shortcode);
                ?>
                </div>
                <!-- Pages and Social Media -->
                <div class="flex md:justify-end xl:justify-between items-center">
                    <div class="menuItems">
                        <?php 
                        wp_nav_menu(
                            array(
                            'theme_location' => 'header-menu',
                            'container_class' => 'headerMenuWrapper font-avenir font-medium md:text-sm lg:text-base tracking-wide italic',
                            )
                        );
                        ?>
                    </div>
                    <div class="socialMediaIcons flex justify-center items-center mr-3">
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
            <!-- Blog posts -->
            <div id="response"  class="ajax-posts">
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:mr-5 mx-4 lg:mx-0">
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