<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();

        // Your custom HTML structure for each post goes here.
        ?>
        <article class="bg-white" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
        </article>
        <?php
    endwhile;

else :
    // If no posts are found, display a message.
    get_template_part('template-parts/content', 'none');

endif;
?>

<?php get_footer(); ?>