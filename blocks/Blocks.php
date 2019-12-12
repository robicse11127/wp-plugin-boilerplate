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
        add_action( 'admin_enqueue_scripts', [ $this, 'register_script' ] );

        /**
         * Init Blocks
         */
        $hello_block = new HelloBlock();
    }

    /**
     * Registering Block Script
     * @author Rabiul
     * @since 1.0.0
     */
    public function register_script() {
        wp_enqueue_script( 'wppb-block', WPPB_PLUGIN_RESOURCE_URL . '/blocks/dist/js/block.min.js', array('jquery'), rand(), true );
    }
}