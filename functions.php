<?php
/**
 * nirvair functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nirvair
 */

if ( ! function_exists( 'nirvair_portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nirvair_portfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nirvair, use a find and replace
		 * to change 'nirvair' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nirvair', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'nirvair' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nirvair_portfolio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nirvair_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nirvair_portfolio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nirvair_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'nirvair_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nirvair_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nirvair' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nirvair' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Service', 'nirvair' ),
		'id'            => 'sidebar-service',
		'before_widget' => '<div class="col-lg-4 col-md-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Testimonial', 'nirvair' ),
		'id'            => 'sidebar-testimonial',
		'before_widget' => '<div class="col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact', 'nirvair' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<div class="col-lg-3 col-md-6 mb-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="heading">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'nirvair_portfolio_widgets_init' );


/**
 * Registers a new Portfolio post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function nirvair_register_portfolio() {

	$labels = array(
		'name'               => __( 'Portfolios', 'nirvair' ),
		'singular_name'      => __( 'Portfolio', 'nirvair' ),
		'add_new'            => _x( 'Add New Portfolio', 'nirvair', 'nirvair' ),
		'add_new_item'       => __( 'Add New Portfolio', 'nirvair' ),
		'edit_item'          => __( 'Edit Portfolio', 'nirvair' ),
		'new_item'           => __( 'New Portfolio', 'nirvair' ),
		'view_item'          => __( 'View Portfolio', 'nirvair' ),
		'search_items'       => __( 'Search Portfolios', 'nirvair' ),
		'not_found'          => __( 'No Portfolios found', 'nirvair' ),
		'not_found_in_trash' => __( 'No Portfolios found in Trash', 'nirvair' ),
		'parent_item_colon'  => __( 'Parent Portfolio:', 'nirvair' ),
		'menu_name'          => __( 'Portfolios', 'nirvair' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'portfolio', $args );
}

add_action( 'init', 'nirvair_register_portfolio' );


/**
 * Create Custom Taxonomy: Project
 */ 
 
function nirvair_projects_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Projects', 'nirvair' ),
    'singular_name' => _x( 'Project Category', 'Project Category' ),
    'search_items' =>  __( 'Search Project Categories' ),
    'all_items' => __( 'All Project Categories' ),
    'parent_item' => __( 'Parent Project Category' ),
    'parent_item_colon' => __( 'Parent Project Category:' ),
    'edit_item' => __( 'Edit Project Category' ), 
    'update_item' => __( 'Update Project Category' ),
    'add_new_item' => __( 'Add New Project Category' ),
    'new_item_name' => __( 'New Project Category Name' ),
    'menu_name' => __( 'Project Categories' ),
  );    

// Now register the taxonomy
 
  register_taxonomy('project_category',array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_category' ),
  ));
 
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'nirvair_projects_hierarchical_taxonomy', 0 );

/**
 * Enqueue scripts and styles.
 */
