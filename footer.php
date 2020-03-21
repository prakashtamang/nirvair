<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nirvair
 */

$footer_socials_facebook = get_theme_mod( 'footer_socials_facebook' );
$footer_socials_twitter = get_theme_mod( 'footer_socials_twitter' );
$footer_socials_linkedin = get_theme_mod( 'footer_socials_linkedin' );
$footer_socials_youtube = get_theme_mod( 'footer_socials_youtube' );
$footer_socials_github = get_theme_mod( 'footer_socials_github' );
$copyright_text = get_theme_mod( 'copyright_text' );
?>
<footer class="text-center">
	<div class="container">
	<?php 
	if (!empty($footer_socials_facebook) || !empty($footer_socials_twitter) || !empty($footer_socials_linkedin) || !empty($footer_socials_youtube) || !empty($footer_socials_github)) {
	?>
		<ul class="list-inline footer_social">
		    <?php 
		    if ($footer_socials_facebook) { ?>
		    	<li class="list-inline-item" id="facebook">
			      <a href="<?php echo $footer_socials_facebook; ?>" target="_blank" class="social-link rounded-circle text-white mr-3">
			        <i class="fab fa-facebook-f"></i>
			      </a>
			    </li>
		    <?php }
		    ?>

		    <?php 
		    if ($footer_socials_twitter) { ?>
		    	<li class="list-inline-item" id="twitter">
			      <a href="<?php echo $footer_socials_twitter; ?>" target="_blank" class="social-link rounded-circle text-white mr-3">
			        <i class="fab fa-twitter"></i>
			      </a>
			    </li>
		    <?php }
		    ?>

		    <?php 
		    if ($footer_socials_linkedin) { ?>
		    	<li class="list-inline-item" id="linkedin">
			      <a href="<?php echo $footer_socials_linkedin; ?>" target="_blank" class="social-link rounded-circle text-white mr-3">
			        <i class="fab fa-linkedin"></i>
			      </a>
			    </li>
		    <?php }
		    ?>

		    <?php 
		    if ($footer_socials_youtube) { ?>
		    	<li class="list-inline-item" id="youtube">
			      <a href="<?php echo $footer_socials_youtube; ?>" target="_blank" class="social-link rounded-circle text-white mr-3">
			        <i class="fab fa-youtube"></i>
			      </a>
			    </li>
		    <?php }
		    ?>

		    <?php 
		    if ($footer_socials_github) { ?>
		    	<li class="list-inline-item" id="github">
			      <a href="<?php echo $footer_socials_github; ?>" target="_blank" class="social-link rounded-circle text-white mr-3">
			        <i class="fab fa-github"></i>
			      </a>
			    </li>
		    <?php }
		    ?>
	  </ul>
	<?php }
	
	if (!empty($copyright_text)) {
		echo '<p class="text-white" id="copyright">' . $copyright_text . '</p>';
	}
	?>
	</div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<?php wp_footer(); ?>

</body>
</html>
