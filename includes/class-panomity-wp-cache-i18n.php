<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.panomity.com/plugins/panomity-wp-turbo/
 * @since      8.1
 *
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/includes
 */

class PANOMITY_WP_CACHE_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    8.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'panomity-wp-cache',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
