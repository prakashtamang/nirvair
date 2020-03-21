<?php
/**
 * Contact Section
 *
 * @package nirvair
 */

$hide_contact_section = get_theme_mod( 'hide_contact_section' );
$contact_title = get_theme_mod( 'contact_title' );
$contact_subtitle = get_theme_mod( 'contact_subtitle' );
$contact_enable_background = get_theme_mod( 'contact_enable_background' );
?>
<!-- Contact -->
<section class="content-section 
<?php 
  if ( $hide_contact_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $contact_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>" id="contact">
  <div class="container">
    <?php 
    if(!empty($contact_title) || !empty($contact_subtitle)) :
    ?>
    <div class="row mb-5">
      <div class="col-12 text-center">
        <?php 
        if(!empty($contact_title)) :
        ?>
          <h2 class="section-heading mb-3 to-animate"><?php echo $contact_title; ?></h2>
        <?php 
        endif;
        
        if(!empty($contact_subtitle)) :
        ?>
          <p class="section-subheading to-animate"><?php echo $contact_subtitle; ?></p>
        <?php 
        endif;
        ?>
      </div>
    </div>
    <?php 
    endif;
    ?>
    
    <div class="row contact-via">
      <?php 
      if ( is_active_sidebar( 'sidebar-contact' ) ) :
        dynamic_sidebar('sidebar-contact');  
      endif; 
      ?>
    </div>
  </div>
</section>