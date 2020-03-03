<?php
add_shortcode( 'best-selling-products', 'best_selling_products' );

function best_selling_products( $atts ) {
	$attributes = shortcode_atts( [
		'title' => '',
		'productsLimit' => 4,
	], $atts);

	$productsArgs = [
		'post_type' => 'product',
		'posts_per_page' => $atts['productsLimit'],
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
	];
	$atts['products'] = Timber::get_posts($productsArgs);

	$context = Timber::context();
    return Timber::compile( 'partial/best-selling-products.html.twig', [
    	'context' => $context,
    	'atts' => $atts
    ]);
}