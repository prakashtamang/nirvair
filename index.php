<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nirvair
 */

get_header();
?>
<section id="content" class="site-content">
	<div class="container">
		<?php
		if ( is_home() && ! is_front_page() ) :
			?>
			<header class="archive-header">
				<h1 class="headline">
				The Nirvair Blog
				<small>ARTICLES AND INSIGHTS COVERING TOPICS OF INTEREST TO OUR CLIENTS AND THE WORDPRESS COMMUNITY.</small>
				</h1>
			</header>
			<?php
		endif;
		?>
		
		<main id="main" class="row">
		<?php
		if ( have_posts() ) : $postCount = 1;

			/* Start the Loop */
			while ( have_posts() ) : $postCount++;
				the_post();

			require get_template_directory() . '/template-parts/content.php';
			//get_template_part( 'template-parts/content');

			endwhile;
			
			// Numeric Pagination
			nirvair_numeric_posts_nav();

			else :

			get_template_part( 'template-parts/content', 'none' );
		
		endif;
		?>
		</main><!-- #main -->
	</div> <!-- end of container -->
</section><!-- #content -->

<?php
get_footer();
