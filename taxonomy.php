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
                <!-- Custom Taxonomies -->
                <!-- Acquisition Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Acquisition</h3>
                    <div class="customTaxonomyTerms w-full xl:w-9/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter flex flex-wrap py-1" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'acquisition' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button"  data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?= $term->taxonomy?>" 
                                            data-taxonomy="<?= $term->taxonomy?>"  data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-3 mr-4 font-light text-sm shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="<?= $term->taxonomy . '/' . $term->slug ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- Conversion Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper my-6">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Conversion</h3>
                    <div class="customTaxonomyTerms w-full xl:w-8/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'conversion' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button" data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?=$term->taxonomy?>" 
                                            data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-3 font-light text-sm shadow-md conversionBackgroundItem-<?php echo $i; ?>" href="<?= $term->taxonomy . '/' . $term->slug ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- More Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper my-6">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">More</h3>
                    <div class="customTaxonomyTerms w-full xl:w-10/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter flex flex-wrap py-1" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'more' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button" data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?=$term->taxonomy?>" 
                                            data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-3 mr-4 font-light text-sm shadow-md moreBackgroundItem-<?php echo $i; ?>" href="<?= $term->taxonomy . '/' . $term->slug ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
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
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1 ml-0 md:ml-3 xl:-ml-6">
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

                                <?php $post_id = get_the_ID(); ?>

                                <div class="blogCardBlackOverlay post-<?php echo $post_id; ?>">
                                    <div class="col-span-1">
                                    <?php 
                                        $thumb = get_the_post_thumbnail_url(); 
                                        
                                    ?>
                                        <div class="relative blogPostCard rounded-xl" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
                                        <h1 class="blogPostCard_title font-sans text-white font-bold text-start"><?php the_title(); ?></h1>
                                        <!-- Gettng custom taxonomies associate with teh post -->
                                        <?php
                                            $taxonomy_names = array('acquisition', 'conversion', 'more');

                                            foreach ($taxonomy_names as $taxonomy_name) {
                                                $terms = get_the_terms(get_the_ID(), $taxonomy_name);

                                                if ($terms && !is_wp_error($terms)) {
                                                    $term_links = array();
                                                    foreach ($terms as $term) { ?>
                                                        <span class="blogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 right-4 font-medium item-<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
                                                    
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
                                        <a href="<?php the_permalink(); ?>" type="button" class="view-post" data-postid="<?php the_ID(); ?>" data-slug="<?php echo get_post_field('post_name', $post_id); ?>"></a>
                                        </div>
                                    </div>
                                </div>
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
        <div class="modalClose_wrapper p-2 md:hidden absolute z-10 top-5 right-3">
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
    <div class="customTaxonomyWrapper my-6">
        <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Acquisition</h3>
        <div class="customTaxonomyTerms font-avenir">
            <ul class="categories-filter flex flex-wrap" name="categoryfilter">
                <?php
                if( $terms = get_terms( array( 
                    'taxonomy' => 'acquisition' ) ) ) : 

                    $i = 0;
                    foreach ( $terms as $term ) :
                    
                    ?>
                    <li class="py-2 mx-2">
                        <a type="button"  data-category="<?= $term->term_id; ?>" 
                            data-posttype="<?= $term->taxonomy?>" 
                                data-taxonomy="<?= $term->taxonomy?>"  data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                            <?= $term->name; ?>
                    </a>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; endif; ?>
                
            </ul>
        </div>
    </div>
    <!-- Conversion Custom Taxonomy Sidebar -->
    <div class="customTaxonomyWrapper my-6">
        <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Conversion</h3>
        <div class="customTaxonomyTerms font-avenir">
            <ul class="categories-filter flex flex-wrap" name="categoryfilter">
                <?php
                if( $terms = get_terms( array( 
                    'taxonomy' => 'conversion' ) ) ) : 

                    $i = 0;
                    foreach ( $terms as $term ) :
                    
                    ?>
                    <li class="py-2 mx-2">
                        <a type="button" data-category="<?= $term->term_id; ?>" 
                            data-posttype="<?=$term->taxonomy?>" 
                                data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md conversionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                            <?= $term->name; ?>
                    </a>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; endif; ?>
                
            </ul>
        </div>
    </div>
    <!-- More Custom Taxonomy Sidebar -->
    <div class="customTaxonomyWrapper my-6">
        <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">More</h3>
        <div class="customTaxonomyTerms font-avenir">
            <ul class="categories-filter flex flex-wrap" name="categoryfilter">
                <?php
                if( $terms = get_terms( array( 
                    'taxonomy' => 'more' ) ) ) : 

                    $i = 0;
                    foreach ( $terms as $term ) :
                    
                    ?>
                    <li class="py-2 mx-2">
                        <a type="button" data-category="<?= $term->term_id; ?>" 
                            data-posttype="<?=$term->taxonomy?>" 
                                data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md moreBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                            <?= $term->name; ?>
                    </a>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; endif; ?>
                
            </ul>
        </div>
    </div>

    </div>
</div>

<?php get_footer(); ?>