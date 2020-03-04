<?php
add_shortcode( 'intro-content', 'intro_content' );

function intro_content( $atts, $content = null ) {
	$attributes = shortcode_atts( [
		'title' => '',
		'subtitle' => '',
		// 'html_content' => '',
		'button_text' => '',
		'button_link' => '',
		'image' => '',
	], $atts);

	//get image ID from url
	$image = get_site_url() .  $atts['image'];
	$imageID =  attachment_url_to_postid($image);

	$atts['imageContent'] = new Timber\Image($imageID);
	
	$atts['content'] = '<p>'.$content.'.</p>';

	$context = Timber::context();
    return Timber::compile( 'partial/intro-content.html.twig', [
    	'context' => $context,
    	'atts' => $atts
    ]);
}