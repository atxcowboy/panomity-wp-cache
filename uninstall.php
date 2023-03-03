<?php

/** 
 * Panomity WP Cache Uninstaller
 *
 * @category Cache
 * @package  PANOMITY_WP_CACHE
 * @author   Sascha Endlicher, M.A. <support@panomity.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link     https://panomity.com/software/panomity-wp-cache/
 * @since    8.1.2
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}