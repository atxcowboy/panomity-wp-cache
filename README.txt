=== PANOMITY WP CACHE ===
Contributors: Sascha Endlicher, M.A.
Author URI: https://panomity.com/
Plugin URI: https://panomity.com/software/panomity-wp-cache/
Tags: cache, performance, full page cache, speed, caching, optimization, speed optimization, page speed
Requires at least: 6.1
Tested up to: 6.1
Stable tag: 8.1.2
Requires PHP: 8.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

PANOMITY WP CACHE Interface.

== Description ==

Provides an extremely simple full page cache of the homepage.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/panomity-wp-cache` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Upon activation, /panomity-wp-cache.php is copied from the plugin's asset directory to the document root. After verifiying that the files was copied, change your webserver configuration to point to /panomity-wp-cache.php instead of /index.php. You can find instructions on how to do so for Apache or nginX at the Plugin URI.

== Frequently Asked Questions ==

= I need a custom cache expiration time. How can I enable this? =

Before activating the plugin, open the file assets/panomity-wp-cache.php and change all instances of 600 to the number of seconds you wish to set as the cache. For example for one hour, this would be 3600. 
If you do not feel confident in editing source files, please consider our managed WP hosting. This comes with the plugin PANOMITY WP Turbo and lets you set a custom cache expiration time, is cached in RAM, can cache all pages of a domain, is updated automatically and provides cache matrics.

== Changelog ==

= 8.1.2 =
* Add missing data sanitization and variable escaping.

= 8.1.1 =
* Initital release for PHP v8.1 after rebranding.

== Upgrade Notice ==
This release features major changes under the hood. The whole codebase has been refactored to OOP standards. 
