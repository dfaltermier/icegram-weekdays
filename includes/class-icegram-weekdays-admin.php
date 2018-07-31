<?php
 /** 
 * This file is invoked when the admin backend is viewed.
 *
 * Loads all the necessary CSS, JavaScript, and PHP files.
 *
 * @package    Icegram_Weekdays
 * @subpackage Functions
 * @copyright  Copyright (c) 2018, www.freshwebstudio.com
 * @link       https://www.freshwebstudio.com
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9.1
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class wrapper for all methods.
 *
 * @since 0.9.1
 */
class Icegram_Weekdays_Admin {
    
    function __construct() {
        
        // Load scripts and stylesheets.
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

        /*
         * Add our Weekdays selection elements under the Schedule section
         * by hooking into this action. 
         * See: /plugins/icegram/classes/class-icegram-campaign-admin.php, line 359.
         */
        add_action(
           'icegram_after_campaign_when_rule', 
            array( $this, 'icegram_after_campaign_when_rule' ),
            10,
            2 
        );

    }

    /**
     * Enqueue our scripts and stylesheets only when we're on the Icegram
     * Custom Post Type admin pages.
     *
     * @since 0.9.1
     *
     */
    public function enqueue() {

        $current_screen = get_current_screen();
        
        // Enqueue if we're in the admin settings for the Icegram plugin.
        if ( ( ! is_null( $current_screen ) ) &&
             ( $current_screen->post_type === 'ig_campaign' ) ) {

            wp_enqueue_style(
                'icegram-weekdays-admin-css', 
                ICEGRAM_WEEKDAYS_ADMIN_CSS_URL . '/icegram-weekdays.css', 
                array(),
                ICEGRAM_WEEKDAYS_VERSION 
            );

            wp_enqueue_script(
                'icegram-weekdays-admin-js', 
                ICEGRAM_WEEKDAYS_ADMIN_JS_URL . '/icegram-weekdays.js', 
                array('jquery'),
                ICEGRAM_WEEKDAYS_VERSION
            );

        }

    }

    /**
     * Add our Weekdays selection DOM elements under the Schedule section
     * by hooking into the 'icegram_after_campaign_when_rule' action from the
     * Icegram plugin. 
     * See: /plugins/icegram/classes/class-icegram-campaign-admin.php, line 359.
     *
     * @since 0.9.1
     *
     */
    public function icegram_after_campaign_when_rule( $campaign_id, $campaign_target_rules ) {

        $campaign_target_rules = get_post_meta(
            $campaign_id,
            'icegram_campaign_target_rules',
            true
        );

        // Get the stored values for each day.
        $day_0_value = $this->get_selected_day_value( '0', $campaign_target_rules );
        $day_1_value = $this->get_selected_day_value( '1', $campaign_target_rules );
        $day_2_value = $this->get_selected_day_value( '2', $campaign_target_rules );
        $day_3_value = $this->get_selected_day_value( '3', $campaign_target_rules );
        $day_4_value = $this->get_selected_day_value( '4', $campaign_target_rules );
        $day_5_value = $this->get_selected_day_value( '5', $campaign_target_rules );
        $day_6_value = $this->get_selected_day_value( '6', $campaign_target_rules );
    ?>

        <p class="icegram-weekdays-admin-when-days-section form-field">
            <?php
            /*
             * We preserve the default behavior of running the campaign 7 days/week until the user has
             * changed and saved the settings the first time after our plugin is installed.
             * This will prevent us from breaking the Icegram plugin with our plugin.
             * Then, when the campaign settings are saved, the 'icegram-weekdays-has-been-saved-by-user'
             * will be set to 'yes'. We'll look for this before validating the selected
             * week day.
             */
            ?>
            <input type="hidden" 
                   id="when_weekday_saved" 
                   name="campaign_target_rules[icegram-weekdays-has-been-saved-by-user]" 
                   value="yes" />

            <label class="options_header">&nbsp;</label>

            <span>Days:</span>

            <!-- Sunday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_0">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-0]" 
                       id="when_weekday_0" 
                       value="yes"
                       <?php checked( $day_0_value, 'yes' ); ?>
                 />
                <?php _e( 'S', 'icegram-weekdays' ); ?>
            </label>

            <!-- Monday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_1">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-1]" 
                       id="when_weekday_1" 
                       value="yes"
                       <?php checked( $day_1_value, 'yes' ); ?>
                 />
                <?php _e( 'M', 'icegram-weekdays' ); ?>
            </label>

            <!-- Tuesday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_2">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-2]" 
                       id="when_weekday_2" 
                       value="yes"
                       <?php checked( $day_2_value, 'yes' ); ?>
                 />
                <?php _e( 'T', 'icegram-weekdays' ); ?>
            </label>

            <!-- Wednesday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_3">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-3]" 
                       id="when_weekday_3" 
                       value="yes"
                       <?php checked( $day_3_value, 'yes' ); ?>
                 />
                <?php _e( 'W', 'icegram-weekdays' ); ?>
            </label>

            <!-- Thursday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_4">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-4]" 
                       id="when_weekday_4" 
                       value="yes"
                       <?php checked( $day_4_value, 'yes' ); ?>
                 />
                <?php _e( 'Th', 'icegram-weekdays' ); ?>
            </label>

            <!-- Friday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_5">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-5]" 
                       id="when_weekday_5" 
                       value="yes"
                       <?php checked( $day_5_value, 'yes' ); ?>
                 />
                <?php _e( 'F', 'icegram-weekdays' ); ?>
            </label>

            <!-- Saturday -->
            <label class="icegram-weekdays-admin-when-day-label" for="when_weekday_6">
                <input type="checkbox" 
                       name="campaign_target_rules[icegram-weekdays-day-6]" 
                       id="when_weekday_6" 
                       value="yes"
                       <?php checked( $day_6_value, 'yes' ); ?>
                 />
                <?php _e( 'S', 'icegram-weekdays' ); ?>
            </label>
        </p>

    <?php
    }

    /**
     * Helper method to set the appropriate value for the selected week day. See above method
     * for use.
     *
     * @since 0.9.1
     *
     */
    private function get_selected_day_value( $day_of_week, $campaign_target_rules ) {

        /*
         * We preserve the default behavior of running the campaign 7 days/week until the user has
         * changed and saved the settings the first time after our plugin is installed.
         * This will prevent us from breaking the Icegram plugin with our plugin.
         * Then, when the campaign settings are saved, the 'icegram-weekdays-has-been-saved-by-user'
         * will be set to 'yes'. When that happens, we'll use the individual selected
         * days from the user (below).
         */
        if ( empty( $campaign_target_rules['icegram-weekdays-has-been-saved-by-user'] ) ||
           ( $campaign_target_rules['icegram-weekdays-has-been-saved-by-user'] !== 'yes' ) ) {
            return 'yes';
        }

        // We now know the user has saved the selected days for the schedule. Return 'yes'
        // or 'no' based on the user's settings.
        $day_of_week_key = 'icegram-weekdays-day-' . $day_of_week;

        return (
            ( ! empty( $campaign_target_rules[$day_of_week_key] ) && 
            ( $campaign_target_rules[$day_of_week_key] === 'yes' ) )
            ? 'yes'
            : 'no'
        );

    }

}

