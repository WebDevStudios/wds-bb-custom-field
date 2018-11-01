<?php
/**
 * The main class for our plugin.
 *
 * @package WDS_BB_Custom_Field
 * @since 1.0
 */

/**
 * Plugin class.
 *
 * @author Justin Foell <justin.foell@webdevstudios.com>
 * @since  1.0
 */
class WDS_BB_Custom_Field_Plugin {

	/**
	 * Hook it up!
	 *
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  1.0
	 */
	public function register_hooks() {
		// Load custom modules.
		add_action( 'init', array( $this, 'load_modules' ) );

		// Register custom fields.
		add_filter( 'fl_builder_custom_fields', array( $this, 'register_fields' ) );
	}

	/**
	 * Load a custom module.
	 *
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  1.0
	 */
	public function load_modules() {
		require_once WDS_BB_CUSTOM_FIELD_DIR . 'include/modules/post-category-list/class-post-category-list-module.php';
	}

	/**
	 * Register custom field(s) for our module.
	 *
	 * @param array $fields Beaver Builder fields - index is the field name, value is the file path.
	 * @return array $fields Beaver Builder fields with additional custom fields.
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  1.0
	 */
	public function register_fields( $fields ) {
		$fields['wds-bb-post-categories'] = WDS_BB_CUSTOM_FIELD_DIR . 'include/fields/post-categories.php';
		return $fields;
	}

}
