<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nirvair
 */

get_header();
?>
<section id="content" class="site-content">
	<div id="primary" class="content-area">
		<div id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

		
			
		endwhile; // End of the loop.

		?>

		</div> <!-- end of main -->
	</div> <!-- end of primary -->
</section><!-- #content -->

<?php
get_footer();
