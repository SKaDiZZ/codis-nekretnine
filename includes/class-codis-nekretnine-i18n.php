<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://codis.com
 * @since      1.0.0
 *
 * @package    Codis_Nekretnine
 * @subpackage Codis_Nekretnine/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Codis_Nekretnine
 * @subpackage Codis_Nekretnine/includes
 * @author     Samir Kahvedzic <akirapowered@gmail.com>
 */
class Codis_Nekretnine_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'codis-nekretnine',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
