<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nirvair
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<header class="entry-header my-3">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
	
	<div class="container">
		<?php 
		if (has_post_thumbnail()) {?>
			<div class="post-header-image full-bg-image mb-4 z-depth-1" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>');"></div>
		<?php }
		?>
		
		<div class="row">
			<div class="entry-content blog_content col-lg-7 pt-3">
				<?php
				the_content();
				?>

				<div style="padding: 10px; background-color: #ccc;">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
		               <div class="addthis_inline_share_toolbox"></div>
				</div>

				<div class="post-navigation my-3">
					<div class="nav-previous"> <?php next_post_link( '%link', '<span class="meta-nav">←</span> Previous Post', true ); ?></div>
					<div class="nav-next"><?php previous_post_link( '%link', 'Next Post <span class="meta-nav">→</span>', true ); ?> </div>
				</div>

				<div class="author-block author post-author mt-5"> 
					<h4 class="caps">Author</h4> 
					<div class="media" itemprop="author"> 
						<?php
						if (get_avatar(get_the_author_meta('ID')) !== FALSE) { ?>
						<img class="d-flex mr-3 rounded-circle img-fluid avatar" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) , 32 ); ?>" alt="">
						<?php }
						?>

						<div class="media-body pt-4 pb-3"> 
							<h5 class="mt-0 caps" itemprop="name">
							<span class="author">
								<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
							</span>
							</h5> 
							<?php echo nl2br(get_the_author_meta('description')); ?> 
						</div> 
					</div> 
				</div>
			</div><!-- .entry-content -->

			<div class="col-lg-4 ml-lg-auto">
				<div class="entry-meta">
					<small class="text-muted">
						<span class="the-author mt-2" style="display: block;">
							<?php the_author(); ?>
						</span>
						<span class="the-time mt-2">Updated <?php echo get_the_date(); ?>
						</span>
					</small>
					<div>
						
		                <!-- Go to www.addthis.com/dashboard to customize your tools -->
		                <div class="addthis_inline_share_toolbox mt-2"></div>
		            
					</div>
				</div>
				
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
		</div>

		<!-- Related Post --> 
		<div id="related_posts">
			<h3 class="text-center my-5">You May Also Like</h3>
			<div class="row">
			<?php 
			$orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 4, // Number of related posts that will be shown.
					'ignore_sticky_posts'=>1,
					'orderby'   => 'rand',
				);

				$related_post_query = new wp_query( $args );
				if( $related_post_query->have_posts() ) {
					while( $related_post_query->have_posts() ) {
					$related_post_query->the_post();?>

					<article class="mb-4 post col-12 col-sm-6 col-md-3"> 
						<div class="white z-depth-1 d-flex flex-column h-100" style="min-height: 14rem;"> 
							<?php
							if(has_post_thumbnail()){ ?>
							<div class="full-bg-image post-img mb-1 d-block clearfix" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>');">
								<a href="<?php the_permalink(); ?>" class="postthumb h-100 w-100"></a>
							</div>

							<?php }
							?>
							 
							<div class="p-3 pt-1"> 
								<h2 class="headline mb-0 small strong"> 
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
								</h2> 
							</div>  
						</div> 
					</article>
					<?php
					}
				}
			}
			$post = $orig_post;
			wp_reset_query(); ?>
			</div>
		</div>

		<div class="row"> 
			<div class="col-12 col-lg-7"> 
				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			</div> 

			<div class="col-0 ml-lg-auto col-lg-4"> 
				<?php 
				get_sidebar();
				?> 
			</div> 
		</div>
	</div>
</article>