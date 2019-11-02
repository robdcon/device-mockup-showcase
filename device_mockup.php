<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              robdcon.co.uk
 * @since             1.0.0
 * @package           Device_mockup
 *
 * @wordpress-plugin
 * Plugin Name:       Device Mockup
 * Plugin URI:        https://github.com/robdcon/device-mockup.git
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Rob Connolly
 * Author URI:        robdcon.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       device_mockup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DEVICE_MOCKUP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-device_mockup-activator.php
 */
function activate_device_mockup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-device_mockup-activator.php';
	Device_mockup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-device_mockup-deactivator.php
 */
function deactivate_device_mockup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-device_mockup-deactivator.php';
	Device_mockup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_device_mockup' );
register_deactivation_hook( __FILE__, 'deactivate_device_mockup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-device_mockup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_device_mockup() {

	$plugin = new Device_mockup();
	$plugin->run();
	

}
run_device_mockup();
