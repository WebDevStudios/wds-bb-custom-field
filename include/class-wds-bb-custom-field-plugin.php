<?php

class WDS_BB_Custom_Field_Plugin {

	public function register_hooks() {
		// Load custom modules.
		add_action( 'init', arraay( $this, 'load_modules' ) );

		// Register custom fields.
		add_filter( 'fl_builder_custom_fields', array( $this, 'register_fields' ) );
	}

	public function load_modules() {
		require_once WDS_BB_CUSTOM_FIELD_DIR . 'include/modules/custom-module/class-wds-bb-custom-module.php';
	}

	public function register_fields( $fields ) {
		$fields['wds-bb-post-categories'] = WDS_BB_CUSTOM_FIELD_DIR . 'include/fields/post-categories.php';
		return $fields;
	}

}
