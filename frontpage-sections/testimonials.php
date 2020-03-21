<?php
/**
 * Testimonial Section
 *
 * @package nirvair
 */

$hide_testimonial_section = get_theme_mod( 'hide_testimonial_section' );
$testimonial_title = get_theme_mod( 'testimonial_title' );
$testimonial_subtitle = get_theme_mod( 'testimonial_subtitle' );
$testimonial_enable_background = get_theme_mod( 'testimonial_enable_background' );
?>
<!-- Testimonial -->
<section class="content-section 
<?php 
  if ( $hide_testimonial_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $testimonial_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="testimonial">
<div class="container">
  <?php 
  if(!empty($testimonial_title) || !empty($testimonial_subtitle)) :
  ?>
  	<div class="row">
	    <div class="col-12 text-center mb-5">
	      <?php 
	      if(!empty($testimonial_title)) :
	      ?>
	      	<h2 class="section-heading mb-3 to-animate"><?php echo $testimonial_title; ?></h2>
	      <?php	
	      endif;
	      ?>

	      <?php 
	      if(!empty($testimonial_subtitle)) :
	      ?>
	      	<p class="section-subheading to-animate"><?php echo $testimonial_subtitle; ?></p>
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
	if ( is_active_sidebar( 'sidebar-testimonial' ) ) :
		dynamic_sidebar('sidebar-testimonial');  
	endif; 
	?>
  </div>
</div>
</section>