<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nirvair
 */
if ($postCount == 2) {  // first post
?>
<article class="col-md-8 post mb-4">
	<h2 class="headline mb-1">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>

	<?php  
	if (has_post_thumbnail()) { ?>
	<div class="full-bg-image h-100 w-100 mb-3 z-depth-1" style="min-height: 14rem; max-height: 14rem; background-position: center center; background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>');" data-was-processed="true">
	<a href="<?php the_permalink(); ?>" class="postthumb h-100 w-100 d-flex"></a>
	</div>
	<?php }
	
	if (get_avatar(get_the_author_meta('ID')) !== FALSE) {?>
	<div class="float-right mr-2">
		<img class="ml-2 rounded-circle white z-depth-1" style="padding:3px;width:3rem;height: 3rem;" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) , 32 ); ?>">
	</div>
	<?php }
	?>
	<div class="d-flex align-items-center entry-meta mb-3">
		<small class="text-muted">
			<span class="the-author mt-2" style="display: block;">
				<?php the_author(); ?>
			</span>
			<span class="the-time mt-2">Updated <?php echo get_the_date(); ?>
			</span>
		</small>
	</div>
	<div><?php echo get_the_excerpt(); ?></div>
	<p><a href="<?php the_permalink(); ?>" class="caps small">Read the full article.</a></p>
</article>
<div class="col-md-4 mb-1">
	<div class="sticky-top pt-5 mb-5">
		<h4 class="mb-1">
			<!-- Begin Mailchimp Signup Form -->
			<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
			<style type="text/css">
				#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
				/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
				   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
			</style>
			<div id="mc_embed_signup">
			<form action="https://prakashtmg.us19.list-manage.com/subscribe/post?u=10be16874cdd08ccd36abe708&amp;id=ce0e8d1af2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			    <div id="mc_embed_signup_scroll">
				<h2>New posts to your inbox</h2>
			<div class="mc-field-group">
				<label for="mce-NAME">Full Name </label>
				<input type="text" value="" name="NAME" class="required" id="mce-NAME">
			</div>
			<div class="mc-field-group">
				<label for="mce-EMAIL">Email </label>
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
			</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_10be16874cdd08ccd36abe708_ce0e8d1af2" tabindex="-1" value=""></div>
			    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><span class="small text-muted ml-2" style="line-height: 32px;">Opt-in to receive our newsletter.</span></div>
			    </div>
			</form>
			</div>

			<!--End mc_embed_signup-->
		</h4>
	</div>
</div>

<?php } //End of first Loop
else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if ($postCount == 9 && (is_home() && $paged ==1)) { ?>
	<div class="row mb-1 py-4" style="clear:both;"> 
	<?php 
	
	$args = array(
		'category_name' => 'featured',
		'posts_per_page'         => '2',
		'ignore_sticky_posts'    => true,
	);
	 
	$featured_query = new WP_Query( $args );
	 
	// Check that we have query results.
	if ( $featured_query->have_posts() ) {
	 
	    // Start looping over the query results.
	    while ( $featured_query->have_posts() ) {
	 
	        $featured_query->the_post();
	        ?>
	        <div class="col-12 col-md-6"> 
				<article class="post d-flex flex-column mb-2"> 
					<small class="small text-success">FEATURED</small> 
					<?php
					if (has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" class="h-100 w-100 z-depth-1 mb-2">
					<div class="full-bg-image w-100 h-100" style="min-height: 12rem;background-position:center center;background-image:url('<?php echo get_the_post_thumbnail_url(''); ?>');">
					</div>
					</a> 
					<?php }
					?>
					
					<h2 class="headline mb-1">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2> 
					<div class="entry-meta">
						<small class="text-muted">
							<span class="the-author mt-2" style="display: block;">
								<?php the_author(); ?>
							</span>
							<span class="the-time mt-2">Updated <?php echo get_the_date(); ?>
							</span>
						</small>
					</div>
				</article>
			</div> 
	        <?php
	    }
	}
	 
	// Restore original post data.
	wp_reset_postdata();
	?> 
	</div>
	<?php }	
?>
<article class="mb-4 post col-12 col-sm-6 col-md-4"> 
	<div class="white z-depth-1 d-flex flex-column h-100" style="min-height: 14rem;"> 
		<?php
		if(has_post_thumbnail()){ ?>
		<div class="full-bg-image post-img mb-1 d-block clearfix" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>');">
			<a href="<?php the_permalink(); ?>" class="postthumb h-100 w-100"></a>
		</div>

		<?php }
		?>
		 
		<div class="p-3 pt-1"> 
			<?php
			if (get_avatar(get_the_author_meta('ID')) !== FALSE) {
			?>
			<div class="text-right float-right" style="margin-top:-2.6rem;"> 
				<img class="ml-2 rounded-circle white" style="padding:3px;width:3rem;height: 3rem;" alt="" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) , 32 ); ?>"> 
			</div>	
			<?php }
			?>
			 
			<h2 class="headline mb-0 small strong"> 
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
			</h2> 
		</div>  
	</div> 
</article>
<?php } // end of else loop