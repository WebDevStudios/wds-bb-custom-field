<?php
/**
 * Plugin Name: WDS Beaver Builder Custom Field
 * Description: An example of a custom field implementation in a custom module.
 * Version:     1.0
 * Author:      WebDevStudios
 * Author URI:  https://webdevstudios.com
 * License:     GPLv2+
 * Text Domain: wds-bb-custom-field
 */



function wds_bb_custom_field() {
	require_once 'include/class-wds-bb-custom-field.php';

	static $wds_bb_custom_field;
	if ( ! $wds_bb_custom_field ) {
		$wds_bb_custom_field = new WDS_BB_Custom_Field();
	}
	return $wds_bb_custom_field;
}

function wds_bb_hook() {
	if ( ! class_exists( 'FLBuilder' ) ) {
		return;
	}
	$wds_bb = wds_bb_custom_field();
	$wds_bb->register_hooks();
}
add_action( 'plugins_loaded', 'wds_bb_hook' );
