<?php 
namespace WPPB\Front;

class Front {
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
        
    }

    /**
    * Init Hooks
    * @author Rabiul
    * @since 1.0.0
    */
    public function init_hooks() {
        add_action( 'wp_enqueue_scripts', array($this, 'front_styles_scripts') );
    }

    /**
     * Requireing Necessary Styles & Scripts
     * 
     * @since 1.0.0
     */
    public function front_styles_scripts() {
        // Styles
        wp_enqueue_style( 'wppb-public', WPPB_PLUGIN_RESOURCE_URL . '/public/dist/css/public.min.css', array(), rand() );

        // Scripts
        wp_enqueue_script( 'wppb-public', WPPB_PLUGIN_RESOURCE_URL . '/public/dist/js/public.min.js', array('jquery'), rand(), true );
    }
}