<div class="customTaxonomyWrapper my-6">
    <span class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Newsletter</span>
    <div class="contentWrapper relative w-10/12 border-solid border-gray-100 rounded-lg shadow-md pb-4">
    <?php 
        $args = array(
            'page_id' => 214,
        );

        $newsletterPageQuery = new WP_Query($args);


        while($newsletterPageQuery->have_posts()){
            $newsletterPageQuery->the_post(); ?> 
                <!-- Newsletter image -->
                <div class="relative">
                    <div class="newsletterImage_wrapper flex justify-center absolute top-3 z-1">
                    <?php
                        $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                        if ($post_thumbnail) {
                        echo $post_thumbnail;
                    }
                    
                    ?>
            <?php } 
                wp_reset_postdata();
            ?>
    </div>
</div>