<div class="newsletterModal relative">
    <div class="newsletterModal_body">
        <a href="!#" class="newsletterModal_close absolute top-5 md:top-5 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
                <g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>
            </svg>
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