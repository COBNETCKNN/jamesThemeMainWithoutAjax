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
  
  <div class="blogPostsWrapper mt-6 xl:mt-6">
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:mr-5 mx-4 lg:mx-0">
  
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