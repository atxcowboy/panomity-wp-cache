<?php

/**
 * Triggered during plugin activation
 *
 * @link       https://www.panomity.com/software/panomity-wp-cache/
 * @since      8.1
 *
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/includes
 */

class PANOMITY_WP_CACHE_Activator {

	/**
	 * Activate Plugin
	 *
	 * Copy alternative wordpress index file.
	 *
	 * @since    8.1
	 */
	public static function activate() {
	    copy(plugin_dir_path( __DIR__ )."assets/panomity-wp-cache.php", get_home_path()."panomity-wp-cache.php");
	}

}
