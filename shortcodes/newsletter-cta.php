<?php
add_shortcode( 'newsletter_cta', 'newsletter_cta' );

function newsletter_cta( $atts ) {
	$context = Timber::context();
    return Timber::compile( 'partial/newsletter-cta.html.twig', $context );
}