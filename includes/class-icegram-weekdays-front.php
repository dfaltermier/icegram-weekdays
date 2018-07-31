<?php
 /** 
 * This file is invoked when the frontend is viewed.
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
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class wrapper for all methods.
 *
 * @since 0.9.1
 */
class Icegram_Weekdays_Front {
    
    function __construct()  {
        
        /* 
         * Call our time validation method AFTER the Icegram plugin version is called
         * (e.g.: with priority greater than 10). We'll want to override it in order to
         * add additional checks on the days of the week.
         * See /plugins/icegram/classes/class-icegram-campaign.php, line 56 and 110.
         */
        add_filter(
            'icegram_campaign_validation', 
            array( $this, 'is_valid_time' ),
            11,  // This priority must be higher then 10, the number used in the Icegram plugin.
            3
        );

    }

    /**
     * Override the _is_valid_time() method in the Icegram plugin file:
     *   /plugins/icegram/classes/class-icegram-campaign.php, line 56 and 110.
     * Below is essentially a copy of the _is_valid_time() method with additional
     * validation checks added (e.g. checks on the selected days of the week).
     *
     * @since 0.9.1
     */
    public function is_valid_time( $campaign_valid, $campaign, $options ) {

        if( ! $campaign_valid ) {
            return $campaign_valid;
        }

        if ( ! empty( $campaign->rules_summary['when']['when'] ) && 
             $campaign->rules_summary['when']['when'] == 'always' ) {
            return true;
        }

        // Validate that we're within the configured date range.
        if ( ( ! empty( $campaign->rules_summary['when']['from'] ) && 
            current_time('timestamp') > strtotime( $campaign->rules_summary['when']['from'] . " 00:00:00") ) &&
            ( ! empty( $campaign->rules_summary['when']['to'] ) && 
            strtotime( $campaign->rules_summary['when']['to'] . " 23:59:59") > current_time('timestamp') ) ) 
        {
            /*
             * We preserve the default behavior of running the campaign 7 days/week until the user has
             * changed and saved the settings the first time after our plugin is installed.
             * This will prevent us from breaking the Icegram plugin with our plugin.
             * Then, when the campaign settings are saved, the 'icegram-weekdays-has-been-saved-by-user'
             * will be set to 'yes',telling us that the user is aware of these settings and 
             * has deliberately updated them. We'll look for this before validating the selected
             * week day.
             */
            if ( empty( $campaign->rules['icegram-weekdays-has-been-saved-by-user'] ) ||
               ( $campaign->rules['icegram-weekdays-has-been-saved-by-user'] !== 'yes' ) ) {
                return true;
            }

            // Now, validate that the current day today is one selected by the user.
            $datetime      = date('Y-m-d');
            $day_of_week   = date('w', strtotime($datetime));
            $weekday_field = 'icegram-weekdays-day-' . $day_of_week;

            if ( ! empty( $campaign->rules[$weekday_field] ) && 
               ( $campaign->rules[$weekday_field] === 'yes' ) ) {
                return true;
            }

        }

        return false;
    }

}

