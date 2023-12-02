<?php 

// Query to load ads on front-page inside while loop for posts
$adArgs = array(
    'post_type'      => 'ads', // Replace 'your_custom_post_type' with the actual name of your custom post type
    'posts_per_page' => 1,
    'orderby'        => 'rand', // Order by random
);

$adsQuery = new WP_Query($adArgs);

while($adsQuery->have_posts()){
    $adsQuery->the_post(); ?>

    <div class="blogCardBlackOverlay blogCardBlackOverlay_ad flex justify-center items-center px-8 xl:px-0">
        <div class="flex justify-center items-center min-h-[212px] w-full border-dashed border-2 border-sky-700">
            <div class="col-span-1 w-full my-auto">
            <?php

            if( have_rows('ads_group') ):

            while( have_rows('ads_group') ): the_row();

            $adsLogo = get_sub_field('logo');
            $adsLogoSize = 'full';
            $adsText = get_sub_field('ad_description');
            $adsButtonText = get_sub_field('button_text');
            $adsButtonLink = get_sub_field('button_link'); 
            $adsButtonBackgroundColor = get_sub_field('button_background_color');
            ?>
            
            <div class="ads_logo__wrapper flex justify-center my-2 max-h-[70px]">
                <?php
                if( $adsLogo ) {
                    echo wp_get_attachment_image( $adsLogo, $adsLogoSize );
                }
                ?>
            </div>
            <div class="ads_text__wrapper flex justify-centermy-2 mx-3">
                <?php echo $adsText; ?>
            </div>
            <div class="ads_button__wrapper flex justify-center my-2 uppercase">
                <a class="text-white font-avenir py-2 px-6 text-sm rounded-lg" target="_blank" href="<?php echo $adsButtonLink ?>" style="background-color:<?php echo $adsButtonBackgroundColor; ?>"><?php echo $adsButtonText; ?></a>
            </div>

            <?php 
            endwhile;
            endif;
            ?>
            
            </div>
        </div>

    </div>
    <?php

    }
    wp_reset_postdata();
    ?>