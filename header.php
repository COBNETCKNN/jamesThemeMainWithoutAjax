<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    if( is_home() || is_front_page() ){
        $meta_des = get_field('front-page_meta_description', 10);
        echo '<meta name="description" content="' . $meta_des . '" />';
    }else {
        echo '<meta name="description" content="' . wp_trim_words(get_the_content(), 24) . '" />';
    }
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="block lg:hidden flex bg-white">
    <nav class="mobile-menu grid grid-cols-2 gap-4">
        <!-- Logo section -->
        <div class="logoWrapper flex justify-start items-center">
            <a href="<?php echo site_url(); ?>">
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'logo-size' );
                    if ( has_custom_logo() ) {
                        echo '<img class="logoMobile" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                ?>
            </a>
        </div>
        <!-- Icons section -->
        <div class="navbar_icons__wrapper flex justify-end items-center">
            <div class="categories_icon mr-7">
                <a href="#">
                    <svg id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15 24-6-4.5v-5.12l-8-9v-2.38a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v2.38l-8 9zm-4-5.5 2 1.5v-6.38l8-9v-1.62a1 1 0 0 0 -1-1h-16a1 1 0 0 0 -1 1v1.62l8 9z"/></svg>
                </a>
            </div>
            <div class="newsletterModal_icon mr-7">
                <a href="#" class="newsletterModal_open">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="512" height="512"><path d="M19,1H5A5.006,5.006,0,0,0,0,6V18a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V6A5.006,5.006,0,0,0,19,1ZM5,3H19a3,3,0,0,1,2.78,1.887l-7.658,7.659a3.007,3.007,0,0,1-4.244,0L2.22,4.887A3,3,0,0,1,5,3ZM19,21H5a3,3,0,0,1-3-3V7.5L8.464,13.96a5.007,5.007,0,0,0,7.072,0L22,7.5V18A3,3,0,0,1,19,21Z"/></svg>
                </a>
            </div>
            <div class="hamburgerMenu_wrapper">
                <a href="#" class="hamburger-wrapper">
                    <div class="hamburger-menu"></div>
                </a>
                <div class="mobile-menu-overlay relative bg-darkBlue">
                    <a href="#" class="closeHamburger absolute top-6 right-5 close_mobileCategories__wrapper py-1.5 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512" height="512">
                            <g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>
                        </svg>
                    </a>
                    <div class="w-full h-screen flex justify-center items-center bg-darkBlue">
                        <div class="menuItems__wrapper">
                            <div class="menuItems">
                                    <?php 
                                    wp_nav_menu(
                                        array(
                                        'theme_location' => 'header-menu',
                                        'container_class' => 'text-white',
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
                </div>
            </div>
        </div>

    </nav>
</header>

