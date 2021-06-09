<?php
namespace TimberOverTwig;

use TimberOverTwig\Integration\Timber;


/**
 * Make all functions available via function mb.function.
 *
 * @link https://inchoo.net/dev-talk/wordpress/twig-wordpress-part2/
 */
class Init {
	public function __construct( ) {
        new Timber();
	}
}