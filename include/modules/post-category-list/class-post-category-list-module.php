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
				'name'        => esc_html__( 'Post Category List', 'wds-bb-custom-field' ),
				'description' => esc_html__( 'A post category list module.', 'wds-bb-custom-field' ),
				'group'       => esc_html__( 'WDS Modules', 'wds-bb-custom-field' ),
				'category'    => esc_html__( 'Posts', 'wds-bb-custom-field' ),
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
			'title'    => esc_html__( 'General', 'wds-bb-custom-field' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'list_title'      => array(
							'type'        => 'text',
							'label'       => esc_html__( 'List Title', 'wds-bb-custom-field' ),
							'default'     => '',
							'placeholder' => esc_html__( 'Enter a title or leave blank to omit', 'wds-bb-custom-field' ),
						),
						'post_count'      => array(
							'type'    => 'unit',
							'label'   => esc_html__( 'Number of Posts', 'wds-bb-custom-field' ),
							'default' => Post_Category_List_Module::POST_COUNT_DEFAULT,
						),
						'post_categories' => array(
							'type'  => 'wds-bb-post-categories',
							'label' => esc_html__( 'Categories to Include', 'wds-bb-custom-field' ),
						),
					),
				),
			),
		),
	)
);
