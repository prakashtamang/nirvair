<?php
/**
 * Masthead Section
 *
 * @package nirvair
 */

$hide_masthead_section = get_theme_mod( 'hide_masthead_section' );
$masthead_background_img = get_theme_mod( 'masthead_background_img' );
$masthead_title = get_theme_mod( 'masthead_title' );
$masthead_text = get_theme_mod( 'masthead_text' );

$masthead_socials_facebook = get_theme_mod( 'masthead_socials_facebook' );
$masthead_socials_twitter = get_theme_mod( 'masthead_socials_twitter' );
$masthead_socials_linkedin = get_theme_mod( 'masthead_socials_linkedin' );
$masthead_socials_dribbble = get_theme_mod( 'masthead_socials_dribbble' );
$masthead_socials_youtube = get_theme_mod( 'masthead_socials_youtube' );
$masthead_socials_github = get_theme_mod( 'masthead_socials_github' );
?>
<!-- Header -->
<header class="masthead d-flex 
<?php 
if ( $hide_masthead_section == 1 ) :
  echo 'nirvair_hide_section';
endif; 
?>" style="background: linear-gradient(90deg, rgba(255, 51, 51, 0.3) 0%, rgba(73, 80, 87, 0.3) 100%), url(<?php echo $masthead_background_img; ?>); background-position: center center; background-repeat: no-repeat; background-size: cover;">
  <div class="container text-center my-auto">
    <?php 
    if (!empty($masthead_title)) : ?>
      <h1 class="to-animate masthead_title"><?php echo $masthead_title; ?></h1>
    <?php 
    endif; 

    if (!empty($masthead_text)) : ?>
      <h2 class="lead masthead_text mb-5 to-animate"><?php echo $masthead_text; ?></h2>
    <?php 
    endif;

    if (!empty($masthead_socials_facebook) || !empty($masthead_socials_twitter) || !empty($masthead_socials_linkedin) || !empty($masthead_socials_dribbble) || !empty($masthead_socials_youtube) || !empty($masthead_socials_github)) :
    ?>
    <ul class="list-inline social to-animate">
      <?php  
      if (!empty($masthead_socials_facebook)) :
      ?>
      <li class="list-inline-item" id="facebook">
        <a href="<?php echo $masthead_socials_facebook; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-facebook-inv">
            <i class="fab fa-facebook-f"></i>
          </span>
        </a>
      </li>
      <?php
      endif;

      if (!empty($masthead_socials_twitter)) :
      ?>  
      <li class="list-inline-item" id="twitter">
        <a href="<?php echo $masthead_socials_twitter; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-twitter-inv">
            <i class="fab fa-twitter"></i>
          </span>
        </a>
      </li>
      <?php
      endif;

      if (!empty($masthead_socials_linkedin)) :
      ?>  
      <li class="list-inline-item" id="linkedin">
        <a href="<?php echo $masthead_socials_linkedin; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-linkedin-inv">
            <i class="fab fa-linkedin"></i>
          </span>
        </a>
      </li>
      <?php
      endif;

      if (!empty($masthead_socials_dribbble)) :
      ?>  
      <li class="list-inline-item" id="dribbble">
        <a href="<?php echo $masthead_socials_dribbble; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-dribbble-inv">
            <i class="fab fa-dribbble"></i>
          </span>'
        </a>
      </li>
      <?php
      endif;

      if (!empty($masthead_socials_youtube)) :
      ?>
      <li class="list-inline-item" id="youtube">
        <a href="<?php echo $masthead_socials_youtube; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-youtube-inv">
            <i class="fab fa-youtube"></i>
          </span>
        </a>
      </li>
      <?php
      endif;

      if (!empty($masthead_socials_github)) :
      ?>
      <li class="list-inline-item" id="github">
        <a href="<?php echo $masthead_socials_github; ?>" target="_blank">
          <span class="hb hb-sm inv spin-icon hb-github-inv">
            <i class="fab fa-github"></i>
          </span>
        </a>
      </li>
      <?php
      endif; 
      ?>
    </ul>
    <?php endif; ?>
  </div>

  <!-- Mouse Scroll Icon -->
  <div class="scroll-downs">
    <div class="mousey">
      <div class="scroller"></div>
    </div>
  </div>

  <div class="overlay"></div>
</header>