<?php 
add_action('init', 'testimonials_init');

function testimonials_init() {
	$args = [
		'labels' => [
			'name' => __('Testimonials'),
			'singular_name' => __('Testimonial'),
		],
		'public' => true,
		'has_archive' => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'supports' => [
			'thumbnail',
			'editor',
			'title',
			'custom-fields'
		]
	];

	register_post_type( 'testimonials' , $args );
}

add_action( 'acf/init', 'add_acf_fields_testimonial' );
function add_acf_fields_testimonial(){
	acf_add_local_field_group(array(
		'key' => 'group_5e5eca0315233',
		'title' => 'testimonial',
		'fields' => array(
			array(
				'key' => 'field_5e5eca1661a77',
				'label' => 'Author Description',
				'name' => 'author_description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'testimonials',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}
