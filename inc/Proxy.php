<?php
namespace TimberOverTwig;

/**
 * Make all functions available via function mb.function.
 *
 * @link https://inchoo.net/dev-talk/wordpress/twig-wordpress-part2/
 */
class Proxy {
	public function __call( $function, $arguments ) {
		return function_exists( $function ) ? call_user_func_array( $function, $arguments ) : null;
	}
}