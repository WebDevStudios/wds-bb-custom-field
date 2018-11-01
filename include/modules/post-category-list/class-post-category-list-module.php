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
	 * Default post count limit.
	 *
	 * @since 1.0
	 */
	const POST_COUNT_DEFAULT = 5;

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

	/**
	 * Set up a WP_Query based on our module's settings.
	 *
	 * @return WP_Query
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  1.0
	 */
	public function category_posts_query() {
		return new WP_Query( array(
			'posts_per_page' => $this->settings->post_count,
			'nopaging'       => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'id',
					'terms'    => $this->settings->post_categories,
				),
			),
		) );
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
						'list_title'      => array(
							'type'        => 'text',
							'label'       => __( 'List Title', 'wds-bb-custom-field' ),
							'default'     => '',
							'placeholder' => __( 'Enter a title or leave blank to omit', 'wds-bb-custom-field' ),
						),
						'post_count'      => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Posts', 'wds-bb-custom-field' ),
							'default' => Post_Category_List_Module::POST_COUNT_DEFAULT,
						),
						'post_categories' => array(
							'type'  => 'wds-bb-post-categories',
							'label' => __( 'Categories to Include', 'wds-bb-custom-field' ),
						),
					),
				),
			),
		),
	)
);
