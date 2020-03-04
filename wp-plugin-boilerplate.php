<?php 
/**
 * @link            http://wp-plugin-boilerplate.com
 * @since           1.0.0
 * @package         WP_Plugin_Boilerplate
 * 
 * Plugin Name:     WP Plugin Boilerplate
 * Plugin URI:      http://wp-plugin-boilerplate.com/
 * Description:     A WordPress plugin development boilerplate.
 * Version:         1.0.0 
 * Author:          MD Rabiul Islam Robi
 * Author URI:      http://robicse11127.github.io/
 * License:         GPLv3 or later
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     wp-plugin-boilerplate
 */
if( !defined( 'ABSPATH' ) ) exit(); // No Direct Access

/**
 * Require Autoloader
 */
require_once 'vendor/autoload.php';

use WPPB\Admin\Admin;
use WPPB\Front\Front;
use WPPB\Blocks\Blocks;

final class WP_Plugin_Boilerplate {

    /**
     * Define Plugin Version
     */
    const version = '1.0.0';

    /**
     * Construct Function
     */
    private function __construct() {
        $this->plugin_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Define Plugin Constants
     */
    public function plugin_constants() {
        
        define( 'WPPB_VERISON', self::version );
        define( 'WPPB_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)) );
        define( 'WPPB_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)) );
        define( 'WPPB_PLUGIN_RESOURCE_URL', WPPB_PLUGIN_URL . 'resources' );
    }

    /**
     * Singletone Instance
     */
    public static function init() {
        static $instance = false;

        if( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * On Plugin Activation
     */
    public function activate() {
        //
    }

    /**
     * Plugin Init
     */
    public function init_plugin() {
        if( is_admin() ) {
            new Admin();
            new Blocks();
        }else {
            new Front();
        }
    }

}

/**
 * Initialize Main Plugin
 * @return \WP_Plugin_Boilerplate
 */
function wp_plugin_boilerplate() {
    return WP_Plugin_Boilerplate::init();
}

// Run the plugin
wp_plugin_boilerplate();