function nirvair_portfolio_scripts() {
	// wp_enqueue_style( 'nirvair-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'nirvair-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:400,500,700&display=swap', false ); 

	wp_enqueue_style( 'nirvair-bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css',false,'4.3.1','all');

	wp_enqueue_style( 'nirvair-fontawesome-free', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css',false,'5.12.1','all');

	wp_enqueue_style( 'nirvair-simple-line-icons', get_template_directory_uri() . '/vendor/simple-line-icons/css/simple-line-icons.css',false,'2.4.0','all');

	wp_enqueue_style( 'nirvair-hexagon-buttons-style', get_template_directory_uri() . '/vendor/hexagon-buttons/css/hexagons.min.css',false,'1.0.1','all');

	wp_enqueue_style( 'nirvair-animate-css', get_template_directory_uri() . '/vendor/animate-css/animate.css',false,'3.7.2','all');

	wp_enqueue_style( 'nirvair-style', get_template_directory_uri() . '/css/nirvair.css',false,'1.1','all');

	wp_enqueue_script( 'nirvair-bootstrap-script', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array ( 'jquery' ), '4.3.1', true);

	wp_enqueue_script( 'nirvair-hexagon-buttons-script', get_template_directory_uri() . '/vendor/hexagon-buttons/js/hexagons.min.js', array ( 'jquery' ), false, true);

	wp_enqueue_script( 'nirvair-jquery-easing', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.1.3.js', array ( 'jquery' ), '1.3', true);

	wp_enqueue_script( 'nirvair-mixitup', get_template_directory_uri() . '/vendor/mixitup/mixitup.min.js', array ( 'jquery' ), 'v3.3.1', true);

	wp_enqueue_script( 'nirvair-waypoints', get_template_directory_uri() . '/vendor/waypoints/jquery.waypoints.min.js', array ( 'jquery' ), '4.0.1', true);

	wp_enqueue_script( 'nirvair-script', get_template_directory_uri() . '/js/nirvair.js', array ( 'jquery' ), 1.1, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nirvair_portfolio_scripts' );


function fontawesome_dashboard() {
	wp_enqueue_style( 'nirvair-fontawesome-free', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css',false,'5.12.1','all');
}

add_action('admin_init', 'fontawesome_dashboard');

/**
 * Check if WooCommerce is active
 * Use in the active_callback when adding the WooCommerce Section to test if WooCommerce is activated
 *
 * @return boolean
 */
function nirvair_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}


/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
 * This is a sample function to display some social icons on your site.
 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
 * Add the following code to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
 * <div class="social">
 *	 <?php echo skyrocket_get_social_media(); ?>
 * </div>
 *
 * @return string Unordered list of linked social media icons
 */
if ( ! function_exists( 'nirvair_get_social_media' ) ) {
	function nirvair_get_social_media() {
		$defaults = skyrocket_generate_defaults();
		$output = array();
		$social_icons = nirvair_generate_social_urls();
		$social_urls = explode( ',', get_theme_mod( 'social_urls', $defaults['social_urls'] ) );
		$social_newtab = get_theme_mod( 'social_newtab', $defaults['social_newtab'] );
		$social_alignment = get_theme_mod( 'social_alignment', $defaults['social_alignment'] );
		$contact_phone = get_theme_mod( 'contact_phone', $defaults['contact_phone'] );

		if( !empty( $contact_phone ) ) {
			$output[] = sprintf( '<li class="%1$s"><i class="%2$s"></i>%3$s</li>',
				'phone',
				'fas fa-phone fa-flip-horizontal',
				$contact_phone
			);
		}

		foreach( $social_urls as $key => $value ) {
			if ( !empty( $value ) ) {
				$domain = str_ireplace( 'www.', '', parse_url( $value, PHP_URL_HOST ) );
				$index = array_search( strtolower( $domain ), array_column( $social_icons, 'url' ) );
				if( false !== $index ) {
					$output[] = sprintf( '<li class="%1$s"><a href="%2$s" title="%3$s"%4$s><i class="%5$s"></i></a></li>',
						$social_icons[$index]['class'],
						esc_url( $value ),
						$social_icons[$index]['title'],
						( !$social_newtab ? '' : ' target="_blank"' ),
						$social_icons[$index]['icon']
					);
				}
				else {
					$output[] = sprintf( '<li class="nosocial"><a href="%2$s"%3$s><i class="%4$s"></i></a></li>',
						$social_icons[$index]['class'],
						esc_url( $value ),
						( !$social_newtab ? '' : ' target="_blank"' ),
						'fas fa-globe'
					);
				}
			}
		}

		if( get_theme_mod( 'social_rss', $defaults['social_rss'] ) ) {
			$output[] = sprintf( '<li class="%1$s"><a href="%2$s" title="%3$s"%4$s><i class="%5$s"></i></a></li>',
				'rss',
				home_url( '/feed' ),
				'Subscribe to my RSS feed',
				( !$social_newtab ? '' : ' target="_blank"' ),
				'fas fa-rss'
			);
		}

		if ( !empty( $output ) ) {
			$output = apply_filters( 'skyrocket_social_icons_list', $output );
			array_unshift( $output, '<ul class="social-icons ' . $social_alignment . '">' );
			$output[] = '</ul>';
		}

		return implode( '', $output );
	}
}

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function portfolio_fields_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function portfolio_fields_add_meta_box() {
	add_meta_box(
		'portfolio_fields-portfolio-fields',
		__( 'Portfolio Fields', 'portfolio_fields' ),
		'portfolio_fields_html',
		'portfolio',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'portfolio_fields_add_meta_box' );

function portfolio_fields_html( $post) {
	wp_nonce_field( '_portfolio_fields_nonce', 'portfolio_fields_nonce' ); ?>

	<p>
		<label for="portfolio_fields_client"><?php _e( 'Client', 'portfolio_fields' ); ?></label><br>
		<input type="text" name="portfolio_fields_client" id="portfolio_fields_client" value="<?php echo portfolio_fields_get_meta( 'portfolio_fields_client' ); ?>">
	</p>	<p>
		<label for="portfolio_fields_date"><?php _e( 'Date', 'portfolio_fields' ); ?></label><br>
		<input type="text" name="portfolio_fields_date" id="portfolio_fields_date" value="<?php echo portfolio_fields_get_meta( 'portfolio_fields_date' ); ?>">
	</p>	<p>
		<label for="portfolio_fields_skills"><?php _e( 'Skills', 'portfolio_fields' ); ?></label><br>
		<input type="text" name="portfolio_fields_skills" id="portfolio_fields_skills" value="<?php echo portfolio_fields_get_meta( 'portfolio_fields_skills' ); ?>">
	</p>	<p>
		<label for="portfolio_fields_link"><?php _e( 'Link', 'portfolio_fields' ); ?></label><br>
		<input type="text" name="portfolio_fields_link" id="portfolio_fields_link" value="<?php echo portfolio_fields_get_meta( 'portfolio_fields_link' ); ?>">
	</p><?php
}

function portfolio_fields_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['portfolio_fields_nonce'] ) || ! wp_verify_nonce( $_POST['portfolio_fields_nonce'], '_portfolio_fields_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['portfolio_fields_client'] ) )
		update_post_meta( $post_id, 'portfolio_fields_client', esc_attr( $_POST['portfolio_fields_client'] ) );
	if ( isset( $_POST['portfolio_fields_date'] ) )
		update_post_meta( $post_id, 'portfolio_fields_date', esc_attr( $_POST['portfolio_fields_date'] ) );
	if ( isset( $_POST['portfolio_fields_skills'] ) )
		update_post_meta( $post_id, 'portfolio_fields_skills', esc_attr( $_POST['portfolio_fields_skills'] ) );
	if ( isset( $_POST['portfolio_fields_link'] ) )
		update_post_meta( $post_id, 'portfolio_fields_link', esc_attr( $_POST['portfolio_fields_link'] ) );
}
add_action( 'save_post', 'portfolio_fields_save' );

/*
	Usage: portfolio_fields_get_meta( 'portfolio_fields_client' )
	Usage: portfolio_fields_get_meta( 'portfolio_fields_date' )
	Usage: portfolio_fields_get_meta( 'portfolio_fields_skills' )
	Usage: portfolio_fields_get_meta( 'portfolio_fields_link' )
*/

function nirvair_add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="js-scroll-trigger"', $ulclass);
}
add_filter('wp_nav_menu','nirvair_add_menuclass');
	
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/custom-widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

