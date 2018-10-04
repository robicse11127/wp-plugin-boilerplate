<?php 
namespace Admin;

class Template {
    
    /**
     * Template Header
     */
    public function header() {
        ?>
        <div class="wppb-wrapper">
            <div class="wppb-header">
                    <h2><span class="dashicons dashicons-admin-settings"></span> WP Boilerplate Settings</h2>
                </div>
            </div>
        <?php
    }
    
    /**
     * Plugin Index Template
     */
    public function index() {
        $general_settings = get_option('wppb_general_settings')
        ?>
        <div class="wppb-wrapper">
            <div class="wppb-row">
                <div class="wppb-settings-tabs">
                    <ul class="wppb-tabs">
                        <li><a href="#general" class="active"><span class="dashicons dashicons-admin-home"></span> <span>General</span></a></li>
                        <li><a href="#tab-2"><span class="dashicons dashicons-admin-users"></span> <span>Tab 2</span></a></li>
                        <li><a href="#tab-3"><span class="dashicons dashicons-admin-network"></span> <span>Tab 3</span></a></li>
                        <li><a href="#tab-4"><span class="dashicons dashicons-cart"></span> <span>Tab 4</span></a></li>
                    </ul>
                    <!-- General Settings -->
                    <div id="general" class="wppb-settings-tab active">
                        <div class="wppb-row-2">
                            <div class="wppb-col">
                                <div class="wppb-card">
                                    <h4 class="card-title">Settings Form</h4>
                                    <form id="wppb-test-form">
                                        <label for="Test Field"><strong>Test Field :</strong></label>
                                        <input type="text" name="wppb_test_field" class="regular-text" value="<?php echo esc_attr( $general_settings['test_field'] ); ?>">

                                        <input type="submit" name="submit" class="button button-primary" value="Submit">
                                    </form>
                                </div>
                            </div>
                            <div class="wppb-col">
                                <div class="wppb-card">
                                    <h4 class="card-title">Help Desk</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit consectetur praesentium debitis, quibusdam voluptatibus suscipit ut deserunt ipsum nesciunt facere quia ex repellat accusantium corporis voluptatum ad? Aliquid, nesciunt consequatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab 2 Settings -->
                    <div id="tab-2" class="wppb-settings-tab">
                        Tab 2
                    </div>
                    <!-- Tab 3 Settings -->
                    <div id="tab-3" class="wppb-settings-tab">
                        Tab 3
                    </div>
                    <!-- Tab 4 Settings -->
                    <div id="tab-4" class="wppb-settings-tab">
                        Tab 4
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}

