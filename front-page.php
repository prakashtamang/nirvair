<?php
/**
 * The Front Page Template
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


/* MASTHEAD SECTION */
$hide_masthead_section = get_theme_mod( 'hide_masthead_section' );

if ( $hide_masthead_section != 1 ) {

	get_template_part( 'frontpage-sections/masthead' );

}


/* ABOUT SECTION */
$hide_about_section = get_theme_mod( 'hide_about_section' );

if ( $hide_about_section != 1 ) {

	get_template_part( 'frontpage-sections/about' );

}

/* SERVICE SECTION */
$hide_service_section = get_theme_mod( 'hide_service_section' );

if ( $hide_service_section != 1 ) {

	get_template_part( 'frontpage-sections/services' );

}



get_template_part( 'frontpage-sections/portfolio' );

get_template_part( 'frontpage-sections/testimonials' );

get_template_part( 'frontpage-sections/articles' );

get_template_part( 'frontpage-sections/cta' );

get_template_part( 'frontpage-sections/contact' );





get_footer();