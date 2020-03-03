<?php
add_shortcode( 'testimonials', 'testimonials' );

function testimonials( $atts ) {
	$attributes = shortcode_atts( [
		'title' => '',
		'subtitle' => ''
	], $atts);

	$query_args = [
		'post_type' => 'testimonials',
		'posts_per_page' => 2
	];

	$parameters['testimonials'] = Timber::get_posts($query_args);

	// var_dump($parameters['testimonials']);

	$parameters['title'] = $atts['title'];
	$parameters['subtitle'] = $atts['subtitle'];
	
	// Get global timber context
	$context = Timber::context();

    return Timber::compile( 'partial/testimonials.html.twig', ['context' => $context, 'parameters' => $parameters] );
}