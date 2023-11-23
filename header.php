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
                        echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
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
                    <i class="fa-solid fa-filter text-2xl text-black"></i>
                </a>
            </div>
            <div class="newsletterModal_icon mr-7">
                <a href="#" class="newsletterModal_open">
                    <i class="fa-regular fa-envelope text-2xl text-black"></i>
                </a>
            </div>
            <div class="hamburgerMenu_wrapper">
                <a href="#" class="hamburger-wrapper">
                    <div class="hamburger-menu"></div>
                </a>
                <div class="mobile-menu-overlay relative">
                    <a href="#" class="closeHamburger absolute top-6 right-5">
                        <i class="fa-solid fa-x text-2xl text-black"></i>
                    </a>
                    <div class="w-full h-screen flex justify-center items-center">
                        <div class="menuItems__wrapper">
                            <div class="menuItems">
                                    <?php 
                                    wp_nav_menu(
                                        array(
                                        'theme_location' => 'header-menu',
                                        'container_class' => '',
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

