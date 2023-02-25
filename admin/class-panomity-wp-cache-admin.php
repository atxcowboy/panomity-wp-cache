<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/admin
 * @author     Sascha Endlicher, M.A. <support@panomity.com>
 */
class PANOMITY_WP_CACHE_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    8.1
	 * @access   private
	 * @var      string    $panomity_wp_cache    The ID of this plugin.
	 */
	private $panomity_wp_cache;

	/**
	 * The version of this plugin.
	 *
	 * @since    8.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    8.1
	 * @param      string    $panomity_wp_cache       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $panomity_wp_cache, $version ) {

		$this->panomity_wp_cache = $panomity_wp_cache;
		$this->version = $version;
		add_action('admin_menu', array( $this, 'panomity_wp_cache_admin_menu' ) );
		add_action('admin_init', array( $this, 'register_panomity_wp_cache_settings' ) );
		add_filter( 'plugin_action_links', array( $this, 'enable_automatic_updates' ), 10, 2 );

	}

	public function enable_automatic_updates( $actions, $plugin_file ) {
		if ( plugin_basename( __FILE__ ) === $plugin_file ) {
			$actions[] = '<a href="' . esc_url( wp_nonce_url( add_query_arg( array( 'action' => 'enable_auto_updates', 'plugin' => $plugin_file ) ), 'enable-auto-updates_' . $plugin_file ) ) . '">' . esc_html__( 'Enable Automatic Updates', 'text-domain' ) . '</a>';
		}
		return $actions;
	}
	
        /**
         * Adds the options page and a dashboard menu item
         *
         * @since    8.1
         */
	public function panomity_wp_cache_admin_menu() {
        	add_menu_page( 'PANOMITY WP CACHE', 'PANOMITY WP CACHE', 'manage_options', 'panomity-wp-cache/admin/partials/panomity-wp-cache-admin-display.php', 'PANOMITY_WP_CACHE_Admin::panomity_wp_cache_admin_page', 'dashicons-dashboard', 81  );
	}

        /**
         * Registers the options for the administrative settings
         *
         * @since    8.1
         */
	public function register_panomity_wp_cache_settings() {
	}

	public static function panomity_wp_cache_admin_page(){
        	require_once( 'partials/panomity-wp-cache-admin-display.php' );
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    8.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in PANOMITY_WP_CACHE_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The PANOMITY_WP_CACHE_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	//	wp_enqueue_style( $this->panomity_wp_cache, plugin_dir_url( __FILE__ ) . 'css/panomity-wp-cache-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    8.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in PANOMITY_WP_CACHE_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The PANOMITY_WP_CACHE_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->panomity_wp_cache, plugin_dir_url( __FILE__ ) . 'js/panomity-wp-cache-admin.js', array( 'jquery' ), $this->version, false );
//
	}

}
