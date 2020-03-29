<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nirvair
 */

get_header();
?>
<section id="content" class="site-content">
	<div class="container">
		<main id="main">
		<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="headline">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'nirvair' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
		</header>

		<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			// Numeric Pagination
			nirvair_numeric_posts_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</article>
		</main><!-- #main -->
	</div> <!-- end of container -->
</section><!-- #content -->

<?php
get_footer();
