<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      8.1
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/includes
 * @author     Sascha Endlicher <sascha.endlicher@panomity.com>
 */
class PANOMITY_WP_CACHE {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    8.1
	 * @access   protected
	 * @var      PANOMITY_WP_CACHE_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    8.1
	 * @access   protected
	 * @var      string    $panomity_wp_cache    The string used to uniquely identify this plugin.
	 */
	protected $panomity_wp_cache;

	/**
	 * The current version of the plugin.
	 *
	 * @since    8.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    8.1
	 */
	public function __construct() {

		$this->panomity_wp_cache = 'panomity-wp-cache';
		$this->version = '8.1.2';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - PANOMITY_WP_CACHE_Loader. Orchestrates the hooks of the plugin.
	 * - PANOMITY_WP_CACHE_i18n. Defines internationalization functionality.
	 * - PANOMITY_WP_CACHE_Admin. Defines all hooks for the admin area.
	 * - PANOMITY_WP_CACHE_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    8.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-panomity-wp-cache-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-panomity-wp-cache-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-panomity-wp-cache-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-panomity-wp-cache-public.php';
		$this->loader = new PANOMITY_WP_CACHE_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the PANOMITY_WP_CACHE_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    8.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new PANOMITY_WP_CACHE_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    8.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new PANOMITY_WP_CACHE_Admin( $this->get_panomity_wp_cache(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    8.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new PANOMITY_WP_CACHE_Public( $this->get_panomity_wp_cache(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    8.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     8.1
	 * @return    string    The name of the plugin.
	 */
	public function get_panomity_wp_cache() {
		return $this->panomity_wp_cache;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     8.1
	 * @return    PANOMITY_WP_CACHE_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     8.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
