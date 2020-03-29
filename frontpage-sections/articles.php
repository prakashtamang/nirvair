<?php
/**
 * Article Section
 *
 * @package nirvair
 */

$hide_article_section = get_theme_mod( 'hide_article_section' );
$article_title = get_theme_mod( 'article_title' );
$article_subtitle = get_theme_mod( 'article_subtitle' );
$article_enable_background = get_theme_mod( 'article_enable_background' );
?>
<!-- Blog -->
<section class="content-section 
<?php 
  if ( $hide_article_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $article_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="blog">
<div class="container">
  <?php  
  if (!empty($article_title) || !empty($article_subtitle)) :
  ?>
  <div class="row mb-5">
    <div class="col-12 text-center">
      <?php  
      if (!empty($article_title)) :
      ?>
        <h2 class="section-heading mb-3 to-animate"><?php echo $article_title; ?></h2>
      <?php
      endif;
      ?>

      <?php  
      if (!empty($article_subtitle)) :
      ?>
        <p class="section-subheading to-animate"><?php echo $article_subtitle; ?></p>
      <?php
      endif;
      ?>      
    </div>
  </div>
  <?php
  endif;
  ?>

  
  
  
  <div class="row">
    <?php
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page'         => '6',
        'ignore_sticky_posts'    => true,
      );
       
      $articles_query = new WP_Query( $args );
      if ( have_posts() ) :

        /* Start the Loop */
        while ( $articles_query->have_posts() ) : $articles_query->the_post();
        ?>
        <article class="mb-4 post col-12 col-sm-6 col-md-4"> 
          <div class="white z-depth-1 d-flex flex-column h-100" style="min-height: 14rem;"> 
            <?php
            if(has_post_thumbnail()){ ?>
            <div class="full-bg-image post-img mb-1 d-block clearfix" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>');">
              <a href="<?php the_permalink(); ?>" class="postthumb h-100 w-100"></a>
            </div>

            <?php }
            ?>
             
            <div class="p-3 pt-1"> 
              <?php
              if (get_avatar(get_the_author_meta('ID')) !== FALSE) {
              ?>
              <div class="text-right float-right" style="margin-top:-2.6rem;"> 
                <img class="ml-2 rounded-circle white" style="padding:3px;width:3rem;height: 3rem;" alt="" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) , 32 ); ?>"> 
              </div>  
              <?php }
              ?>
               
              <h2 class="headline mb-0 small strong"> 
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
              </h2> 
            </div>  
          </div> 
        </article>

        <?php
        endwhile;

        $count = $articles_query->found_posts;
        if ($count > 6) { ?>
          <div class="blog-more text-center mt-2 mx-auto">
            <a href="<?php echo home_url('/blog'); ?>" class="btn btn-primary">View All Post</a>
          </div>
        <?php }

        // Restore original post data.
        wp_reset_postdata();
        else :

        get_template_part( 'template-parts/content', 'none' );
      
      endif;
      ?>
    
  </div>

</div>
</section>