<?php
/**
 * Service Section
 *
 * @package nirvair
 */

$hide_service_section = get_theme_mod( 'hide_service_section' );
$service_title = get_theme_mod( 'service_title' );
$service_subtitle = get_theme_mod( 'service_subtitle' );
$service_enable_background = get_theme_mod( 'service_enable_background' );
?>
<!-- Services -->
<section class="content-section 
<?php 
  if ( $hide_service_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $service_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="services">
  <div class="container">
    <?php
      if(!empty($service_title) || !empty($service_subtitle)) :
    ?>
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-heading mb-3 to-animate"><?php echo $service_title; ?></h2>
        <p class="section-subheading to-animate"><?php echo $service_subtitle; ?></p>
      </div>
    </div>
    <?php
    endif;

    if ( is_active_sidebar( 'sidebar-service' ) ) :
    ?> 
      <div class="row text-center">
          <?php dynamic_sidebar('sidebar-service'); ?> 
      </div>
    <?php 
    endif; 
    ?>
  </div>
</section>