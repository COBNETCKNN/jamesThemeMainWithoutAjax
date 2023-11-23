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

                                    $subcategory_link = get_category_link($child_cat ->term_id);
                                    ?>

                                        <li class="py-2">

                                            <a href="<?php echo $subcategory_link; ?>" class="sidebar_subcategories w-fit block py-1 px-3 mr-3 font-medium font-avenir shadow-md <?php echo 'subCategory' . '-' . $child_cat->slug?>"><?php echo $child_cat->name; ?></a>
                                                
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
                <div class="flex justify-start items-center hidden xl:block">
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

                            //query to load selected featured post on front page
                            $postsPerPage = 12;
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => $postsPerPage,
                            );

                            $blogPostQuery = new WP_Query($args);

                            while($blogPostQuery->have_posts()){
                                $blogPostQuery->the_post(); ?>

                                <div class="blogCardBlackOverlay">
                                    <div class="col-span-1">
                                    <?php $thumb = get_the_post_thumbnail_url(); ?>
                                        <div class="relative blogPostCard rounded-xl" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
                                        <h4 class="blogPostCard_title font-sans text-white font-bold text-start"><?php the_title(); ?></h4>
                                        <!-- Gettng custom taxonomies associate with teh post -->
                                        <?php
                                            $taxonomy_names = array('acquisition', 'conversion', 'more');

                                            foreach ($taxonomy_names as $taxonomy_name) {
                                                $terms = get_the_terms(get_the_ID(), $taxonomy_name);

                                                if ($terms && !is_wp_error($terms)) {
                                                    $term_links = array();
                                                    foreach ($terms as $term) { ?>
                                                        <span class="singleBlogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 md:bottom-8 right-4 font-medium item-<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
                                                    
                                                    <?php }
                                                    echo implode(', ', $term_links);
                                                    echo '</p>';
                                                }
                                            }
                                        ?>
                                        <!-- Associated subcateegory to the post -->
                                        <?php
                                            $postCategories = get_the_category();
                                            $subcategoryTerm = $postCategories[0]->name;
                                            $subcategoryTermSlug = $postCategories[0]->slug;
                                        ?>
                                        <span class="singleBlogCard_taxonomy__itempy-1 px-4 text-sm rounded-2xl absolute bottom-4 right-4 font-medium subCategory-<?php echo $subcategoryTermSlug; ?>"><?php echo $subcategoryTerm; ?></span>
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
                                        <a href="#" type="button" class="view-post" data-postid="<?php the_ID(); ?>" data-slug="<?php echo get_post_field('post_name', $post_id); ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
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
            <button class="modalPost_close">
                <i class="fa-solid fa-x text-lg text-white text-2xl"></i>
            </button>
        </div>
        <div class="singleModal_content">
            <?php $thumb = get_the_post_thumbnail_url(); ?>
            <div class="modalPost_wrapper mx-auto">
                <!-- Thumbnail section of modal -->
                <div class="relative modalPost_thumbnail__wrapper flex justify-center">
                    <div class="modalPost_thumbnail__blured" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')"></div>
                    <div class="relative modalPost_thumbnail mx-auto">
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
                                                <span class="singleBlogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 md:bottom-8 right-4 font-medium item-<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>
                                            
                                            <?php }
                                            echo implode(', ', $term_links);
                                            echo '</p>';
                                        }
                                    }
                                ?>
                                <!-- Associated subcateegory to the post -->
                                <?php
                                    $postCategories = get_the_category();
                                    $subcategoryTerm = $postCategories[0]->name;
                                    $subcategoryTermSlug = $postCategories[0]->slug;
                                ?>
                                <span class="singleBlogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-8 right-4 font-medium subCategory-<?php echo $subcategoryTermSlug; ?>"><?php echo $subcategoryTerm; ?></span>
                                <!-- Reading time -->
                                <div class="blogPost_readingTime__wrapper">
                                    <?php 
                                    $readingTime = get_field('reading_time');
                                    ?>
                                    <div class="blogPost_readingTime text-white text-avenir absolute bottom-8 left-4">
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

</div>

<?php get_footer(); ?>