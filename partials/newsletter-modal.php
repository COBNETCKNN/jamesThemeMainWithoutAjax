<div class="newsletterModal relative">
    <div class="newsletterModal_body">
        <a href="#" class="newsletterModal_close absolute top-5 md:top-5 right-4">
            <i class="fa-solid fa-x text-black text-2xl"></i>
        </a>
        <?php 
            $args = array(
                'page_id' => 214,
            );

            $newsletterPageQuery = new WP_Query($args);

            while($newsletterPageQuery->have_posts()){
                $newsletterPageQuery->the_post(); ?> 
                <div class="newsletterModal_warpper mt-5 md:mt-10">
                    <div class="newsletterModal_topContent">
                        <div class="newsletterModal_content__warpper text-left font-avenir text-base font-normal px-5">
                            <?php the_content(); ?>
                        </div>

                        <div class="newsletterModal_form py-10 px-5">
                            <?php 
                            $shortcode = get_field('newsletter_shortcode');

                            echo do_shortcode($shortcode);
                            ?>
                        </div>
                    </div>
                    <div class="newsletterModal_testimonials">

                        <?php 

                        // Check rows exists.
                        if( have_rows('newsletter_testimonial_repeater') ):

                            // Loop through rows.
                            while( have_rows('newsletter_testimonial_repeater') ) : the_row();

                                // Load sub field value.
                                $testimonialImage = get_sub_field('image');
                                $testimonialParagraph = get_sub_field('testimonial');
                                $testimonialColorPicker = get_sub_field('background_color'); ?>
                                <div class="newsletterModal_testimonials__wrapper flex items-center px-5" style="background-color:<?php echo $testimonialColorPicker; ?>">
                                    <div class="newsletter_testimonial__image w-[50px] h-[50px] my-3 w-1/5">
                                        <?php 
                                            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                                            if($testimonialImage) {
                                                echo wp_get_attachment_image( $testimonialImage, $size );
                                            }
                                        ?>
                                    </div>
                                    <div class="newsletter_testimonial__content w-4/5 text-sm text-start pl-5 text-white">
                                        <?php echo $testimonialParagraph = get_sub_field('testimonial'); ?>
                                    </div>
                                </div>
                                <?php     
                            // End loop.
                            endwhile;

                        // No value.
                        else :
                            // Do something...
                        endif;

                        ?>
                    </div>
                </div>
                <?php } 
                    wp_reset_postdata();
            ?>
    </div>
</div>