<?php 
namespace WPPB\Admin;

use WPPB\Admin\Modules\HelloWorld\HelloWorld;

class Admin {
    /**
     * Construct Function
     * 
     * @since 1.0.0
     */
    public function __construct() {

        /**
         * Init Modules
         */
        $hello = new HelloWorld();

        /**
         * Loading Necessary Hooks
         */
        add_action( 'admin_enqueue_scripts', array($this, 'admin_styles_scripts') );
    }

    /**
     * Requireing Necessary Styles & Scripts
     * 
     * @since 1.0.0
     */
    public function admin_styles_scripts() {
        // Styles
        wp_enqueue_style( 'hr-admin', WPPB_PLUGIN_RESOURCE_URL . '/admin/dist/css/admin.min.css', array(), rand() );

        // Scripts
        wp_enqueue_script( 'hr-admin', WPPB_PLUGIN_RESOURCE_URL . '/admin/dist/js/admin.min.js', array('jquery'), rand(), true );
    }
}