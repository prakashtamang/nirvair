<?php
/**
 * The template for displaying archive pages
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

		if ( is_category() ) {?>
			<header class="archive-header">
				<h1 class="headline">
				CATEGORY ARCHIVE: <?php single_cat_title(); ?>
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY CATEGORY</strong></small>
				</h1>
			</header>
		<?php } elseif ( is_tag() ) { ?>
			<header class="archive-header">
				<h1 class="headline">
				PTAG ARCHIVE: <?php single_tag_title(); ?>
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY TAG</strong></small>
				</h1>
			</header>
		<?php } elseif ( is_author() ) { ?>
			<header class="archive-header">
				<h1 class="headline">
				POSTS BY: <?php echo get_the_author(); ?>
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY AUTHOR</small>
				</h1>
			</header>
		<?php } elseif ( is_day() ) { ?>
			<header class="archive-header">
				<h1 class="headline">
				POST CATEGORY DAY
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY DAY</small>
				</h1>
			</header>
		<?php } elseif ( is_month() ) { ?>
			<header class="archive-header">
				<h1 class="headline">
				POST CATEGORY MONTH
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY MONTH</small>
				</h1>
			</header>
		<?php } elseif ( is_year() ) { ?>
			<header class="archive-header">
				<h1 class="headline">
				POST CATEGORY YEAR
				<small>A COLLECTION OF POSTS WE HAVE CATEGORIZED BY YEAR</small>
				</h1>
			</header>
		<?php }
		?>
		
		<main id="main" class="row">
		<?php
		if ( have_posts() ) : $postCount = 1;

			/* Start the Loop */
			while ( have_posts() ) : $postCount++;
				the_post();
				
				require get_template_directory() . '/template-parts/content.php';

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
