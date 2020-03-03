<?php
add_shortcode( 'services-cta', 'services_cta' );

function services_cta( $atts ) {
	$attributes = shortcode_atts( [
		'title' => '',
		'subtitle' => '',
		'button_text' => '',
		'button_link' => ''
	], $atts);

	$context = Timber::context();
    return Timber::compile( 'partial/services-cta.html.twig', [
    	'context' => $context,
    	'atts' => $atts
    ]);
}