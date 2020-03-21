<?php
/**
 * Portfolio Section
 *
 * @package nirvair
 */

$hide_portfolio_section = get_theme_mod( 'hide_portfolio_section' );
$portfolio_title = get_theme_mod( 'portfolio_title' );
$portfolio_subtitle = get_theme_mod( 'portfolio_subtitle' );
$portfolio_enable_background = get_theme_mod( 'portfolio_enable_background' );
?>

<!-- Portfolio -->
<section class="content-section <?php 
  if ( $hide_portfolio_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $portfolio_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
  ?>" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <?php if(!empty($portfolio_title) || !empty($portfolio_subtitle)) : ?>
            <h2 class="section-heading mb-3 to-animate"> <?php echo $portfolio_title; ?></h2>
            <p class="section-subheading mb-5 to-animate"><?php echo $portfolio_subtitle; ?></p>
          <?php endif; 

          $terms = get_terms( array(
              'taxonomy' => 'project_category',
              'hide_empty' => true,
          ) );
          ?>

          <ul class="list-unstyled mb-5 to-animate">
            <li class="list-inline-item">
              <a href="#noAction" class="btn btn-primary" data-filter="all">All</a>
            </li>

            <?php
            foreach($terms as $term): 
            ?> 
              <li class="list-inline-item">
                <a href="#noAction" class="btn btn-primary" data-filter=".<?php echo $term->slug; ?>"> <?php echo $term->name; ?> </a>
              </li>
            <?php endforeach; ?> 

          </ul>
        </div>
      </div> <!-- end of row -->

      <div id="single-project">
      
      <?php 
        $args = array(  
          'post_type' => 'portfolio',
          'post_status' => 'publish',
          'posts_per_page' => 4, 
          'orderby'   => array(
            'date' =>'DESC',
            'menu_order'=>'ASC',
          ) 
        );
      
      $portfolio = new WP_Query( $args ); 
      
      $project_num = 1;    
      while ( $portfolio->have_posts() ) : $portfolio->the_post(); 
      ?>  
  
      <div id="slidingDiv<?php echo $project_num; ?>" class="row no-gutters toggleDiv single-project mb-4">
        <div class="col-lg-6">
          <?php
          if (has_post_thumbnail()) :
            echo get_the_post_thumbnail( $post->ID, '', array( 'class' => 'img-fluid' ) );
          endif;
          ?>
        </div> <!-- end of col-lg-6 -->
        <div class="col-lg-6">
          <div class="project-description pl-3 pr-3">
            <div class="project-title mt-3 mb-3 clearfix">
              <h3><?php the_title(); ?></h3>
              <span class="show_hide close">
                <i class="fas fa-times"></i>
              </span>
            </div> <!-- end of project-title -->
            <div class="project-info mb-2">
              <div>
                <span>Client</span><?php echo get_post_meta($post->ID, 'portfolio_fields_client', true); ?>
              </div>
              <div>
                  <span>Date</span><?php echo get_post_meta($post->ID, 'portfolio_fields_date', true); ?>
              </div>
              <div>
                  <span>Skills</span><?php echo get_post_meta($post->ID, 'portfolio_fields_skills', true); ?>
              </div>
              <div>
                  <span>Link</span><?php echo get_post_meta($post->ID, 'portfolio_fields_link', true); ?>
              </div>
            </div> <!-- end of project-info -->
            <?php the_content(); ?>
          </div> <!-- end of project-description -->
        </div> <!-- end of col-lg-6 -->
      </div> <!-- end of slidingDiv -->

      <?php
      $project_num++;
      endwhile;

      wp_reset_postdata(); 
      ?>
      
      <div class="row" id="portfolio-grid">
      <?php
      $args = array(  
          'post_type' => 'portfolio',
          'post_status' => 'publish',
          'posts_per_page' => 4, 
          'orderby'   => array(
            'date' =>'DESC',
            'menu_order'=>'ASC',
          )
        );
      
      $portfolio = new WP_Query( $args ); 
      
      $project_num = 1;    
      while ( $portfolio->have_posts() ) : $portfolio->the_post(); 
        $project_category = get_the_terms($post->ID,'project_category');

        $slugs = wp_list_pluck($project_category, 'slug');
        $class_names = join(' ', $slugs);

        $term = wp_list_pluck($project_category, 'name');
        $cat_name = join(', ', $term);
      ?>
        <div class="col-lg-6 mix<?php if ($class_names) { echo ' ' . $class_names;} ?>">
          <div href="#" class="portfolio-item to-animate">
            <?php
            if (has_post_thumbnail()) :
              echo get_the_post_thumbnail( $post->ID, '', array( 'class' => 'img-fluid' ) );
            endif;
            ?>
            <a href="#single-project" class="caption text-center text-white more show_hide js-scroll-trigger" rel="#slidingDiv<?php echo $project_num; ?>">
              <span class="caption-content">
                <i class="fas fa-plus"></i>
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo $cat_name; ?></p>
              </span>
            </a>
          </div>
        </div>
      <?php
      $project_num++;
      endwhile;

      wp_reset_postdata(); 
      ?>
      </div> <!-- end of portfolio-grid -->
    </div> <!-- end of single project -->
  </div> <!-- end of container -->
</section>