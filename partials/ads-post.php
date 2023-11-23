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

    <div class="blogCardBlackOverlay flex justify-center items-center">
        <div class="col-span-1">
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
        <div class="ads_text__wrapper flex justify-center font-medium text-sm text-center font-avenir text-avenir my-2 mx-3">
            <?php echo $adsText; ?>
        </div>
        <div class="ads_button__wrapper flex justify-center my-2">
            <a class="text-white font-avenir font-bold py-1.5 px-4 text-sm rounded-lg" target="_blank" href="<?php echo $adsButtonLink ?>" style="background-color:<?php echo $adsButtonBackgroundColor; ?>"><?php echo $adsButtonText; ?></a>
        </div>

        <?php 
        endwhile;
        endif;
        ?>
        
        </div>
    </div>
    <?php

    }
    wp_reset_postdata();
    ?>