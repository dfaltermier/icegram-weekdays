<?php
 /** 
 * Bootstrapping class.
 *
 * All of our plugin dependencies are initalized here.
 *
 * @package    Icegram_Weekdays
 * @subpackage Functions
 * @link       https://www.freshwebstudio.com/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Class wrapper for all methods.
 *
 * @since 0.9.1
 */
class Icegram_Weekdays {
    
    function __construct()  { 
    }

    /**
     * Run our initialization.
     *
     * @since 0.9.1
     */
    public function run() {

        $this->setup_constants();
        $this->includes();

    }

    /**
     * Get plugin version.
     *
     * @since  0.9.1
     * @access private
     */
    public function get_plugin_version() {

        $plugin_data = get_plugin_data( 
            ICEGRAM_WEEKDAYS_PLUGIN_DIR . '/' . ICEGRAM_WEEKDAYS_PLUGIN_FILENAME 
        );
        $plugin_version = $plugin_data['Version'];
        return $plugin_version;

    }

    /**
     * Setup plugin constants.
     *
     * @since  0.9.1
     * @access private
     */
    private function setup_constants() {

        /*
         * Define file paths
         */
        // Plugin Folder Path (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_PLUGIN_DIR' ) ) {
            define( 'ICEGRAM_WEEKDAYS_PLUGIN_DIR', dirname( __DIR__ ) );
        }

        // Includes Folder Path (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_INCLUDES_DIR' ) ) {
            define( 'ICEGRAM_WEEKDAYS_INCLUDES_DIR', ICEGRAM_WEEKDAYS_PLUGIN_DIR . '/includes' );
        }

        // Plugin Folder URL (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_PLUGIN_URL' ) ) {
            define( 'ICEGRAM_WEEKDAYS_PLUGIN_URL', untrailingslashit( plugin_dir_url( __DIR__ ) ) );
        }

        // Includes Folder URL (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_INCLUDES_URL' ) ) {
            define( 'ICEGRAM_WEEKDAYS_INCLUDES_URL', ICEGRAM_WEEKDAYS_PLUGIN_URL . '/includes' );
        }

        /*
         * Define admin constants
         */
        // Admin CSS Folder URL (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_ADMIN_CSS_URL' ) ) {
            define( 'ICEGRAM_WEEKDAYS_ADMIN_CSS_URL', ICEGRAM_WEEKDAYS_PLUGIN_URL . '/admin/css' );
        }

        // Admin JS Folder URL (without trailing slash)
        if ( ! defined( 'ICEGRAM_WEEKDAYS_ADMIN_JS_URL' ) ) {
            define( 'ICEGRAM_WEEKDAYS_ADMIN_JS_URL', ICEGRAM_WEEKDAYS_PLUGIN_URL . '/admin/js' );
        }

        /* 
         * Define administrative constants
         */
        // Plugin version.
        if ( ! defined( 'ICEGRAM_WEEKDAYS_VERSION' ) ) {
            define( 'ICEGRAM_WEEKDAYS_VERSION', $this->get_plugin_version() );
        } 

    }

    /**
     * Include required files.
     *
     * @since  0.9.1
     * @access private
     */
    private function includes() {

        if ( is_admin() )  {
            require_once ICEGRAM_WEEKDAYS_INCLUDES_DIR . '/class-icegram-weekdays-admin.php';
            $admin = new Icegram_Weekdays_Admin;
        }
        else {
            require_once ICEGRAM_WEEKDAYS_INCLUDES_DIR . '/class-icegram-weekdays-front.php';
            $front = new Icegram_Weekdays_Front;
        }

    }

}