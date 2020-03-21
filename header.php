<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nirvair
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="page-top">

<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
<i class="fas fa-bars"></i>
</a>

<?php 
  wp_nav_menu( array(
    'theme_location'  => 'primary',
    'container'       => 'nav',
    'container_id'    => 'sidebar-wrapper',
    'menu_class'      => 'sidebar-nav',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'items_wrap'      => '<ul class = "%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => '',
  ) );
?>
