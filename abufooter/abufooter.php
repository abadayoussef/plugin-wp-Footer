<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/ahmedBou
 * @since             1.0.0
 * @package           Abufooter
 *
 * @wordpress-plugin
 * Plugin Name:       Abufooter
 * Plugin URI:        https://github.com/ahmedBou
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            ahmed
 * Author URI:        https://github.com/ahmedBou
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       abufooter
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;

}
if (!defined('ABUFOOTER_PLUGIN_DIR')) {
	define('ABUFOOTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('ABUFOOTER_PLUGIN_URL')) {
	define('ABUFOOTER_PLUGIN_URL', plugins_url()."/abufooter");
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ABUFOOTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-abufooter-activator.php
 */
function activate_abufooter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abufooter-activator.php';
	Abufooter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-abufooter-deactivator.php
 */
function deactivate_abufooter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abufooter-deactivator.php';
	Abufooter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_abufooter' );
register_deactivation_hook( __FILE__, 'deactivate_abufooter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-abufooter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_abufooter() {

	$plugin = new Abufooter();
	$plugin->run();

}
run_abufooter();
