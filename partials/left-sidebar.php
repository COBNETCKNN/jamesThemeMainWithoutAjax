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
                                        
                                        echo '<li class="py-0.5 text-avenir font-avenir text-base">
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
                        $newsletterPageQuery->the_post(); 
                        
                        $image = get_field('newsletter_hover_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        ?> 
                            <!-- Newsletter image -->
                                <div class="categoriesSidebar_newsletter__img flex justify-center">
                                    <div class="newsletter_image">
                                        <?php
                                            the_post_thumbnail( 'thumbnail' );
                                        ?>
                                    </div>
                                    <div class="newsletter_image__hover nonvisible">
                                       <?php echo wp_get_attachment_image( $image, $size ); ?>
                                    </div>


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
                        <div class="categoriesSidebar_popup__content p-3">
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