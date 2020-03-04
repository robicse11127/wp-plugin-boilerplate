<?php 
namespace WPPB\Blocks;

use WPPB\Blocks\HelloBlock\HelloBlock;

class Blocks {
    /**
     * Construct Function
     * @author Rabiul
     * @since 1.0.0
     */
    public function __construct() {
        

        /**
         * Init Blocks
         */
        new HelloBlock();

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
        add_action( 'admin_enqueue_scripts', [ $this, 'block_styles_scripts' ] );
    }

    /**
     * Registering Block Script
     * @author Rabiul
     * @since 1.0.0
     */
    public function block_styles_scripts() {
        wp_enqueue_script( 'wppb-block', WPPB_PLUGIN_RESOURCE_URL . '/blocks/dist/js/blocks.min.js', array('jquery'), rand(), true );
    }
}