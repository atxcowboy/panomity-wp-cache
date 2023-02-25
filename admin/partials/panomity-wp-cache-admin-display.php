<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.panomity.com/plugins/panomity-wp-cache/
 * @since      0.6
 *
 * @package    PANOMITY_WP_CACHE
 * @subpackage PANOMITY_WP_CACHE/admin/partials
 */
add_action( 'admin_menu', 'panomity_wp_cache_admin_menu' );
add_action( 'admin_init', 'register_panomity_wp_cache_settings');
add_action( 'plugins_loaded', 'panomity_wp_cache_load_textdomain' );

function panomity_wp_cache_admin_menu() {
        add_menu_page( 'PANOMITY WP CACHE', 'Panomity WP CACHE', 'manage_options', 'panomity-wp-cache/panomity-wp-cache-admin-page.php', 'panomity_wp_cache_admin_page', 'dashicons-dashboard', 81  );
}

function panomity_wp_cache_load_textdomain() {
    load_plugin_textdomain( 'panomity-wp-cache', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

function register_panomity_wp_cache_settings() {
}

function panomity_wp_cache_admin_page(){
}
?>

<div class="wrap">
		<h1><?php esc_html_e( 'PANOMITY WP CACHE', 'panomity-wp-cache' ); ?></h1>
		<h2><?php esc_html_e( 'A simple full page cache of the home page', 'panomity-wp-cache' ); ?></h2>                
<p><?php esc_html_e( 'Panomity offers two powerful WordPress caching plugins: Panomity WP Cache and Panomity WP Turbo. While both plugins can help speed up your website, WP Turbo offers a number of additional features that WP Cache lacks. In the table below, we compare the key features of both plugins side-by-side, so you can make an informed decision about which one is right for your website.', 'panomity-wp-cache' ); ?></p>


<div class="notice inline">
  <p><?php esc_html_e( 'Panomity WP Turbo is only available as part of our managed WordPress hosting. Check out our', 'panomity-wp-cache' ); ?> <a href="https://panomity.com/hosting/managed-wordpress-hosting/"><strong><?php esc_html_e( 'hosting plans', 'panomity-wp-cache' ); ?></strong></a> <?php esc_html_e( 'to learn more.', 'panomity-wp-cache' ); ?></p>
</div>

<table class="wp-list-table widefat striped">
  <thead>
    <tr>
      <th><?php esc_html_e( 'Panomity WP Cache', 'panomity-wp-cache' ); ?></th>
      <th><?php esc_html_e( 'Panomity WP Turbo', 'panomity-wp-cache' ); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php esc_html_e( '10 minute cache', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Unlimited cache duration', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'No custom cache expiration', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Customizable cache expiration times', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'No cache metrics', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Detailed cache performance metrics', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'No automatic update system', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Automatic plugin updates for optimal performance', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'Cache only front page', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Caches entire website for maximum speed', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'Not cached in RAM', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Caches pages in RAM for lightning-fast load times', 'panomity-wp-cache' ); ?></td>
    </tr>
    <tr>
      <td><?php esc_html_e( 'Cache not prepopulated', 'panomity-wp-cache' ); ?></td>
      <td><?php esc_html_e( 'Prepopulates cache for instant loading on first visit', 'panomity-wp-cache' ); ?></td>
    </tr>
  </tbody>
</table>

<p><?php esc_html_e( 'Our Managed WordPress Hosting comes  along with powerful tools like activity monitoring and proactive threat management. The hosting plan also includes daily backups, 24/7 external monitoring, and support via live chat and ticket support. Additionally, it comes with pre-installable premium add-ons, visitor statistic analysis, a SEO plugin with a 15-day dashboard test and much more.', 'panomity-wp-cache' ); ?></p>

<p>
<a href="https://panomity.com/software/panomity-wp-turbo/" class="button button-primary"><?php esc_html_e( 'Visit Panomity WP Turbo Homepage', 'panomity-wp-cache' ); ?></a>
</p>
</div>
