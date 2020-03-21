<?php
/**
 * nirvair Theme Customizer
 *
 * @package nirvair
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nirvair_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'nirvair_portfolio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'nirvair_portfolio_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'nirvair_portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function nirvair_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function nirvair_portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nirvair_portfolio_customize_preview_js() {
	wp_enqueue_script( 'nirvair-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'nirvair_portfolio_customize_preview_js' );



/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class nirvair_initialise_customizer_settings {
	// Get our default values

	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'nirvair_add_customizer_panels' ) );

		// Register sections
		add_action( 'customize_register', array( $this, 'nirvair_add_customizer_sections' ) );

		// Register Masthead controls
		add_action( 'customize_register', array( $this, 'nirvair_register_masthead_controls' ) );

		// Register About controls
		add_action( 'customize_register', array( $this, 'nirvair_register_about_controls' ) );

		// Register Services controls
		add_action( 'customize_register', array( $this, 'nirvair_register_service_controls' ) );

		// Register Portfolio controls
		add_action( 'customize_register', array( $this, 'nirvair_register_portfolio_controls' ) );

		// Register Testimonials controls
		add_action( 'customize_register', array( $this, 'nirvair_register_testimonial_controls' ) );

		// Register Articles controls
		add_action( 'customize_register', array( $this, 'nirvair_register_article_controls' ) );

		// Register CTA controls
		add_action( 'customize_register', array( $this, 'nirvair_register_cta_controls' ) );

		// Register Contact controls
		add_action( 'customize_register', array( $this, 'nirvair_register_contact_controls' ) );

		// Register Footer controls
		add_action( 'customize_register', array( $this, 'nirvair_register_footer_controls' ) );

	}

	/**
	 * Register Frontpage Sections Panel
	 */
	public function nirvair_add_customizer_panels( $wp_customize ) {
		/**
		 * Add our Frontpage Sections Panel
		 */
		 $wp_customize->add_panel( 'frontpage_sections_panel',
		 	array(
				'title' => __( 'Frontpage Sections', 'nirvair' ),
				'description' => esc_html__( 'Adjust your Frontpage sections.', 'nirvair' ),
				'priority' => 41,
			)
		);
	}

	/**
	 * Register the Frontpage sections
	 */
	public function nirvair_add_customizer_sections( $wp_customize ) {
		/**
		 * Add our Masthead Section
		 */
		$wp_customize->add_section( 'masthead_section',
			array(
				'title' => __( 'Masthead Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 42,
			)
		);

		/**
		 * Add our About Section
		 */
		$wp_customize->add_section( 'about_section',
			array(
				'title' => __( 'About Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 43,
			)
		);

		/**
		 * Add our Services Section
		 */
		$wp_customize->add_section( 'service_section',
			array(
				'title' => __( 'Service Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 44,
			)
		);

		/**
		 * Add our Portfolio Section
		 */
		$wp_customize->add_section( 'portfolio_section',
			array(
				'title' => __( 'Portfolio Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 44,
			)
		);

		/**
		 * Add our Testimonial Section
		 */
		$wp_customize->add_section( 'testimonial_section',
			array(
				'title' => __( 'Testimonial Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 46,
			)
		);

		/**
		 * Add our Article Section
		 */
		$wp_customize->add_section( 'article_section',
			array(
				'title' => __( 'Article Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 47,
			)
		);

		/**
		 * Add our CTA Section
		 */
		$wp_customize->add_section( 'cta_section',
			array(
				'title' => __( 'CTA Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 48,
			)
		);

		/**
		 * Add our Contact Section
		 */
		$wp_customize->add_section( 'contact_section',
			array(
				'title' => __( 'Contact Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 49,
			)
		);

		/**
		 * Add our Footer Section
		 */
		$wp_customize->add_section( 'footer_section',
			array(
				'title' => __( 'Footer Section', 'nirvair' ),
				'description' => esc_html__( ' ', 'nirvair' ),
				'panel' => 'frontpage_sections_panel',
				'priority' => 50,
			)
		);
	}

	/**
	 * Register Masthead controls
	 */
	public function nirvair_register_masthead_controls( $wp_customize ) {
		// Hide Masthead Section
		$wp_customize->add_setting( 'hide_masthead_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_masthead_section',
			array(
				'label' => __( 'Hide Masthead Section?', 'nirvair' ),
				'section' => 'masthead_section',
				'priority' => 1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_masthead_section',
			array(
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo nirvair_get_social_media();
				},
				'fallback_refresh' => true
			)
		);

		// Masthead Background Image
		$wp_customize->add_setting( 'masthead_background_img',
			array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'masthead_background_img',
			array(
				'label' => __( 'Background Image', 'nirvair' ),
				'section' => 'masthead_section',
				'button_labels' => array(
					'select' => __( 'Select Image', 'nirvair' ),
					'change' => __( 'Change Image', 'nirvair' ),
					'remove' => __( 'Remove', 'nirvair' ),
					'default' => __( 'Default', 'nirvair' ),
					'placeholder' => __( 'No image selected', 'nirvair' ),
					'frame_title' => __( 'Select Image', 'nirvair' ),
					'frame_button' => __( 'Choose Image', 'nirvair' ),
				),
				'priority' => 2,
			)
		) );

		// Add Masthead Title 
		$masthead_title_default = get_theme_mod( 'masthead_title' );

		$wp_customize->add_setting( 'masthead_title',
			array(
				'default'           => ! empty( $masthead_title_default ) ? $masthead_title_default : __( 'This piece of text can be changed in Masthead Title Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'masthead_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'masthead_section',
				'priority' => 3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'masthead_title',
			array(
				'selector' => '.masthead .masthead_title',
				'settings' => 'masthead_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'masthead_title' ) );
				},
			)
		);

		// Add Masthead Text
		$masthead_text_default = get_theme_mod( 'masthead_text' );

		$wp_customize->add_setting( 'masthead_text',
			array(
				'default'           => ! empty( $masthead_text_default ) ? $masthead_text_default : __( 'This piece of text can be changed in Masthead Text Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'masthead_text',
			array(
				'label' => __( 'Text', 'nirvair' ),
				'type' => 'text',
				'section' => 'masthead_section',
				'priority' => 4,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'masthead_text',
			array(
				'selector' => '.masthead .masthead_text',
				'settings' => 'masthead_text',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'masthead_text' ) );
				},
			)
		);

		/* Facebook */
		$wp_customize->add_setting(
			'masthead_socials_facebook',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'masthead_socials_facebook',
			array(
				'label'    => __( 'Facebook link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 5,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_facebook',
			array(
				'selector' => '.masthead .social #facebook',
				'settings' => 'masthead_socials_facebook',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="facebook">';
	                $output .= '<a href="' . $masthead_socials_facebook . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-facebook-inv">';
	                      $output .= '<i class="fab fa-facebook-f"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);

		/* Twitter */
		$wp_customize->add_setting(
			'masthead_socials_twitter',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'masthead_socials_twitter',
			array(
				'label'    => __( 'Twitter link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 6,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_twitter',
			array(
				'selector' => '.masthead .social #twitter',
				'settings' => 'masthead_socials_twitter',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="twitter">';
	                $output .= '<a href="' . $masthead_socials_twitter . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-twitter-inv">';
	                      $output .= '<i class="fab fa-twitter"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);

		/* Linkedin */
		$wp_customize->add_setting(
			'masthead_socials_linkedin',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'masthead_socials_linkedin',
			array(
				'label'    => __( 'Linkedin link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 7,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_linkedin',
			array(
				'selector' => '.masthead .social #linkedin',
				'settings' => 'masthead_socials_linkedin',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="linkedin">';
	                $output .= '<a href="' . $masthead_socials_linkedin . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-linkedin-inv">';
	                      $output .= '<i class="fab fa-linkedin"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);

		/* Dribbble */
		$wp_customize->add_setting(
			'masthead_socials_dribbble',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'masthead_socials_dribbble',
			array(
				'label'    => __( 'Dribbble link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 8,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_dribbble',
			array(
				'selector' => '.masthead .social #dribbble',
				'settings' => 'masthead_socials_dribbble',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="dribbble">';
	                $output .= '<a href="' . $masthead_socials_dribbble . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-dribbble-inv">';
	                      $output .= '<i class="fab fa-dribbble"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);

		/* YouTube */
		$wp_customize->add_setting(
			'masthead_socials_youtube',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'masthead_socials_youtube',
			array(
				'label'    => __( 'YouTube link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 9,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_youtube',
			array(
				'selector' => '.masthead .social #youtube',
				'settings' => 'masthead_socials_youtube',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="youtube">';
	                $output .= '<a href="' . $masthead_socials_youtube . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-youtube-inv">';
	                      $output .= '<i class="fab fa-youtube"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);

		/* Github */
		$wp_customize->add_setting(
			'masthead_socials_github',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'masthead_socials_github',
			array(
				'label'    => __( 'Github link', 'nirvair' ),
				'section'  => 'masthead_section',
				'priority' => 10,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'masthead_socials_github',
			array(
				'selector' => '.masthead .social #github',
				'settings' => 'masthead_socials_github',
				'render_callback' => function() {
					$output =  '<li class="list-inline-item" id="github">';
	                $output .= '<a href="' . $masthead_socials_github . '" target="_blank">';
	                $output .= '<span class="hb hb-sm inv spin-icon hb-github-inv">';
	                      $output .= '<i class="fab fa-github"></i>';
	                  $output .= '</span>';
	                $output .= '</a>';
	              $output .= '</li>';
					return $output;
				},
			)
		);
	}

	/**
	 * Register About controls
	 */
	public function nirvair_register_about_controls( $wp_customize ) {
		// Hide About Section
		$wp_customize->add_setting( 'hide_about_section',
			array(
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_about_section',
			array(
				'label' => __( 'Hide About Section?', 'nirvair' ),
				'section' => 'about_section',
				'priority' => 1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_about_section',
			array(
				'selector' => '#about',
				'settings' => 'hide_about_section',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		// Add About Title 
		$about_title_default = get_theme_mod( 'about_title' );

		$wp_customize->add_setting( 'about_title',
			array(
				'default'           => ! empty( $about_title_default ) ? $about_title_default : __( 'About Me', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'about_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'about_section',
				'priority' => 2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_title',
			array(
				'selector' => '#about .section-heading',
				'settings' => 'about_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'about_title' ) );
				},
			)
		);

		// Add About Sub title 
		$about_subtitle_default = get_theme_mod( 'about_subtitle' );

		$wp_customize->add_setting( 'about_subtitle',
			array(
				'default'           => ! empty( $about_subtitle_default ) ? $about_subtitle_default : __( 'This piece of text can be changed in About Subtitle Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'about_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'about_section',
				'priority' => 3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_subtitle',
			array(
				'selector' => '#about .section-subheading',
				'settings' => 'about_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'about_subtitle' ) );
				},
			)
		);

		// Add About Description
		$about_description_default = get_theme_mod( 'about_description' );

		$wp_customize->add_setting( 'about_description',
			array(
				'default'           => ! empty( $about_description_default ) ? $about_description_default : __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa dui, convallis sit amet lacus eu, iaculis volutpat mauris. Cras sit amet turpis eu dui mollis luctus vitae laoreet nunc. Nulla mi massa, vulputate a blandit a, mollis vel leo. Nam ex, auctor non faucibus sed, euismod quis dolor. Praesent pellentesque mi rutrum, mattis urna in, gravida arcu. Donec sed auctor justo, quis viverra est. Etiam quis mattis erat. Quisque euismod, tellus eu rutrum cursus, nunc arcu aliquam augue, a cursus quam urna nec magna. Cras sit amet turpis eu dui mollis luctus vitae laoreet nunc. Nulla mi massa, vulputate a blandit a, convallis sit amet lacus eu, iaculis volutpat mauris gravida arcu. Phasellus at risus in turpis gravida cursus eget ac lorem.', 'nirvair' ),
				'transport' => 'postMessage',
				// 'sanitize_callback' => 'wp_kses_post'
			)
		);
		$wp_customize->add_control( new Nirvair_TinyMCE_Custom_control( $wp_customize, 'about_description',
			array(
				'label' => __( 'Description', 'nirvair' ),
				'section' => 'about_section',
				'input_attrs' => array(
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
					'mediaButtons' => true,
					'priority' => 4,
				)
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'about_description',
			array(
				'selector' => '#about .section-description',
				'settings' => 'about_description',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'about_description' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'about_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'about_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'about_section',
				'priority' => 10,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'about_enable_background',
			array(
				'selector' => '#about',
				'settings' => 'about_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);
	}

	/**
	 * Register Service controls
	 */
	public function nirvair_register_service_controls( $wp_customize ) {
		// Hide Service Section
		$wp_customize->add_setting( 'hide_service_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_service_section',
			array(
				'label' => __( 'Hide Service Section?', 'nirvair' ),
				'section' => 'service_section',
				'priority' => -4,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_service_section',
			array(
				'selector' => '#services',
				'settings' => 'hide_service_section',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		// Add Service Title 
		$service_title_default = get_theme_mod( 'service_title' );

		$wp_customize->add_setting( 'service_title',
			array(
				'default'           => ! empty( $service_title_default ) ? $service_title_default : __( 'Services', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'service_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'service_section',
				'priority' => -3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'service_title',
			array(
				'selector' => '#services .section-heading',
				'settings' => 'service_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'service_title' ) );
				},
			)
		);

		// Add About Sub title 
		$service_subtitle_default = get_theme_mod( 'service_subtitle' );

		$wp_customize->add_setting( 'service_subtitle',
			array(
				'default'           => ! empty( $service_subtitle_default ) ? $service_subtitle_default : __( 'This piece of text can be changed in Service Subtitle Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'service_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'service_section',
				'priority' => -2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'service_subtitle',
			array(
				'selector' => '#services .section-subheading',
				'settings' => 'service_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'service_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'service_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'service_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'service_section',
				'priority' => -1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'service_enable_background',
			array(
				'selector' => '#services',
				'settings' => 'service_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		$nirvair_service_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-service' );
		if ( ! empty( $nirvair_service_section ) ) {

			$nirvair_service_section->panel = 'frontpage_sections_panel';
			$nirvair_service_section->title = __( 'Service Section', 'nirvair' );
			$nirvair_service_section->priority = 44;
			$wp_customize->get_control( 'hide_service_section' )->section     = 'sidebar-widgets-sidebar-service';
			$wp_customize->get_control( 'service_title' )->section    = 'sidebar-widgets-sidebar-service';
			$wp_customize->get_control( 'service_subtitle' )->section = 'sidebar-widgets-sidebar-service';
			$wp_customize->get_control( 'service_enable_background' )->section = 'sidebar-widgets-sidebar-service';
		}
	}

	/**
	 * Register Portfolio controls
	 */
	public function nirvair_register_portfolio_controls( $wp_customize ) {
		// Hide Portfolio Section
		$wp_customize->add_setting( 'hide_portfolio_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_portfolio_section',
			array(
				'label' => __( 'Hide Portfolio Section?', 'nirvair' ),
				'section' => 'portfolio_section',
				'priority' => 1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_portfolio_section',
			array(
				array(
					'selector' => '#portfolio',
					'settings' => 'hide_portfolio_section',
					'container_inclusive' => false,
					'fallback_refresh' => true
				)
			)
		);

		// Add Portfolio Title 
		$portfolio_title_default = get_theme_mod( 'portfolio_title' );

		$wp_customize->add_setting( 'portfolio_title',
			array(
				'default'           => ! empty( $portfolio_title_default ) ? $portfolio_title_default : __( 'Portfolio', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'portfolio_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'portfolio_section',
				'priority' => 2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_title',
			array(
				'selector' => '#portfolio .section-heading',
				'settings' => 'portfolio_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'portfolio_title' ) );
				},
			)
		);

		// Add Portfolio Sub title 
		$portfolio_subtitle_default = get_theme_mod( 'portfolio_subtitle' );

		$wp_customize->add_setting( 'portfolio_subtitle',
			array(
				'default'           => ! empty( $portfolio_subtitle_default ) ? $portfolio_subtitle_default : __( 'This piece of text can be changed in Service Subtitle Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'portfolio_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'portfolio_section',
				'priority' => 3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_subtitle',
			array(
				'selector' => '#portfolio .section-subheading',
				'settings' => 'portfolio_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'portfolio_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'portfolio_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'portfolio_section',
				'priority' => 5,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'portfolio_enable_background',
			array(
				'selector' => '#portfolio',
				'settings' => 'portfolio_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);
	}

	/**
	 * Register Testimonial controls
	 */
	public function nirvair_register_testimonial_controls( $wp_customize ) {
		// Hide Testimonial Section
		$wp_customize->add_setting( 'hide_testimonial_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_testimonial_section',
			array(
				'label' => __( 'Hide Testimonial Section?', 'nirvair' ),
				'section' => 'testimonial_section',
				'priority' => -4,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_testimonial_section',
			array(
				array(
					'selector' => '#testimonial',
					'settings' => 'hide_testimonial_section',
					'container_inclusive' => false,
					'fallback_refresh' => true
				)
			)
		);

		// Add Testimonial Title 
		$testimonial_title_default = get_theme_mod( 'testimonial_title' );

		$wp_customize->add_setting( 'testimonial_title',
			array(
				'default'           => ! empty( $testimonial_title_default ) ? $testimonial_title_default : __( 'Testimonial', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'testimonial_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'testimonial_section',
				'priority' => -3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'testimonial_title',
			array(
				'selector' => '#testimonial .section-heading',
				'settings' => 'testimonial_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'testimonial_title' ) );
				},
			)
		);

		// Add Testimonial Sub title 
		$testimonial_subtitle_default = get_theme_mod( 'testimonial_subtitle' );

		$wp_customize->add_setting( 'testimonial_subtitle',
			array(
				'default'           => ! empty( $testimonial_subtitle_default ) ? $testimonial_subtitle_default : __( 'This piece of text can be changed in Service Subtitle Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'testimonial_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'testimonial_section',
				'priority' => -2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'testimonial_subtitle',
			array(
				'selector' => '#testimonial .section-subheading',
				'settings' => 'testimonial_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'testimonial_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'testimonial_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'testimonial_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'testimonial_section',
				'priority' => -1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'testimonial_enable_background',
			array(
				'selector' => '#testimonial',
				'settings' => 'testimonial_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		$nirvair_testimonial_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-testimonial' );
		if ( ! empty( $nirvair_testimonial_section ) ) {

			$nirvair_testimonial_section->panel = 'frontpage_sections_panel';
			$nirvair_testimonial_section->title = __( 'Testimonial Section', 'nirvair' );
			$nirvair_testimonial_section->priority = 46;
			$wp_customize->get_control( 'hide_testimonial_section' )->section = 'sidebar-widgets-sidebar-testimonial';
			$wp_customize->get_control( 'testimonial_title' )->section = 'sidebar-widgets-sidebar-testimonial';
			$wp_customize->get_control( 'testimonial_subtitle' )->section = 'sidebar-widgets-sidebar-testimonial';
			$wp_customize->get_control( 'testimonial_enable_background' )->section = 'sidebar-widgets-sidebar-testimonial';
		}
	}

	/**
	 * Register Article controls
	 */
	public function nirvair_register_article_controls( $wp_customize ) {
		// Hide Article Section
		$wp_customize->add_setting( 'hide_article_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_article_section',
			array(
				'label' => __( 'Hide Article Section?', 'nirvair' ),
				'section' => 'article_section',
				'priority' => 1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_article_section',
			array(
				'selector' => '#blog',
				'settings' => 'hide_article_section',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		// Add Article Title 
		$article_title_default = get_theme_mod( 'article_title' );

		$wp_customize->add_setting( 'article_title',
			array(
				'default'           => ! empty( $article_title_default ) ? $article_title_default : __( 'Articles', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'article_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'article_section',
				'priority' => 2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'article_title',
			array(
				'selector' => '#blog .section-heading',
				'settings' => 'article_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'article_title' ) );
				},
			)
		);

		// Add Article Sub title 
		$article_subtitle_default = get_theme_mod( 'article_subtitle' );

		$wp_customize->add_setting( 'article_subtitle',
			array(
				'default'           => ! empty( $article_subtitle_default ) ? $article_subtitle_default : __( 'This piece of text can be changed in Service Subtitle Section', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'article_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'article_section',
				'priority' => 3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'article_subtitle',
			array(
				'selector' => '#blog .section-subheading',
				'settings' => 'article_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'article_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'article_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'article_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'article_section',
				'priority' => 4,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'article_enable_background',
			array(
				'selector' => '#blog',
				'settings' => 'article_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);
	}

	/**
	 * Register CTA controls
	 */
	public function nirvair_register_cta_controls( $wp_customize ) {
		// Hide CTA Section
		$wp_customize->add_setting( 'hide_cta_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_cta_section',
			array(
				'label' => __( 'Hide CTA Section?', 'nirvair' ),
				'section' => 'cta_section',
				'priority' => 1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_cta_section',
			array(
				'selector' => '.call-to-action',
				'settings' => 'hide_cta_section',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		// Add CTA Title 
		$cta_title_default = get_theme_mod( 'cta_title' );

		$wp_customize->add_setting( 'cta_title',
			array(
				'default'           => ! empty( $cta_title_default ) ? $cta_title_default : __( 'Let\’s Get Started your project', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'cta_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'cta_section',
				'priority' => 2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'cta_title',
			array(
				'selector' => '.call-to-action .section-heading',
				'settings' => 'cta_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'cta_title' ) );
				},
			)
		);

		// Add CTA Sub title 
		$cta_subtitle_default = get_theme_mod( 'cta_subtitle' );

		$wp_customize->add_setting( 'cta_subtitle',
			array(
				'default'           => ! empty( $cta_subtitle_default ) ? $cta_subtitle_default : __( 'We will help you to achieve your goals and to grow your business.', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'cta_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'cta_section',
				'priority' => 3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'cta_subtitle',
			array(
				'selector' => '.call-to-action .section-subheading',
				'settings' => 'cta_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'cta_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'cta_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'cta_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'cta_section',
				'priority' => 4,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'cta_enable_background',
			array(
				'selector' => '.call-to-action',
				'settings' => 'cta_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);
	}

	/**
	 * Register Contact controls
	 */
	public function nirvair_register_contact_controls( $wp_customize ) {
		// Hide Contact Section
		$wp_customize->add_setting( 'hide_contact_section',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'hide_contact_section',
			array(
				'label' => __( 'Hide Contact Section?', 'nirvair' ),
				'section' => 'contact_section',
				'priority' => -4,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'hide_contact_section',
			array(
				'selector' => '#contact',
				'settings' => 'hide_contact_section',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		// Add Contact Title 
		$contact_title_default = get_theme_mod( 'contact_title' );

		$wp_customize->add_setting( 'contact_title',
			array(
				'default'           => ! empty( $contact_title_default ) ? $contact_title_default : __( 'Contact', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'contact_title',
			array(
				'label' => __( 'Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'contact_section',
				'priority' => -3,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'contact_title',
			array(
				'selector' => '#contact .section-heading',
				'settings' => 'contact_title',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'contact_title' ) );
				},
			)
		);

		// Add Contact Sub title 
		$contact_subtitle_default = get_theme_mod( 'contact_subtitle' );

		$wp_customize->add_setting( 'contact_subtitle',
			array(
				'default'           => ! empty( $contact_subtitle_default ) ? $contact_subtitle_default : __( 'Let\'s Talk', 'nirvair' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'contact_subtitle',
			array(
				'label' => __( 'Sub Title', 'nirvair' ),
				'type' => 'text',
				'section' => 'contact_section',
				'priority' => -2,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'contact_subtitle',
			array(
				'selector' => '#contact .section-subheading',
				'settings' => 'contact_subtitle',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'contact_subtitle' ) );
				},
			)
		);

		// Enable Colored Background
		$wp_customize->add_setting( 'contact_enable_background',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'nirvair_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Nirvair_Toggle_Switch_Custom_control( $wp_customize, 'contact_enable_background',
			array(
				'label' => __( 'Enable Colored Background?', 'nirvair' ),
				'section' => 'contact_section',
				'priority' => -1,
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'contact_enable_background',
			array(
				'selector' => '#contact',
				'settings' => 'contact_enable_background',
				'container_inclusive' => false,
				'fallback_refresh' => true
			)
		);

		$nirvair_contact_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-contact' );
		if ( ! empty( $nirvair_contact_section ) ) {

			$nirvair_contact_section->panel = 'frontpage_sections_panel';
			$nirvair_contact_section->title = __( 'Contact Section', 'nirvair' );
			$nirvair_contact_section->priority = 49;
			$wp_customize->get_control( 'hide_contact_section' )->section = 'sidebar-widgets-sidebar-contact';
			$wp_customize->get_control( 'contact_title' )->section = 'sidebar-widgets-sidebar-contact';
			$wp_customize->get_control( 'contact_subtitle' )->section = 'sidebar-widgets-sidebar-contact';
			$wp_customize->get_control( 'contact_enable_background' )->section = 'sidebar-widgets-sidebar-contact';
		}
	}

	/**
	 * Register Footer controls
	 */
	public function nirvair_register_footer_controls( $wp_customize ) {
		/* Facebook */
		$wp_customize->add_setting(
			'footer_socials_facebook',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_socials_facebook',
			array(
				'label'    => __( 'Facebook link', 'nirvair' ),
				'section'  => 'footer_section',
				'priority' => 1,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_socials_facebook',
			array(
				'selector' => 'footer #facebook',
				'settings' => 'footer_socials_facebook',
				'render_callback' => function() {
					$output = '<li class="list-inline-item" id="facebook">';
				    $output .= '<a href="' . get_theme_mod( 'footer_socials_facebook' ) . '" target="_blank" class="social-link rounded-circle text-white mr-3">';
				        $output .= '<i class="fab fa-facebook-f"></i>';
				    $output .= '</a>';
				    $output .= '</li>';
					return $output;
				},
			)
		);

		/* Twitter */
		$wp_customize->add_setting(
			'footer_socials_twitter',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_socials_twitter',
			array(
				'label'    => __( 'Twitter link', 'nirvair' ),
				'section'  => 'footer_section',
				'priority' => 2,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_socials_twitter',
			array(
				'selector' => 'footer #twitter',
				'settings' => 'footer_socials_twitter',
				'render_callback' => function() {
					$output = '<li class="list-inline-item" id="twitter">';
				    $output .= '<a href="' . get_theme_mod( 'footer_socials_twitter' ) . '" target="_blank" class="social-link rounded-circle text-white mr-3">';
				        $output .= '<i class="fab fa-twitter"></i>';
				    $output .= '</a>';
				    $output .= '</li>';
					return $output;
				},
			)
		);

		/* Linkedin */
		$wp_customize->add_setting(
			'footer_socials_linkedin',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'footer_socials_linkedin',
			array(
				'label'    => __( 'Linkedin link', 'nirvair' ),
				'section'  => 'footer_section',
				'priority' => 3,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_socials_linkedin',
			array(
				'selector' => 'footer #linkedin',
				'settings' => 'footer_socials_linkedin',
				'render_callback' => function() {
					$output = '<li class="list-inline-item" id="linkedin">';
				    $output .= '<a href="' . get_theme_mod( 'footer_socials_linkedin' ) . '" target="_blank" class="social-link rounded-circle text-white mr-3">';
				        $output .= '<i class="fab fa-linkedin"></i>';
				    $output .= '</a>';
				    $output .= '</li>';
					return $output;
				},
			)
		);


		/* YouTube */
		$wp_customize->add_setting(
			'footer_socials_youtube',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_socials_youtube',
			array(
				'label'    => __( 'YouTube link', 'nirvair' ),
				'section'  => 'footer_section',
				'priority' => 4,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_socials_youtube',
			array(
				'selector' => 'footer #youtube',
				'settings' => 'footer_socials_youtube',
				'render_callback' => function() {
					$output = '<li class="list-inline-item" id="youtube">';
				    $output .= '<a href="' . get_theme_mod( 'footer_socials_youtube' ) . '" target="_blank" class="social-link rounded-circle text-white mr-3">';
				        $output .= '<i class="fab fa-youtube"></i>';
				    $output .= '</a>';
				    $output .= '</li>';
					return $output;
				},
			)
		);

		/* Github */
		$wp_customize->add_setting(
			'footer_socials_github',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_socials_github',
			array(
				'label'    => __( 'Github link', 'nirvair' ),
				'section'  => 'footer_section',
				'priority' => 5,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_socials_github',
			array(
				'selector' => 'footer #github',
				'settings' => 'footer_socials_github',
				'render_callback' => function() {
					$output = '<li class="list-inline-item" id="github">';
				    $output .= '<a href="' . get_theme_mod( 'footer_socials_github' ) . '" target="_blank" class="social-link rounded-circle text-white mr-3">';
				        $output .= '<i class="fab fa-github"></i>';
				    $output .= '</a>';
				    $output .= '</li>';
					return $output;
				},
			)
		);

		// Add Copyright Text 
		$wp_customize->add_setting( 'copyright_text',
			array(
				'default'           => '',
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_html'
			)
		);
		$wp_customize->add_control( 'copyright_text',
			array(
				'label' => __( 'Copyright', 'nirvair' ),
				'type' => 'textarea',
				'section' => 'footer_section',
				'priority' => 6,
			)
		);
		$wp_customize->selective_refresh->add_partial( 'copyright_text',
			array(
				'selector' => 'footer #copyright',
				'settings' => 'copyright_text',
				'render_callback' => function() {
					return wp_kses_post( get_theme_mod( 'copyright_text' ) );
				},
			)
		);
	}
}

/**
 * Initialise our Customizer settings
 */
$nirvair_settings = new nirvair_initialise_customizer_settings();

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';