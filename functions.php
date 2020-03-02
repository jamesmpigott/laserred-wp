<?php 

	define('THEME_DIR', get_stylesheet_directory_uri());
	define('ASSET_VERSION', '1.0.0');

	new LaserRedWp();

	class LaserRedWp{

		function __construct(){
			$this->get_framework();
			$this->get_shortcodes();
			$this->get_custom_post_types();
			$this->enqueue_styles();
			// $this->enqueue_scripts();
			$this->init_timber();
			$this->add_menu_to_appearance_admin();
			add_filter( 'timber/context', [$this, 'add_to_context' ] );	
			add_action( 'after_setup_theme', [$this, 'theme_add_woocommerce_support'] );
		}

		/*==================
			Get Shortcodes
		====================*/
		public function get_shortcodes(){
			foreach(glob(get_stylesheet_directory() . "/shortcodes/*.php") as $file){
				require $file;
			}
		}

		/*==================
			Get Framework
		====================*/
		public function get_framework(){
			foreach(glob(get_stylesheet_directory() . "/framework/*.php") as $file){
				require $file;
			} 
		}

		/*=======================
		   Get Custom Post Types
		========================*/
		public function get_custom_post_types(){
			foreach(glob(get_stylesheet_directory() . "/custom_post_types/*/*.php") as $file){
				require $file;
			}
		}

		/*================================
			Enqueue assets - gulp built
		==================================*/
		public function enqueue_styles(){
			wp_enqueue_style('style',  get_stylesheet_directory_uri() . '/assets/dist/styles.css', false );
			// wp_enqueue_style('style',  get_stylesheet_directory_uri() . '/assets/dist/styles.css', false , ASSET_VERSION, 'all');
		}

		public function enqueue_scripts(){
			wp_enqueue_script('child_theme_scripts', get_stylesheet_directory_uri() . '/assets/dist/scripts.min.js', false, ASSET_VERSION, 'all' );
		}

		public function init_timber(){
			$composer_autoload = __DIR__ . '/vendor/autoload.php';
			if ( file_exists( $composer_autoload ) ) {
				require_once $composer_autoload;
				$timber = new Timber\Timber();
			}
			
			Timber::$dirname = 'templates';
		}

		public function add_to_context($context){
			$context['menu'] = new Timber\Menu('main-nav');
			return $context;
		}

		public function theme_add_woocommerce_support() {
		    add_theme_support( 'woocommerce' );
		}

		public function add_menu_to_appearance_admin(){
			register_nav_menus(
				[
        			'header' => 'Header menu', 
				]
			);
		}
	}
?>