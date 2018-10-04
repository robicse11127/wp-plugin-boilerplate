<?php 
namespace Admin;
use Admin\Template;

class Admin {

    /**
     * Settings Template Holder
     */
    private $template;
    
    /**
     * WP Nonce Holder
     */
    private $wp_nonce = 'wppb_nonce';

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'scripts_styles' ) );

        $this->template = new Template();

        // Ajax Requests
        add_action( 'wp_ajax_save_test_form', array( $this, 'save_template' ) );
    }

    /**
     * Admin Scripts & Styles
     */
    public function scripts_styles() {
        wp_enqueue_style('wpbp-admin-style', plugins_url('/assets/dist/css/admin.min.css', __FILE__));
        wp_enqueue_style('wpbp-sweetalert-style', plugins_url('/assets/dist/css/sweetalert.min.css', __FILE__));

        wp_enqueue_script('wpbp-admin-script', plugins_url('/assets/dist/js/admin.min.js', __FILE__), array('jquery'), '20181004', true);
        wp_enqueue_script('wpbp-sweetalert-script', plugins_url('/assets/dist/js/sweetalert.min.js', __FILE__), array('jquery'), '20181004', true);
    
        $options = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce($this->wp_nonce),
        );
        wp_localize_script('wpbp-admin-script', 'wppb_admin_localizer', $options);
    }

    /**
     * Admin Menu
     */
    public function menu() {
        add_menu_page(
            __( 'WP Boilerplate', 'wp-plugin-boilerplate' ), 
            'WP Boilerplate', 
            'manage_options', 
            'wp-plugin-boilerplate', 
            array( $this, 'menu_template' ), 
            '', 
            10
        );
    }

    /**
     * Menu Template
     */
    public function menu_template() {
        
        $this->template->header();
        $this->template->index();
    }

    /**
     * Save Template Values
     */
    public function save_template() {

        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if( isset( $_POST['fields'] ) ) {
            parse_str( $_POST['fields'], $fields );

            $save_data = array(
                'test_field' => sanitize_text_field($fields['wppb_test_field'])
            );

            $save_option = update_option('wppb_general_settings', $save_data);
            if( $save_option ) {
                echo wp_json_encode('Success');
            }
        }else {
            return;
        }

        die();
    }

}