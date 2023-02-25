<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.panomity.com/software/panomity-wp-cache/
 * @since      8.1
 *
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/public
 */

class PANOMITY_WP_CACHE_Public {

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
	 * @param      string    $panomity_wp_cache       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $panomity_wp_cache, $version ) {

		$this->panomity_wp_cache = $panomity_wp_cache;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		//wp_enqueue_style( $this->panomity_wp_cache, plugin_dir_url( __FILE__ ) . 'css/panomity-wp-cache-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		//wp_enqueue_script( $this->panomity_wp_cache, plugin_dir_url( __FILE__ ) . 'js/panomity-wp-cache-public.js', array( 'jquery' ), $this->version, false );

	}

}
