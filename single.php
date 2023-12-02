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
        <span class="singleBlogPost_closing__icon fa-solid fa-x absolute text-white top-24 lg:top-12 xl:top-8 right-8 text-2xl z-50">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
            <g>
                <path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/>
            </g>
        </svg>
        </span>
    </a>
    <div class="grid lg:grid-cols-10 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden lg:block md:col-span-2 lg:col-span-1 relative z-10">
            <?php get_template_part('partials/left', 'sidebar'); ?>
        </div>
        <!-- RIGHT SIDE -->
        <!-- "Join the newsletter" button in header -->
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
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
                <g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>
            </svg>
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
                                    $alt = get_the_title();
                                    the_post_thumbnail( 'single-thumbnail', array( 'alt' => $alt ));
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
                                    <div class="blogPost_readingTime text-white text-avenir absolute bottom-2 left-6 flex justify-start items-center">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2125 3.24405V9.66655C13.2125 9.78905 13.1075 9.89405 12.985 9.89405H12.9675C11.025 9.80655 9.0475 10.384 7.105 11.574C7.105 11.574 7.105 11.574 7.0875 11.574V11.5915C7.07 11.609 7.0525 11.609 7.035 11.609C7.0175 11.6265 7 11.6265 6.9825 11.6265C6.93 11.6265 6.895 11.609 6.86 11.5915C4.935 10.384 2.975 9.80655 1.0325 9.89405C0.91 9.91155 0.77 9.80655 0.77 9.66655V3.24405H0V10.839C2.3275 10.8565 4.69 11.4165 7.0175 12.5365C9.3275 11.4165 11.6725 10.8215 14 10.8215V3.24405H13.2125Z" fill="white"/>
                                        <path d="M6.7726 10.9965V3.64654C4.9351 2.52654 3.0626 1.96655 1.2251 2.00155V9.43905H1.3826C3.1676 9.43905 4.9876 9.94655 6.7726 10.9965Z" fill="white"/>
                                        <path d="M12.775 2.00155C10.955 1.96655 9.06504 2.52654 7.22754 3.64654V11.014C9.06504 9.94655 10.9375 9.42155 12.775 9.45655V2.00155Z" fill="white"/>
                                    </svg>
                                        <span class="ml-2"><?php echo $readingTime; ?></span>
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
                        <span class="blogCard_taxonomy__item px-7 text-sm bg-white text-avenir font-avenir absolute bottom-5 -right-2 font-medium uppercase blogCard_taxonomy__<?php echo $subcategoryTermSlug; ?>"><?php echo $subcategoryTerm; ?></span>
                        <!-- Reading time -->
                        <div class="blogPost_readingTime__wrapper">
                            <?php 
                            $readingTime = get_field('reading_time');
                            ?>
                            <div class="blogPost_readingTime text-white text-avenir absolute bottom-2 left-4 flex justify-start items-center">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.2125 3.24405V9.66655C13.2125 9.78905 13.1075 9.89405 12.985 9.89405H12.9675C11.025 9.80655 9.0475 10.384 7.105 11.574C7.105 11.574 7.105 11.574 7.0875 11.574V11.5915C7.07 11.609 7.0525 11.609 7.035 11.609C7.0175 11.6265 7 11.6265 6.9825 11.6265C6.93 11.6265 6.895 11.609 6.86 11.5915C4.935 10.384 2.975 9.80655 1.0325 9.89405C0.91 9.91155 0.77 9.80655 0.77 9.66655V3.24405H0V10.839C2.3275 10.8565 4.69 11.4165 7.0175 12.5365C9.3275 11.4165 11.6725 10.8215 14 10.8215V3.24405H13.2125Z" fill="white"/>
                                <path d="M6.7726 10.9965V3.64654C4.9351 2.52654 3.0626 1.96655 1.2251 2.00155V9.43905H1.3826C3.1676 9.43905 4.9876 9.94655 6.7726 10.9965Z" fill="white"/>
                                <path d="M12.775 2.00155C10.955 1.96655 9.06504 2.52654 7.22754 3.64654V11.014C9.06504 9.94655 10.9375 9.42155 12.775 9.45655V2.00155Z" fill="white"/>
                            </svg>
                                <span class="ml-2"><?php echo $readingTime; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section of modal -->
                <div class="modal_contentArea__wrapper lg:px-20 py-10 font-avenir font-light">
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
                <div class="blogPostsWrapper mt-24 md:mt-3 lg:mt-10 xl:mt-1">
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 lg:mr-10">
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
                                            <div class="blogPost_readingTime text-white text-avenir font-avenir absolute bottom-1 left-4 flex justify-start items-center">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.2125 3.24405V9.66655C13.2125 9.78905 13.1075 9.89405 12.985 9.89405H12.9675C11.025 9.80655 9.0475 10.384 7.105 11.574C7.105 11.574 7.105 11.574 7.0875 11.574V11.5915C7.07 11.609 7.0525 11.609 7.035 11.609C7.0175 11.6265 7 11.6265 6.9825 11.6265C6.93 11.6265 6.895 11.609 6.86 11.5915C4.935 10.384 2.975 9.80655 1.0325 9.89405C0.91 9.91155 0.77 9.80655 0.77 9.66655V3.24405H0V10.839C2.3275 10.8565 4.69 11.4165 7.0175 12.5365C9.3275 11.4165 11.6725 10.8215 14 10.8215V3.24405H13.2125Z" fill="white"/>
                                                <path d="M6.7726 10.9965V3.64654C4.9351 2.52654 3.0626 1.96655 1.2251 2.00155V9.43905H1.3826C3.1676 9.43905 4.9876 9.94655 6.7726 10.9965Z" fill="white"/>
                                                <path d="M12.775 2.00155C10.955 1.96655 9.06504 2.52654 7.22754 3.64654V11.014C9.06504 9.94655 10.9375 9.42155 12.775 9.45655V2.00155Z" fill="white"/>
                                            </svg>
                                                <span class="ml-2"><?php echo $readingTime; ?></span>
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
    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>
    <!-- Mobile categories -->
    <div class="mobileCategories_wrapper hidden w-full h-fit bg-darkBlue absolute bottom-0 right-0">
        <div class="">
            <a href="#" class="close_mobileCategories__wrapper absolute top-6 right-5 py-1 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
                    <g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>
                </svg>
            </a>
        </div>
        <div class="customTaxonomyWrapper mb-6">
            <div class="categoriesSidebar_popup__content p-4">
                <span class="categoriesSidebar_filter__heading font-avenir text-white text-2xl font-bold uppercase border-b-2 border-gray-500 mb-2 w-[85%]">Filters</span>
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