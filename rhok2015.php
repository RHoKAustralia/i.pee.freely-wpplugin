<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              localhost
 * @since             1.0.0
 * @package           Rhok2015
 *
 * @wordpress-plugin
 * Plugin Name:       i.pee.freely
 * Plugin URI:        localhost
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            i.pee.freely
 * Author URI:        localhost
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rhok2015
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rhok2015-activator.php
 */
function activate_rhok2015() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rhok2015-activator.php';
	Rhok2015_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rhok2015-deactivator.php
 */
function deactivate_rhok2015() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rhok2015-deactivator.php';
	Rhok2015_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rhok2015' );
register_deactivation_hook( __FILE__, 'deactivate_rhok2015' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rhok2015.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rhok2015() {

	$plugin = new Rhok2015();
	$plugin->run();

}
run_rhok2015();
