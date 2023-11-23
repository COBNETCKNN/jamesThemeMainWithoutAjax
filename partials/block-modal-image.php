<div class="modalContent_image__wrapper">
    <?php
    if( get_row_layout() == 'image' ):
        $image = get_sub_field('modal_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            echo wp_get_attachment_image( $image, $size );
        }
    endif;
    ?>
</div>