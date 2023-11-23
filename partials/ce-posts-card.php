<div class="imageContent relative grid-item examplesPost_post__wrapper block h-auto max-w-full">
    <?php $thumb = get_the_post_thumbnail_url(); ?> 
    <img src="<?php echo $thumb; ?>" alt="">
    <div class="imageContent_layer text-center px-5">
        <?php the_content(); ?>
    </div>  
    <!-- Link -->
    <?php $copywritingExamplesLink = get_field('copywriting_examples_link'); ?>
    <a class="imageContent_link" target=”_blank” href="<?php echo $copywritingExamplesLink; ?>">
    <i class="fa-solid fa-link"></i>
    </a>
</div>
