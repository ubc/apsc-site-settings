<?php
/**
 * Applied Science Site Options.
 *
 * @package           APSC_Site_Settings
 * @author            Rich Tape
 * @copyright         2024 Rich Tape
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       APSC Site Settings
 * Plugin URI:        https://apsc.ubc.ca
 * Description:       Additional Site Settings and Options for APSC Websites
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rich Tape
 * Author URI:        https://blogs.ubc.ca/richardtape
 * Text Domain:       apsc-site-settings
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

namespace UBC\APSC\Site_Settings;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

define( 'UBC_APSCSITESETTINGS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'UBC_APSCSITESETTINGS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once UBC_APSCSITESETTINGS_PLUGIN_DIR . 'inc/class-site-settings.php';
require_once UBC_APSCSITESETTINGS_PLUGIN_DIR . 'inc/class-theme-options.php';

// Instantiate early on plugins_loaded.
add_action( 'plugins_loaded', __NAMESPACE__ . '\\initialize_apsc_site_settings' );

/**
 * Initializes the plugin.
 *
 * @since 1.0.0
 * @return void
 */
function initialize_apsc_site_settings() {
	$apsc_theme_options = new Theme_Options();
	$apsc_site_settings = new Site_Settings();
}//end initialize_apsc_site_settings()
