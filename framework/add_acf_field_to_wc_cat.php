<?php 
add_action('acf/init', 'add_acf_field_to_wc_cat');
function add_acf_field_to_wc_cat(){
	acf_add_local_field_group(array(
		'key' => 'group_5e5d7d7b698b9',
		'title' => 'WC product category',
		'fields' => array(
			array(
				'key' => 'field_5e5d7de592996',
				'label' => 'Colour',
				'name' => 'color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
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