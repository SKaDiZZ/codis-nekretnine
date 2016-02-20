<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://codis.com
 * @since             1.0.0
 * @package           Codis_Nekretnine
 *
 * @wordpress-plugin
 * Plugin Name:       Nekretnine
 * Plugin URI:        http://codis.com
 * Description:       Dodatak wordpressu koji dodaje mogucnosti upravljanja nekretninama. Dodavanje i uredivanje nekretnina na vasem web sajtu, upravljanje nekretninama iz administracije kao i slajder sa nekretninama koji mozete prikazati na stranicama vaseg sajta.
 * Version:           1.0.0
 * Author:            Samir Kahvedzic
 * Author URI:        http://codis.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       codis-nekretnine
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-codis-nekretnine-activator.php
 */
function activate_codis_nekretnine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-codis-nekretnine-activator.php';
	Codis_Nekretnine_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-codis-nekretnine-deactivator.php
 */
function deactivate_codis_nekretnine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-codis-nekretnine-deactivator.php';
	Codis_Nekretnine_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_codis_nekretnine' );
register_deactivation_hook( __FILE__, 'deactivate_codis_nekretnine' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-codis-nekretnine.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_codis_nekretnine() {

	$plugin = new Codis_Nekretnine();
	$plugin->run();

}
run_codis_nekretnine();
