<?php 
namespace WPPB\Elementor;

if( !defined( 'ABSPATH' ) ) : exit(); endif; // NO direct access allowed

/**
* Main WPPB Elementor Extension Class
* @author Rabiul
* @since 1.0.0
*/
final class Elementor_Extension {
	/**
	* Check Elementor Version
	* @author Rabiul
	* @since 1.0.0
	*/
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	* Check PHP Version
	* @author Rabiul
	* @since 1.0.0
	*/
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	* Single Instance of the class
	* @author Rabiul
	* @since 1.0.0
	*/
	private static $_instance = null;

	/**
	 * An instance of the class. Ensuring the single instance is loaded or can be loaded
	 * @author Rabiul
	 * @since 1.0.0
	 */
	public static function instance() {
		if( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Construct Function
	 * @author Rabiul
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', [$this, 'i18n'] );
		add_action( 'plugins_loaded', [$this, 'init'] );
	}

	/**
	* Load TextDomain
	* @author Rabiul
	* @since 1.0.0
	*/
	public function i18n() {
		\load_plugin_textdomain('wp-plugin-boilerplate');
	}

	/**
	* Init the elementor extension class
	* @author Rabiul
	* @since 1.0.0
	*/
	public function init() {

		// die('not loaded');
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
	}
	
	/**
	* Admin Notice: When the site does not have a minimum required Elementor version
	* @author Rabiul
	* @since 1.0.0
	*/
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	/**
	* Admin Notice: When the site does not have a minimum required PHP version
	* @author Rabiul
	* @since 1.0.0
	*/
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	/**
	* Include Widget files & includes them
	* @author Rabiul
	* @since 1.0.0
	*/
	public function init_widgets() {

		// Include Widget files
		// require_once( __DIR__ . '/widgets/test-widget.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \WPPB\Elementor\Widgets\TextWidget() );

	}
	
	/**
	 * Include Control files & register them
	 * @author Rabiul
	 * @since 1.0.0
	 */
	public function init_controls() {

		// Include Control files
		// require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		// \Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}
}
Elementor_Extension::instance();
