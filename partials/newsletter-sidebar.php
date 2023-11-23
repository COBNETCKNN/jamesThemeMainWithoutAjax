<div class="customTaxonomyWrapper my-6">
    <span class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Newsletter</span>
    <div class="contentWrapper relative w-10/12 border-solid border-gray-100 rounded-lg shadow-md pb-4 h-[200px]">
    <?php 
        $args = array(
            'page_id' => 214,
        );

        $newsletterPageQuery = new WP_Query($args);


        while($newsletterPageQuery->have_posts()){
            $newsletterPageQuery->the_post(); ?> 
                <!-- Newsletter image -->
                <div class="relative h-[150px]">
                    <div class="newsletterImage_wrapper flex justify-center absolute top-3 z-1">
                    <?php
                        $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                        if ($post_thumbnail) {
                        echo $post_thumbnail;
                    }
                    
                    ?>

                    </div>
                    <!-- Newsletter button -->
                    <div class="newsletter_button__wrapper flex justify-center -mt-8 absolute bottom-4">
                        <a href="#" class="newsletterModal_open text-avenir text-xs bg-white border-dashed border border-avenir font-medium py-2 px-6 rounded">Tell me more</a>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="newsletter_content__wrapper text-avenir text-xs xl:text-sm text-center flex flex-wrap mx-5 absolute bottom-3 z-1">
                    <?php 
                    $textBelowButton = get_field('newsletter_text_below_button_in_sidebar');
                    echo $textBelowButton; ?>
                </div>
            <?php } 
                wp_reset_postdata();
            ?>
    </div>
</div>