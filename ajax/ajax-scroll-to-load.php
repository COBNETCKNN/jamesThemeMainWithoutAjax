<?php 

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
  
    header("Content-Type: text/html");
  
    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );
  
    $the_query = new WP_Query( $args );  ?>
  
  <div class="blogPostsWrapper mt-8">
          <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 lg:mr-10">
  
              <?php if ( $the_query->have_posts() ) : 
                  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  
                  <?php get_template_part( 'partials/post', 'card' ); ?>
          
              <?php endwhile; endif; ?>
          </div>
      </div>
  
    <?php 
    wp_reset_postdata();
    die();
  }
  
  add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
  add_action('wp_ajax_more_post_ajax', 'more_post_ajax');