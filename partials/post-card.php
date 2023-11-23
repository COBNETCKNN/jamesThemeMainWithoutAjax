<?php $post_id = get_the_ID(); ?>
        <!-- Associated subcateegory to the post -->
        <?php
            $count = 0;
            $postCategories = get_the_category();
            $subcategoryTerm = $postCategories[0]->name;
            $subcategoryTermSlug = $postCategories[0]->slug;
            $subcategoryTermID = $postCategories[0]->term_id;
            
        ?>
            <div class="blogCardBlackOverlay post-<?php echo $post_id; ?> py-1">
                <div class="col-span-1">
                <?php 
                    $thumb = get_the_post_thumbnail_url(); 
                ?>
                    <div class="relative blogPostCard blogPostCard-<?php echo $subcategoryTermSlug ?>" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
                    <h1 class="blogPostCard_title text-avenir font-avenir text-white font-bold text-start"><?php the_title(); ?></h1>



                    <span class="blogCard_taxonomy__item px-7 text-sm bg-white text-avenir font-avenir absolute bottom-4 -right-3 font-medium uppercase"><?php echo $subcategoryTerm; ?></span>
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