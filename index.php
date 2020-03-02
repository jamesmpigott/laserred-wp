<?php 

	$context = Timber::context();

	$newsArgs = [
		'post_type' => 'post',
		'post_per_page' => 2,
		'orderby' => [
			'date' => 'DESC'
		]
	];
	$context['news'] = Timber::get_posts($newsArgs);

	$productsArgs = [
		'post_type' => 'product',
		'posts_per_page' => 4,
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
	];
	$context['products'] = Timber::get_posts($productsArgs);
	Timber::render('pages/home.html.twig', $context);
?>