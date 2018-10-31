<?php

class Post_Category_List_Module extends FLBuilderModule {

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Post_Category_List_Module', array(
		'general' => array(
			'title'    => __( 'General', 'wds-bb-custom-field' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'list_title' => array(
							'type'    => 'select',
							'label'   => __( 'Post Type Select', 'wds-bb-custom-field' ),
							'default' => 'product',
							'options' => array(
								'product' => __( 'Products', 'wds-bb-custom-field' ),
								'recipe'  => __( 'Recipes', 'wds-bb-custom-field' ),
							),
							'toggle'  => array(
								'product' => array(
									'fields'   => array(),
									'sections' => array( 'product_fields', 'global_fields' ),
								),
								'recipe'  => array(
									'fields'   => array(),
									'sections' => array( 'recipe_fields', 'global_fields' ),
								),
							),
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
