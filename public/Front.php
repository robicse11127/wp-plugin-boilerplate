<?php 
namespace HR\Front;

class Front {
    /**
     * Construct Function
     * 
     * @since 1.0.0
     */
    public function __construct() {
        /**
         * Loading Necessary Hooks
         */
        add_action( 'wp_enqueue_scripts', array($this, 'front_styles_scripts') );
    }

    /**
     * Requireing Necessary Styles & Scripts
     * 
     * @since 1.0.0
     */
    public function front_styles_scripts() {
        // Styles
        wp_enqueue_style( 'hr-public', HR_PLUGIN_RESOURCE_URL . '/public/dist/css/public.min.css', array(), rand() );

        // Scripts
        wp_enqueue_script( 'hr-public', HR_PLUGIN_RESOURCE_URL . '/public/dist/js/public.min.js', array('jquery'), rand(), true );
    }
}