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
                    <h1 class="blogPostCard_title text-start"><?php the_title(); ?></h1>
                    <span class="blogCard_taxonomy__item px-7 text-sm bg-white text-avenir font-avenir absolute bottom-4 -right-2 font-medium uppercase"><?php echo $subcategoryTerm; ?></span>
                    <!-- Reading time -->
                    <div class="blogPost_readingTime__wrapper">
                        <?php 
                        $readingTime = get_field('reading_time');
                        ?>
                        <div class="blogPost_readingTime text-white text-avenir font-avenir absolute bottom-2 left-2 flex justify-start items-center">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.2125 3.24405V9.66655C13.2125 9.78905 13.1075 9.89405 12.985 9.89405H12.9675C11.025 9.80655 9.0475 10.384 7.105 11.574C7.105 11.574 7.105 11.574 7.0875 11.574V11.5915C7.07 11.609 7.0525 11.609 7.035 11.609C7.0175 11.6265 7 11.6265 6.9825 11.6265C6.93 11.6265 6.895 11.609 6.86 11.5915C4.935 10.384 2.975 9.80655 1.0325 9.89405C0.91 9.91155 0.77 9.80655 0.77 9.66655V3.24405H0V10.839C2.3275 10.8565 4.69 11.4165 7.0175 12.5365C9.3275 11.4165 11.6725 10.8215 14 10.8215V3.24405H13.2125Z" fill="white"/>
                            <path d="M6.7726 10.9965V3.64654C4.9351 2.52654 3.0626 1.96655 1.2251 2.00155V9.43905H1.3826C3.1676 9.43905 4.9876 9.94655 6.7726 10.9965Z" fill="white"/>
                            <path d="M12.775 2.00155C10.955 1.96655 9.06504 2.52654 7.22754 3.64654V11.014C9.06504 9.94655 10.9375 9.42155 12.775 9.45655V2.00155Z" fill="white"/>
                        </svg>
                            <span class="font-avenir text-sm ml-2"><?php echo $readingTime; ?></span>
                        </div>
                    </div>
                    <!-- Reddirect icon -->
                    <a href="<?php the_permalink(); ?>" class="blogPost_redirect__icon blogPost_redirect__icon-<?php echo $subcategoryTermSlug ?> bg-white absolute -top-5 -right-5">
                        <svg class="redirect__svg-<?php echo $subcategoryTermSlug ?>" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6569 17.6568L17.6569 6.34313L6.34315 6.34313" stroke="#4324FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.34303 17.6568L17.6567 6.34311" stroke="#4324FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="<?php echo home_url() . '/' . get_post_field('post_name', $post_id); ?>" type="button" class="frontPage-view-post" data-postid="<?php the_ID(); ?>" data-slug="<?php echo get_post_field('post_name', $post_id); ?>"></a>
                    </div>
                </div>
            </div>