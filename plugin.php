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

use Admin\Admin;

class WP_Plugin_Boilerplate {

    /**
     * Construct Function
     */
    public function __construct() {
        $admin = new Admin();
    }

}
new WP_Plugin_Boilerplate();