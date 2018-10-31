<?php
/**
 * Posts Category List class and registration call.
 *
 * @package WDS_BB_Custom_Field
 * @since 1.0
 */

/**
 * Post Category List Module.
 *
 * @author Justin Foell <justin.foell@webdevstudios.com>
 * @since  1.0
 */
class Post_Category_List_Module extends FLBuilderModule {

	/**
	 * Module constructor.
	 *
	 * @see https://kb.wpbeaverbuilder.com/article/597-cmdg-02-add-a-module-to-your-plugin
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  1.0
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'        => __( 'Post Category List', 'wds-beaver-builder' ),
				'description' => __( 'A post category list module.', 'wds-beaver-builder' ),
				'group'       => __( 'WDS Modules', 'wds-csc-beaver-builder' ),
				'category'    => __( 'Posts', 'wds-csc-beaver-builder' ),
				'dir'         => plugin_dir_path( __FILE__ ),
				'url'         => plugins_url( dirname( __FILE__ ) ),
			)
		);
	}
}

/**
 * Register the module and its form settings.
 *
 * @see https://kb.wpbeaverbuilder.com/article/598-cmdg-03-define-module-settings
 * @since 1.0
 */
FLBuilder::register_module(
	'Post_Category_List_Module', array(
		'general' => array(
			'title'    => __( 'General', 'wds-bb-custom-field' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'list_title'    => array(
							'type'        => 'text',
							'label'       => __( 'List Title', 'wds-bb-custom-field' ),
							'default'     => '',
							'placeholder' => __( 'Enter a title or leave blank to omit', 'wds-bb-custom-field' ),
						),
						'post_category' => array(
							'type'  => 'wds-bb-post-categories',
							'label' => __( 'Filter Categories Primary', 'wds-bb-custom-field' ),
						),
					),
				),
			),
		),
	)
);
