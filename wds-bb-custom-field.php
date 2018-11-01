<?php
/**
 * Plugin Name: WDS Beaver Builder Custom Field
 * Description: An example of a custom field implementation in a custom module.
 * Version:     1.0
 * Author:      WebDevStudios
 * Author URI:  https://webdevstudios.com
 * License:     GPLv2+
 * Text Domain: wds-bb-custom-field
 *
 * @package WDS_BB_Custom_Field
 * @since 1.0
 * @see https://kb.wpbeaverbuilder.com/article/596-cmdg-01-create-a-plugin
 */

define( 'WDS_BB_CUSTOM_FIELD_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Get an instance of our plugin class.
 *
 * @return WDS_BB_Custom_Field_Plugin
 * @author Justin Foell <justin.foell@webdevstudios.com>
 * @since  1.0
 */
function wds_bb_custom_field_plugin() {
	static $plugin;
	if ( ! $plugin ) {
		require_once WDS_BB_CUSTOM_FIELD_DIR . 'include/class-wds-bb-custom-field-plugin.php';
		$plugin = new WDS_BB_Custom_Field_Plugin();
	}
	return $plugin;
}

/**
 * Hook our plugin up once all plugins are loaded.
 *
 * @return void
 * @author Justin Foell <justin.foell@webdevstudios.com>
 * @since  1.0
 */
function wds_bb_custom_field_hook() {
	if ( ! class_exists( 'FLBuilder' ) ) {
		return;
	}

	$plugin = wds_bb_custom_field_plugin();
	$plugin->register_hooks();
}
add_action( 'plugins_loaded', 'wds_bb_custom_field_hook' );
