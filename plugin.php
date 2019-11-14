<?php 
/**
 * @link            http://wp-plugin-boilerplate.com/wp/plugins/mailchimp-widget-wp/
 * @since           1.0.0
 * @package         WP_Plugin_Boilerplate
 * 
 * Plugin Name:     WP Plugin Boilerplate
 * Plugin URI:      http://wp-plugin-boilerplate.com/wp/plugins/mailchimp-widget-wp/
 * Description:     A WordPress plugin development boilerplate.
 * Version:         1.0.0 
 * Author:          MD Rabiul Islam Robi
 * Author URI:      http://www.wp-plugin-boilerplate.com/
 * License:         GPLv3 or later
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     wp-plugin-boilerplate
 */
if( !defined( 'ABSPATH' ) ) exit();
require_once 'vendor/autoload.php';
use HR\Admin\Admin;
use HR\Front\Front;
use HR\Helper\Helpers;


/**
 * Define Plugin Constants
 * 
 * @since 1.0.0
 */
define( 'HR_VERISON', '1.0.0' );
define( 'HR_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)) );
define( 'HR_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)) );
define( 'HR_PLUGIN_RESOURCE_URL', HR_PLUGIN_URL . 'resources' );

class WP_Plugin_Boilerplate {

    /**
     * Construct Function
     */
    public function __construct() {
        $admin      = new Admin();
        $front      = new Front();
        $helpers    = new Helpers();
    }

}
new WP_Plugin_Boilerplate();