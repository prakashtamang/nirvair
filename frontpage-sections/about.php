<?php
/**
 * About Section
 *
 * @package nirvair
 */

$hide_about_section = get_theme_mod( 'hide_about_section' );
$about_title = get_theme_mod( 'about_title' );
$about_subtitle = get_theme_mod( 'about_subtitle' );
$about_description = get_theme_mod( 'about_description' );
$about_enable_background = get_theme_mod( 'about_enable_background' );
?>
<!-- About -->
<section class="content-section 
<?php 
  if ( $hide_about_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $about_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="about">
  <div class="container">
  <?php  
  if (!empty($about_title) || !empty($about_subtitle)) :
  ?>
    <div class="row">
      <div class="col-12 text-center">
        <?php
        if (!empty($about_title) ): ?>
          <h2 class="section-heading mb-3 to-animate"><?php echo $about_title; ?></h2>
        <?php
        endif;

        if (!empty($about_subtitle) ):
        ?>
          <p class="section-subheading to-animate"><?php echo $about_subtitle; ?></p>
        <?php
        endif;
        ?>
      </div>
    </div>
  <?php
  endif;
    
  if (!empty($about_description) ):
  ?>
    <div class="row">
      <div class="col-12 text-justify section-description to-animate">
        <?php echo $about_description; ?>
      </div>
    </div>
    
  <?php
  endif;
  ?>
      
  </div>
</section>