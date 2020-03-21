<?php
/**
 * CTA Section
 *
 * @package nirvair
 */

$hide_cta_section = get_theme_mod( 'hide_cta_section' );
$cta_title = get_theme_mod( 'cta_title' );
$cta_subtitle = get_theme_mod( 'cta_subtitle' );
$cta_enable_background = get_theme_mod( 'cta_enable_background' );
?>
<!-- Call To Action -->
<div class="call-to-action text-center content-section  
<?php 
  if ( $hide_cta_section == 1 ) :
    echo 'nirvair_hide_section ';
  endif;

  if ( $cta_enable_background == 1 ) :
    echo 'bg-light ';
  endif;
?>">

<?php 
	if (!empty($cta_title) || !empty($cta_subtitle)) : ?>
		<div class="overlay"></div>
		  <div class="container">
		    <div class="row">
		      <div class="col-12 mx-auto">
		        <?php 
		        if (!empty($cta_title)) :
		        	echo '<h2 class="to-animate section-heading">' . $cta_title . '</h2>';
		        endif;

		        if (!empty($cta_subtitle)) :
		        	echo '<p class="to-animate section-subheading">' . $cta_subtitle . '</p>';
		        endif;
		        ?>
		      </div>
		    </div>
		  </div>
	<?php 
	endif;
?>
</div>