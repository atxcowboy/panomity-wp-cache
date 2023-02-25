<?php

/**
 * Plugin handler
 *
 *
 * @link              https://panomity.com/software/panomity-wp-cache/
 * @since             8.1
 * @package           PANOMITY_WP_CACHE
 *
 * @wordpress-plugin
 * Plugin Name: Panomity WP Cache
 * Plugin URI: https://panomity.com/software/panomity-wp-cache/
 * Description: A simple full page cache for WordPress
 * Version: 8.1.2
 * Author: Panomity GmbH
 * Author URI: https://panomity.com/
 * License: GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       panomity-wp-cache
 * Domain Path:       /languages
 * Tags: performance, speed, cache, caching, optimization, speed optimization, page speed
 * Icon URI: icon.png
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function activate_panomity_wp_cache() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-panomity-wp-cache-activator.php';
	PANOMITY_WP_CACHE_Activator::activate();
}

function deactivate_panomity_wp_cache() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-panomity-wp-cache-deactivator.php';
	PANOMITY_WP_CACHE_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_panomity_wp_cache' );
register_deactivation_hook( __FILE__, 'deactivate_panomity_wp_cache' );

require plugin_dir_path( __FILE__ ) . 'includes/class-panomity-wp-cache.php';

function run_panomity_wp_cache() {
	$panomity_wp_cache = new PANOMITY_WP_CACHE();
	$panomity_wp_cache->run();
}
run_panomity_wp_cache();
