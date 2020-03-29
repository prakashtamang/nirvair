<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nirvair
 */

get_header();
?>

<section id="content" class="site-content">
	<div class="container">
		<main id="main" class="site-main">
			<div class="row">
		        <div class="col-md-12">
		            <div class="error-template d-flex">
		                <div class="text-center my-auto mx-auto">
		                	<h1>
		                    Oops!</h1>
			                <h2>
			                    404 Not Found</h2>
			                <div class="error-details">
			                    Sorry, an error has occured, Requested page not found!
			                </div>
			                <div class="error-actions">
			                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
			                        Take Me Home </a><a href="#" class="btn btn-default btn-lg"><span class="far fa-envelope"></span> Contact Support </a>
			                </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</main><!-- #main -->
	</div> <!-- end of container -->
</section><!-- #content -->
<?php
get_footer();