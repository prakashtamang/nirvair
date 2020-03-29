<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nirvair
 */

?>
<div class="col-sm-6 post mb-4">
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
		<div class="text-muted small">
			<span class="the-author mt-2" style="display: block;">
				<?php the_author(); ?>
			</span>
			<span class="the-time mt-2">Updated <?php echo get_the_date(); ?>
			</span>
		</div>
	</div>
	<div><?php the_excerpt(); ?></div>
	<p><a href="<?php the_permalink(); ?>" class="read-more small">Read the full article.</a></p>
</div>

