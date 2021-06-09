<?php
/**
 * Timber Over Twig for Meta Box
 *
 * @package     timber-over-twig
 * @author      Badabingbreda
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Timber Over Twig for Meta Box
 * Plugin URI:  https://www.badabing.nl
 * Description: Use Timber Library instead of regular Twig to render your templates
 * Version:     1.0.0
 * Author:      Badabingbreda
 * Author URI:  https://www.badabing.nl
 * Text Domain: timber-over-twig
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace TimberOverTwig;

use TimberOverTwig\Init;

 define( 'TIMBEROVERTWIG_VERSION', '1.0.0' );
define( 'TIMBEROVERTWIG_DIR', plugin_dir_path( __FILE__ ) );
define( 'TIMBEROVERTWIG_FILE', __FILE__ );
define( 'TIMBEROVERTWIG_URL', plugins_url( '/', __FILE__ ) );


require_once( 'inc/Init.php' );
require_once( 'inc/Proxy.php' );
require_once( 'inc/Integration/Timber.php' );

new Init();
