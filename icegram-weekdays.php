<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * Plugin Name:    Icegram - Popups (Weekdays Addon)
 * Plugin URI:     https://github.com/dfaltermier/icegram-weekdays
 * Description:    This is an addon to the <a href="https://wordpress.org/plugins/icegram/" target="_blank">Icegram Popups, Welcome Bar, Optins and Lead Generation plugin</a> by Icegram. It provides an option for message campaigns to be displayed during selected days of the week within a given date range.
 * Version:        1.0.1
 * Author:         FreshWeb Studio
 * Author URI:     https://www.freshwebstudio.com
 * Text Domain:    icegram-weekdays
 * License:        GNU General Public License v2 or later
 * License URI:    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * 
 * @package    Icegram_Weekdays
 * @subpackage Functions
 * @copyright  Copyright (c) 2018, www.freshwebstudio.com
 * @link       https://www.freshwebstudio.com/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/*
 * Define global constants that must come to life in this bootstrap file.
 */
// Plugin Name
if ( ! defined( 'ICEGRAM_WEEKDAYS_PLUGIN_FILENAME' ) ) {
    define( 'ICEGRAM_WEEKDAYS_PLUGIN_FILENAME', basename( __FILE__ ) );
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-icegram-weekdays.php';

/* 
 * Activate hook.
 *
 * @since 0.9.1
 */
function icegram_weekdays_activation() {
}
register_activation_hook( __FILE__, 'icegram_weekdays_activation' );

/* 
 * Deactivate hook.
 *
 * @since 0.9.1
 */
function icegram_weekdays_deactivation() {
}
register_deactivation_hook( __FILE__, 'icegram_weekdays_deactivation' );

/**
 * Begin execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks, then kicking off the
 * plugin from this point in the file does not affect the page life cycle.
 *
 * @since 0.9.1
 */
function icegram_weekdays_run() {

    $plugin = new Icegram_Weekdays();
    $plugin->run();

}

icegram_weekdays_run();
