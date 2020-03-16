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
         * Init Hooks
         */
        $this->init_hooks();

        /**
         * Init Modules
         */
        $this->init_modules();
    }

    /**
    * Init Hooks
    * @author Rabiul
    * @since 1.0.0
    */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', array($this, 'admin_styles_scripts') );
    }

    /**
    * Init Modules
    * @author Rabiul
    * @since 1.0.0
    */
    public function init_modules() {
        // Init modules here
        new HelloWorld();
    }

    /**
     * Requireing Necessary Styles & Scripts
     * 
     * @since 1.0.0
     */
    public function admin_styles_scripts() {
        // Styles
        wp_enqueue_style( 'wppb-admin', WPPB_PLUGIN_RESOURCE_URL . '/admin/dist/css/admin.min.css', array(), rand() );

        // Scripts
        wp_enqueue_script( 'wppb-admin', WPPB_PLUGIN_RESOURCE_URL . '/admin/dist/js/admin.min.js', array('jquery'), rand(), true );
    }
}