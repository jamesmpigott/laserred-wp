<?php
add_shortcode( 'generic-content', 'generic_content' );

function generic_content( $atts ) {
	$context = Timber::context();
    return Timber::compile( 'partial/generic-content.html.twig', $context);
}