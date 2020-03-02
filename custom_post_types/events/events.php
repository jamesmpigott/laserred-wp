<?php 
add_action('init', 'events_init');

function events_init() {
	$args = array(
		'labels' => array(
			'name' => __('Events'),
			'singular_name' => __('Event'),
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array("slug" => "events"), 
		'supports' => array('thumbnail','editor','title','custom-fields')
	);

	register_post_type( 'events' , $args );
}

add_action( 'acf/init', 'add_acf_fields_event');
function add_acf_fields_event(){
	acf_add_local_field_group(array(
		'key' => 'group_5e5d9111c4133',
		'title' => 'Events',
		'fields' => array(
			array(
				'key' => 'field_5e5d911705e38',
				'label' => 'Location',
				'name' => 'location',
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
			array(
				'key' => 'field_5e5d911d05e39',
				'label' => 'Start Date',
				'name' => 'start_date',
				'type' => 'date_time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'd/m/Y g:i a',
				'return_format' => 'Y-m-d H:i:s',
				'first_day' => 1,
			),
			array(
				'key' => 'field_5e5d915205e3a',
				'label' => 'End date',
				'name' => 'end_date',
				'type' => 'date_time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'd/m/Y g:i a',
				'return_format' => 'Y-m-d H:i:s',
				'first_day' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'events',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}