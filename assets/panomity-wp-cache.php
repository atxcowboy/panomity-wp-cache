<?php

class PanomityWPCache
{
	/*
	 * Constructor for the PanomityWPCache class.
	 *
	 * @author Sascha Endlicher, M.A. <sascha.endlicher@panomity.com>
	 *
	 * @since 1.0
	 *
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Determines if the user is logged in based on the contents of the cookie.
	 *
	 * @author Sascha Endlicher, M.A. <sascha.endlicher@panomity.com>
	 *
	 * @since 1.0
	 *
	 * @return bool True if the user is logged in, false otherwise.
	 */
	private function is_user_logged_in(): bool
	{
		$cookie = var_export($_COOKIE, true);
		return (bool) preg_match("/wordpress_logged_in/", $cookie);
	}

	/**
	 * Handle the cache request
	 *
	 * @author Sascha Endlicher, M.A. <sascha.endlicher@panomity.com>
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	private function handle_cache(int $cache_expiration_time): void
	{
		$url =  "https://". $_SERVER['HTTP_HOST'];
		$loggedin = (bool) $this->is_user_logged_in();
		$cached_data = get_transient( $url );
		
		switch (true) {
			case $_SERVER['REQUEST_METHOD'] == 'POST':
				//NO CACHE, NEW POST
				break;
			case $loggedin:
				//LOGGED IN, NOT CACHED
				break;
			case ( false !== $cached_data ) && $loggedin !== 1:
				echo $cached_data;
				//THIS IS A CACHE, NOT LOGGED IN
				break;
			default:
				//This code creates an output buffer using the ob_start() function, captures the contents of the buffer using ob_get_contents(), and then stores the contents in a simple cache using the set_transient() function.			
				$html = ob_get_contents();
				$output = $html;
				ob_start();	
				echo $html;			
				ob_end_clean();
				set_transient( $url, $output, 600 );
				// CACHE GENERATED
		}
		
		return;
	}
		
	/**
	 * Processes the current request and outputs the response.
	 *
	 * @author Sascha Endlicher, M.A. <sascha.endlicher@panomity.com>
	 *
	 * @since 1.0
	 *
	 * @return void	 
	 */
	function execute(): void
	{
		define("WP_USE_THEMES", true);
		include_once './wp-blog-header.php';
		$msg = $this->handle_cache();
	}
}
$instance = new PanomityWPCache();
$instance->execute();
