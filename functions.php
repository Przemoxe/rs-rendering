<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');



/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
};

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
};

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

//require "walker.php";
// require "customizer.php";
require "user-cms.php";
require "acf-blocks.php";
//require "hooks.php";
//require "filters_widget.php";


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */


class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		 add_action( 'init', array( $this, 'register_post_types' ) );
		 add_action( 'init', array( $this, 'register_menus' ) );
		 add_theme_support( 'post-thumbnails' );
		//  add_filter('show_admin_bar', '__return_false');
		 add_action( 'init', array( $this, 'custom_excerpt_length' ) );
		 add_action( 'init', array( $this, 'customCss' ) );

		 add_image_size( 'hero', 1920, 1080, true );
		 
		//  add_action( 'init', array( $this, 'lazyLoading' ) );
		 @register_sidebar('sidebar-1');
		 add_action('wp_enqueue_scripts', array($this, 'add_scripts'));
		 add_action('wp_enqueue_scripts', array($this, 'add_styles'));
		
		parent::__construct();
	// 		function true_register_oddzialy() {
	// 		$labels = array(
	// 			'name' => 'Oddziały',
	// 			'singular_name' => 'Oddziały',
	// 			'add_new' => 'Dodaj nowy',
	// 			'add_new_item' => 'Dodaj nowy element',
	// 			'edit_item' => 'Edytuj element',
	// 			'new_item' => 'Nowy element',
	// 			'all_items' => 'Wszystkie wydarzenia',
	// 			'view_item' => 'Zobacz na stronie',
	// 			'search_items' => 'Wyszukaj objekty',
	// 			'not_found' =>  'Nic nie znaleziono.',
	// 			'menu_name' => 'Oddziały'
				
	// 		);
	// 		$args = array(
	// 			'labels' => $labels,
	// 			'public' => true,
	// 			'menu_icon' => 'dashicons-admin-multisite',
	// 			'menu_position' => 5,
	// 			'has_archive' => true,
	// 			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
	// 			'taxonomies' => array('post_tag'),
	// 		    'hierarchical'               => true,
    // 'public'                     => true,
    // 'show_ui'                    => true,
    // 'show_admin_column'          => true,
    // 'show_in_rest'               => true,
	// 		);
	// 		register_post_type('oddzialy',$args);
	// 	}


		include (get_template_directory().'/inc/theme-customizer.php');
		add_action('customize_register','contactInfo');
		set_post_thumbnail_size( 300, 300 );
	}

	

	public function add_scripts() {
		wp_enqueue_script('main-js', get_bloginfo('template_url').'/assets/all.js', array('jquery'),true);      
	    wp_enqueue_script('google-map-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAQp0WlzNikv2UHS3_e1C8FB42Wn5lTjMc&', array(),'',true ); 
		wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js' );
		//wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js' );
		wp_enqueue_script( 'bootstrap_js3', get_template_directory_uri() . '/node_modules/fontawesome/css/all.css' );
		wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/inc/OwlCarousel/dist/owl.carousel.min.js', array( 'jquery' ), false );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/inc/jquery/jquery-3.6.0.min.js' );

		
		}
	public function add_styles() {
		wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css' );
		wp_enqueue_style( 'bootstrap_css2', get_template_directory_uri() . '/node_modules/bootstrap-icons/font/bootstrap-icons.css' );
		wp_enqueue_style( 'main-css', get_bloginfo('template_url') . '/assets/all.min.css', array(),'1.0' );
		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300', false ); 
		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'owl-css', get_bloginfo('template_url') . '/inc/OwlCarousel/dist/assets/owl.carousel.css', array(),'1.0' );
		wp_enqueue_style( 'fontello', get_bloginfo('template_url') . '/inc/fontello/css/fontello.css', array(),'1.0' );

		
		}


	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {
		require "terms.php";
	}

	/** register menu. */
	// public function register_menus() {
	// 	register_nav_menus(
	// 		array(
	// 		  'oddzialy_menu' => __( 'Odziały Menu' ),
	// 		  'branze_menu' => __( 'Branże Menu' ),
	// 		  'firma_menu' => __( 'Firma Menu' ),
	// 		  'footer_menu' => __( 'Footer Menu' ),
		
	// 		)
	// 	  );
	// }
		/** register menu. */
	

		public function custom_excerpt_length( $length ) {
			if (is_home()){	return 130;}
			else{ return 80;};
		  }

		// clear menu
	// 	public function customCss() {
	// 		wp_add_inline_style( 'custom-style',
	// 	'#adminmenu #menu-comments{
	// 	display: none;  
	// 	}'
	// );
	// 	}




	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
$context['curve']='<svg xmlns="http://www.w3.org/2000/svg" class="curve" width="1365" height="91.783" viewBox="0 0 1365 91.783"><path d="M-27.3,731.9s59.15-41.925,241.8-44.2,269.425,42.9,438.1,44.2,268.125-35.1,439.4-35.1,245.7,35.1,245.7,35.1v47.5l-1365-.733Z" transform="translate(27.3 -687.617)" fill="#fff"/></svg>';


		// $context['facebookUrl']= get_theme_mod( 'facebookUrl' );
		// $context['phone']= get_theme_mod( 'phone' );
	
		$context['footer_menu'] = new Timber\Menu('footer_menu');
		// $context['fbicon']= '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path  d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>';
		$context['tracking']= get_theme_mod('tracking');
		return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				//'comment-form',
			//	'comment-list',
				'gallery',
			//	'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
			//	'aside',
			//	'image',
			//	'video',
			//	'quote',
			//	'link',
			//	'gallery',
			//	'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();