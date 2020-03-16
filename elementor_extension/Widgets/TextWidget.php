<?php 
namespace WPPB\Elementor\Widgets;

class TextWidget extends \Elementor\Widget_Base {

    /**
    * Widget Name
    * @author Rabiul
    * @since 1.0.0
    */
    public function get_name() {
        return 'wppb-text-widget';
    }

    /**
    * Widget Title
    * @author Rabiul
    * @since 1.0.0
    */
    public function get_title() {
        return __('WPPB Text Widget', 'wp-plugin-boilerplate');
    }
    
    /**
    * Widget Icon
    * @author Rabiul
    * @since 1.0.0
    */
    public function get_icon() {
        return 'fa fa-file';
    }
    
    /**
    * Widget NaCategoryme
    * @author Rabiul
    * @since 1.0.0
    */
	public function get_categories() {
        return ['general'];
    }

    /**
    * Register Controls
    * @author Rabiul
    * @since 1.0.0
    */
	protected function _register_controls() {
        $this->start_controls_section(
            'content_section', 
            [
                'label' => __('Content', 'wppb-plugin-boilerplate'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            [
				'label' => __( 'Title', 'wppb-plugin-boilerplate' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'wppb-plugin-boilerplate' ),
				'placeholder' => __( 'Type your title here', 'wppb-plugin-boilerplate' ),
			]
        );

        $this->end_controls_section();
    }

    /**
    * Render HTML
    * @author Rabiul
    * @since 1.0.0
    */
	protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<h2>'.$settings['widget_title'].'</h2>';
    }

    /**
    * Live Preview Content
    * @author Rabiul
    * @since 1.0.0
    */
	protected function _content_template() {
        ?>
        <h2>{{{ settings.widget_title }}}</h2>
        <?php
    }
}