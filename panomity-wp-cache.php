<?php

/**
 * Plugin handler
 *
 * @category Cache
 *
 * @author  Sascha Endlicher, M.A. <support@panomity.com>
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 *
 * @see   https://panomity.com/software/panomity-wp-cache/
 * @since 8.1.2
 *
 * @wordpress-plugin
 * Plugin Name: Panomity WP Cache
 * Plugin URI: https://panomity.com/software/panomity-wp-cache/
 * Description: A simple full page cache for WordPress
 * Version: 8.1.2
 * Author: Sascha Endlicher, M.A.
 * Author URI: https://panomity.com/
 * License: GPLv3
 * License URI:	   https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:	   panomity-wp-cache
 * Domain Path:	   /languages
 * Tags: performance, speed, cache, caching, optimization, speed optimization,
 *	   page speed
 * Icon URI: icon.png
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * A caching plugin for WordPress.
 *
 * This class provides functionality for caching the output of WordPress pages and
 * posts in order to improve website performance. It includes methods for handling
 * caching, determining if the user is logged in, and activating/deactivating the
 * plugin.
 *
 * @category Cache
 *
 * @author  Sascha Endlicher, M.A. <support@panomity.com>
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 *
 * @version Release: 8.1.2
 *
 * @see   https://panomity.com/software/panomity-wp-cache/
 * @since 8.1
 */
class PanomityWPCache {

	/**
	 * Constructor for the PanomityWPCache class.
	 *
	 * @since 8.1
	 */
	public function __construct() {
	}

	/**
	 * Determines if the user is logged in based on the contents of the cookie.
	 *
	 * @since 8.1
	 *
	 * @return bool true if the user is logged in, false otherwise
	 */
	public function isUserLoggedIn(): bool {
		$cookie=sanitize_text_field( var_export( $_COOKIE, true ) );

		return (bool) preg_match( '/wordpress_logged_in/', $cookie );
	}

	/**
	 * Handles caching for the current request.
	 *
	 * Checks if the current request can be served from cache or if a new cache
	 * should be generated.
	 *
	 * @param int $cache_expiration_time the cache lifetime in seconds
	 */
	public function handleCache( int $cache_expiration_time=600 ): void {
		$http_host=sanitize_text_field( $_SERVER['HTTP_HOST'] );
		$url='https://' . wp_http_validate_url( $http_host );
		$loggedin=(bool) $this->isUserLoggedIn();
		$cached_data=get_transient( $url );

		switch ( true ) {
			case sanitize_text_field( $_SERVER['REQUEST_METHOD'] ) === 'POST':
				//NO CACHE, NEW POST
				break;

			case $loggedin:
				//LOGGED IN, NOT CACHED
				break;

			case ( false !== $cached_data ) && $loggedin !== 1:
				// Escape $cached_data before echoing it
				echo esc_html( $cached_data );
				//THIS IS A CACHE, NOT LOGGED IN
				break;
			default:
				// This code creates an output buffer using the ob_start() function,
				// captures the contents of the buffer using ob_get_contents(), and
				// then stores the contents in a simple cache using the set_transient()
				// function.
				$html=ob_get_contents();
				$output=wp_kses( $html, [] );
				ob_start();
				// Escape $html before echoing it
				echo wp_kses( $html, [] );
				ob_end_clean();
				set_transient( $url, $output, $cache_expiration_time );
				// CACHE GENERATED
		}
	}

	/**
	 * Activate the plugin
	 *
	 * @since 8.1
	 */
	public static function activate(): void {
		include_once plugin_dir_path( __FILE__ )
		. 'includes/class-panomity-wp-cache-activator.php';
		PANOMITY_WP_CACHE_Activator::activate();
	}

	/**
	 * Deactivate the plugin
	 *
	 * @since 8.1
	 */
	public static function deactivate(): void {
		include_once plugin_dir_path( __FILE__ )
		. 'includes/class-panomity-wp-cache-deactivator.php';
		PANOMITY_WP_CACHE_Deactivator::deactivate();
	}

	/**
	 * Run the plugin
	 *
	 * @since 8.1
	 */
	public function run(): void {
		$this->handleCache();
	}
}

register_activation_hook( __FILE__, [ 'PanomityWPCache', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'PanomityWPCache', 'deactivate' ] );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-panomity-wp-cache.php';

/**
 * Initialize the PanomityWPCache plugin.
 *
 * Creates a new instance of the PanomityWPCache class and calls its run() method
 * to start the caching process.
 *
 * @return void
 */
function panomityWPCacheInit() {
	$instance=new PanomityWPCache();
	$instance->run();
}

add_action( 'muplugins_loaded', 'panomityWPCacheInit' );
