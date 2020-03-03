<?php
add_shortcode( 'newsletter_cta', 'newsletter_cta' );

function newsletter_cta( $atts ) {
	$attributes = shortcode_atts( [
		'title' => '',
		'subtitle' => ''
	], $atts);

	$context = Timber::context();
    return Timber::compile( 'partial/newsletter-cta.html.twig', [
    	'context' => $context,
    	'atts' => $atts
    ]);
}